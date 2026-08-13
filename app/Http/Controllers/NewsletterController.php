<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'Please provide an email address.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already subscribed.',
        ]);

        Subscriber::create(['email' => $data['email']]);

        return redirect()->back()->with('newsletter_success', 'Thanks — you are subscribed.');
    }
}
