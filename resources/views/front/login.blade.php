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
                            <li class="breadcrumb__content--menu__items"><span>Account</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            <form action="{{route('signin')}}" method="post">
                <div class="login__section--inner">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title mb-10">Login</h2>
                                    <p class="account__login--header__desc">Login Here .</p>
                                </div>
                                <div class="account__login--inner">
                                    @csrf
                                    <label>
                                        <input class="account__login--input" name="email" placeholder="Email Addres" type="email">
                                    </label>
                                    <label>
                                        <input class="account__login--input" name="password" placeholder="Password" type="password">
                                    </label>
                                    <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                Remember me</label>
                                        </div>
                                        <button class="account__login--forgot"  type="submit">Forgot Your Password</button>
                                    </div>
                                    <button class="account__login--btn primary__btn" type="submit">Logins</button>
                                    <div class="account__login--divide">
                                        <span class="account__login--divide__text">O</span>
                                    </div>
                                    <div class="account__social d-flex justify-content-center mb-15">
                                        <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                                        <a class="account__social--link google" target="_blank" href="https://www.google.com">Google</a>
                                        <a class="account__social--link twitter" target="_blank" href="https://twitter.com">Twitter</a>
                                    </div>
                                    <p class="account__login--signup__text">Don,t Have an Account? <a href="{{route('signup_view')}}">
                                        <button type="button">Sign up now</button>  </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End login section  -->

    <!-- Start shipping section -->
    <section class="shipping__section">
        <div class="container">
            <div class="shipping__inner style2 d-flex">
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping1.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Free Shipping</h2>
                        <p class="shipping__content--desc">Free shipping over $100</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping2.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Support 24/7</h2>
                        <p class="shipping__content--desc">Contact us 24 hours a day</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping3.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">100% Money Back</h2>
                        <p class="shipping__content--desc">You have 30 days to Return</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping4.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Payment Secure</h2>
                        <p class="shipping__content--desc">We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

</main>
@endsection
