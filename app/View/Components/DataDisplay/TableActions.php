<?php

namespace App\View\Components\DataDisplay;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableActions extends Component
{
    public $actions;

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-display.table-actions');
    }
}
