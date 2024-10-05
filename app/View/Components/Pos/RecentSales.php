<?php

namespace App\View\Components\Pos;

use App\Models\Sale;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentSales extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $sales = Sale::with('saleProduct')->latest()->take(5)->get();
        return view('components.pos.recent-sales',compact('sales'));
    }
}
