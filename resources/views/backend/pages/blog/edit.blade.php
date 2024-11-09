@extends('backend.layout.layout')
@section('title', 'Blog')
@if (session('error'))
    <div class="bg-red-500 text-white p-4 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
@section('content')
<div class="w-full mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Blog
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p class="text-lg text-gray-800 font-medium pb-4">Create New Blog</p>
            
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="cus_email">Category</label>
                <select name="category" id="category" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded">
                    <option value="">Select...</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="cus_email">Title</label>
                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="title" name="title" type="text" value="{{$blog->title}}" required="" placeholder="Blog Title" aria-label="title">
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_email">Brief</label>
                <textarea name="brief" id="brief" rows="3" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded">{{$blog->brief}}</textarea>
                @if ($errors->has('brief'))
                    <span class="text-danger">{{ $errors->first('brief') }}</span>
                @endif
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_email">Details</label>
                <textarea name="details" id="details" rows="5" class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded">{{$blog->details}}</textarea>
            </div>
            <div class="mt-2">
                <label class="text-sm block text-gray-600" for="photo">Image</label>
                <img src="{{ asset('assets/uploads/' . $blog->image_path) }}" id="preview" class="" alt="">
                <input type="file" name="photo" id="photo" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                @if ($errors->has('photo'))
                    <span class="text-red-800">{{ $errors->first('photo') }}</span>
                @endif
            </div>
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
    // Attach the change event handler once
    $(document).on('change', '#photo', function() {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                $('.svg_file').hide();
                $('#preview').attr('src', reader.result);
            };
            reader.onerror = function() {
                console.error("Error reading file");
            };
        }
    });

    // Trigger file input click when svg_file is clicked
    $('.svg_file').click(function() {
        $('#photo').trigger('click');
    });
});

    </script>
@endsection