@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="card mt-5" style="width: 30rem; background-color: rgb(38 38 38) !important;">
            <div class="card-header mt-5" style="background-color: rgb(38 38 38) !important;">
                <span>{{ __('Login') }}</span>
                <img src="{{ asset('assets/images/tinkerpro-logo.png') }}" alt="tinkerpro logo">
            </div>

            <div class="card-body mb-5 mt-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="">{{ __('Email Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email address" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password" autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <button type="submit" class="btn btn-primary" style="background-color: rgb(255 105 0); border: rgb(255 105 0);">
                            {{ __('Login') }}
                        </button>

                     
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
