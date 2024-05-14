<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image_name = null;
        if ( $request->file('image')) {
            $image_name =  uploadImage($request->file('image'), 'sliders/images');
        }
        Slider::create([
            'uuid'=>Str::uuid(),
            'sub_title'=>$request->sub_title,
            'title'=>$request->heading,
            'heading'=>$request->title,
            'starting_text'=>$request->starting_text,
            'highlighted_text'=>$request->highlighted_text,
            'button_text'=>$request->button_text,
            'image'=>$image_name,
        ]);

        return redirect(route('slider.index'))->with('success','Slider Info Insert Successfully');
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
    public function edit(Slider $slider)
    {
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $image_name = null;
        if ( $request->file('image')) {
            $image_name =  uploadImage($request->file('image'), 'sliders/images');
        }
         $slider->update([
            'uuid'=>Str::uuid(),
            'sub_title'=>$request->sub_title,
            'title'=>$request->heading,
            'heading'=>$request->title,
            'starting_text'=>$request->starting_text,
            'highlighted_text'=>$request->highlighted_text,
            'button_text'=>$request->button_text,
            'image'=>$image_name,
        ]);

        return redirect(route('slider.index'))->with('success','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect(route('slider.index'))->with('success','Slider Deleted Successfully');
    }
}
