@extends('admin.master')

@section('title','Mentor Elhan Course')

@section('content')
    <div class="container mt-3">
        @if (session()->has('Success'))
            <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
                {{session('Success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="/mentors/create" class="btn btn-primary my-3 shadow">Create Mentor</a>
        <h2>Mentor Elhan Course</h2>
        <div class="row">
            @foreach ($mentors as $mentor)
            <div class="col-4 mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('mentor/'.$mentor->image)}}" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">{{$mentor->name}}</h5>
                      <p style="color: #a4a4a4;" class="card-text">{{$mentor->category->name}}</p>
                      <p class="card-text">{{$mentor->email}}</p>
                      <p class="card-text">{{$mentor->quotes}}</p>
                      <form action="/mentors/{{$mentor->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>  
                      </form>
                      <a href="/mentors/{{$mentor->id}}/edit" class="btn btn-dark">Update</a>
                    </div>
                  </div>
            </div> 
            @endforeach
        </div>
    </div>
@endsection










