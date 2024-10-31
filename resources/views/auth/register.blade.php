@extends('layouts.guest')

@section('content')
<section class="py-4 py-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center"><img class="img-fluid w-100" src="../bootstrap/img/illustrations/register.svg"></div>
                <div class="col-md-5 col-xl-4 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Sign up</strong></span></h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <input id="name" type="text" class="shadow-sm form-control @error('name') is-invalid @enderror" placeholder="Username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <input id="email" type="email" class="shadow-sm form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <input id="password" type="password" class="shadow-sm form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                                <input id="password-confirm" type="password" class="shadow-sm form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <p class="text-muted">Punya Akun? <a href="{{ route('login') }}">Login&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right"></svg>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        const statusSelect = document.getElementById('status');
        const jurusanSelect = document.getElementById('jurusan');

        statusSelect.addEventListener('change', function() {
        const selectedStatus = this.value;

        if (selectedStatus === 'Mahasiswa') {
            jurusanSelect.style.display = 'block';
        } else {
            jurusanSelect.style.display = 'none';
        }
        });
  </script>
@endsection
