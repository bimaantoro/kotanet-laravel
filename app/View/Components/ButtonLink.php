<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonLink extends Component
{
    public $url, $title, $style, $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($url, $title, $style, $icon)
    {
        $this->url = $url;
        $this->title = $title;
        $this->style = $style;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-link');
    }
}
