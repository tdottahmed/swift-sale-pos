<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:view category', ['only' => ['index']]);
        $this->middleware('permission:create category', ['only' => ['create','store']]);
        $this->middleware('permission:update category', ['only' => ['update','edit']]);
        $this->middleware('permission:delete category', ['only' => ['destroy']]);
    }


    public function index(){
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        // $request->validate([
        //     'title'=>'required'
        // ]);
        $productImagePath = null;
        if ($request->file('image')) {
            $productImagePath = uploadImage($request->file('image'), 'categories/images');
        }

        category::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'image' => $productImagePath,
        ]);

        return redirect(route('category.index'))->with('success', 'Category Insert Successfully');
    }

    public function show(category $category)
    {
        //
    }

    public function edit(category $category)
    {

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, category $category)
    {

        $productImagePath = null;
        if ($request->file('image')) {
            $productImagePath = uploadImage($request->file('image'), 'categories/images');
        }

        $category->update([
            'title' => $request->title,
            'image' => $productImagePath,
        ]);

        return redirect(route('category.index'))->with('success', 'Category Updated Successfully');
    }

    public function destroy(category $category)
    {
        $category->delete();

        return redirect(route('category.index'))->with('success', 'Category Deleted Successfully');
    }
}
