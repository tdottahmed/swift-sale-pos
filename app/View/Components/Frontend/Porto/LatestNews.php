<?php

namespace App\View\Components\Frontend\Porto;

use Closure;
use App\Models\Frontend\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestNews extends Component
{
    /**
     * Create a new component instance.
     */
    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;  
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $blogs = $this->blog->all();
        return view('components.frontend.porto.latest-news',['blogs'=>$blogs]);
    }
}
