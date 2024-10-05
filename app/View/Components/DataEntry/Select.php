<?php

namespace App\View\Components\DataEntry;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;
    public $attributes;
    public $selected;

    public function __construct($name = '', $label = '',$selected = null, $options = [], $attributes = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->attributes = $attributes;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-entry.select');
    }
}
