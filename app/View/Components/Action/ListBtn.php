<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListBtn extends Component
{
    public $route;
    public $label;

    public function __construct($route = null, $label = null)
    {
        $this->route = $route;
        $this->label = $label;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.list-btn');
    }
}
