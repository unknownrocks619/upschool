<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{

    public $heading;
    public $title;
    public $info;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($heading = null, $info = null)
    {
        //
        $this->heading = $heading;
        $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd("hello");
        return view('components.admin.base');
    }
}
