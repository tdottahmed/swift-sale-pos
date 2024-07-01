<?php

namespace App\View\Components\DataEntry;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $hasFile;
    public $method;

    public function __construct($action, $hasFile = false, $method = 'POST')
    {
        $this->action = $action;
        $this->hasFile = $hasFile;
        $this->method = strtoupper($method);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-entry.form');
    }
}
