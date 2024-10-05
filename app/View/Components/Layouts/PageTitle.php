<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class PageTitle extends Component
{
    /**
     * Create a new component instance.
     */
    public $pageTitle;

    public function __construct()
    {
        $routeNameParts = explode('.', Route::currentRouteName());
        $this->pageTitle = ucwords($routeNameParts[0]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.page-title');
    }
}
