@extends('front.layout')
 @section('content')





<main class="main__content_wrapper">
    <!-- Start slider section -->
    <section class="hero__slider--section">
        <div class="container">
            <div class="hero__slider--inner hero__slider--ml hero__slider--activation swiper">
                <div class="hero__slider--wrapper swiper-wrapper">
                    @foreach ($banner as $key=>$list)


                    <div class="swiper-slide ">
                        <div class="hero__slider--items home1-slider1-bg">
                            <div class="slider__content">

                                <h2 class="slider__maintitle h1">{{$list->name}} <br> <span class="slider__maintitle--inner__text">{{$list->desc}}</span></h2>

                                <a class="primary__btn slider__btn" href="{{$list->link}}">
                                    Shop now
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="hero__slider--layer">
                                <img class="slider__layer--img " src="{{asset('storage/media/banner/'.$list->image)}}" alt="slider-img">
                            </div>
                        </div>
                    </div>
                    @endforeach


                <div class="swiper__nav--btn swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
                <div class="swiper__nav--btn swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </div>
            </div>
        </div>
    </section>
    <!-- End slider section -->

    <!-- Start categories section -->
    <section class="categories__section section--padding">

    </section>
    <!-- End categories section -->

     <!-- Start banner section -->
     <section class="banner__section section--padding pt-0">
        <div class="container">
            <div class="row  mb--n30">
                @foreach ($promo_product as $key=>$list)


                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="banner__items position__relative">
                        <a class="banner__thumbnail display-block" href="javascript:void(0)"><img class="banner__thumbnail--img banner__max--height" width="40%" height="100px" src="{{asset('storage/media/product/'.$list->image)}}" alt="banner-img">
                            <div class="banner__content">
                                <span class="banner__content--subtitle text__secondary">{{$list->category}}</span>
                                <h2 class="banner__content--title"><span class="banner__content--title__inner">{{$list->name}}</h2>
                                <span class="banner__content--price">{{$list->price}}</span>
                              <a href="product/{{$list->slug}}">  <span class="banner__content--btn">Buy now
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor"/>
                                    </svg>
                                </span>
                            </a>
                            </div>
                            <span class="banner__badge">{{$list->discount}}% <br> off</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End banner section -->

    <!-- Start trandig product section -->
    <section class="product__section section--padding  pt-0">
        <div class="container">
            <div class="section__heading border-bottom mb-30">
                <h2 class="section__heading--maintitle">Tranding <span>Products</span></h2>
            </div>
            <div class="product__section--inner pb-15 product__swiper--activation swiper">
                <div class="swiper-wrapper">
                    @foreach ($tranding_product as $key=>$list)


                    <div class="swiper-slide">
                        <article class="product__card">
                            <div class="product__card--thumbnail">
                                <a class="product__card--thumbnail__link display-block" href="{{url('product/'.$list->slug)}}">
                                    <img class="product__card--thumbnail__img product__primary--img" src="{{asset('storage/media/product/'.$list->image)}}" alt="product-img">
                                    <img class="product__card--thumbnail__img product__secondary--img" src="{{asset('storage/media/product/'.$list->image)}}" alt="product-img">
                                </a>
                                <span class="product__badge">-{{$list->discount}}%</span>

                            </div>
                            <div class="product__card--content">

                                <h3 class="product__card--title"><a href="{{url('product/'.$list->slug)}}">{{$list->name}}
                                    Camera </a></h3>
                                <div class="product__card--price">
                                    <span class="current__price">{{$list->price}}</span>
                                    <span class="old__price"> ${{$list->mrp}}</span>
                                </div>
                                <div class="product__card--footer">
                                    <a class="product__card--btn primary__btn add_to_cart" href="javascript:void(0)" data-color-cond="0" data-product_slug="{{$list->slug}}" data-size-cond="0" data-size-id="{{$list->size_id}}" data-color-id="{{$list->color_id}}">
                                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"/>
                                        </svg>
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
                <div class="swiper__nav--btn swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
                <div class="swiper__nav--btn swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </div>
            </div>
        </div>
    </section>
    <!-- End product section -->

    <!-- Start discount banner section -->

    <!-- End discount banner section -->

    <!-- Start Populer product section -->
    <section class="product__section section--padding  pt-0">
        <div class="container">
            <div class="section__heading section__heading--flex border-bottom d-flex justify-content-between mb-30">
                <h2 class="section__heading--maintitle">Populer <span>Products</span></h2>
                <ul class="nav tab__btn--wrapper" role="tablist">
                    @php
                        $active = true;
                        $tab_active = true;
                    @endphp
                    @foreach ($category as $key=>$list)
                        @if ($active)
                        <li class="tab__btn--item" role="presentation">
                            <button class="tab__btn--link active" data-bs-toggle="tab" data-bs-target="#{{$list->category_name}}" type="button" role="tab" aria-selected="true"> {{$list->category_name}}
                            </button>
                        </li>

                        @php
                            $active = false;
                        @endphp
                        @else


                    <li class="tab__btn--item" role="presentation">
                      <button class="tab__btn--link" data-bs-toggle="tab" data-bs-target="#{{$list->category_name}}" type="button" role="tab" aria-selected="false">
                        {{$list->category_name}}</button>
                    </li>
                    @endif
                    @endforeach
                  </ul>
            </div>
            <div class="product__section--inner">
                <div class="row row-md-reverse">

                    <div class="col-lg-12">
                        <div class="tab-content" id="nav-tabContent">

                            @foreach ($product as $key=>$value)

                            @if ($tab_active)
                            @php

                                $tab_show = "show active";
                                $tab_active = false;


                            @endphp
                            @else
                            @php

                            $tab_show = "";
                        @endphp
                            @endif
                            <div id="{{$key}}" class="tab-pane fade {{$tab_show}}" role="tabpanel">
                                <div class="product__wrapper">
                                    <div class="row mb--n30">
                                        @foreach ($value as $id=>$list )


                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                            <article class="product__card">
                                                <div class="product__card--thumbnail">
                                                    <a class="product__card--thumbnail__link display-block" href="{{url('product/'.$list->slug)}}">
                                                        <img class="product__card--thumbnail__img product__primary--img" src="{{asset('storage/media/product/'.$list->image)}}" alt="product-img">
                                                        <img class="product__card--thumbnail__img product__secondary--img" src="{{asset('storage/media/product/'.$list->image)}}" alt="product-img">
                                                    </a>
                                                    <span class="product__badge">-{{$list->discount}}%</span>

                                                </div>
                                                <div class="product__card--content">

                                                    <h3 class="product__card--title"><a href="{{url('product/'.$list->slug)}}"> {{$list->name}}
                                                         </a></h3>
                                                    <div class="product__card--price">
                                                        <span class="current__price">{{$list->price}}</span>
                                                        <span class="old__price">{{$list->mrp}}</span>
                                                    </div>
                                                    <div class="product__card--footer">
                                                        <a class="product__card--btn primary__btn add_to_cart" href="javascript:void(0)" data-color-cond="0" data-product_slug="{{$list->slug}}" data-size-cond="0" data-size-id="{{$list->size_id}}" data-color-id="{{$list->color_id}}">
                                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"/>
                                                            </svg>
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product section -->

    <!-- Start product section -->

    <!-- End product section -->

    <!-- Start featured section -->
    <section class="product__section section--padding ">
        <div class="container">
            <div class="section__heading section__heading--flex border-bottom d-flex justify-content-between mb-30">
                <h2 class="section__heading--maintitle">Featured  <span>Products</span></h2>
            </div>
            <div class="product__section--inner">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <div class="product__wrapper">
                            <div class="row">
                                @foreach ($feature_product as $key=>$list )


                                <div class="col-lg-4 col-md-6 col-sm-6 col-6 custom-col mb-30">
                                    <article class="product__card">
                                        <div class="product__card--thumbnail">
                                            <a class="product__card--thumbnail__link display-block" href="{{url('product/'.$list->slug)}}">
                                                <img class="product__card--thumbnail__img product__primary--img" src="{{asset('storage/media/product/'.$list->image)}}" alt="product-img">

                                            </a>
                                            <span class="product__badge">-{{$list->discount}}%</span>

                                        </div>
                                        <div class="product__card--content">

                                            <h3 class="product__card--title"><a href="{{url('product/'.$list->slug)}}">{{$list->name}} </a></h3>
                                            <div class="product__card--price">
                                                <span class="current__price">{{$list->price}}</span>
                                                <span class="old__price"> {{$list->mrp}}</span>
                                            </div>
                                            <div class="product__card--footer">
                                                <a class="product__card--btn primary__btn add_to_cart" href="javascript:void(0)" data-color-cond="0" data-product_slug="{{$list->slug}}" data-size-cond="0" data-size-id="{{$list->size_id}}" data-color-id="{{$list->color_id}}">
                                                    <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"/>
                                                    </svg>
                                                    Add to cart
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End product section -->

    <!-- Start product section -->
    <section class="product__section small__product--section__bg section--padding ">
        <div class="container">
            <div class="row mb--n40">

                <div class="col-lg-12 col-md-12 mb-40 ">
                    <div class="small__product--step">
                        <div class="section__heading border-bottom mb-30">
                            <h2 class="section__heading--maintitle">Discount <span> Item</span></h2>
                        </div>
                        <div class="small__product--step__inner d-flex ">
                        @foreach ($discounted_product as $key=>$list )


                            <div class="small__product--card style2 d-flex mx-2 mb-25 w-25">
                                <div class="small__product--thumbnail">
                                    <a class="display-block" href="{{url('product/'.$list->slug)}}"><img src="{{asset('storage/media/product/'.$list->image)}}" alt="product-img"></a>
                                </div>
                                <div class="small__product--content">

                                    <h3 class="small__product--card__title"><a href="{{url('product/'.$list->slug)}}">{{$list->name}} </a></h3>
                                    <div class="product__card--price">
                                        <span class="current__price">{{$list->price}}</span>
                                        <span class="old__price"> {{$list->mrp}}</span>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End product section -->



</main>
@endsection
