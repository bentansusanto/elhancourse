@extends('auth.main')

@section('title','Login User')

@section('navbar')
<nav class="navbar bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="/login">
        <img src="{{asset('image/logo-white.svg')}}" alt="">
      </a>
    </div>
  </nav>
@section('content')
    <div class="Login">
        <div class="row">
            <div class="col">
                <div class="bg-auth">
                    <img src="{{asset('image/auth/bg-auth.jpg')}}" alt="">
                </div>
            </div>
            <div class="col">
                <div class="form-auth">
                    <div class="container">
                        <div class="content">
                            <h1>Sign In</h1>
                            <p>Welcome back, please login to
                                your account.</p>
                        </div>
                        <form action="/login" method="POST">
                            @csrf
                            @if (session()->has('Success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('Success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            @endif
                            @if (session()->has('loginErr'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session('loginErr')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            @endif 
                            {{-- form login --}}
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" autofocus>
                                <label for="floatingEmail">Email address</label>
                                @error('email') 
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                              <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label style="font-size: .9rem;" class="form-check-label" for="exampleCheck1">Remember Me</label>
                              </div>
                            <button class="btn btn-primary w-100">LOGIN</button>
                            <p class=" text-center mt-2" style="font-size: .9rem;">I don't have account &nbsp; <a href="/register" style="text-decoration: none">Register Now</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection