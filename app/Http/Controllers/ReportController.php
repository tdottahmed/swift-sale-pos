<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function profitLoss(Request $request)
    {
        $profitByProductData = DB::table('product_sales')
            ->join('products', 'product_sales.product_id', '=', 'products.id')
            ->leftJoin(
                DB::raw('(SELECT product_id, AVG(purchase_inc) as avg_purchase_inc FROM variations GROUP BY product_id) as variation_data'),
                'product_sales.product_id',
                '=',
                'variation_data.product_id'
            )
            ->select(
                'products.name',
                DB::raw('SUM(CASE 
                WHEN products.product_type = "variable" THEN product_sales.sub_total - (product_sales.quantity * COALESCE(variation_data.avg_purchase_inc, 0))
                ELSE product_sales.sub_total - (product_sales.quantity * products.purchase_price_including_tax)
            END) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('products.id', 'products.name')
            ->get();
        $data = [];
        $purchase = DB::table('purchases')->sum('grand_total');
        $sales = DB::table('sales');
        $data['purchase'] = $purchase;
        $data['sales_amount'] = $sales->sum('total_price');
        $data['return_sale'] = $sales->where('is_return', 1)->sum('total_price');
        $data['suspense_amount'] = $sales->where('is_suspended', 1)->sum('total_price');
        $data['expense'] = DB::table('expenses')->sum('total_amount');
        $data['payroll'] = DB::table('payrolls')->sum('amount');
        $data['total_profit'] = $data['sales_amount'] - ($purchase + $data['return_sale'] + $data['suspense_amount'] + $data['payroll'] + $data['expense']);
        return view('reports.profit-loss.index', compact('data', 'profitByProductData'));
    }

    public function profitByProduct()
    {
        $profits = DB::table('product_sales')
            ->join('products', 'product_sales.product_id', '=', 'products.id')
            ->leftJoin(
                DB::raw('(SELECT product_id, AVG(purchase_inc) as avg_purchase_inc FROM variations GROUP BY product_id) as variation_data'),
                'product_sales.product_id',
                '=',
                'variation_data.product_id'
            )
            ->select(
                'products.name',
                DB::raw('SUM(CASE 
                    WHEN products.product_type = "variable" THEN product_sales.sub_total - (product_sales.quantity * COALESCE(variation_data.avg_purchase_inc, 0))
                    ELSE product_sales.sub_total - (product_sales.quantity * products.purchase_price_including_tax)
                END) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('products.id', 'products.name')
            ->get();
        return view('reports.profit-loss.partials.by-product', compact('profits'));
    }




    public function profitByCategory()
    {
        $profitsByCategory = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->leftJoin('product_sales', 'products.id', '=', 'product_sales.product_id')
            ->leftJoin(
                DB::raw('(SELECT product_id, AVG(purchase_inc) as avg_purchase_inc FROM variations GROUP BY product_id) as variation_data'),
                'product_sales.product_id',
                '=',
                'variation_data.product_id'
            )
            ->select(
                'categories.title as category_name',
                DB::raw('SUM(CASE 
                WHEN products.product_type = "variable" THEN product_sales.sub_total - (product_sales.quantity * COALESCE(variation_data.avg_purchase_inc, 0))
                ELSE product_sales.sub_total - (product_sales.quantity * products.purchase_price_including_tax)
            END) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('categories.id', 'categories.title')
            ->get();

        return view('reports.profit-loss.partials.by-category', compact('profitsByCategory'));
    }


    public function profitByBrand()
    {
        $profitsByBrands = DB::table('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('product_sales', 'products.id', '=', 'product_sales.product_id')
            ->leftJoin(
                DB::raw('(SELECT product_id, AVG(purchase_inc) as avg_purchase_inc FROM variations GROUP BY product_id) as variation_data'),
                'product_sales.product_id',
                '=',
                'variation_data.product_id'
            )
            ->select(
                'brands.title as brand_title',
                DB::raw('SUM(CASE 
                    WHEN products.product_type = "variable" THEN product_sales.sub_total - (product_sales.quantity * COALESCE(variation_data.avg_purchase_inc, 0))
                    ELSE product_sales.sub_total - (product_sales.quantity * products.purchase_price_including_tax)
                END) as total_profit'),
                DB::raw('SUM(product_sales.quantity) as total_quantity_sold'),
                DB::raw('SUM(product_sales.sub_total) as total_sales_value')
            )
            ->groupBy('brands.id', 'brands.title')
            ->get();

        return view('reports.profit-loss.partials.by-brands', compact('profitsByBrands'));
    }


    public function profitByDay()
    {
        $salesData = DB::table('sales')
            ->join('product_sales', 'sales.id', '=', 'product_sales.sale_id')  // Join sales with product_sales
            ->join('products', 'products.id', '=', 'product_sales.product_id')  // Join product_sales with products
            ->leftJoin('variations', function ($join) {
                $join->on('product_sales.product_id', '=', 'variations.product_id')
                    ->whereColumn('product_sales.product_id', 'variations.product_id'); // Adjust this join if necessary
            })
            ->select(
                DB::raw('DAYNAME(sales.created_at) as day_name'),
                DB::raw('SUM(product_sales.sub_total) as total_sales'),  // Total sales amount per product
                DB::raw('SUM(product_sales.quantity) as total_quantity'),  // Total quantity sold
                DB::raw('SUM(CASE 
            WHEN products.product_type = "variable" THEN (product_sales.sub_total - (product_sales.quantity * COALESCE(variations.purchase_inc, 0)))
            ELSE (product_sales.sub_total - (product_sales.quantity * COALESCE(products.purchase_price_including_tax, 0)))
        END) as total_profit')  // Corrected profit calculation
            )
            // Uncomment the line below if you want to restrict the results to the last 7 days
            // ->whereBetween('sales.created_at', [Carbon::now()->subDays(6)->startOfDay(), Carbon::now()->endOfDay()])  // Last 7 days
            ->groupBy(DB::raw('DAYNAME(sales.created_at)'), DB::raw('WEEKDAY(sales.created_at)'))  // Group by day name and weekday
            ->orderBy(DB::raw('WEEKDAY(sales.created_at)'))  // Order by weekday (to ensure correct sequence)
            ->get();

        return view('reports.profit-loss.partials.by-day', compact('salesData'));
    }

    public function profitByCustomer()
    {
        // Fetch and return data for profit by customer
    }

    /**
     * Product Purchase and Sale report
     *
     * @param Request $request
     * @return void
     */
    public function purchaseSale(Request $request)
    {
        $purchaseData = [];
        $saleData = [];
        $purchases = DB::table('purchases')->get();
        $sales = DB::table('sales')->get();
        
        dd($purchaseData, $saleData);
        return view('reports.purchase-sale.index');
    }
}
