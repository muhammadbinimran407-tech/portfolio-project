<x-guest-layout>
    @if(session('status'))
        <div class="auth-status">{{ session('status') }}</div>
    @endif

    <div class="card-head">
        <h1>Welcome back</h1>
        <p>$ sign in to manage your portfolio</p>
    </div>

    @if($errors->any())
        <div class="auth-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@email.com">
            <div class="input-error">
                <x-input-error :messages="$errors->get('email')" />
            </div>
        </div>

        <div class="field">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" class="input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
            <div class="input-error">
                <x-input-error :messages="$errors->get('password')" />
            </div>
        </div>

        <div class="row-between">
            <label class="remember" for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Sign In') }}</button>
    </form>
</x-guest-layout>
