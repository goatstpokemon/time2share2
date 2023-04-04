<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class product extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $return;
    public $rental;
    public $rented;
    public $img;
    public $id;

    public function __construct($name, $return, $rental, $rented, $img, $id)
    {
        $this->name = $name;
        $this->return = $return;
        $this->rental = $rental;
        $this->rented = $rented || null;
        $this->img = $img;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product');
    }
}
