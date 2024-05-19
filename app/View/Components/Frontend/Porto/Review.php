<?php

namespace App\View\Components\Frontend\Porto;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Review extends Component
{
    public $product;
    public $reviews;
    /**
     * Create a new component instance.
     */
    public function __construct($product)
    {
        $this->product = $product;
        $this->reviews = $this->product->reviews;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.porto.review', ['product'=>$this->product, 'reviews'=>$this->reviews]);
    }
}
