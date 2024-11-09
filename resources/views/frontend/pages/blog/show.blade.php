@extends('frontend.layout.layout')
@section('title', $blog->title)
@section('content')
<article class="flex flex-col shadow my-4">
    <!-- Article Image -->
    <img class="hover:opacity-75" src="{{asset('assets/uploads/'.$blog->image_path)}}">
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$blog->category->name}}</a>
        <p href="#" class="text-sm pb-8">
            By <a href="#" class="font-semibold hover:text-gray-800">{{$blog->user->name}}</a>, Published on {{$blog->created_at}}
        </p>
        <h1 class="text-2xl font-bold pb-3">{{$blog->title}}</h1>
        <p class="pb-3">{{$blog->brief}}</p>
        <div class="pb-3">{{$blog->details}}</div>
    </div>
</article>
@endsection