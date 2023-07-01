@extends('admin/layout')
@section('title','Customers')
@section('customer_select','active')
@section('container')
    {{session('message')}}
    <h1 class="mb10">Customer </h1>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Name </th>
                            <th> {{$name}} </th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td>Mobile NO </td>
                            <td>{{$mobile}} </td>

                        </tr>
                        <tr>
                            <td>Address </td>
                            <td>{{$address}} </td>

                        </tr>
                        <tr>
                            <td>City </td>
                            <td>{{$city}} </td>

                        </tr>
                        <tr>
                            <td>District </td>
                            <td>{{$district}} </td>

                        </tr>
                        <tr>
                            <td>Pin Code </td>
                            <td>{{$area_pin}} </td>

                        </tr>
                        <tr>
                            <td>State </td>
                            <td>{{$state}} </td>

                        </tr>


                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
