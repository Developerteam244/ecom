@extends('admin/layout')
@section('title','Product')
@section('product_select','active')
@section('container')
    {{session('message')}}
    <h1 class="mb10">Product</h1>
    <a href="product/manage_product">

        <button type="button" class="btn btn-success">Add Product </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th> Name</th>
                            <th>Slug</th>
                            <th>Thumbnail</th>

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
                            <td> {{$list->slug}}</td>
                            <td> <img src="{{asset('storage/media/'.$list->image)}}" width="100px" alt=""></td>

                            <td >
                                <a href="{{url('admin/product/edit')}}/{{$list->id}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                @if ($list->status==0)
                                <a href="{{url('admin/product/status/1')}}/{{$list->id}}">
                                    <button class="btn btn-warning">Deactive</button>
                                </a>
                                @elseif ($list->status==1)
                                <a href="{{url('admin/product/status/0')}}/{{$list->id}}">
                                <button class="btn btn-success">Active</button>
                                </a>
                                @endif
                                <a href="{{url('admin/product/delete')}}/{{$list->id}}">
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
