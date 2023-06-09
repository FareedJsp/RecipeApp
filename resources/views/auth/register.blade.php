@extends('layouts.app')

@section('content')
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">{{ __('Register') }}</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-outline mb-4">
                            <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label class="form-label" for="name">{{ __('Your Name') }}</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                        </div>

                        <div class="form-outline mb-4">
                            <select id="role" class="form-control form-control-lg @error('role') is-invalid @enderror" name="role" required>
                                <option value="">-- Select Role --</option>
                                <option value="User">User</option>
                                <option value="Chef">Chef</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label class="form-label" for="role">{{ __('Role') }}</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="password-confirm" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                            <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>

                        {{-- <div class="form-check d-flex justify-content-center mb-5">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                            <label class="form-check-label" for="form2Example3g">
                                I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                            </label>
                        </div> --}}

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg text-body">{{ __('Register') }}</button>
                        </div>

                        <p class="text-center text-muted mt-5 mb-0">Already have an account?
                            <a href="{{ route('login') }}" class="fw-bold text-body">
                                <u>Login here</u>
                            </a>
                        </p>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
