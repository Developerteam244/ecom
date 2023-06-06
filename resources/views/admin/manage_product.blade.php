@extends('admin/layout')
@section('title', 'Manage Product')
@section('container')
    @if ($id > 0)
        {{ $image_required = '' }}
    @else
        @php

            $image_required = 'required';
        @endphp
    @endif

    @error('pimage.*')
        <div class="alert alert-danger" role="alert">

            {{ $message }}
        </div>
    @enderror
    <h1 class="mb10">Manage Product</h1>
    <a href="{{ url('admin/product') }}">

        <button type="button" class="btn btn-success"> Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <form action="{{ route('product.insert') }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    {{ session('sku_error') }}
                    <div class="col-lg-12">
                        {{ session('message') }}
                        <div class="card">

                            <div class="card-body">
                                <div class="row">


                                    <div class="col-6">


                                        @csrf
                                        <div class="form-group">
                                            <label for="product_name" class="control-label mb-1">Product Name </label>
                                            <input id="product_name" name="name" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" value="{{ $name }}">
                                            @error('name')
                                                ;
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="slug" class="control-label mb-1">Product Slug </label>
                                            <input id="slug" name="slug" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" value="{{ $slug }}">
                                            @error('slug')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Product Thumbnail </label>
                                    <input id="image" name="image" type="file" class="form-control"
                                        aria-required="true" aria-invalid="false" {{ $image_required }}
                                       >
                                    @error('image')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-4">


                                        <div class="form-group">
                                            <label for="brand" class="control-label mb-1">Brand </label>
                                            <select id="brand_id" name="brand_id" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                                <option value=''>Select Brand </option>

                                                @foreach ($brand as $list)
                                                    @if ($brand_id == $list->id)
                                                        <option selected value="{{ $list->id }}">
                                                            {{ $list->brand }} </option>
                                                    @else
                                                        <option value="{{ $list->id }}">{{ $list->brand }}
                                                        </option>
                                                    @endif
                                                @endforeach





                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <div class="form-group">
                                            <label for="category_id" class="control-label mb-1">Category </label>
                                            <select id="category_id" name="category_id" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                                <option value=''>Select Category </option>

                                                @foreach ($category as $list)
                                                    @if ($category_id == $list->id)
                                                        <option selected value="{{ $list->id }}">
                                                            {{ $list->category_name }} </option>
                                                    @else
                                                        <option value="{{ $list->id }}">{{ $list->category_name }}
                                                        </option>
                                                    @endif
                                                @endforeach





                                            </select>
                                            @error('category_id')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <div class="form-group">
                                            <label for="model" class="control-label mb-1">Model </label>
                                            <input id="model" name="model" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" value="{{ $model }}">
                                            @error('model')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="short_desc" class="control-label mb-1">Short Description </label>
                                    <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ $short_desc }} </textarea>
                                    @error('short_desc')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="desc" class="control-label mb-1">Description </label>
                                    <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ $desc }} </textarea>
                                    @error('desc')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keywords" class="control-label mb-1"> Keywords </label>
                                    <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ $keywords }} </textarea>
                                    @error('keywords')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="technical_specification" class="control-label mb-1">Technical
                                        Specipication </label>
                                    <textarea id="technical_specification" name="technical_specification" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false">{{ $technical_specification }} </textarea>
                                    @error('technical_specification')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="uses" class="control-label mb-1">Uses </label>
                                    <textarea id="uses" name="uses" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ $uses }} </textarea>
                                    @error('uses')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="warranty" class="control-label mb-1">Warranty </label>
                                    <textarea id="warranty" name="warranty" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ $warranty }} </textarea>
                                    @error('warranty')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="lead_time" class="control-label mb-1">Lead Time </label>
                                        <input id="lead_time" name="lead_time" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{ $lead_time }}">

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="tex_id" class="control-label mb-1">Tex </label>
                                            <select id="tex_id" name="tex_id" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                                <option value=''>Select Tex </option>

                                                @foreach ($tex as $list)
                                                    @if ($tex_id == $list->id)
                                                        <option selected value="{{ $list->id }}">
                                                            {{ $list->name }} </option>
                                                    @else
                                                        <option value="{{ $list->id }}">{{ $list->name }}
                                                        </option>
                                                    @endif
                                                @endforeach





                                            </select>
                                            @error('tex_id')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="is_promo" class="control-label mb-1">Is Promotional </label>
                                            <select id="is_promo" name="is_promo" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">



                                                    @if ($is_promo == 1)
                                                        <option selected value="1"> Yes  </option>
                                                        <option value=0>No</option>
                                                        @else
                                                        <option value=1>Yes</option>
                                                        <option value=0 selected>No</option>
                                                    @endif






                                            </select>
                                            @error('tex_id')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="is_featured" class="control-label mb-1">Is Featured </label>
                                            <select id="is_featured" name="is_featured" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">



                                                    @if ($is_featured == 1)
                                                        <option selected value="1"> Yes  </option>
                                                        <option value=0>No</option>
                                                        @else
                                                        <option value=1>Yes</option>
                                                        <option value=0 selected>No</option>
                                                    @endif






                                            </select>
                                            @error('tex_id')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="is_discounted" class="control-label mb-1">Is Discounted </label>
                                            <select id="is_discounted" name="is_discounted" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">



                                                    @if ($is_promo == 1)
                                                        <option selected value="1"> Yes  </option>
                                                        <option value=0>No</option>
                                                        @else
                                                        <option value=1>Yes</option>
                                                        <option value=0 selected>No</option>
                                                    @endif






                                            </select>
                                            @error('tex_id')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="is_tranding" class="control-label mb-1">Is Tranding </label>
                                            <select id="is_tranding" name="is_tranding" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false">



                                                    @if ($is_promo == 1)
                                                        <option selected value="1"> Yes  </option>
                                                        <option value=0>No</option>
                                                        @else
                                                        <option value=1>Yes</option>
                                                        <option value=0 selected>No</option>
                                                    @endif






                                            </select>
                                            @error('tex_id')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                {{-- product multiple image --}}
                <div class="row">
                    <div class="col-12" id="product_attr_box">
                        <h3>Product Images</h3>


                        <div class="card" id="product_multi_img">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label class="control-label mb-1"></label>
                                            <button type="button" onclick="add_more_img()"
                                                class="btn btn-lg btn-success btn-block">
                                                <i class="fa fa-plus"></i>

                                            </button>


                                        </div>
                                    </div>

                                    @php
                                        $loop_img_count = 1;
                                        $loop_img_count_prev = $loop_img_count;

                                    @endphp
                                    @foreach ($product_img as $atr_key => $atr_val)
                                        @php
                                            $p_img = (array) $atr_val;
                                            $loop_img_count_prev = $loop_img_count;

                                        @endphp

                                        {{-- data base img end --}}


                                        @if ($p_img['id'] > 0)
                                            <div class="col-lg-4 col-md-6 col-6">
                                                <input hidden type="number" name="piid[]" value="{{ $p_img['id'] }}">
                                                <div class="form-group">
                                                    <label for="image{{ $loop_img_count }}"
                                                        class="control-label mb-1">Image
                                                    </label>
                                                    <input id="image{{ $loop_img_count }}" name="pmimage[]"
                                                        type="file" class="form-control" aria-required="true"
                                                        aria-invalid="false" {{ $image_required }}
                                                        >

                                                    <img src='{{ asset('storage/media/product_img/' . $p_img['image']) }}'
                                                        alt="">

                                                </div>
                                            </div>



                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="control-label mb-1"></label>
                                                    <a
                                                        href="{{ url('admin/manage_product_process/image/delete') }}/{{ $p_img['id'] }}/{{ $id }}">
                                                        <button type="button"
                                                            onclick="remove_more({{ $loop_img_count_prev }})"
                                                            class="btn btn-lg btn-danger btn-block">
                                                            <i class="fa fa-minus"></i>

                                                        </button>
                                                    </a>

                                                </div>
                                            </div>
                                        @endif
                                        {{-- data base img end --}}


                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                {{-- end product multiple image --}}
                {{-- product attribute --}}
                <div class="row">
                    <div class="col-12" id="product_attr_box">
                        <h3>Product Attribute</h3>
                        @php
                            $loop_count_num = 1;
                            $loop_count_prev = $loop_count_num;

                        @endphp


                        @foreach ($product_attr as $atr_key => $atr_val)
                            @php
                                $p_atr = (array) $atr_val;
                                $loop_count_prev = $loop_count_num;

                            @endphp


                            <div class="card" id="product_attr_{{ $loop_count_num++ }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-6 col-6">
                                            <input hidden type="number" name="paid[]" value="{{ $p_atr['id'] }}">
                                            <div class="form-group">
                                                <label for="sku{{ $loop_count_num }}" class="control-label mb-1">SKU
                                                </label>
                                                <input id="sku{{ $loop_count_num }}" name="sku[]" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="{{ $p_atr['sku'] }}" required>
                                                @error('image')
                                                    <p class="text-danger">

                                                        {{ $message }}

                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-6">
                                            <div class="form-group">
                                                <label for="mrp{{ $loop_count_num }}" class="control-label mb-1">MRP
                                                </label>
                                                <input id="mrp{{ $loop_count_num }}" name="mrp[]" type="number"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="{{ $p_atr['mrp'] }}" required>
                                                @error('image')
                                                    <p class="text-danger">

                                                        {{ $message }}

                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-6 ">
                                            <div class="form-group">
                                                <label for="price{{ $loop_count_num }}" class="control-label mb-1">PRICE
                                                </label>
                                                <input id="price{{ $loop_count_num }}" name="price[]" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="{{ $p_atr['price'] }}" required>
                                                @error('image')
                                                    <p class="text-danger">

                                                        {{ $message }}

                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-group">
                                                <label for="size_id{{ $loop_count_num }}" class="control-label mb-1">Size
                                                </label>
                                                <select id="size_id{{ $loop_count_num }}" name="size_id[]"
                                                    type="text" class="form-control" aria-required="true"
                                                    aria-invalid="false">
                                                    <option value=''>Select Category </option>

                                                    @foreach ($size as $list)
                                                        @if ($p_atr['size_id'] == $list->id)
                                                            <option selected value="{{ $list->id }}">
                                                                {{ $list->size }} </option>
                                                        @else
                                                            <option value="{{ $list->id }}">{{ $list->size }}
                                                            </option>
                                                        @endif
                                                    @endforeach





                                                </select>
                                                @error('category_id')
                                                    <p class="text-danger">

                                                        {{ $message }}

                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-6">
                                            <div class="form-group">
                                                <label for="color_id{{ $loop_count_num }}"
                                                    class="control-label mb-1">Color </label>
                                                <select id="color_id{{ $loop_count_num }}" name="color_id[]"
                                                    type="text" class="form-control" aria-required="true"
                                                    aria-invalid="false">
                                                    <option value=''>Select Color </option>

                                                    @foreach ($color as $list)
                                                        @if ($p_atr['color_id'] == $list->id)
                                                            <option selected value="{{ $list->id }}">
                                                                {{ $list->color }} </option>
                                                        @else
                                                            <option value="{{ $list->id }}">{{ $list->color }}
                                                            </option>
                                                        @endif
                                                    @endforeach





                                                </select>
                                                @error('category_id')
                                                    <p class="text-danger">

                                                        {{ $message }}

                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-6 ">
                                            <div class="form-group">
                                                <label for="qty{{ $loop_count_num }}" class="control-label mb-1">Quantity
                                                </label>
                                                <input id="qty{{ $loop_count_num }}" name="qty[]" type="text"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    value="{{ $p_atr['sku'] }}" required>
                                                @error('image')
                                                    <p class="text-danger">

                                                        {{ $message }}

                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-6">
                                            <div class="form-group">
                                                <label for="image{{ $loop_count_num }}" class="control-label mb-1">Image
                                                </label>
                                                <input id="image{{ $loop_count_num }}" name="pimage[]" type="file"
                                                    class="form-control" aria-required="true" aria-invalid="false"
                                                    {{ $image_required }}>
                                                <img width="100px" src='{{ asset('storage/media/attr_image/' . $p_atr['image']) }}'
                                                    alt="">
                                                @error('image')
                                                    <p class="text-danger">

                                                        {{ $message }}

                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        @if ($loop_count_num == 2)
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="control-label mb-1"></label>
                                                    <button type="button" onclick="add_more()"
                                                        class="btn btn-lg btn-success btn-block">
                                                        <i class="fa fa-plus"></i>

                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="control-label mb-1"></label>
                                                    <a
                                                        href="{{ url('admin/manage_product_process/delete') }}/{{ $p_atr['id'] }}/{{ $id }}">
                                                        <button type="button"
                                                            onclick="remove_more({{ $loop_count_prev }})"
                                                            class="btn btn-lg btn-danger btn-block">
                                                            <i class="fa fa-minus"></i>

                                                        </button>
                                                    </a>

                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
                {{-- end product attribute --}}
                <div class="row">
                    <div class="col">
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit

                            </button>
                            <input hidden type="number" name="id" value="{{ $id }}">
                        </div>

            </form>
        </div>
    </div>
    </div>
    </div>




    <script>
        let loop_count = {{ $loop_count_prev }}
        let loop_img_count = {{ $loop_img_count_prev }};

        function add_more() {
            loop_count++;
            let pro_attr_section = document.querySelector("#product_attr_box");
            let size_id_html = document.querySelector('#size_id2').innerHTML;
            size_id_html = size_id_html.replace('selected', '');
            let color_id_html = document.querySelector('#color_id2').innerHTML;
            color_id_html = color_id_html.replace('selected', '');

            let card_div = document.createElement('div');
            card_div.classList.add('card');
            card_div.setAttribute('id', 'product_attr_' + loop_count);

            // < class='card' id='product_attr_"+loop_count+"'>
            html = "<div class='card-body'><div class='row'>";
            html += `<div class="col-lg-2 col-md-6 col-6"><div class="form-group"> <input hidden type="number" name="paid[]" ><label for="sku${loop_count}" class="control-label mb-1">SKU </label><input id="sku${loop_count}" name="sku[]" type="text" class="form-control"aria-required="true" aria-invalid="false" value="" required>
                                            @error('image')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div> </div>`;


            html += `<div class="col-lg-2 col-md-6 col-6"><div class="form-group"><label for="mrp${loop_count}" class="control-label mb-1">MRP </label><input id="mrp${loop_count}" name="mrp[]" type="text" class="form-control"aria-required="true" aria-invalid="false" value="" required>
                                            @error('image')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div></div>`;
            html += `<div class="col-lg-2 col-md-6 col-6"><div class="form-group"><label for="price${loop_count}" class="control-label mb-1">PRICE </label><input id="price${loop_count}" name="price[]" type="text" class="form-control"aria-required="true" aria-invalid="false" value="" required>
                                            @error('image')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div></div>`;
            html += `<div class="col-lg-3 col-md-6 col-6"><div class="form-group"><label for="size_id${loop_count}" class="control-label mb-1">Size </label><select id="size_id${loop_count}" name="size_id[]" type="text" class="form-control" aria-required="true" aria-invalid="false"> ${size_id_html} </select>
                                            @error('image')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div></div>`;

            html += `<div class="col-lg-3 col-md-6 col-6"><div class="form-group"><label for="color_id${loop_count}" class="control-label mb-1">Color </label><select id="color_id${loop_count}" name="color_id[]" type="text" class="form-control" aria-required="true" aria-invalid="false" > ${color_id_html} </select>
                                            @error('image')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div></div>`;
            html += `<div class="col-lg-2 col-md-6 col-6"><div class="form-group"><label for="qty${loop_count}" class="control-label mb-1">Quantity </label><input id="qty${loop_count}" name="qty[]" type="text" class="form-control"aria-required="true" aria-invalid="false" value="" required>
                                            @error('image')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div></div>`;
            html += ` <div class="col-lg-4 col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="image${loop_count}" class="control-label mb-1">Image </label>
                                            <input id="image${loop_count}" name="pimage[]" type="file" class="form-control"
                                                aria-required="true" aria-invalid="false" {{ $image_required }}
                                                >
                                            @error('image')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>`;
            html += `<div class="col-2"> <div class="form-group">
                                            <label class="control-label mb-1"></label>
                                            <button onclick="remove_more(${loop_count})" class="btn btn-lg btn-danger btn-block">
                                                <i class="fa fa-minus"></i>

                                            </button>
                                        </div>
                                    `;





            html += '</div></div></div>';
            card_div.innerHTML = html;

            pro_attr_section.appendChild(card_div);

        }

        function remove_more(id) {

            let product_attr = document.querySelector("#product_attr_" + id);

            product_attr.remove();
        }

        // function to add image division
        function add_more_img() {
            let multi_img_parrent = document.querySelector('#product_multi_img .card-body .row');
            let img_col = document.createElement('div');
            img_col.classList.add('col-lg-4', 'col-md-6', 'col-6');
            loop_img_count++;
            img_col.id = `img_col_${loop_img_count}`;


            html = `<div class="row align-items-end"><div class="col"><input hidden type="number" name="piid[]" >
                                                <div class="form-group">
                                                    <label for="image${loop_img_count}"
                                                        class="control-label mb-1">Image
                                                    </label>
                                                    <input id="image${loop_img_count}" name="pmimage[]"
                                                        type="file" class="form-control" aria-required="true"
                                                        aria-invalid="false"
                                                        >



                                                </div>
                                                </div>




                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label class="control-label mb-1"></label>

                                                        <button type="button"
                                                            onclick="remove_img(${loop_img_count})"
                                                            class="btn btn-lg btn-danger btn-block">
                                                            <i class="fa fa-minus"></i>

                                                        </button>


                                                </div>
                                            </div>
                                            </div>`;
            img_col.innerHTML = html;
            multi_img_parrent.appendChild(img_col);
        };

        function remove_img(id) {
            let img_div = document.querySelector(`#img_col_${id}`);
            img_div.remove();
        }
    </script>

    {{-- <script src="{{asset('admin_assets/ckeditor/ckeditor.js')}}"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>


    <script>
        ClassicEditor
            .create(document.querySelector('#short_desc'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#desc'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#keywords'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#technical_specification'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
