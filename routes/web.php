<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\AuthMiddleware;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Dashboard 
Route::get('/dashboard', function () {
    $blogs = Blog::with(['category', 'user'])->orderBy('created_at', 'desc')->get();
    $categories = Category::withCount('blogs')->get();
    $authors = User::withCount('blogs')->get();
    return view('backend.pages.dashboard',compact('blogs','categories','authors'));
})->name('backend.dashboard')->middleware('auth');

// Login and Resitration 
Route::get('/login', function () {
    return view('backend.login.login');
})->name('login');

Route::get('/register', function () {
    return view('backend.login.register');
})->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.post');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

// setting 
Route::get('/settings', [SettingController::class, 'index'])->name('settings');
Route::post('/settings', [SettingController::class, 'update'])->name('settings.post');

// Category Routes
Route::resource('categories', CategoryController::class)->names([
    'index' => 'categories.index',
    'create' => 'categories.create',
    'store' => 'categories.store',
    'show' => 'categories.show',
    'edit' => 'categories.edit',
    'update' => 'categories.update',
    'destroy' => 'categories.destroy',
]);

Route::resource('blogs', BlogController::class)->names([
    'index' => 'blogs.index',
    'create' => 'blogs.create',
    'store' => 'blogs.store',
    'show' => 'blogs.show',
    'edit' => 'blogs.edit',
    'update' => 'blogs.update',
    'destroy' => 'blogs.destroy',
]);
Route::get('/',function(){
    $categories = Category::all();
    $authors = User::all();
    $blogs = Blog::with(['category', 'user'])->orderBy('created_at', 'desc')->simplePaginate(3);
    return view('frontend.pages.blog.index',compact('blogs','categories','authors'));
})->name('home');
Route::get('/blog/{id}',function($id){
    $blog = Blog::with(['category', 'user'])->where('id', $id)->first();
    $categories = Category::all();
    $authors = User::all();
    return view('frontend.pages.blog.show',compact('blog','categories','authors'));
})->name('blog.show');
Route::get('/category/{id}',function($id){
    $blogs = Blog::with(['category', 'user'])->where('category_id', $id)->orderBy('created_at', 'desc')->simplePaginate(3);
    $categories = Category::all();
    $authors = User::all();
    // dd($blogs);
    return view('frontend.pages.category.index',compact('blogs','categories','authors'));
})->name('categories');