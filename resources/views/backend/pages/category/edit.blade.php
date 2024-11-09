@extends('backend.layout.layout')
@section('title', 'Category Create')
@section('content')
<div class="w-full mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Category
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{route('categories.update', $category->id)}}">
            @method('PUT')
            @csrf
            <p class="text-lg text-gray-800 font-medium pb-4">Create New Category</p>
            <div class="">
                <label class="block text-sm text-gray-600" for="name">Name</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Your Name" aria-label="Name" value="{{ $category->name }}">
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                    
                @enderror
            </div>
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection