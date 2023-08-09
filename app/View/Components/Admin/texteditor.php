<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class texteditor extends Component
{
   public $name;
   public $id;
   public $value;
   public $lable;
    public function __construct($name,$id,$value='',$lable='')
    {
    $this->name = $name;        //
    $this->id = $id;        //
    $this->value = $value;        //
    $this->lable = $lable;        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.texteditor');
    }
}
