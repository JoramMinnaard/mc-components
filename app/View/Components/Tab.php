<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tab extends Component
{
    public $tabDisplayName;
    public $tabTag;

    /**
     * Create a new component instance.
     */
    public function __construct($tabDisplayName, $tabTag)
    {
        $this->tabDisplayName = $tabDisplayName;
        $this->tabTag = $tabTag;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tab');
    }
}
