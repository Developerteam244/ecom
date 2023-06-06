@extends('admin/layout')
@section('title','Color')
@section('color_select','active')
@section('container')
    {{session('message')}}
    <h1 class="mb10">Color</h1>
    <a href="color/manage_color">

        <button type="button" class="btn btn-success">Add Color</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Color</th>

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
                            <td> {{$list->color}}</td>

                            <td >
                                <a href="{{url('admin/color/edit')}}/{{$list->id}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>





                                <a href="{{url('admin/color/delete')}}/{{$list->id}}">
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
