<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PayrollController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view payroll', ['only' => ['index']]);
        $this->middleware('permission:create payroll', ['only' => ['create', 'store']]);
        $this->middleware('permission:update payroll', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete payroll', ['only' => ['destroy']]);
    }

    public function index()
    {
        $employees = Employee::all();
        $payrolls = Payroll::with('employee','payment_method')->get();
        $payments = PaymentMethod::all();
        return view('payroll.index', compact('employees', 'payrolls', 'payments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {


            Payroll::create([
                'uuid'              => Str::uuid(),
                'employee_id'       => $request->employee_id,
                'payment_method_id' => $request->payment_method_id,
                'amount'            => $request->amount,
                'reference'         => $request->reference
            ]);
            return redirect()->back()->with('success', 'Payroll created Successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function show(Payroll $payroll)
    {
        //
    }

    public function edit(Payroll $payroll)
    {
        $employees = Employee::all();
        $payments = PaymentMethod::all();
        return view('payroll.edit', compact('employees', 'payroll', 'payments'));
    }

    public function update(Request $request, Payroll $payroll)
    {
        try {


            $payroll->update([
                'employee_id'       => $request->employee_id,
                'payment_method_id' => $request->payment_method_id,
                'amount'            => $request->amount,
                'reference'         => $request->reference
            ]);
            return redirect()->back()->with('success', 'Payroll Updated Successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();

        return redirect(route('payroll.index'))->with('success', 'Payroll Deleted Successfully');
    }
}
