@extends('layouts.app')

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="/image/loginTheme.jpg"
                         alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Recipe App</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('Login') }}</button>
                            </div>
                                @if (Route::has('password.request'))
                                    <a class="small text-muted" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                @endif
                                <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account?
                                    <a href="{{ route('register') }}" style="color: #393f81;">Register here</a>
                                </p>
                                <a href="#!" class="small text-muted">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
                        
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
