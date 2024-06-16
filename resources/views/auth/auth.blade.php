@extends('layout.default')

@section('content')
    <div class="auth-wrapper container-lg py-3 py-md-5">
        <div class="row g-3">
            <div class="login-form-wrapper col-12 col-lg-6">
                <div class="bg-light rounded p-3">
                    <h1 class="h3 pb-3 border-bottom border-2 border-black-50"><?= __('Login') ?></h1>
                    <form action="{{ route('login') }}" id="login-form" class="mt-3" method="POST" novalidate>
                        @csrf

                        @error('invalidEmailOrPassword')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <div class="form-label"><?= __('Email address') ?></div>
                            <input type="email" name="login_email" id="login_email" class="form-control @error('login_email') is-invalid @enderror" value="{{ old('login_email') }}">
                            <label for="login_email" generated="true" class="is-invalid text-danger d-block mt-2">
                                @error('login_email')
                                {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="mb-3">
                            <div class="form-label"><?= __('Password') ?></div>
                            <input type="password" name="login_password" id="login_password" class="form-control @error('login_password') is-invalid @enderror" value="{{ old('login_password') }}">
                            <label for="login_password" generated="true" class="is-invalid text-danger d-block mt-2">
                                @error('login_password')
                                {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="login_remember" id="login_remember" class="form-check-input">
                            <label for="login_remember" class="form-check-label"><?= __('Remember Me') ?></label>
                        </div>
                        <button type="submit" class="btn btn-info text-white px-4 py-2 rounded-pill"><?= __('Login') ?></button>
                    </form>
                </div>
            </div>
            <div class="register-form-wrapper col-12 col-lg-6">
                <div class="bg-light rounded p-3">
                    <h2 class="h3 pb-3 border-bottom border-2 border-black-50"><?= __('Register') ?></h2>
                    <form action="{{ route('register') }}" id="register-form" class="mt-3" method="POST" novalidate>
                        @csrf

                        @error('registerErr')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <div class="form-label"><?= __('First name') ?></div>
                            <input type="text" name="register_firstname" id="register_firstname" class="form-control @error('register_firstname') is-invalid @enderror" value="{{ old('register_firstname') }}">
                            <label for="register_firstname" generated="true" class="is-invalid text-danger d-block mt-2">
                                @error('register_firstname')
                                {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <div class="mb-3">
                            <div class="form-label"><?= __('Last name') ?></div>
                            <input type="text" name="register_lastname" id="register_lastname" class="form-control @error('register_lastname') is-invalid @enderror" value="{{ old('register_lastname') }}">
                            <label for="register_lastname" generated="true" class="is-invalid text-danger d-block mt-2">
                                @error('register_lastname')
                                {{ $message }}
                                @enderror
                            </label>
                        </div>
                        <fieldset>
                            <legend class="h4 fw-normal"><?= __('Sign-in info') ?></legend>
                            <div class="mb-3">
                                <div class="form-label"><?= __('Email address') ?></div>
                                <input type="email" name="register_email" id="register_email" class="form-control @error('register_email') is-invalid @enderror" value="{{ old('register_email') }}">
                                <label for="register_email" generated="true" class="is-invalid text-danger d-block mt-2">
                                    @error('register_email')
                                    {{ $message }}
                                    @enderror
                                </label>
                            </div>
                            <div class="mb-3">
                                <div class="form-label"><?= __('Password') ?></div>
                                <input type="password" name="register_password" id="register_password" class="form-control @error('register_password') is-invalid @enderror">
                                <label for="register_password" generated="true" class="is-invalid text-danger d-block mt-2">
                                    @error('register_password')
                                    {{ $message }}
                                    @enderror
                                </label>
                            </div>
                            <div class="mb-3">
                                <div class="form-label"><?= __('Password Confirmation') ?></div>
                                <input type="password" name="register_confirm_password" id="register_confirm_password" class="form-control @error('register_confirm_password') is-invalid @enderror">
                                <label for="register_confirm_password" generated="true" class="is-invalid text-danger d-block mt-2">
                                    @error('register_confirm_password')
                                    {{ $message }}
                                    @enderror
                                </label>
                            </div>
                        </fieldset>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="register_remember" id="register_remember" class="form-check-input">
                            <label for="register_remember" class="form-check-label"><?= __('Remember Me') ?></label>
                        </div>
                        <button type="submit" class="btn btn-info text-white px-4 py-2 rounded-pill"><?= __('Register') ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
