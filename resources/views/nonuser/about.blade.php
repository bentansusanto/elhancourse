@extends('nonuser.main')

@section('title','About elhan course')

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
  <div class="tentangs">
    <div class="container">
        <div class="row tentang">
            <div class="col-12 col-lg-6">
                <img src="{{asset('image/nonuser/img-about/bg-hero.png')}}" alt="">
            </div>
            <div class="col-12 col-lg-6">
                <h2>Help People to Grow</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae pariatur necessitatibus est soluta commodi nemo eos labore ducimus voluptates.</p>
                <p class="pt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae pariatur necessitatibus est soluta commodi nemo eos labore ducimus voluptates.</p>
            </div>
        </div>
    </div>
  </div>
@section('footer')
<div class="footers">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-3 footer">
          <img src="{{asset('image/logo.png')}}" alt="">
          <p class="pt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. At, maiores!</p>
        </div>
        <div class="col-12 col-lg-6 footer1">
          <div class="row footers1">
            <div class="col-6 col-md-4 footer2">
              <h4>Link</h4>
              <p class="pt-2"><a href="#">Home</a></p>
              <p><a href="#">About Us</a></p>
              <p><a href="#">Mentor</a></p>
              <p><a href="#">Contact Us</a></p>
            </div>
            <div class="col-6 col-md-4 footer2">
              <h4>Social Media</h4>
              <p class="pt-2"><a href="#">Instagram</a></p>
              <p><a href="#">Twitter</a></p>
              <p><a href="#">Behance</a></p>
              <p><a href="#">Facebook</a></p>
            </div>
            <div class="col-6 col-md-4 footer3">
              <h4>Address</h4>
              <p class="pt-2">PT. Elhan Kursus 
                Indonesia</p>
              <p>Jl. Raja Isa no. 10, 
                Batam Indonesia</p>
              <p>(021) 54556789</p>
              <p>team@elhanclub.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="bawah mt-5" style="font-size: .9rem;">
        Copyright &copy; 2021 <script type="text/javascript">
          new Date().getFullYear()>2021&&document.write("-"+new Date().getFullYear());
          </script>, Elhan Course.
      </div>
    </div>
  </div>
@endsection