@extends('admin/layout')
@section('title','Coupon')
@section('coupon_select','active')
@section('container')
    {{session('message')}}
    <h1 class="mb10">Coupon</h1>
    <a href="coupon/manage_coupon">

        <button type="button" class="btn btn-success">Add Coupon </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Coupon  Name</th>
                            <th>Coupon Code</th>
                            <th>Coupon Value</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($data as $list)

                        <tr>
                            <td> {{$i++}} </td>
                            <td> {{$list->title}}</td>
                            <td> {{$list->code}}</td>
                            <td> {{$list->value}}</td>
                            <td >
                                <a href="{{url('admin/coupon/edit')}}/{{$list->id}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                @if ($list->status==0)
                                <a href="{{url('admin/coupon/status/1')}}/{{$list->id}}">
                                    <button class="btn btn-warning">Deactive</button>
                                </a>
                                @elseif ($list->status==1)
                                <a href="{{url('admin/coupon/status/0')}}/{{$list->id}}">
                                <button class="btn btn-success">Active</button>
                                </a>
                                @endif
                                <a href="{{url('admin/coupon/delete')}}/{{$list->id}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
