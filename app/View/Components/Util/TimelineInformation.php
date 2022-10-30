<?php

namespace App\View\Components\Util;

use Illuminate\View\Component;

class TimelineInformation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $timelineInfo;
    public function __construct($timelineInfo)
    {
        $this->timelineInfo = $timelineInfo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.timeline-information');
    }
}
