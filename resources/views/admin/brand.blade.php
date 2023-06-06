@extends('admin/layout')
@section('title','Brand')
@section('brand_select','active')
@section('container')
    {{session('message')}}
    <h1 class="mb10">Color</h1>
    <a href="brand/manage_brand">

        <button type="button" class="btn btn-success">Add Brand </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Brand </th>

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
                            <td> {{$list->brand}}</td>

                            <td >
                                <a href="{{url('admin/brand/edit')}}/{{$list->id}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>





                                <a href="{{url('admin/brand/delete')}}/{{$list->id}}">
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
