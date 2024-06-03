<?php

namespace App\View\Components\Input;

use App\Models\Variable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectVariable extends Component
{
    /**
     * Create a new component instance.
     */
    public $variables;
    public function __construct()
    {
        $this->variables= Variable::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.select-variable',['variables'=>$this->variables]);
    }
}
