@extends('admin/layout')
@section('title','Manage Brand')
@section('container')
    <h1 class="mb10">Manage Brand</h1>
    <a href="{{url('admin/brand')}}">

        <button type="button" class="btn btn-success"> Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <div class="row">

                <div class="col-lg-12">
                    {{session('message')}}
                    <div class="card">

                        <div class="card-body">


                            <form action="{{route('brand.insert')}}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="brand" class="control-label mb-1">Brand </label>
                                    <input id="brand" name="brand" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{$brand}}">
                                        @error('brand')
                                        <p class="text-danger" >

                                            {{$message}}

                                        </p>
                                        @enderror

                                </div>




                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit

                                    </button>
                                    <input hidden type="number" name="id" value="{{$brand_id}}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
