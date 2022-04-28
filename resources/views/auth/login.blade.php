@extends('layout')

@section('content')

<style>

.container {
    width: 100%;
    height: 100%;
}

.center {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 5rem;
}

.login-form {
    width: 30rem;
}

.options {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.action-buttons {
    height: 36px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.action-buttons > button,
.action-buttons > a {
    height: 100%;
    text-align: center;
    align-content: center;
}

</style>

<div class="container">
    <div class="center">
        <div class="card login-form">
            <h1>{{ __('Log in') }}</h1>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email">{{ __('Email Address') }}</label>
                        <div class="custom-form-item">
                            <input id="email" type="email" class="form-item @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="input-validation-error" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password">{{ __('Password') }}</label>
                        <div class="custom-form-item">
                            <input id="password" type="password" class="form-item @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="input-validation-error" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="options">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div>
                            <a class="link-primary" href="{{ route('register') }}">
                                {{ __('Not a member?') }}
                            </a>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button type="submit" class="btn btn-primary large">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="link-primary" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
