@extends('backend.layout.layout')
@section('title', 'Setting')
@section('content')
@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    
@endif
<h2 class="text-3xl text-black pb-6">Setting</h2>
<div class="bg-white rounded-lg p-3 mb-3">
    <form action="{{route('settings.post')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-span-full">
            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
            <div class="mt-2 flex items-center gap-x-3">
              <img class="h-12 w-12 rounded-full preview" src="{{ $user->profile_image ? asset('assets/uploads/'.$user->profile_image) : asset('assets/user-icon.png') }}" alt="">
              <input type="file" name="photo" id="photo" class="hidden">
              <button id="photo-btn" type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
            </div>
        </div>
        <div class="col-span-full mt-5">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Your Name</span>
                <input type="text" value="{{$user->name}}" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
              </div>
            </div>
        </div>
        <div class="col-span-full mt-5">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Your Email</span>
                <input type="email" value="{{$user->email}}" name="email" id="email" autocomplete="email" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" readonly>
              </div>
            </div>
        </div>
        <div class="col-span-full mt-5">
            <label for="new_password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">New Password</span>
                <input type="password" name="new_password" id="new_password" autocomplete="new_password" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
              </div>
            </div>
        </div>
        <div class="col-span-full mt-5">
            <label for="confirm_password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">New Password</span>
                <input type="password" name="confirm_password" id="confirm_password" autocomplete="confirm_password" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
              </div>
            </div>
        </div>
        <button type="submit" class="px-4 py-1 mt-4 text-white font-light tracking-wider bg-green-900 rounded">Save</button>
    </form>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#photo-btn').click(function() {
                $('#photo').trigger('click');

                $(document).on('change', '#photo', function() {
                    let file = this.files[0];
                    let reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        $('.preview').attr('src', reader.result);
                    }
                })
            })
        })
    </script>
@endsection