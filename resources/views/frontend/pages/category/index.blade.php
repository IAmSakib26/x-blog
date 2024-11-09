@extends('frontend.layout.layout')
@section('title', 'Category - {{ $category->name }}')
@section('content')
    @foreach ($blogs as $blog)
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
        <img class="w-full" src="{{asset('assets/uploads/'.$blog->image_path)}}" alt="Card image cap">
        <div class="px-6 py-4">
          <h2 class="text-xl font-semibold text-gray-800">{{$blog->title}}</h2>
          <p class="text-gray-600 text-base mt-2">
            {{$blog->brief}}
          </p>
        </div>
        <div class="px-6 py-4 flex justify-between items-center">
          <span class="text-gray-500 text-sm">{{$blog->category->name}}</span>
          <a href="{{route('blog.show', $blog->id)}}" class="text-blue-500 hover:text-blue-700 text-sm">Read More</a>
        </div>
      </div>      
    @endforeach
@endsection