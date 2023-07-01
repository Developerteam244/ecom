@extends('admin/layout')
@section('title','Banner')
@section('banner_select','active')
@section('container')
    {{session('message')}}
    <h1 class="mb10">Banner</h1>
    <a href="banner/manage_banner">

        <button type="button" class="btn btn-success">Add Banner</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Banner Name</th>
                            <th>Banner Image </th>
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
                            <td> <img src="{{asset('Storage/media/banner/'.$list->image)}}" alt="" width="100px"></td>
                            <td >
                                <a href="{{url('admin/banner/edit')}}/{{$list->id}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                @if ($list->status==0)
                                <a href="{{url('admin/banner/status/1')}}/{{$list->id}}">
                                    <button class="btn btn-warning">Deactive</button>
                                </a>
                                @elseif ($list->status==1)
                                <a href="{{url('admin/banner/status/0')}}/{{$list->id}}">
                                <button class="btn btn-success">Active</button>
                                </a>
                                @endif
                                <a href="{{url('admin/banner/delete')}}/{{$list->id}}">
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
