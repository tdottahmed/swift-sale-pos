<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class UnitController extends Controller
{
    public function index(){
        $units = Unit::get();
        return view('unit.index',compact('units'));
    }

    public function create(){
        return view('unit.create');
    }

  public function store(Request $request){

        // $request->validate([
        //     'title'=>'required'
        // ]);
        


        unit::create([
            'uuid'=>Str::uuid(),
            'title'=>$request->title,
        ]);

        return redirect(route('unit.index'))->with('success','unit Insert Successfully');

    }

    public function show(unit $unit)
    {
        //
    }

     public function edit(unit $unit){

        return view('unit.edit',compact('unit'));
    }

   public function update(Request $request, unit $unit){

        // $request->validate([
        //     'title'=>'required'
        // ]);

         $unit->update([
            'title'=>$request->title,
        ]);

        return redirect(route('unit.index'))->with('success','unit Updated Successfully');

    }

    public function destroy(unit $unit)
    {
        $unit->delete();

        return redirect(route('unit.index'))->with('success','unit Deleted Successfully');

    }
}
