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

.register-form {
    width: 30rem;
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

.options {
    display: flex;
    justify-content: space-between;
    margin-top: 2rem;
}
</style>

<div class="container">
    <div class="center">
        <div class="card register-form">
            <h1>{{ __('Register') }}</h1>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <label for="name">{{ __('Name') }}</label>

                        <div class="custom-form-item">
                            <input id="name" type="text" class="form-item @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="input-validation-error" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email">{{ __('Email Address') }}</label>

                        <div class="custom-form-item">
                            <input id="email" type="email" class="form-item @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <input id="password" type="password" class="form-item @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="input-validation-error" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                        <div class="custom-form-item">
                            <input id="password-confirm" type="password" class="form-item" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>


                    <div class="options">
                        <div>
                            <button type="submit" class="btn btn-primary large">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div>
                            <a class="link-primary" href="{{ route('login') }}">
                                {{ __('Already have an account?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
