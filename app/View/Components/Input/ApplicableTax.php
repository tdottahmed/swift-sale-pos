<?php

namespace App\View\Components\Input;

use App\Models\Tax;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ApplicableTax extends Component
{
    /**
     * Create a new component instance.
     */
    public $applicableTaxes;
    public $selected;
    public function __construct($selected=null)
    {
        $this->selected= $selected;
        $this->applicableTaxes= Tax::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.applicable-tax',['applicableTaxes '=>$this->applicableTaxes]);
    }
}
