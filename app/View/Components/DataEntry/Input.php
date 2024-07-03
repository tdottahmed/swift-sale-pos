<?php

namespace App\View\Components\DataEntry;

use Closure;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

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
    public function label()
    {
        $formattedName = Str::of($this->name)
            ->replace(['-', '_'], ' ') 
            ->snake() 
            ->replace('_', ' '); 
        return Str::title($formattedName); 
    }
    public function render(): View|Closure|string
    {
        return view('components.data-entry.input');
    }
}
