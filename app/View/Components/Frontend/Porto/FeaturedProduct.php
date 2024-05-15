<?php

namespace App\View\Components\Frontend\Porto;

use Closure;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FeaturedProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;
    public function __construct()
    {
        $this->products = Product::where('is_featured', '1')->latest()->get();
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.porto.featured-product',  ['products'=>$this->products]);
    }
}
