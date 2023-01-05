<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    
    public $type;
    public $name;
    public $multiple;
    public function __construct($multiple =null,$type,$name)
    {
        $this->name = $name;
        $this->type = $type;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
