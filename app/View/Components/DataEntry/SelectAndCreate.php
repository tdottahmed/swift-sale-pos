<?php

namespace App\View\Components\DataEntry;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectAndCreate extends Component
{
    public $name;
    public $label;
    public $options;
    public $createRoute;
    public $createLabel;
    public $selected; 

    public function __construct($name, $label, $options, $createRoute, $selected = null, $createLabel = 'Create')
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->createRoute = $createRoute;
        $this->createLabel = $createLabel;
        $this->selected = $selected;
    }

    public function render(): View|Closure|string
    {
        return view('components.data-entry.select-and-create');
    }
}
