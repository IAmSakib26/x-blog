@extends('backend.layout.layout')
@section('title', 'Category Create')
@section('content')
<div class="w-full mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Category
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{route('categories.store')}}">
            @csrf
            <p class="text-lg text-gray-800 font-medium pb-4">Create New Category</p>
            <div class="">
                <label class="block text-sm text-gray-600" for="name">Name</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Your Name" aria-label="Name">
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                    
                @enderror
            </div>
            {{-- 
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Your Email" aria-label="Email">
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Street" aria-label="Email">
            </div>
            <div class="mt-2">
                <label class="hidden text-sm block text-gray-600" for="cus_email">City</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="City" aria-label="Email">
            </div>
            <div class="inline-block mt-2 w-1/2 pr-1">
                <label class="hidden block text-sm text-gray-600" for="cus_email">Country</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Country" aria-label="Email">
            </div>
            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                <label class="hidden block text-sm text-gray-600" for="cus_email">Zip</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="cus_email" type="text" required="" placeholder="Zip" aria-label="Email">
            </div>
            <p class="text-lg text-gray-800 font-medium py-4">Payment information</p>
            <div class="">
                <label class="block text-sm text-gray-600" for="cus_name">Card</label>
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="Card Number MM/YY CVC" aria-label="Name">
            </div> --}}
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection