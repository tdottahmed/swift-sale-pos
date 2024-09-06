<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{


    public function profitLoss(Request $request)
    {
        return view('reports.profit-loss.index');
    }

    public function profitByProduct()
    {
        $profits = DB::table('product_sales')
            ->join('products', 'product_sales.product_id', '=', 'products.id')
            ->select(
                'products.name',
                DB::raw('SUM(product_sales.sub_total - (product_sales.quantity * products.purchase_price_including_tax)) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('products.id')
            ->get();

        return view('reports.profit-loss.partials.by-product', compact('profits'));
    }

    public function profitByCategory()
    {
        $profitsByCategory = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('product_sales', 'products.id', '=', 'product_sales.product_id')
            ->select(
                'categories.title as category_name',
                DB::raw('SUM(product_sales.sub_total - (product_sales.quantity * COALESCE(products.purchase_price_including_tax, 0))) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('categories.id', 'categories.title')
            ->get();
        return view('reports.profit-loss.partials.by-category', compact('profitsByCategory'));
    }

    public function profitByBrand()
    {
        // Fetch and return data for profit by brand
    }

    public function profitByDay()
    {
        // Fetch and return data for profit by day
    }

    public function profitByCustomer()
    {
        // Fetch and return data for profit by customer
    }
}
