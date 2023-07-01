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
                            <th>S.NO.</th>
                            <th>Customer</th>

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
                            <td> {{$list->name}}</td>

                            <td >






                                <a href="{{url('admin/customer/show')}}/{{$list->id}}">
                                    <i class="fa-regular fa-eye"></i>
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
