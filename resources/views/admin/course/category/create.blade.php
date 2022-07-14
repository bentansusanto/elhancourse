@extends('admin.master')

@section('title','Form Create Category')

@section('content')
    <div class="container">
        <h2>Form Create Category</h2>
        <form action="/categories" method="POST" class="mt-3 w-25">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" id="floatingInput" name="name" value="{{old('name')}}" autofocus>
                <label for="floatingInput">Name</label>
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <button class="btn btn-primary mt-3 w-100">Submit</button>
        </form>
    </div>
@endsection