<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Title extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;

    public function __construct()
    {
        $this->title = ucwords(str_replace('.', '-', Route::currentRouteName()));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.title');
    }
}
