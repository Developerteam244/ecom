<?php

namespace App\View\Components;

use Illuminate\View\Component;

class product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $price;
    public $mrp;
    public $discount;
    public function __construct($name,$price,$mrp,$discount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->mrp = $mrp;
        $this->discount = $discount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
