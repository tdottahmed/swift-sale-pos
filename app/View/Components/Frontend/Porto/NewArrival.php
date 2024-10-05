<?php

namespace App\View\Components\Frontend\Porto;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewArrival extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;
    public function __construct()
    {
        $this->products = Product::latest()->take(15)->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
       
        return view('components.frontend.porto.new-arrival', ['products'=>$this->products]);
    }
}
