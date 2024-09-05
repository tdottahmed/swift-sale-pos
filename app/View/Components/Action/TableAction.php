<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableAction extends Component
{
    /**
     * Create a new component instance.
     */
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
        return view('components.action.table-action');
    }
}
