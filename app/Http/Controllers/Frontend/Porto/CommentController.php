<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Comment;
use App\Models\Frontend\Blog;
use Illuminate\Http\Request;
use DataTables;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $data = Comment::latest()->get();
        //     $dataTow = Blog::latest()->get();
        //     return Datatables::of($data,$dataTow)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $editBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editComment">Edit</a>';
        //             $deleteBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteComment">Delete</a>';
        //             return $editBtn . ' ' . $deleteBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('frontend.porto.blog.comment.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:255',
            'description' => 'required',
        ]);

        Comment::updateOrCreate(
            ['id' => $request->comment_id],
            ['comment' => $request->comment, 'description' => $request->description]
        );

        return response()->json(['success' => 'Comment saved successfully.']);
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return response()->json(['success' => 'Comment deleted successfully.']);
    }
}
