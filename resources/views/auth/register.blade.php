@extends('auth.main')

@section('title','Login User')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Register</h2>
        <form action="/register" method="POST" class="mx-auto w-25">
            @csrf
            {{-- Code form here --}}
        </form>
    </div>
@endsection