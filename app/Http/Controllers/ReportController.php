<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    
    public function profitLoss(Request $request)
    {
        return view('reports.profit-loss');
    }
}
