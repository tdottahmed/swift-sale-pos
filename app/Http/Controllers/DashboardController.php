<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $widgetData = [];
        $chartData = [];
        $totalPurchaseQuery = Purchase::query();
        $totalSalesQuery = Sale::query();
        $totalExpensesQuery = Expense::query();

        if ($request->date_range) {
            $range = $this->processDate($request->date_range);
            $totalPurchase = $totalPurchaseQuery->whereBetween('created_at', [$range[0], $range[1]])->sum('grand_total');
            $totalSales = $totalSalesQuery->whereBetween('created_at', [$range[0], $range[1]])->sum('total_price');
            $totalExpense = $totalExpensesQuery->whereBetween('created_at', [$range[0], $range[1]])->sum('total_amount');
        } else {
            $totalPurchase = $totalPurchaseQuery->sum('grand_total');
            $totalSales = $totalSalesQuery->sum('total_price');
            $totalExpense = $totalExpensesQuery->sum('total_amount');
        }
        $totalProfit = $totalSales - $totalPurchase;
        $widgetData = [
            'totalProducts' => Product::count(),
            'totalPurchase' => $totalPurchase,
            'totalSales' => $totalSales,
            'totalProfit' => $totalProfit,
            'totalExpense' => $totalExpense,
        ];
        $monthlyData = $this->prepareMonthlyData();

        $chartData = [
            'monthlyPurchases' => $monthlyData['monthlyPurchases'],
            'monthlySales' => $monthlyData['monthlySales'],
            'monthNames' => $monthlyData['monthNames'],
        ];

        return view('dashboard.index', compact('widgetData', 'chartData'));
    }


    public function processDate($dateRange = null)
    {
        $dates = [];
        if ($dateRange) {
            [$startDate, $endDate] = explode(' - ', $dateRange);
            $dates['start'] = \DateTime::createFromFormat('m/d/Y', $startDate)->format('Y-m-d');
            $dates['end'] = \DateTime::createFromFormat('m/d/Y', $endDate)->format('Y-m-d');
        }
        return [$dates['start'], $dates['end']];
    }

    private function prepareMonthlyData()
    {
        $monthlyPurchases = Purchase::select(DB::raw('MONTH(created_at) as month, SUM(grand_total) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $monthlySales = Sale::select(DB::raw('MONTH(created_at) as month, SUM(total_price) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $monthlyPurchasesData = array_fill(1, 12, 0);
        $monthlySalesData = array_fill(1, 12, 0);

        foreach ($monthlyPurchases as $month => $total) {
            $monthlyPurchasesData[$month] = $total;
        }

        foreach ($monthlySales as $month => $total) {
            $monthlySalesData[$month] = $total;
        }

        return [
            'monthlyPurchases' => array_values($monthlyPurchasesData), 
            'monthlySales' => array_values($monthlySalesData), 
            'monthNames' => $monthNames
        ];
    }
}
