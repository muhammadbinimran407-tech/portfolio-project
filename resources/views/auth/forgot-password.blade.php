<x-guest-layout>
    @if(session('status'))
        <div class="auth-status">{{ session('status') }}</div>
    @endif

    <div class="card-head">
        <h1>Reset password</h1>
        <p>$ no problem, we'll get you back in</p>
    </div>

    <p class="auth-text">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </p>

    @if($errors->any())
        <div class="auth-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="field">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus placeholder="you@email.com">
            <div class="input-error">
                <x-input-error :messages="$errors->get('email')" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
    </form>

    <div class="auth-alt">
        <a href="{{ route('login') }}">{{ __('Back to sign in') }}</a>
    </div>
</x-guest-layout>
