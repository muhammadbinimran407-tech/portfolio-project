<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function stripe(Request $request)
    {
        $secret = config('services.stripe.secret');

        if (! $secret) {
            return response()->json(['error' => 'Stripe is not configured yet. Add STRIPE_SECRET_KEY to your .env file.'], 503);
        }

        $amount = max(1, (int) round(((float) $request->input('amount', 5)) * 100));
        $title = $request->input('title', 'Support Muhammad Bin Imran');

        $response = Http::asForm()
            ->withToken($secret)
            ->acceptJson()
            ->post('https://api.stripe.com/v1/checkout/sessions', [
                'mode' => 'payment',
                'success_url' => url('/contact?payment=success'),
                'cancel_url' => url('/contact?payment=cancelled'),
                'line_items[0][quantity]' => 1,
                'line_items[0][price_data][currency]' => 'usd',
                'line_items[0][price_data][product_data][name]' => $title,
                'line_items[0][price_data][unit_amount]' => $amount,
            ]);

        $data = $response->json();

        if (! $response->successful() || ! isset($data['url'])) {
            Log::warning('Stripe checkout failed: '.$response->body());
            $message = $data['error']['message'] ?? 'Payment could not be started. Please try again.';

            return response()->json(['error' => $message], 422);
        }

        return response()->json(['url' => $data['url']]);
    }

    public function stripeIntent(Request $request)
    {
        $secret = config('services.stripe.secret');

        if (! $secret) {
            return response()->json(['error' => 'Stripe is not configured yet. Add STRIPE_SECRET_KEY to your .env file.'], 503);
        }

        $amount = max(1, (int) round(((float) $request->input('amount', 5)) * 100));
        $title = $request->input('title', 'Support Muhammad Bin Imran');

        $response = Http::asForm()
            ->withToken($secret)
            ->acceptJson()
            ->post('https://api.stripe.com/v1/payment_intents', [
                'amount' => $amount,
                'currency' => 'usd',
                'automatic_payment_methods[enabled]' => 'true',
                'description' => $title,
            ]);

        $data = $response->json();

        if (! $response->successful() || ! isset($data['client_secret'])) {
            Log::warning('Stripe PaymentIntent failed: '.$response->body());
            $message = $data['error']['message'] ?? 'Payment could not be started. Please try again.';

            return response()->json(['error' => $message], 422);
        }

        return response()->json([
            'client_secret' => $data['client_secret'],
            'amount' => $data['amount'],
            'title' => $title,
        ]);
    }

    public function paypal(Request $request)
    {
        $link = config('services.paypal.link');

        if (! $link) {
            return response()->json(['error' => 'PayPal is not configured yet. Add PAYPAL_LINK to your .env file.'], 503);
        }

        $amount = number_format(max(1, (float) $request->input('amount', 5)), 2, '.', '');

        return response()->json(['url' => rtrim($link, '/').'/'.$amount]);
    }

    public function jazzcash(Request $request)
    {
        $merchantId = config('services.jazzcash.merchant_id');
        $password = config('services.jazzcash.password');
        $salt = config('services.jazzcash.salt');

        if (! $merchantId || ! $password || ! $salt) {
            return response()->json(['error' => 'JazzCash is not configured yet. Add the JAZZCASH_* keys to your .env file.'], 503);
        }

        $amount = max(1, (float) $request->input('amount', 1000));
        $title = $request->input('title', 'Support Muhammad Bin Imran');
        $refNo = 'T'.now()->format('YmdHis').random_int(10, 99);

        $fields = [
            'pp_Version' => '2.0',
            'pp_TxnType' => 'MWALLET',
            'pp_Language' => 'EN',
            'pp_MerchantID' => $merchantId,
            'pp_SubMerchantID' => '',
            'pp_Password' => $password,
            'pp_BankID' => '',
            'pp_ProductID' => '',
            'pp_TxnRefNo' => $refNo,
            'pp_Amount' => (string) round($amount * 100),
            'pp_TxnCurrency' => config('services.jazzcash.currency', 'PKR'),
            'pp_TxnDateTime' => now()->format('YmdHis'),
            'pp_TxnExpiryDateTime' => now()->addHour()->format('YmdHis'),
            'pp_BillReference' => substr(preg_replace('/[^A-Za-z0-9]/', '', $title), 0, 19),
            'pp_Description' => $title,
            'pp_ReturnURL' => url('/payment/jazzcash/return'),
            'pp_SecureHash' => '',
        ];

        $fields['pp_SecureHash'] = static::jazzcashHash($fields, $salt);

        $endpoint = config('services.jazzcash.sandbox')
            ? 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/Payment/DoTransaction'
            : 'https://payments.jazzcash.com.pk/ApplicationAPI/API/Payment/DoTransaction';

        return response()->json(['method' => 'POST', 'url' => $endpoint, 'fields' => $fields]);
    }

    public function jazzcashReturn(Request $request)
    {
        $salt = config('services.jazzcash.salt');
        $response = $request->all();

        $verified = $salt && $request->has('pp_SecureHash')
            && hash_equals(static::jazzcashHash($response, $salt), $request->input('pp_SecureHash'));

        $success = ($request->input('pp_ResponseCode') === '000') && $verified;

        return redirect('/contact?payment='.($success ? 'success' : 'cancelled'));
    }

    protected static function jazzcashHash(array $fields, string $salt): string
    {
        $payload = $fields;
        unset($payload['pp_SecureHash']);

        $values = [];
        foreach ($payload as $key => $value) {
            if ($value !== '' && $value !== null) {
                $values[$key] = (string) $value;
            }
        }

        ksort($values);

        $string = $salt.'&'.implode('&', array_values($values));

        return hash_hmac('sha256', $string, $salt);
    }
}
