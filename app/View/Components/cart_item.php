<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cart_item extends Component
{

    $name;
    $image;
    $price;
    $mrp;
    $qty;
    $id;
    public function __construct($name,$image,$price,$mrp,$qty,$id)
    {
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->mrp = $mrp;
        $this->qty = $qty;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart_item');
    }
}
