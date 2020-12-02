@extends('layouts.app')

@section('content')
<div style="min-height: 100vh" class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div style="border-radius: 0; border: 0" class="card mt-md-5 shadow-sm">
                <div class="card-header text-center font-weight-bold">
                    <h5>Login</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input style="border-radius: 0" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input style="border-radius: 0" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="border-radius: 0;" type="submit" class="btn btn-sm btn-dark px-3">
                                     Login 
                                </button>
                                

                                
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col-md-8 offset-md-4">
                                @if (Route::has('password.request'))
                                    <a class=" text-secondary" href="{{ route('password.request') }}">
                                        <small>Lupa Password?</small>
                                    </a><br>
                                @endif

                                <a href="{{ route('register') }}" class="text-secondary"><small>Belum punya akun? registrasi disini.</small></a>
                                    
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 text-center">
                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
