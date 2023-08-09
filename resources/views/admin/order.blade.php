@extends('admin/layout')
@section('title', $title)
@section($section, 'active')
@section('admin.order', 'open')
@section('container')

    <div class="content">


        <!-- Products -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Products</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-vcenter fs-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;">Name</th>


                                <th class="text-center">Qty</th>

                                <th class="text-end" style="width: 10%;">Amount </th>
                                <th class="text-end" style="width: 10%;"> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_price = 0;
                            @endphp
                            @foreach ($order_item as $list)
                                @php
                                    $total_price += $list->price;
                                @endphp
                                <tr>
                                    <td class="text-center"><strong>{{ $list->item_name }}</strong></td>


                                    <td class="text-center"><strong>{{ $list->qty }}</strong></td>
                                    <td class="text-end">{{ $list->price }}</td>
                                    <td class="text-end">
                                        <span class="text-white fw-semibold me-1">

                                            <i class="fa  fa-{{$icon}} product_icon" style="color:{{$icon_color}}"></i>


                                        </span>
                                    </td>

                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="2" class="text-end"><strong>Total Price:</strong></td>
                                <td class="text-end">{{ $total_price }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-end"><strong>Total Paid:</strong></td>
                                <td class="text-end">$177,00</td>
                            </tr>
                            <tr class="table-active">
                                <td colspan="2" class="text-end text-uppercase"><strong>Total Due:</strong></td>
                                <td class="text-end"><strong>$0,00</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Products -->

        <!-- Customer -->

        <div class="row">
            {{--
      <div class="col-sm-6">
        <!-- Billing Address -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Billing Address</h3>
          </div>
          <div class="block-content">
            <div class="fs-4 mb-1">Helen Jacobs</div>
            <address class="fs-sm">
              Sunset Str 598<br>
              Melbourne<br>
              Australia, 11-671<br><br>
              <i class="fa fa-phone"></i> (999) 888-77777<br>
              <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">company@example.com</a>
            </address>
          </div>
        </div> --}}
            <!-- END Billing Address -->
        </div>
        <div class="col-sm-6">
            <!-- Shipping Address -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Shipping Address</h3>
                </div>
                <div class="block-content">
                    <div class="fs-4 mb-1">{{ $add->name }}</div>
                    <address class="fs-sm">
                        {{ $add->lmrk }}<br>
                        {{ $add->area }}<br>
                        {{ $add->city }} Dist. {{ $add->dist }}, {{ $add->state }}<br>
                        Pin : {{ $add->pin }}
                        <br>
                        <i class="fa fa-phone"></i> {{ $add->mobile }}<br>

                    </address>
                </div>
            </div>
            <!-- END Shipping Address -->
        </div>
    </div>
    <!-- END Customer -->


    </div>



@endsection
@section('page_link')



    <link rel="stylesheet" href="{{ asset('admin_assets\js\plugins\datatables\datatables.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css') }}">

@endsection

@section('page_script')

    <script src="{{ asset('admin_assets\js\plugins\datatables\datatables.js') }}"></script>

    <script>
        $(document).ready(function() {

            // attch datatable plugin on table
            let datatable = new DataTable('#table');
            // sweet alert on update or insert






        });
    </script>


@endsection
