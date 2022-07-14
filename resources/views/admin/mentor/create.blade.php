@extends('admin.master')

@section('title','Add Mentor Elhan Course')

@section('content')
    <div class="container my-3">
        <h2>Form Add Mentor Elhan Course</h2>
        <form action="/mentors" method="POST" enctype="multipart/form-data" class="w-50">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" id="floatingInput" name="name" autofocus>
                <label for="floatingInput">Full Name</label>
                @error('name') 
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <select class="form-select mb-3 @error('category_id') is-invalid @enderror" name="category_id">
                <option selected>Open this select category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                @error('category_id')
                   <div class="invalid-feedbak">{{$message}}</div> 
                @enderror
              </select>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email">
                <label for="floatingInput">Email Address</label>
                @error('email') 
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" style="height: 200px;" class="form-control @error('quotes') is-invalid @enderror" id="floatingInput" name="quotes"></textarea>
                <label for="floatingInput">Quotes</label>
                @error('quotes') 
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="floatingInput" name="image">
                @error('image') 
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection