@extends('admin/layout')
@section('title', 'Manage Product')
@section('admin.add_product', 'active')
@section('admin.product', 'open')
@section('container')
    @if ($id > 0)
        {{ $image_required = '' }}
    @else
        @php

            $image_required = 'required';
        @endphp
    @endif

    <div class="content">


        <form action="{{ route('admin.product_insert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="number" name="id" value="{{ $id }}" hidden>
            <!-- Info -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Product Details</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-12">
                            <div class="row">
                                <div class="mb-4 col-lg-6">
                                    <label class="form-label" for="dm-ecom-product-id">Name</label>
                                    <i
                                        class="fa fa-circle-question" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom" data-bs-original-title="<ul class='text-start small'>
                                            <li>Enter Product name</li>
                                            <li>It will appear the customer </li>
                                        </ul>">
                                    </i>


                                    <input type="text" class="form-control" name="name" value="{{ $name }}"
                                        required>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label class="form-label" for="slug">Slug</label>
                                    <i
                                        class="fa fa-circle-question" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom" data-bs-original-title="<ul class='text-start small'>
                                            <li>Enter Product Slug</li>
                                            <li>It should be unique for each product </li>
                                            <li>It is used make custom url  </li>
                                            <li>It is will appear in the url </li>
                                        </ul>"></i>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ $slug }}" required>
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label class="form-label" for="category">Category </label>

                                    <select class="js-select2 form-select" id="category_id" name="category_id"
                                        style="width: 100%;" data-placeholder="Choose Category">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach ($category as $list)
                                            @if ($list->id == $category_id)
                                                <option value="{{ $list->id }}" selected>{{ $list->category_name }}
                                                </option>
                                            @else
                                                <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                            @endif
                                        @endforeach

                                    </select>

                                </div>
                                <div class="mb-4 col-lg-6">
                                    <label class="form-label" for="brand">Brand </label>

                                    <select class="js-select2 form-select" id="brand" name="brand_id"
                                        style="width: 100%;" data-placeholder="Choose Brand">
                                        <option></option>

                                        @foreach ($brand as $list)
                                            @if ($list->id == $brand_id)
                                                <option value="{{ $list->id }}" selected>{{ $list->name }}</option>
                                            @else
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>

                                </div>
                                {{-- short description --}}
                                <div class="mb-4 col-lg-12">

                                    <x-admin.texteditor name="short_desc" id="short_desc" lable="Short Description"
                                        value="{{ $short_desc }}"></x-admin.texteditor>
                                </div>
                                {{-- long description --}}
                                <div class="mb-4 col-lg-12">

                                    <x-admin.texteditor name="desc" id="desc" lable=" Description"
                                        value="{{ $desc }}"></x-admin.texteditor>
                                </div>
                                <div class="mb-4 col-lg-12">

                                    <x-admin.texteditor name="tecnical_specification" id="technical_specification"
                                        lable="Technical Specification" value="{{ $technical_specification }}">
                                    </x-admin.texteditor>
                                </div>
                                <div class="mb-4 col-lg-12">
                                    <label class="form-label" for="dm-ecom-product-id">Keywords</label>
                                    <input type="text" class="form-control keyword" id="keyword" data-role="tagsinput"
                                        name="keywords" value="{{ $keywords }}">
                                </div>
                                {{-- tex input --}}
                                <div class="mb-4 col-lg-4">
                                    <label class="form-label" for="tex_id">Tex </label>
                                    @error('tex_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <select class="js-select2 form-select" id="tex_id" name="tex_id"
                                        style="width: 100%;" data-placeholder="Choose Text">
                                        <option></option>

                                        @foreach ($tex as $list)
                                            @if ($list->id == $tex_id)
                                                <option value="{{ $list->id }}" selected>{{ $list->name }}</option>
                                            @else
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>

                                </div>

                                <div class="mb-4 col-lg-2">
                                    <x-admin.is_true name='is_promo' id="is_promo" value="{{ $is_promo }}"
                                        lable="Promotional"></x-admin.is_true>
                                </div>
                                <div class="mb-4 col-lg-2">
                                    <x-admin.is_true name='is_discounted' id="is_discounted" value="{{ $is_discounted }}"
                                        lable="Disounted"></x-admin.is_true>
                                </div>
                                <div class="mb-4 col-lg-2">
                                    <x-admin.is_true name='is_featured' id="is_featured" value="{{ $is_featured }}"
                                        lable="Featured"></x-admin.is_true>
                                </div>
                                <div class="mb-4 col-lg-2">
                                    <x-admin.is_true name='is_tranding' id="is_tranding" value="{{ $is_tranding }}"
                                        lable="Tranding"></x-admin.is_true>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Info -->
            <!-- thumbanil image -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Thumbnail Image</h3>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block-content block-content-full">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">

                            <input id="thumbnail" type="file" name="image"
                                data-default-file="{{ asset('storage/media/product/' . $image) }}"
                                data-allowed-file-extensions="jpg jpeg webp png">

                        </div>
                    </div>
                </div>
            </div>
            <!-- thumbnail image -->
            <!-- muliple  image -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Multiple Image</h3>
                </div>
                <div class="block block-rounded block-mode-hidden">
                    <div class="block-header block-header-default">
                        <div class="block-options">

                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">
                        <button type="button" id="add_image" class="btn btn-success me-1 mb-3">
                            <i class="fa fa-fw fa-plus me-1"></i> Add Image
                        </button>
                        <div class="row" id="pimage_area">

                            @foreach ($product_img as $list)
                                <div class="col-lg-4  position-relative multiple_image">
                                    <i class="fa fa-circle-xmark pmimage_close"></i>
                                    <input type="number" name="piid[]" value="{{$list['id']}}" hidden>

                                    <input type="file" class="multi_image" name="pmimage[]"  data-default-file="{{ asset('storage/media/attr_image/' . $list['image']) }}">
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
            <!-- mulitple image -->


            <!-- Attribute  -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Product Attribute </h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-12">
                            <button type="button" class="btn btn-success me-1 mb-3" id="pattr_add">
                                <i class="fa fa-fw fa-plus me-1"></i> Add
                            </button>
                            <div class="product_attr" id="pattr_area">
                                @foreach ($product_attr as $value)
                                    @php
                                        $list = (array) $value;
                                    @endphp

                                    <div class="row">
                                        <input type="number" name="paid[]" value="{{ $list['id'] }}" hidden>
                                        <div class="mb-4 col-lg-2 ">
                                            <label class="form-label" for="">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    ₹
                                                </span>
                                                <input type="number" class="form-control number" name="price[]"
                                                    placeholder="00" value="{{ $list['price'] }}">

                                            </div>
                                        </div>



                                        <div class="mb-4 col-lg-2 ">
                                            <label class="form-label" for="">Mrp</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    ₹
                                                </span>
                                                <input type="number" class="form-control number" name="mrp[]"
                                                    placeholder="00" value="{{ $list['mrp'] }}">

                                            </div>
                                        </div>



                                        <div class="mb-4 col-lg-2 ">
                                            <label class="form-label" for="">Quantity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control number" name="qty[]"
                                                    placeholder="00" value="{{ $list['qty'] }}">
                                                <span class="input-group-text">
                                                    p
                                                </span>

                                            </div>
                                        </div>
                                        <div class="mb-4 col-lg-4">
                                            <label class="form-label" for="dm-ecom-product-name">Size </label>

                                            <select class="js-select2 form-select paselect"  name="size_id[]"
                                                style="width: 100%;" data-placeholder="Choose Size">
                                                <option></option>

                                                @foreach ($size as $s)
                                                    @if ($list['size_id'] == $s->id)
                                                        <option value="{{ $s->id }}" selected>
                                                            {{ $s->size }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $s->id }}">{{ $s->size }}</option>
                                                    @endif
                                                @endforeach

                                            </select>

                                        </div>


                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Attribute -->


            <button type="submit" class="btn btn-lg rounded-pill btn-hero btn-success ">
                <i class="fa fa-circle-check me-1"></i> Submit
            </button>

        </form>


        <!-- Media -->


        <!-- END Media -->
    </div>
@endsection

@section('page_link')

    <link rel="stylesheet" href="{{ asset('admin_assets/js/plugins/simplemde/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/js/plugins/selecteditable/editable-select.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/js/plugins/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/tags/css/tag.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/dropify/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css') }}">
@endsection

@section('page_script')


<!-- custorm js -->
    <script type="module" src="{{ asset('admin_assets/js/custom/manage_product.js') }}"></script>
 <!-- Plugin -->
    <script src="{{ asset('admin_assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/plugins/selecteditable/editable-select.js') }}"></script>

    <script src="{{ asset('admin_assets/tags/js/tag.js') }}"></script>
    <script src="{{ asset('admin_assets/dropify/dropify.js') }}"></script>



    <!-- Page JS Plugins -->
    <script src="{{ asset('admin_assets/js/plugins/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin_assets/js/plugins/notify/notify.js') }}"></script>
    <!-- Page JS Helpers (SimpleMDE + CKEditor plugins) -->


    <script>
        $(document).ready(function() {
            $('.js-select2').select2(); // select on category , brand , size

            $("#thumbnail").dropify({
                preview: {
                    enabled: true,
                    extensions: ['webp']
                }
            });
            $(".multi_image").dropify();
            @php
                $error_list = ['price.*', 'mrp.*', 'qty.*', 'size_id.*'];
            @endphp
            @foreach ($error_list as $list)

                @error($list)
                    $.notify("{{ $message }}");
                @enderror
            @endforeach
        });
    </script>
    <script>
        Dashmix.helpersOnLoad(['js-ckeditor', 'js-simplemde']);
    </script>

@endsection
