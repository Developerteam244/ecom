
<div class="block block-rounded ">
    <div class="block-header block-header-default">
      <h3 class="block-title">{{$lable}}</h3>
      <div class="block-options">
        <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
      </div>
    </div>
    <div class="block-content">
        <textarea id="{{$id}}" name="{{$name}}" type="text" class="form-control js-simplemde" aria-required="true" aria-invalid="false">{{ $value }} </textarea>

    </div>
  </div>
