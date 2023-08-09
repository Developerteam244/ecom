@extends('admin/layout')
@section('title', 'Manage Tax')
@section('admin.add_tax', 'active')
@section('admin.tax', 'open')
@section('container')
    @if ($id > 0)
        {{ $image_required = '' }}
    @else
        @php

            $image_required = 'required';
        @endphp
    @endif

    <div class="content">


        <form action="{{ route('admin.tax_insert') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="tex" class="control-label mb-1">Tex Name </label>
                                    <input id="tex_name" name="tex_name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ $tex_name }}">
                                    @error('tex')
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror

                                </div>

                                <div class="col-6">

                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="top" data-bs-original-title="Tooltip on top">
                                            <i class="fa fa-pencil-alt"></i>
                                          </button>

                                        <label for="tex" class="control-label mb-1">Tex Value </label>
                                        <input id="tex_value" name="tex_value" type="text" class="form-control"
                                            aria-required="true" aria-invalid="false" value="{{ $tex_value }}">


                                    </div>
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



    <!-- Page JS Helpers (SimpleMDE + CKEditor plugins) -->



    <script>

    </script>

@endsection
