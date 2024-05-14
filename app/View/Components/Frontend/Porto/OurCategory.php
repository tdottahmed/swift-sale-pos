<?php

namespace App\View\Components\Frontend\Porto;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OurCategory extends Component
{
    /**
     * Create a new component instance.
     */
   public $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->category->all();

        return view('components.frontend.porto.our-category', ['categories'=>$categories]);
    }
}
