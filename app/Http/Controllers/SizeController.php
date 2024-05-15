<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view size', ['only' => ['index']]);
        $this->middleware('permission:create size', ['only' => ['create','store']]);
        $this->middleware('permission:update size', ['only' => ['update','edit']]);
        $this->middleware('permission:delete size', ['only' => ['destroy']]);
    } 

    
    public function index(){
        $sizes = Size::get();
        return view('size.index',compact('sizes'));
    }

    public function create(){
        return view('size.create');
    }

  public function store(Request $request){

        // $request->validate([
        //     'title'=>'required'
        // ]);
        


        Size::create([
            'uuid'=>Str::uuid(),
            'title'=>$request->title,
        ]);

        return redirect(route('size.index'))->with('success','size Insert Successfully');

    }

    public function show(Size $size)
    {
        //
    }

     public function edit(Size $size){

        return view('size.edit',compact('size'));
    }

   public function update(Request $request, size $size){

        // $request->validate([
        //     'title'=>'required'
        // ]);

         $size->update([
            'title'=>$request->title,
        ]);

        return redirect(route('size.index'))->with('success','size Updated Successfully');

    }

    public function destroy(Size $size)
    {
        $size->delete();

        return redirect(route('size.index'))->with('success','size Deleted Successfully');

    }
}
