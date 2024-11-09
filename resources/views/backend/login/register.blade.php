@extends('backend.layout.login-layout')
@section('title', 'Register')
@section('login-content')
<div class="my-6 pr-0 lg:pr-2 flex items-center justify-center">
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Name</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Email</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Your Email" aria-label="Email">
            </div>
            <div class="">
                <label class="block text-sm text-gray-600" for="password">Password</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="Your Password" aria-label="password">
            </div>
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection