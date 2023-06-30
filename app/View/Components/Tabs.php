<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
    public $activeTabTag;
    
    /**
     * Create a new component instance.
     */
    public function __construct($activeTabTag)
    {
        $this->activeTabTag = $activeTabTag;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tabs');
    }
}
