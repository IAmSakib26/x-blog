@extends('frontend.layout.layout')
@section('title', 'X-Blog')
@section('content')
    @foreach ($blogs as $blog)
    <article class="flex flex-col shadow my-4">
        <!-- Article Image -->
        <a href="{{route('blog.show', $blog->id)}}" class="hover:opacity-75">
            <img src="{{asset('assets/uploads/'.$blog->image_path)}}">
        </a>
        <div class="bg-white flex flex-col justify-start p-6">
            <a href="{{route('blog.show', $blog->id)}}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$blog->category->name}}</a>
            <a href="{{route('blog.show', $blog->id)}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$blog->title}}</a>
            <p href="{{route('blog.show', $blog->id)}}" class="text-sm pb-3">
                By <a href="{{route('blog.show', $blog->id)}}" class="font-semibold hover:text-gray-800">{{$blog->user->name}}</a>, Published on {{$blog->created_at}}
            </p>
            <a href="{{route('blog.show', $blog->id)}}" class="pb-6">{{$blog->brief}}</a>
            <a href="{{route('blog.show', $blog->id)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
        </div>
    </article>
    @endforeach
    <!-- Pagination -->
    <div class="flex items-center py-8">
        {{$blogs->links()}}
    </div>
@endsection