<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateBtn extends Component
{
    public $route;
    public $buttonLabel;
    public $modalHeaderLabel;

    public function __construct($route, $buttonLabel, $modalHeaderLabel)
    {
        $this->route = $route;
        $this->buttonLabel = $buttonLabel;
        $this->modalHeaderLabel = $modalHeaderLabel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.create-btn');
    }
}
