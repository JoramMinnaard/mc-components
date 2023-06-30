<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AccordionItem extends Component
{

    public $accordionDisplayName;
    public $accordionTag;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($accordionDisplayName, $accordionTag)
    {
        $this->accordionDisplayName = $accordionDisplayName;
        $this->accordionTag = $accordionTag;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.accordion-item');
    }
}