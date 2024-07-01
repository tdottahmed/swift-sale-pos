<?php

namespace App\View\Components\DataEntry;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $placeholder;
    public $value;
    public $attribute;

    public function __construct($type = 'text', $name = '', $placeholder = '', $value='', $attribute='')
    {
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->attribute = $attribute;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-entry.input');
    }
}
