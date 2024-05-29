<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view leaveType', ['only' => ['index']]);
        $this->middleware('permission:create leaveType', ['only' => ['create', 'store']]);
        $this->middleware('permission:update leaveType', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete leaveType', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaveTypes = LeaveType::get();
        return view('leaveType.index', compact('leaveTypes'));
    }

    public function create()
    {
        return view('leaveType.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);

        LeaveType::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
        ]);

        return redirect(route('leaveType.index'))->with('success', 'leaveType Insert Successfully');
    }

    public function show(LeaveType $leaveType)
    {
        //
    }

    public function edit(LeaveType $leaveType)
    {

        return view('leaveType.edit', compact('leaveType'));
    }

    public function update(Request $request, leaveType $leaveType)
    {

        $request->validate([
            'title' => 'required'
        ]);

        $leaveType->update([
            'title' => $request->title,
        ]);

        return redirect(route('leaveType.index'))->with('success', 'leaveType Updated Successfully');
    }

    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();

        return redirect(route('leaveType.index'))->with('success', 'leaveType Deleted Successfully');
    }
}
