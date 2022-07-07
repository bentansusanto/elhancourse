@extends('admin.master')

@section('title','Form Create Course')

@section('content')
    <div class="container">
        <h2>Form Create Course</h2>
        <form action="/courses" method="POST" enctype="multipart/form-data" class="mt-4" style="width: 25rem;">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-capitalize @error('title') is-invalid @enderror" id="floatingInput" name="title" value="{{old('title')}}" autofocus>
                <label for="floatingInput">Title</label>
                @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                <option selected>Open this select category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                @error('category_id')
                   <div class="invalid-feedbak">{{$message}}</div> 
                @enderror
              </select>
              <select class="form-select my-3 @error('mentor_id') is-invalid @enderror" name="mentor_id">
                <option selected>Open this select mentor</option>
                @foreach ($mentors as $mentor)
                    <option value="{{$mentor->id}}">{{$mentor->name}}</option>
                @endforeach
                @error('mentor_id')
                   <div class="invalid-feedbak">{{$message}}</div> 
                @enderror
              </select>
              <div class="form-floating mb-3">
                <textarea type="text" class="form-control text-capitalize @error('desc') is-invalid @enderror" id="floatingInput" name="desc" value="{{old('desc')}}"></textarea>
                <label for="floatingInput">Description</label>
                @error('desc')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <input type="file" class="form-control text-capitalize @error('image') is-invalid @enderror" id="floatingInput" name="image">
                @error('image')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <button class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection