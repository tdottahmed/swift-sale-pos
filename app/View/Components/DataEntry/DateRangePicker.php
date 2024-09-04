<?php

namespace App\View\Components\DataEntry;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateRangePicker extends Component
{
    /**
     * Create a new component instance.
     */

    public $startDate;
    public $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-entry.date-range-picker');
    }
}
