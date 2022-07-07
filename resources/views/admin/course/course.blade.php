@extends('admin.master')

@section('title','Course')

@section('content')
    <div class="container">
        <h2>Category with course</h2>
        @if (session()->has('Success'))
        <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
            {{session('Success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <a href="/categories/create" class="btn btn-primary shadow">Add Category</a>
        <a href="/courses/create" class="btn btn-primary shadow">Add Course</a>
        @foreach ($categories as $category)
        <ul class="list-group w-25 mt-3">
            <li class="list-group-item disabled" aria-disabled="true">{{$category->name}}</li>
            @foreach ($category->courses as $category )
              <li class="list-group-item">{{$course->title}}</li>        
            @endforeach
          </ul>     
        @endforeach
    </div>

@endsection
