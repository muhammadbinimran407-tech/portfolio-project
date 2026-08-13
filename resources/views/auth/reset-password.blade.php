<x-guest-layout>
    <div class="card-head">
        <h1>Choose a new password</h1>
        <p>$ update your account password</p>
    </div>

    @if($errors->any())
        <div class="auth-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="field">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" class="input" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="you@email.com">
            <div class="input-error">
                <x-input-error :messages="$errors->get('email')" />
            </div>
        </div>

        <div class="field">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" class="input" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
            <div class="input-error">
                <x-input-error :messages="$errors->get('password')" />
            </div>
        </div>

        <div class="field">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
            <div class="input-error">
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
    </form>

    <div class="auth-alt">
        <a href="{{ route('login') }}">{{ __('Back to sign in') }}</a>
    </div>
</x-guest-layout>
