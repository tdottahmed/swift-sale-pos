<?php

namespace App\View\Components\Frontend\Porto;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopFashionBanner extends Component
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
        return view('components.frontend.porto.top-fashion-banner');
    }
}
