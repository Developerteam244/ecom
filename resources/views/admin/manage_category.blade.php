@extends('admin/layout')

@section('container')
    <h1 class="mb10">Manage Cagegory</h1>
    <a href="{{ url('admin/category') }}">

        <button type="button" class="btn btn-success"> Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">

            <div class="row">

                <div class="col-lg-12">
                    {{ session('message') }}
                    <div class="card">

                        <div class="card-body">


                            <form action="{{ route('category.insert') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name" class="control-label mb-1">Category </label>
                                    <input id="category_name" name="category_name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ $category_name }}">
                                    @error('category_name')
                                        ;
                                        <p class="text-danger">

                                            {{ $message }}

                                        </p>
                                    @enderror

                                </div>



                            <div class="form-group">
                                <label for="category_parent" class="control-label mb-1">Category Parent </label>
                                <select class="form-control" id="category_parent" name="parent_id">
                                    <option value="0" > Select Parent Category</option>

                                    @foreach ($parent_category as $list)
                                    @if ($category_id != $list->id)

                                    @if ($parent_id == $list->id)
                                    <option value="{{$list->id}}" selected > {{$list->category_name}} </option>
                                    @else
                                    <option value="{{$list->id}}" > {{$list->category_name}} </option>

                                    @endif


                                        @endif
                                    @endforeach

                                </select>

                            <div class="form-group">
                                <label for="category_slug" class="control-label mb-1">Category Slug </label>
                                <input id="category_slug" name="category_slug" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" value="{{ $category_slug }}">
                                @error('category_slug')
                                    <p class="text-danger">

                                        {{ $message }}

                                    </p>
                                @enderror

                            <div class="form-group">
                                <label for="in_home" class="control-label mb-1">IN Home </label>
                                <input id="in_home" name="in_home" type="checkbox" value="1" {{ $in_home }}>

                            </div>


                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit

                                </button>
                                <input hidden type="number" name="id" value="{{ $category_id }}">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
