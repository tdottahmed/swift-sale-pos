<?php

namespace App\View\Components\Frontend\Porto;

use App\Models\Brand;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BrandCarousel extends Component
{
    public $brands;
    /**
     * Create a new component instance.
     */

    public function __construct()
    {
        $this->brands = Brand::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.porto.brand-carousel', ['brands' => $this->brands]);
    }
}
