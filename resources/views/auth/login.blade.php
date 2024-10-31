@extends('layouts.guest')

@section('content')
<section class="py-4 py-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center"><img class="img-fluid w-100" src="{{ asset('bootstrap/img/6897389.jpg') }}"></div>
                <div class="col-md-5 col-xl-4 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Login</strong><br></span></h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input id="text" type="text" class="shadow form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        <div class="mb-3">
                            <input id="password" type="password" class="shadow form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                             @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember {{ old('remember') ? 'checked' : '' }}">
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary shadow">
                                {{ __('Login') }}
                            </button>
                            <p class="text-muted">Tidak Punya akun? <a href="{{ route('register') }}">Daftar&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right"></svg>
                        </div>
                        @if (Route::has('password.request'))
                            <p class="text-muted"><a href="{{ route('password.request') }}">Lupa Password?</a></p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
