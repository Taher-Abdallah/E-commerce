<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItemChildren extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $name, public string $href1, public string $icon ,
     public string $href2 ,public string $subname1, public string $subname2)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-item-children');
    }
}
