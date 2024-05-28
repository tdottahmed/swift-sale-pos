<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view holiday', ['only' => ['index']]);
        $this->middleware('permission:create holiday', ['only' => ['create', 'store']]);
        $this->middleware('permission:update holiday', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete holiday', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::get();
        return view('holiday.index', compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('holiday.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
            'note' => 'required'
        ]);

        Holiday::create([
            'uuid' => Str::uuid(),
            'from' => $request->date_from,
            'to' => $request->date_to,
            'note' => $request->note,
        ]);

        return redirect(route('holiday.index'))->with('success', 'holiday Insert Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Holiday $holiday)
    {
        return view('holiday.edit', compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Holiday $holiday)
    {
        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
            'note' => 'required'
        ]);

        $holiday->update([
            'from' => $request->date_from,
            'to' => $request->date_to,
            'note' => $request->note,
        ]);

        return redirect(route('holiday.index'))->with('success', 'holiday Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Holiday $holiday)
    {
        $holiday->delete();

        return redirect(route('holiday.index'))->with('success', 'holiday Deleted Successfully');
    }
}
