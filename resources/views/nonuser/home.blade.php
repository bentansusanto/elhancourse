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
          <a class="nav-link" href="/teacher">Mentor</a>
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
              <a href="/user" class="btn btn-primary shadow" style="text-decoration: none; background-color: #0E3EDA;">Get Started</a>
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

    {{-- Services --}}
    <div class="service">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6">
            <img src="{{asset('image/nonuser/img-home/bg-sec3.png')}}">
          </div>
          <div class="col-12 col-lg-6">
            <h2>The World’s Largest Selection of Courses and Books.</h2>
            <div class=" row content">
                <div class=" col-12 icon d-flex">
                    <img class="mt-1" style="width: 2rem; height:2rem;" src="https://img.icons8.com/windows/100/000000/leanpub.png"><span><p class="mt-2 ms-3">10k Online Courses</p></span>
                </div>
                <div class=" col-12 icon d-flex">
                    <img class="mt-1" style="width: 2.2rem; height:2.2rem;" src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-reward-shopping-and-ecommerce-flatart-icons-outline-flatarticons.png"><span><p class="mt-2 ms-3">Expert Instruction</p></span>
                </div>
                <div class=" col-12 icon d-flex">
                    <img class="mt-1" style="width: 2rem; height:2rem;" src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/60/000000/external-free-sales-vitaliy-gorbachev-lineal-vitaly-gorbachev.png"><span><p class="mt-2 ms-3">10k Online Courses</p></span>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Comments members --}}
    <div class="comments">
      <div class="container">
        <h4>Success Stories</h4>
        <h2>What are other saying about us?</h2>
        <div class="row comment">
          <div class="col-12 col-lg-4 comment1">
            <div class="row">
              <div class="col-6">
                <img src="{{asset('image/nonuser/img-home/people2.png')}}">
              </div>
              <div class="col-6 profile">
                <h5>Anindita putri</h5>
                <p>Students</p> 
              </div>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam, tempora.</p>
          </div>
          <div class="col-12 col-lg-4 comment1">
            <div class="row">
              <div class="col-6">
                <img src="{{asset('image/nonuser/img-home/people1.png')}}">
              </div>
              <div class="col-6 profile">
                <h5>Muhammad Aldi</h5>
                <p>Students</p> 
              </div>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam, tempora.</p>
          </div>
          <div class="col-12 col-lg-4 comment1">
            <div class="row">
              <div class="col-6">
                <img src="{{asset('image/nonuser/img-home/people.png')}}">
              </div>
              <div class="col-6 profile">
                <h5>Putri Permata Sari</h5>
                <p>Students</p> 
              </div>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam, tempora.</p>
          </div>
        </div>
      </div>
    </div>

    {{-- Join Section --}}
    <div class="join">
      <div class="container">
        <img src="{{asset('image/nonuser/img-home/icon.svg')}}" alt="">
        <h4 class="pt-3">25K+ Students are in One Place</h4>
        <p class="py-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <a href="/user" class="btn btn-primary">Join Now</a>
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
                <p class="pt-2"><a href="/">Home</a></p>
                <p><a href="/about">About Us</a></p>
                <p><a href="/mentor">Mentor</a></p>
                <p><a href="/contact">Contact Us</a></p>
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