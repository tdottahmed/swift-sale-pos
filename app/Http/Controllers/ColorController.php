<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view color', ['only' => ['index']]);
        $this->middleware('permission:create color', ['only' => ['create','store']]);
        $this->middleware('permission:update color', ['only' => ['update','edit']]);
        $this->middleware('permission:delete color', ['only' => ['destroy']]);
    } 
    
    public function index(){
        $colors = Color::get();
        return view('color.index',compact('colors'));
    }

    public function create(){
        return view('color.create');
    }

  public function store(Request $request){

        // $request->validate([
        //     'title'=>'required'
        // ]);
        


        Color::create([
            'uuid'=>Str::uuid(),
            'title'=>$request->title,
        ]);

        return redirect(route('color.index'))->with('success','Color Insert Successfully');

    }

    public function show(Color $color)
    {
        //
    }

     public function edit(Color $color){

        return view('color.edit',compact('color'));
    }

   public function update(Request $request, Color $color){

        // $request->validate([
        //     'title'=>'required'
        // ]);

         $color->update([
            'title'=>$request->title,
        ]);

        return redirect(route('color.index'))->with('success','Color Updated Successfully');

    }

    public function destroy(Color $color)
    {
        $color->delete();

        return redirect(route('color.index'))->with('success','Color Deleted Successfully');

    }
}
