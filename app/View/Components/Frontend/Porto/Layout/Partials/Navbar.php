<?php

namespace App\View\Components\Frontend\Porto\Layout\Partials;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;

    public function __construct()
    {
        $this->categories = Category::all();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.porto.layout.partials.navbar', ['categories'=>$this->categories]);
    }
}
