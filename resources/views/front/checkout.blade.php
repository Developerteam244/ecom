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
                        <button class="checkout__now--btn primary__btn" type="button" id="checkout" data-id="{{$order_id}}">Checkout Now</button>
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

 @push('custom-script')


 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
 <script>
let checkout_btn = document.getElementById("checkout");
let order_id = checkout_btn.getAttribute("data-id");

checkout_btn.addEventListener("click",(btn)=>{

    let obj= request("checkout_order",{id:order_id});

    obj.then(ans=>{

        razor(ans);


    })




})

let request = async (url_path,body)=>{
    let host = location.host;
let fhost = `http://${host}/${url_path}`;
    let csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
    let url = `http://${host}/${url_path}`;
    let res='';
    let items;

    await fetch(url,{
                method:"POST",
                body:JSON.stringify(body),
                headers:{
                    'Content-type':'application/json; charset=UTF-8',
                    'X-CSRF-TOKEN':csrf
                }


            }).then(data=>{
                return data.json();
            }).then(response=>{
                res= response;


            })

            return res;
}


const razor = (obj)=>{
    let option = obj.option;

    option.handler = handler;
    console.log(option);



    var rzp1 = new Razorpay(option);
    rzp1.open();
    rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
    });

};



const handler = (response)=>{

    let data = {
        id:order_id,
        res:response
    }

    let result = request("checkout_payment",data);

        result.then(res=>{
            if (res.res=='true') {
                location.href = "./user/dashboard";
            }

        })

}

 </script>


 @endpush
