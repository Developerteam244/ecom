<div class="offCanvas__minicart">
    <div class="minicart__header ">
        <div class="minicart__header--top d-flex justify-content-between align-items-center">
            <h3 class="minicart__title"> Shopping Cart</h3>
            <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
            </button>
        </div>
        <p class="minicart__header--desc">Digital Product {{$items}} </p>
    </div>
    <div class="minicart__product">
        @if($status)
        @php
            $total_price=0;
            //$total_mrp=0;
        @endphp
        @foreach ($cart as $list)
            @php
                $total_price += $list['price']*$list['qty'];
                //$total_mrp = $list['mrp']*$list['qty'];
            @endphp
        <x-cart_item name="{{$list['name']}} " image="{{$list['image']}}" price="{{$list['price']}}" mrp="{{$list['mrp']}}" qty="{{$list['qty']}}" id="{{$list['id']}}" ></x-cart_item>
        @endforeach

    </div>
    <div class="minicart__amount">

        <div class="minicart__amount_list d-flex justify-content-between">
            <span>Total:</span>
            <span><b class="mini_cart_total_amount">{{$total_price}}</b></span>
        </div>
    </div>

    <div class="minicart__button d-flex justify-content-center">

        <a class="primary__btn minicart__button--link" href="{{url('checkout_details')}}">Checkout</a>
    </div>
    @endif
</div>
