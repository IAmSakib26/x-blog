@extends('backend.layout.layout')
@section('title', 'Blog')
@section('content')
@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<div class="bg-white overflow-auto rounded-lg p-3 mb-3 flex items-center justify-between">
    <h1 class="text-3xl text-black pb-6">Blog</h1>
    <a href="{{route('blogs.create')}}" class="w-32 bg-white cta-btn font-semibold py-2 mt-5 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center" type="button"><i class="fa-solid fa-square-plus"></i> New Blog</a>
</div>
<div class="bg-white overflow-auto">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">SL</th>
                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Title</th>
                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Author</th>
                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Category</th>
                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Created</th>
                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Action</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($blogs as $blog)
                <tr>
                    <td class="w-auto text-center py-3 px-4">{{$blog->id}}</td>
                    <td class="w-auto text-center py-3 px-4">{{$blog->title}}</td>
                    <td class="w-auto text-center py-3 px-4">{{$blog->user->name}}</td>
                    <td class="w-auto text-center py-3 px-4">{{$blog->category->name}}</td>
                    <td class="w-auto text-center py-3 px-4">{{date('d m, y',strtotime($blog->created_at))}}</td>
                    <td class="text-center py-3 px-4">
                        @if ($blog->status == 1)
                            <p class="text-green-500 bg-green-100 px-3 py-1 rounded-full text-center">Active</p>
                        @endif
                    </td>
                    <td class="text-center py-3 px-4 flex items-center justify-center">
                        <a class="hover:text-blue-500 mx-2" href="{{route('blogs.edit', $blog->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') <!-- This tells Laravel to treat the request as a DELETE -->
                            <button type="submit" class="hover:text-blue-500 mx-2" onclick="return confirm('Are you sure you want to delete this blog?');">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection