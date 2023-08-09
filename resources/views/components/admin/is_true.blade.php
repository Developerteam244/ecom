<label class="form-label" for="{{$id}}">{{$lable}}</label>
<div class="form-check form-switch">
    <?php
        if ($value==1) {
            $ch = "checked";
        }else{

            $ch = "";
        }

        ?>
    <input class="form-check-input" type="checkbox" {{$ch}} id="{{$id}}"
        name="{{$name}}">

</div>
