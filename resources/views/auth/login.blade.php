@extends('auth.main')

@section('title','Login User')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Login</h2>
        <form action="/login" method="POST" class="mx-auto mt-3 w-25">
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
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password">
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary w-100 mt-3">Submit</button>
            <p class="text-center mt-2" style="font-size: .9rem;">I don't have account &nbsp; <a href="/register" style="text-decoration: none">Register Now</a></p>
        </form>
    </div>
@endsection