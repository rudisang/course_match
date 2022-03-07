<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GradeFields extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $subjectname;
     public $gradename;


    public function __construct($subjectname, $gradename)
    {
        $this->subjectname = $subjectname;
        $this->gradename = $gradename;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.grade-fields');
    }
}
