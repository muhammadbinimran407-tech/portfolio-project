<x-guest-layout>
    <div class="card-head">
        <h1>Confirm password</h1>
        <p>$ secure area — verify it's you</p>
    </div>

    <p class="auth-text">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </p>

    @if($errors->any())
        <div class="auth-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="field">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" class="input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
            <div class="input-error">
                <x-input-error :messages="$errors->get('password')" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
    </form>
</x-guest-layout>
