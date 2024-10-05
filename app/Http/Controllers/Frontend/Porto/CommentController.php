<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Comment;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Frontend\Blog;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view comment', ['only' => ['index']]);
    //     $this->middleware('permission:create comment', ['only' => ['create','store']]);
    //     $this->middleware('permission:update comment', ['only' => ['update','edit']]);
    //     $this->middleware('permission:delete comment', ['only' => ['destroy']]);
    // }


    public function index()
    {
        // $comments = comment::get();
        // return view('frontend.porto.blog.comment.index', compact('comments'));
        $comments = Comment::all();
        $blogs = Blog::all();
        return view('frontend.porto.blog.comment.index', compact('comments','blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = Blog::all();
        return view('frontend.porto.blog.comment.index',compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.blogs
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'blog_id' => 'required',
            'comment' => 'required',
            'description' => 'required',
        ]);

        Comment::create($validatedData);

        return redirect()->back()->with('success', 'Comment created successfully.');

        // return redirect(route('comments.index'))->with('success', 'comment Insert Successfully');

    }


    /** 
     * Display the specified resource.
     */
    // public function show(comment $comment)
    // {
    //     // $comments = DB::table('comments')->where('comment_id', $comment->id)->get();
    //     // $comments = DB::table('comments')->get();
    //     return view('frontend.porto.comment.show', compact('comment'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(comment $comment)
    // {
    //     return view('frontend.porto.comment.edit', compact('comment'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, comment $comment)
    // {
    //     $validatedData = $request->validate([
    //         'comment' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $comment->update($validatedData);

    //     return redirect()->route('comments.index')
    //         ->with('success', 'Comment updated successfully.');

    //     // return redirect(route('comments.index'))->with('success', 'comment Updated Successfully');
    // }
    
    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(comment $comment)
    // {
    //     $comment->delete();

    //     return redirect()->route('comments.index')
    //         ->with('success', 'Comment deleted successfully.');

    //     // return redirect(route('comments.index'))->with('success', 'Category Deleted Successfully');
    // }

    public function edit(Comment $comment)
{
    return view('comments.edit', compact('comment'));
}

public function update(Request $request, Comment $comment)
{
    $validatedData = $request->validate([
        'blog_id' => 'required',
        'comment' => 'required',
        'description' => 'required',
    ]);
    // dd($validatedData);

    $comment->update($validatedData);

    return view('frontend.porto.blog.comment.moreDeteils', compact('blog','comments'))->with('success', 'Comment updated successfully.');
}

public function destroy(Comment $comment)
{
    $comment->delete();

    return redirect()->route('comments.index')
        ->with('success', 'Comment deleted successfully.');
}


    public function show(Comment $comment)
    {
        $blogs = Blog::all();
        return view('frontend.porto.blog.comment.moreDeteils', compact('blog','comments'));
    }



    // public function commentStore(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'blog_id' => null,
    //         'comment' => 'required',
    //         'description' => 'required',
    //     ]);

    //     Comment::create($validatedData);

    //     return redirect()->route('comments.index')
    //         ->with('success', 'Comment created successfully.');

    //     // return redirect(route('comments.index'))->with('success', 'comment Insert Successfully');

    // }


    
}
