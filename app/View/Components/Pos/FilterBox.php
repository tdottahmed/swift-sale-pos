<?php

namespace App\View\Components\Pos;

use Closure;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FilterBox extends Component
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
        $categories = Category::all();
        $brands = Brand::all();

        return view('components.pos.filter-box',compact('categories','brands'));
    }
}
