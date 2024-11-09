@extends('backend.layout.login-layout')
@section('title', 'Login')
@section('login-content')
@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded">
        {{ session('success') }}
    </div>
@endif
<div class="my-6 pr-0 lg:pr-2 flex items-center justify-center">
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Email</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Your Email" aria-label="Email">
            </div>
            <div class="">
                <label class="block text-sm text-gray-600" for="password">Password</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="text" required="" placeholder="Your Password" aria-label="password">
            </div>
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Login</button>
            </div>
            <div>
                <a href="{{route('register')}}" class="text-blue-500 underline">Register</a>
            </div>
        </form>
    </div>
</div>
@endsection