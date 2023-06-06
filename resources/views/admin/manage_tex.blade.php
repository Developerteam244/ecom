@extends('admin/layout')
@section('title','Manage Tex')
@section('container')
    <h1 class="mb10">Manage Tex</h1>
    <a href="{{url('admin/tex')}}">

        <button type="button" class="btn btn-success"> Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <div class="row">

                <div class="col-lg-12">
                    {{session('message')}}
                    <div class="card">

                        <div class="card-body">


                            <form action="{{route('tex.insert')}}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="tex" class="control-label mb-1">Tex Name </label>
                                            <input id="tex_name" name="tex_name" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" value="{{$tex_name}}">
                                                @error('tex')
                                                <p class="text-danger" >

                                                    {{$message}}

                                                </p>
                                                @enderror

                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="tex" class="control-label mb-1">Tex Value </label>
                                            <input id="tex_value" name="tex_value" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" value="{{$tex_value}}">


                                        </div>
                                    </div>
                                </div>




                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit

                                    </button>
                                    <input hidden type="number" name="id" value="{{$tex_id}}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
