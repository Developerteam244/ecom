@extends('admin/layout')
@section('title', 'Manage Banner')
@section('admin.add_banner', 'active')
@section('admin.banner', 'open')
@section('container')
    @if ($id > 0)
        {{ $image_required = '' }}
    @else
        @php

            $image_required = 'required';
        @endphp
    @endif

    <div class="content">


        <form action="{{ route('admin.banner_insert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="number" name="id" value="{{ $id }}" hidden>
            <!-- Info -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Banner Details</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-12">
                            <div class="row">
                                <div class="mb-4 col-lg-5">
                                    <label for="name" class="control-label mb-1">Banner Name </label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ $name }}">
                                    @error('name')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror

                                </div>

                                    <div class="col-lg-1">

                                        <div class="form-group">
                                            <label for="rank" class="control-label mb-1">Rank </label>
                                            <input id="rank" name="rank" type="number" class="form-control"
                                                aria-required="true" aria-invalid="false" value="{{ $rank }}">
                                            @error('rank')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="link" class="control-label mb-1">Banner Link </label>
                                            <input id="link" name="link" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" value="{{ $link }}">
                                            @error('link')
                                                <p class="text-danger">

                                                    {{ $message }}

                                                </p>
                                            @enderror

                                        </div>
                                    </div>


                                <div class="form-group">
                                    <x-admin.texteditor name='desc' id='desc' value='{{ $desc }}'
                                        lable='Banner Description'></x-admin.texteditor>


                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1 ">Banner Image </label>
                                    <input id="image" name="image" type="file" class="form-control dropify"
                                        aria-required="true" aria-invalid="false" value="{{ $image }}">
                                    @error('image')
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

                <button type="submit" class="btn btn-lg rounded-pill btn-hero btn-success ">
                    <i class="fa fa-circle-check me-1"></i> Submit
                </button>
        </form>

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


    <script src="{{ asset('admin_assets/tags/js/tag.js') }}"></script>
    <script src="{{ asset('admin_assets/dropify/dropify.js') }}"></script>



    <!-- Page JS Plugins -->
    <script src="{{ asset('admin_assets/js/plugins/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/plugins/ckeditor/ckeditor.js') }}"></script>

    <!-- Page JS Helpers (SimpleMDE + CKEditor plugins) -->


    <script>
        $(document).ready(function() {


            $("#image").dropify({
                preview: {
                    enabled: true,
                    extensions: ['webp']
                }
            });
            $('[data-toggle="tooltip"]').tooltip()

        });
    </script>
    <script>
        Dashmix.helpersOnLoad(['js-ckeditor', 'js-simplemde']);
    </script>

@endsection
