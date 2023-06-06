@extends('admin/layout')
@section('title','Tex')
@section('tex_select','active')
@section('container')
    {{session('message')}}
    <h1 class="mb10">Tex</h1>
    <a href="tex/manage_tex">

        <button type="button" class="btn btn-success">Add Tex</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Tex Name</th>
                            <th>Tex Value</th>

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
                            <td> {{$list->value}}</td>

                            <td >
                                <a href="{{url('admin/tex/edit')}}/{{$list->id}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>





                                <a href="{{url('admin/tex/delete')}}/{{$list->id}}">
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
