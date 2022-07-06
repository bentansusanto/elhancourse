@extends('auth.main')

@section('title','Registration User')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Register</h2>
        <form action="/register" method="POST" class="mx-auto mt-3 w-25">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" id="floatingInput" name="name" value="{{old('name')}}" autofocus>
                <label for="floatingInput">Email address</label>
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" value="{{old('email')}}">
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
            <p class="text-center mt-2" style="font-size: .9rem;">I have account &nbsp; <a href="/login" style="text-decoration: none">Login Now</a></p>
        </form>
    </div>
@endsection