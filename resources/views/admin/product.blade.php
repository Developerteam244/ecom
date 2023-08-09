@extends('admin/layout')
@section('title','Product')
@section('admin.all_product','active')
@section('admin.product','open')
@section('container')



    <!-- Page Content -->
    <div class="content">


      <!-- Cover Link Stories -->
      <h2 class="content-heading">Products </h2>
      <div class="row items-push">
        @foreach ($product as $list)


        <div class="col-md-6 col-xl-4">
          <!-- Story #9 -->
          <div class="block block-rounded bg-image h-100 mb-0" style="background-image: url('{{ asset('storage/media/product/'.$list->image) }}');" href="javascript:void(0)">
            <div class="block-content bg-black-50">
              <div class="mb-5 mb-sm-7 d-sm-flex justify-content-sm-between align-items-sm-center">
                <p>
                  <span class="badge bg-primary fw-bold p-2 text-uppercase">
                    {{$list->category}}
                  </span>
                </p>
                <p class="fs-sm">
                    <a href="{{url('admin/product/edit')}}/{{$list->id}}">
                  <span class="text-white fw-semibold me-1">
                    <i class="fa  fa-eye product_icon"></i>
                  </span>
                    </a>
                  <span class="text-white fw-semibold me-1">
                    @if ($list->status == 1)
                    <a href="{{url('admin/product/status/0')}}/{{$list->id}}">
                        <i class="fa  fa-circle-check product_icon" style="color:green"></i>
                    </a>
                    @else
                    <a href="{{url('admin/product/status/1')}}/{{$list->id}}">
                    <i class="fa  fa-circle-minus product_icon" style="color:rgb(210, 17, 20)"></i>
                    </a>
                    @endif
                  </span>
                </p>
              </div>
              <p class="fs-lg fw-bold text-white mb-1">
                {{$list->name}}
              </p>

            </div>
          </div>
          <!-- END Story #9 -->
        </div>
        @endforeach
      </div>
      <!-- END Cover Link Stories -->


    </div>
    <!-- END Page Content -->

@endsection

@section('page_link')

    <link rel="stylesheet" href="{{ asset('admin_assets\js\plugins\sweetalert2\sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css') }}">
@endsection

@section('page_script')


    <script src="{{ asset('admin_assets\js\plugins\sweetalert2\sweetalert2.js') }}"></script>
    <script>
        $(document).ready(function() {


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
