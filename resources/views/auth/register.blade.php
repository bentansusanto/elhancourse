@extends('auth.main')

@section('title','Register User')

@section('navbar')
<nav class="navbar bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="/register">
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
                            <h1>Sign Up</h1>
                            <p class="pt-3">Welcome back, please login to
                                your account.</p>
                        </div>
                        <form action="/register" method="POST">
                            @csrf
                            @if (session()->has('loginErr'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session('loginErr')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            @endif 
                            {{-- form register --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" name="name" autofocus>
                                <label for="floatingInput">Full Name</label>
                                @error('name') 
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" autofocus>
                                <label for="floatingEmail">Email address</label>
                                @error('email') 
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                              <div class="form-floating">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary w-100 mt-3">REGISTER</button>
                            <p class="text-center mt-2" style="font-size: .9rem;">I have account &nbsp; <a href="/login" style="text-decoration: none">Login Now</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection