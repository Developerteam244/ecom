<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class is_true extends Component
{
    public $name;
    public $id;
    public $value;
    public $lable;
    public function __construct($name,$id,$value='0',$lable='')
    {
        $this->name = $name;
        $this->id = $id;
        if ($value==1) {
            $this->value = "checked";

        }else{

            $this->value = "";
        }
        $this->lable = $lable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.is_true');
    }
}
