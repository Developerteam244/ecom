@extends('front.layout')
 @section('content')
 <main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start checkout page area -->
    <div class="checkout__page--area section--padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <aside class="checkout__sidebar sidebar border-radius-10">
                        <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                        <div class="cart__table checkout__product--table">
                            <table class="cart__table--inner">
                                <tbody class="cart__table--body">
                                    @php
                                        $total_amount =0;
                                    @endphp
                                    @foreach ($product as $list)
                                    @php
                                        $total_amount += $list->qty*$list->price;
                                    @endphp

                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="product__image two  d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <img class="display-block border-radius-5" src="{{asset('storage/media/attr_image/'.$list->image)}}" alt="cart-product">
                                                    <span class="product__thumbnail--quantity">{{$list->qty}}</span>
                                                </div>
                                                <div class="product__description">
                                                    <h4 class="product__description--name">{{$list->name}}</h4>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">Rs. {{$list->price}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout__discount--code">
                            <form class="d-flex" action="#">
                                <label>
                                    <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code"  type="text">
                                </label>
                                <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>
                            </form>
                        </div>
                        <div class="checkout__total">
                            <table class="checkout__total--table">
                                <tbody class="checkout__total--body">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Subtotal </td>
                                        <td class="checkout__total--amount text-right" id="sub_total">Rs. {{$total_amount}}</td>
                                    </tr>

                                </tbody>
                                <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--footer__items">
                                        <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right" id="sub_total">Rs. {{$total_amount}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment__history mb-30">
                            <h3 class="payment__history--title mb-20">Payment</h3>
                            <ul class="payment__history--inner d-flex">
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Credit Card</button></li>
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Bank Transfer</button></li>
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Paypal</button></li>
                            </ul>
                        </div>
                        <button class="checkout__now--btn primary__btn" type="submit" id="submit">Checkout Now</button>
                    </aside>
                </div>

            </div>
        </div>
    </div>
    <!-- End checkout page area -->

    <!-- Start shipping section -->

    <!-- End shipping section -->
</main>




 @endsection

 @push('custom-scripts')


 <script type="module">
    import {page} from "{{asset('front/js/custom/filter.js')}}";
        page.page="category";
      page.filter= document.querySelector("[data-page]").getAttribute('data-page');;






     </script>
     <script type="module" src="{{asset('front/js/custom/filter.js')}}"></script>

 @endpush
