<?php

namespace App\View\Components\DataDisplay;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $title;
    public $headerColor;

    public function __construct($id, $title, $headerColor = 'bg-teal-800')
    {
        $this->id = $id;
        $this->title = $title;
        $this->headerColor = $headerColor;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-display.modal');
    }
}
