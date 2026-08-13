<x-guest-layout>
    <div class="card-head">
        <h1>Verify your email</h1>
        <p>$ almost done</p>
    </div>

    <p class="auth-text">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-status">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">{{ __('Resend Verification Email') }}</button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="row-end">
        @csrf
        <button type="submit" class="btn btn-ghost">{{ __('Log Out') }}</button>
    </form>
</x-guest-layout>
