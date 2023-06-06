@extends('admin/layout')
@section('title','Category')
@section('category_select','active')
@section('container')
    {{session('message')}}
    <h1 class="mb10">Category</h1>
    <a href="category/manage_category">

        <button type="button" class="btn btn-success">Add Category</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
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
                            <td> {{$list->category_name}}</td>
                            <td> {{$list->category_slug}}</td>
                            <td >
                                <a href="{{url('admin/category/edit')}}/{{$list->id}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                @if ($list->status==0)
                                <a href="{{url('admin/category/status/1')}}/{{$list->id}}">
                                    <button class="btn btn-warning">Deactive</button>
                                </a>
                                @elseif ($list->status==1)
                                <a href="{{url('admin/category/status/0')}}/{{$list->id}}">
                                <button class="btn btn-success">Active</button>
                                </a>
                                @endif
                                <a href="{{url('admin/category/delete')}}/{{$list->id}}">
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
