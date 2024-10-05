<?php

namespace App\View\Components\Input;

use App\Models\Branch;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BranchSelect extends Component
{
    public $branches;
    public $selectedBranchId;
    /**
     * Create a new component instance.
     */
    public function __construct($selectedBranchId = null)
    {
        $this->branches = Branch::all();
        $this->selectedBranchId = $selectedBranchId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.branch-select', ['branch'=>$this->branches, 'selectedBranchId'=>$this->selectedBranchId]);
    }
}
