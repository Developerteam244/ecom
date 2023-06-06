@extends('admin/layout')
@section('title','Manage Coupon')
@section('container')
    <h1 class="mb10">Manag Coupon</h1>
    <a href="{{url('admin/coupon')}}">

        <button type="button" class="btn btn-success"> Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <div class="row">

                <div class="col-lg-12">
                    {{session('message')}}
                    <div class="card">

                        <div class="card-body">


                            <form action="{{route('coupon.insert')}}" method="post" >

                                @csrf
                                <div class="row">
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="coupon_name" class="control-label mb-1">coupon </label>
                                        <input id="coupon_name" name="coupon_name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{$coupon_name}}">
                                        @error('coupon_name');
                                        <p class="text-danger" >

                                            {{$message}}

                                        </p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="coupon_slug" class="control-label mb-1">Coupon Code </label>
                                        <input id="cc-pament" name="coupon_code" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{$coupon_code}}">
                                        @error('coupon_code')
                                        <p class="text-danger" >

                                            {{$message}}

                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="coupon_slug" class="control-label mb-1">Coupon Value </label>
                                        <input id="cc-pament" name="coupon_value" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{$coupon_code}}">
                                        @error('coupon_value')
                                        <p class="text-danger" >

                                            {{$message}}

                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="coupon_type" class="control-label mb-1">Coupon Type  </label>
                                        <select name="coupon_type" class="form-control" >
                                            @if ($coupon_type =='per')
                                            <option value="value" >Value</option>
                                                <option value="per" selected>Percent</option>
                                            @else

                                            <option value="value" selected>Value</option>
                                            <option value="per">Percent</option>
                                            @endif




                                        </select>

                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="coupon_min_order_amt" class="control-label mb-1">Minium Order Amount </label>
                                        <input id="coupon_min_order_amt" name="coupon_min_order_amt" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{$coupon_min_order_amt}}">

                                    </div>
                                </div>
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="coupon_type" class="control-label mb-1">Is One Time  </label>
                                        <select name="coupon_is_one_time" class="form-control" >
                                            @if ($coupon_type == 1)
                                            <option value=1 selected>Yes</option>
                                                <option value=0 >No</option>
                                            @else

                                            <option value=1 >Yes</option>
                                            <option value=0 selected>No</option>
                                            @endif




                                        </select>
                                    </div>
                                </div>
                            </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit

                                    </button>
                                    <input hidden type="number" name="id" value="{{$coupon_id}}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
