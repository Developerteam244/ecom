@extends('admin/layout')

@section('container')
    <h1 class="mb10">Manage Cagegory</h1>
    <a href="{{url('admin/banner')}}">

        <button type="button" class="btn btn-success"> Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <div class="row">

                <div class="col-lg-12">
                    {{session('message')}}
                    <div class="card">

                        <div class="card-body">


                            <form action="{{route('banner.insert')}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Banner Name  </label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{$name}}">
                                        @error('name')
                                        <p class="text-danger" >

                                            {{$message}}

                                        </p>
                                        @enderror

                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                <div class="form-group">
                                    <label for="rank" class="control-label mb-1">Banner Rank </label>
                                    <input id="rank" name="rank" type="number" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{$rank}}">
                                        @error('rank')
                                        <p class="text-danger" >

                                            {{$message}}

                                        </p>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link" class="control-label mb-1">Banner Link  </label>
                                    <input id="link" name="link" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{$link}}">
                                        @error('link')
                                        <p class="text-danger" >

                                            {{$message}}

                                        </p>
                                        @enderror

                                </div>
                            </div>
                            </div>

                                <div class="form-group">
                                    <x-texteditor name='desc' id='desc' value='{{$desc}}' lable='Banner Description'></x-texteditor>


                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1 ">Banner Image  </label>
                                    <input id="image" name="image" type="file" class="form-control dropify"
                                        aria-required="true" aria-invalid="false" value="{{$image}}">
                                        @error('image')
                                        <p class="text-danger" >

                                            {{$message}}

                                        </p>
                                        @enderror

                                </div>



                                <div>
                                    <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit

                                    </button>
                                    <input hidden type="number" name="id" value="{{$id}}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
