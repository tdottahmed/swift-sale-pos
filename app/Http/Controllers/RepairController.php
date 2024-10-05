<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Repair;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view repair', ['only' => ['index']]);
        $this->middleware('permission:create repair', ['only' => ['create','store']]);
        $this->middleware('permission:update repair', ['only' => ['update','edit']]);
        $this->middleware('permission:delete repair', ['only' => ['destroy']]);
    }

    public function index()
    {
        $repairs = Repair::all();
        $brands = Brand::all();
        return view('repair.index', compact('repairs', 'brands'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            Repair::create([
                'uuid'                     => Str::uuid(),
                "delivery_date"            => $request->delivery_date,
                "repair_completed_on"      => $request->repair_completed_on,
                "status"                   => $request->status,
                "brand_id"                 => $request->brand_id,
                "device"                   => $request->device,
                "device_model"             => $request->device_model,
                "serial_number"            => $request->serial_number,
                "prb_reported_by_customer" => $request->prb_reported_by_customer,
            ]);
            return redirect()->back()->with('success', 'Repair created Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function show(Repair $repair)
    {
        //
    }

    public function edit(Repair $repair)
    {
        $brands = Brand::all();

        return view('repair.edit', compact('repair', 'brands'));
    }

    public function update(Request $request, Repair $repair)
    {
        try {
            $repair->update([
                "delivery_date"            => $request->delivery_date,
                "repair_completed_on"      => $request->repair_completed_on,
                "status"                   => $request->status,
                "brand_id"                 => $request->brand_id,
                "device"                   => $request->device,
                "device_model"             => $request->device_model,
                "serial_number"            => $request->serial_number,
                "prb_reported_by_customer" => $request->prb_reported_by_customer,
            ]);
            return redirect()->back()->with('success', 'Repair Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy(Repair $repair)
    {
        $repair->delete();

        return redirect(route('repair.index'))->with('success', 'Repair Deleted Successfully');
    }
}
