@extends('admin/layout')
@section('title', 'Banner')
@section('admin.all_banner', 'active')
@section('admin.banner', 'open')
@section('container')

    <div class="block-content">
        <!-- All Products Table -->
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-vcenter" id="table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;">S. NO. </th>
                        <th class="d-none d-sm-table-cell text-center">Name</th>
                        <th class="d-none d-md-table-cell">Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($banner as $list)
                        <tr>
                            <td class="text-center fs-sm">

                                <strong>{{ $count++ }}</strong>

                            </td>

                            <td class="d-none d-md-table-cell fs-sm">
                                <a class="fw-semibold">{{ $list->name }}</a>
                                <br>
                                <span style="color: gray">Rank : {{$list->rank}}</span>
                            </td>
                            <td>
                                <img class="banner_img" src="{{asset('storage/media/banner/'.$list->image)}}" alt="">
                            </td>

                            <td class="text-center fs-sm">
                                <a class="btn btn-sm btn-alt-secondary"
                                    href="{{ route('admin.banner_edit', ['id' => $list->id]) }}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                @if ($list->status == 1)
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('admin.banner_status', ['id' => $list->id,'status'=>'0']) }}">
                                    <i class="fa  fa-circle-check" style="color:green"></i>
                                </a>
                                @else
                                <a  class="btn btn-sm btn-alt-secondary" href="{{ route('admin.banner_status', ['id' => $list->id,'status'=>'1']) }}">
                                <i class="fa  fa-circle-minus" style="color:rgb(210, 17, 20)"></i>
                                </a>
                                @endif
                                <a class="btn btn-sm btn-alt-secondary"
                                    href="{{ route('admin.banner_delete', ['id' => $list->id]) }}">
                                    <i class="fa fa-fw fa-times text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END All Products Table -->

        <!-- Pagination -->
        <nav aria-label="Photos Search Navigation">
            <ul class="pagination justify-content-end mt-2">
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                        Prev
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="javascript:void(0)">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" aria-label="Next">
                        Next
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END Pagination -->
    </div>
@endsection
@section('page_link')



    <link rel="stylesheet" href="{{ asset('admin_assets\js\plugins\datatables\datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets\js\plugins\sweetalert2\sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css') }}">

@endsection

@section('page_script')

    <script src="{{ asset('admin_assets\js\plugins\datatables\datatables.js') }}"></script>
    <script src="{{ asset('admin_assets\js\plugins\sweetalert2\sweetalert2.js') }}"></script>
    <script>
        $(document).ready(function() {

            // attch datatable plugin on table
            let datatable = new DataTable('#table');
            // sweet alert on update or insert

            @if (session()->has('message'))
                Swal.fire({
                    icon: 'success', // You can change the icon as desired (success, error, warning, info, etc.)
                    title: "{{session('message')}}",
                    timer: 2000, // Duration in milliseconds
                    showConfirmButton: false,
                });
            @endif




        });
    </script>


@endsection
