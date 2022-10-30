<?php

namespace Trippbo\FlightMarkup;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class FlightMarkup extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('flight-markup', __DIR__.'/../dist/js/tool.js');
        Nova::style('flight-markup', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('flight-markup::navigation');
    }
}
