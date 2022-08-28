<?php

namespace App\View\Components\Partials\Dashboard;

use Illuminate\View\Component;

class Footer extends Component
{
    public $date;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->date = now();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partials.dashboard.footer');
    }
}
