<?php

namespace App\View\Components\Frontend\Porto;

use Closure;
use App\Models\Slider;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Sliders extends Component
{
    /**
     * Create a new component instance.
     */
    public $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $sliders = $this->slider->all();

        return view('components.frontend.porto.sliders', ['sliders'=>$sliders]);
    }
}
