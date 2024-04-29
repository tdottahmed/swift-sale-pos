<?php

namespace App\View\Components\Repair;

use App\Models\Brand;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateModal extends Component
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
        $brands = Brand::all();
        return view('components.repair.create-modal', compact('brands'));
    }
}
