@extends('nonuser.main')

@section('title','Homepage')

@section('navbar')
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-5">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
          <a class="nav-link" href="/about">About Us</a>
          <a class="nav-link" href="/mentor">Mentor</a>
          <a class="nav-link" href="/contact">Contact Us</a>
        </div>
        <div class="sign-inup ms-auto">
            <a style="text-decoration: none; color: #0E3EDA;" class="nav-log me-4" href="/login">Login</a>
            <a style="text-decoration: none; background-color: #0E3EDA;" class="nav-log btn btn-primary" href="/register">Sign up</a>
        </div>
      </div>
    </div>
  </nav>

  @section('content')


  @section('footer')

@endsection