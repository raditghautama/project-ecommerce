@extends('layouts.home')

@section('content')
<div class="wrapper mt-3">
    <div class="container main">
      <div class="row row-login">
            <div class="col-md-6 side-image">
                <img src="{{ url('assets/img/2.jpg') }}" class="img-login w-100 h-100" alt="Login" style="width: 100px">
                <div class="text">
                    <h1>" WELCOME "<br>
                        please register before you login and shopping</h1>
                  </div>
            </div>
            <div class="col-md-6 right">
                <form method="POST" class="input-box" action="{{ route('register') }}">
                    @csrf
                    <header>Login Here</header>
                    <div class="mb-3 input-field">
                        <input type="name" class=" input  @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                           >
                        <label for="name" class="form-label">Name</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 input-field">
                        <input type="email" class=" input  @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           >
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 input-field">
                        <input type="password" class=" input @error('password') is-invalid @enderror" id="password"
                            name="password" required autocomplete="current-password" >
                        <label for="password" class="form-label">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" mb-3 input-field">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm" class="form-label ">Confirm Password</label>

                    </div>
                    <div class="signin">
                        <span
                          >Don't have account?
                          <a href="{{route('login')}}">Login here</a></span
                        >
                      </div>
                    <div class="mb-3 input-field">
                            <button class="login btn btn-primary  head-font fs-6 color-inti" type="submit">Register</button>
                        </div>


                </form>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
