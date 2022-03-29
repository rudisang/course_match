<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RequirementModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $name;
    public $digit;
    public function __construct($id, $name, $digit)
    {
        $this->id = $id;
        $this->name = $name;
        $this->digit = $digit;
    }
 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.requirement-modal');
    }
}
