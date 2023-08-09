@extends('admin/layout')
@section('title', 'Manage Product')
@section('admin.add_category', 'active')
@section('admin.category', 'open')
@section('container')
    <!-- muliple  image -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Manage Category</h3>
        </div>
        <div class="block block-rounded ">
            <form action="{{ route('admin.category_insert') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="number" name="id" value="{{ $id }}" hidden>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-12">
                            <div class="row">
                                <div class="mb-4 col-lg-4">
                                    <label class="form-label" for="dm-ecom-product-id"> Categoyr Name</label> <i
                                        class="fa fa-circle-question js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Top Tooltip"></i>
                                    <input type="text" class="form-control" name="category_name"
                                        value="{{ $category_name }}" required>
                                    @error('category_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-4">
                                    <label class="form-label" for="brand">Parent Categoyr </label>

                                    <select class="js-select2 form-select" id="brand" name="parent_id"
                                        style="width: 100%;" data-placeholder="Choose Parent Category">
                                        <option value="0" selected></option>


                                        @foreach ($parent_category as $list)
                                            @if ($category_id != $list->id)
                                                @if ($parent_id == $list->id)
                                                    <option value="{{ $list->id }}" selected>{{ $list->category_name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $list->id }}">{{ $list->category_name }}</option>
                                                @endif
                                            @endif
                                        @endforeach

                                    </select>

                                </div>
                                <div class="mb-4 col-lg-4">
                                    <label class="form-label" for="slug"> Category Slug</label> <i
                                        class="fa fa-circle-question js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Top Tooltip"></i>
                                    <input type="text" class="form-control" id="slug" name="category_slug"
                                        value="{{ $category_slug }}" required>
                                    @error('category_slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-10">
                                    <label class="form-label" for="dm-ecom-product-id">Keywords</label>
                                    <input type="text" class="form-control keyword" id="keyword" data-role="tagsinput"
                                        name="keywords" value="{{$keywords}}">
                                        @error('keywords')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-lg-2">
                                    <x-admin.is_true name='in_home' id="in_home" value="{{ $in_home }}"
                                        lable="Show IN Home"></x-admin.is_true>
                                </div>
                                <div class="mb-4 col-lg-12">
                                    <label class="form-label" for="dm-ecom-product-id">Description </label>
                                    <textarea type="text" class="form-control" data-role="tagsinput" name="description"> {{$description}}</textarea>
                                    @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="col-md-10 col-lg-8">

                                    <input id="image" type="file" name="image"
                                        data-default-file="{{ asset('storage/media/category/'.$image) }}"
                                        data-allowed-file-extensions="jpg jpeg webp png">

                                </div>
                                <div class="mb-4 col-lg-12">
                                    <button type="submit" class="btn btn-lg rounded-pill btn-hero btn-success ">
                                        <i class="fa fa-circle-check me-1"></i> Submit
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- mulitple image -->
@endsection

@section('page_link')


    <link rel="stylesheet" href="{{ asset('admin_assets/js/plugins/select2/css/select2.min.css') }}">


    <link rel="stylesheet" href="{{ asset('admin_assets/tags/css/tag.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/dropify/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css') }}">
@endsection

@section('page_script')


<!-- custorm js -->
    <script type="module" src="{{ asset('admin_assets/js/custom/manage_product.js') }}"></script>
 <!-- Plugin -->
    <script src="{{ asset('admin_assets/js/plugins/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('admin_assets/tags/js/tag.js') }}"></script>
    <script src="{{ asset('admin_assets/dropify/dropify.js') }}"></script>



    <!-- Page JS Plugins -->

    <script src="{{ asset('admin_assets/js/plugins/notify/notify.js') }}"></script>
    <!-- Page JS Helpers (SimpleMDE + CKEditor plugins) -->


    <script>
        $(document).ready(function() {
            $('.js-select2').select2(); // select on category , brand , size

            // slug lowre casee and remove space
            let slug = $("#slug");
            slug.focusout(()=>{
                let slug_value = slug.val();
                 let lower_case = slug_value.toLowerCase();
                  let replace_space = lower_case.replaceAll(" ","-");
                  slug.val(replace_space);
            });


            $("#image").dropify();

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


@endsection
