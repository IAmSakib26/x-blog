@extends('backend.layout.layout')
@section('title', 'Category')
@section('content')
@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<div class="bg-white overflow-auto rounded-lg p-3 mb-3 flex items-center justify-between">
    <h1 class="text-3xl text-black pb-6">Category</h1>
    <a href="{{route('categories.create')}}" class="w-32 bg-white cta-btn font-semibold py-2 mt-5 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center" type="button"><i class="fa-solid fa-square-plus"></i> New Category</a>
</div>
<div class="bg-white overflow-auto">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">SL</th>
                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Name</th>
                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Created</th>
                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Action</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($categories as $category)
                <tr>
                    <td class="w-auto text-center py-3 px-4">{{$category->id}}</td>
                    <td class="w-auto text-center py-3 px-4">{{$category->name}}</td>
                    <td class="w-auto text-center py-3 px-4">{{date('d m, y',strtotime($category->created_at))}}</td>
                    <td class="text-center py-3 px-4">@if ($category->status == 1)
                        <p class="text-green-500 bg-green-100 px-3 py-1 rounded-full text-center">Active</p>
                    @endif</td>
                    <td class="text-center py-3 px-4 flex items-center justify-center">
                        <a class="hover:text-blue-500" href="{{route('categories.edit', $category->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a class="hover:text-blue-500" href="{{route('categories.destroy', $category->id)}}"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            @endforeach
            {{-- <tr class="bg-gray-200">
                <td class="w-1/3 text-left py-3 px-4">Emma</td>
                <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr>
                <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                <td class="w-1/3 text-left py-3 px-4">Williams</td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr class="bg-gray-200">
                <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                <td class="w-1/3 text-left py-3 px-4">Brown</td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr>
                <td class="w-1/3 text-left py-3 px-4">Lian</td>
                <td class="w-1/3 text-left py-3 px-4">Smith</td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr class="bg-gray-200">
                <td class="w-1/3 text-left py-3 px-4">Emma</td>
                <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr>
                <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                <td class="w-1/3 text-left py-3 px-4">Williams</td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr>
            <tr class="bg-gray-200">
                <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                <td class="w-1/3 text-left py-3 px-4">Brown</td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
            </tr> --}}
        </tbody>
    </table>
</div>
@endsection