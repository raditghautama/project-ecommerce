@extends('layouts.home')

@section('content')
<div class="wrapper mt-1">
    <div class="container main">
      <div class="row row-login">
            <div class="col-md-6 side-image">
                <img src="{{ url('assets/img/2.jpg') }}" class="img-login w-100 h-100" alt="Login" style="width: 100px">
                <div class="text-login">
                    <h1>" WELCOME "<br>
                        please login before you shopping</h1>
                  </div>
            </div>
            <div class="col-md-6 right-login">
                <form method="POST" class="input-box" action="{{ route('login') }}">
                    @csrf
                    <header>Login Here</header>
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
                    <div class="signin">
                        <span
                          >Don't have account?
                          <a href="{{route('register')}}">Register here</a></span
                        >
                      </div>
                    <div class="mb-3 input-field">
                            <button class="login btn btn-primary  head-font fs-6 color-inti" type="submit">Login</button>
                        </div>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection
