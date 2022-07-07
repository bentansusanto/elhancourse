@extends('nonuser.main')

@section('title','Homepage')

@section('navbar')
<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{asset('image/logo.png')}}" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="/">Home</a>
          <a class="nav-link" href="/about">About Us</a>
          <a class="nav-link" href="/mentor">Mentor</a>
          <a class="nav-link" href="/contact">Contact Us</a>
        </div>
        <div class="sign-inup">
            <a style="text-decoration: none; color: #0E3EDA;" class="nav-log" href="/login">Login</a>
            <a style="text-decoration: none; background-color: #0E3EDA;" class="nav-log btn btn-primary" href="/register">Sign up</a>
        </div>
      </div>
    </div>
  </nav>

  @section('content')
    {{-- Hero Section --}}
    <div class="heros">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-12 col-lg-6">
            <img src="{{asset('image/nonuser/img-home/bg-hero.png')}}">
          </div>
          <div class="col-12 col-lg-6">
              <h1>Don’t just dream <br> Learn with us</h1>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="/user" class="btn btn-primary shadow">Get Started</a>
          </div>
        </div>
      </div>
    </div>

    {{-- Course Categories --}}
    <div class="kategori">
      <div class="container">
        <h4>Popular Subjects</h4>
        <h2>Categories Course</h2>
        <div class="row mt-5">
          @foreach ($categories as $category)            
            <a href="/courses" class="col-12 col-md-4 col-lg-3 kategoris">
              <h5>{{$category->name}}</h5>
              <p>over 100 courses</p>
            </a>
          @endforeach
        </div>
      </div>
    </div>

  @section('footer')

@endsection