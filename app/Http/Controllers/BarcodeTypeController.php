<?php

namespace App\Http\Controllers;

use App\Models\BarcodeType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BarcodeTypeController extends Controller
{
    public function index(){
        $barcodeTypes = BarcodeType::get();
        return view('barcodeType.index',compact('barcodeTypes'));
    }

    public function create(){
        return view('barcodeType.create');
    }

  public function store(Request $request){

        // $request->validate([
        //     'title'=>'required'
        // ]);
        


        BarcodeType::create([
            'uuid'=>Str::uuid(),
            'title'=>$request->title,
        ]);

        return redirect(route('barcodeType.index'))->with('success','BarcodeType Insert Successfully');

    }

    public function show(BarcodeType $barcodeType)
    {
        //
    }

     public function edit(BarcodeType $barcodeType){

        return view('barcodeType.edit',compact('barcodeType'));
    }

   public function update(Request $request, BarcodeType $barcodeType){

        // $request->validate([
        //     'title'=>'required'
        // ]);

         $barcodeType->update([
            'title'=>$request->title,
        ]);

        return redirect(route('barcodeType.index'))->with('success','BarcodeType Updated Successfully');

    }

    public function destroy(BarcodeType $barcodeType)
    {
        $barcodeType->delete();

        return redirect(route('barcodeType.index'))->with('success','BarcodeType Deleted Successfully');

    }
}
