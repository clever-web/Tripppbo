<?php

namespace App\View\Components\Util;

use Illuminate\View\Component;

class ImportantInformation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $information;
    public function __construct($info)
    {
        $this->information = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.important-information');
    }
}
