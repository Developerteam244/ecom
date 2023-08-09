@extends('admin/layout')
@section('title', 'Manage Product')
@section('admin.add_brand', 'active')
@section('admin.brand', 'open')
@section('container')
    <!-- manage Brand -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Manage Brand</h3>
        </div>
        <div class="block block-rounded ">
            <form action="{{ route('admin.brand_insert') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="number" name="id" value="{{ $id }}" hidden>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-12">
                            <div class="row">
                                <div class="mb-4 col-lg-4">
                                    <label class="form-label" for="dm-ecom-product-id"> Brand Name</label> <i
                                        class="fa fa-circle-question js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Top Tooltip"></i>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $name }}" required>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4 col-lg-4">
                                    <label class="form-label" for="slug"> Brand Slug</label> <i
                                        class="fa fa-circle-question js-bs-tooltip-enabled" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-original-title="Top Tooltip"></i>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ $slug }}" required>
                                    @error('slug')
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
    <!-- manage brand  -->
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
