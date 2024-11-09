<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::with(['category', 'user'])->orderBy('created_at', 'desc')->get();
        return view('backend.pages.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('backend.pages.blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'brief' => 'required',
            // 'photo' => 'required|image',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
            // dd($validate->errors());
        }
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $request->category;
        $blog->brief = $request->brief;
        $blog->details = $request->details;
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('assets/uploads'),$photo_name);
            $blog->image_path = $photo_name;
        }
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $blog = Blog::find($id);
        $categories = Category::all();
        return view('backend.pages.blog.edit',compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'brief' => 'required',
            // 'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        // dd($request->all());
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $request->category;
        $blog->brief = $request->brief;
        $blog->details = $request->details;
        // dd($request->hasFile('photo'));
        // Handle the file upload
        if($request->hasFile('photo')){
            // dd('here');
            if($blog->image_path){
                $old_image = public_path('assets/uploads/'.$blog->image_path);
                if(file_exists($old_image)){
                    
                    unlink($old_image);
                }
            }
            $image = $request->file('photo');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads'),$image_name);
            $blog->image_path = $image_name;
        }
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
    
        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found.');
        }
    
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }
}
