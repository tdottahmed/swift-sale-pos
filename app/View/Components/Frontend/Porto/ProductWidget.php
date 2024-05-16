<?php

namespace App\View\Components\Frontend\Porto;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductWidget extends Component
{
    public $featureProducts;
    public $bestSellingProducts;
    public $latestProducts;
    public $topRatedProducts;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $products = new Product;
        $this->featureProducts = $products->where('is_featured', true)->take(4)->latest()->get();
        $this->bestSellingProducts = $products->inRandomOrder()->take(4)->get();        
        $this->latestProducts=$products->latest()->take(4)->get();
        $this->topRatedProducts=$products->inRandomOrder()->take(4)->get();
                    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.porto.product-widget',[
            'featureProducts'=>$this->featureProducts,
            'bestSellingProducts'=>$this->bestSellingProducts,
            'latestProducts'=>$this->latestProducts,
            'topRatedProducts'=>$this->topRatedProducts
        ]);
    }
}
