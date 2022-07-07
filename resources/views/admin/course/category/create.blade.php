@extends('admin.master')

@section('title','Form Create Categories Course')

@section('content')
    <div class="container mt-4">
        <h2>Form Create Categories Course</h2>
        <form action="/categories" method="POST" class="mt-3 w-25">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" id="floatingInput" name="name" value="{{old('name')}}">
                <label for="floatingInput">Name Category</label>
              </div>
              <button class="btn btn-primary w-100 mt-2">Submit</button>
        </form>
    </div>
@endsection