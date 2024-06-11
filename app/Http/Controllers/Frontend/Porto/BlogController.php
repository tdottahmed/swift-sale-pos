<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view blog', ['only' => ['index']]);
        $this->middleware('permission:create blog', ['only' => ['create','store']]);
        $this->middleware('permission:update blog', ['only' => ['update','edit']]);
        $this->middleware('permission:delete blog', ['only' => ['destroy']]);
    }


    public function index()
    {
        $blogs = Blog::get();
        return view('frontend.porto.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.porto.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'title'=>'required'
        // ]);
        $productImagePath = null;
        if ($request->file('image')) {
            $productImagePath = uploadImage($request->file('image'), 'blogs/images');
        }

        Blog::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'image' => $productImagePath,
        ]);

        return redirect(route('blogs.index'))->with('success', 'Blog Insert Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('frontend.porto.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $productImagePath = null;
        if ($request->file('image')) {
            $productImagePath = uploadImage($request->file('image'), 'blogs/images');
        }

        $blog->update([
            'title' => $request->title,
            'image' => $productImagePath,
        ]);

        return redirect(route('blogs.index'))->with('success', 'blog Updated Successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect(route('blogs.index'))->with('success', 'Category Deleted Successfully');
    }
}
