<?php

namespace App\View\Components\DataEntry;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    public $name;
    public $label;
    public $value;
    public $cols;
    public $rows;
    public $attributes;

    public function __construct($name = '', $label = '', $value = '', $cols = 30, $rows = 10, $attributes = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->cols = $cols;
        $this->rows = $rows;
        $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-entry.text-area');
    }
}
