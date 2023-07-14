 <!-- Start header area -->
 @extends('front.layout')
 @section('content')
     @php
         $size_id = 0;
         $color_id = 0;
     @endphp

     <div>@csrf</div>
     <main class="main__content_wrapper">

         <!-- Start breadcrumb section -->
         <section class="breadcrumb__section breadcrumb__bg">
             <div class="container">
                 <div class="row row-cols-1">
                     <div class="col">
                         <div class="breadcrumb__content text-center">
                             <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                 <li class="breadcrumb__content--menu__items"><a href="{{ url('/') }}">Home</a></li>
                                 <li class="breadcrumb__content--menu__items"><span>Product</span></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- End breadcrumb section -->

         <!-- Start product details section -->
         <section class="product__details--section section--padding">
             <div class="container">
                 <div class="row row-cols-lg-2 row-cols-md-2">
                     <div class="col">
                         <div class="product__details--media">
                             <div class="single__product--preview  swiper mb-25">
                                 <div class="swiper-wrapper product_preview">
                                     <div class="swiper-slide" id="product_preview">
                                         <div class="product__media--preview__items">
                                             <a class="product__media--preview__items--link glightbox"
                                                 data-gallery="product-media-preview"
                                                 href="{{ asset('storage/media/product/' . $product->image) }}"><img
                                                     class="product__media--preview__items--img"
                                                     src="{{ asset('storage/media/product/' . $product->image) }}"></a>
                                             <div class="product__media--view__icon">
                                                 <a class="product__media--view__icon--link glightbox"
                                                     href="{{ asset('storage/media/product/' . $product->image) }}"
                                                     data-gallery="product-media-preview">
                                                     <svg class="product__items--action__btn--svg"
                                                         xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                         viewBox="0 0 512 512">
                                                         <path
                                                             d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                             fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                             stroke-width="32"></path>
                                                         <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                             stroke-miterlimit="10" stroke-width="32"
                                                             d="M338.29 338.29L448 448"></path>
                                                     </svg>
                                                     <span class="visually-hidden">product view</span>
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                     @foreach ($product_image as $list)
                                         <div class="swiper-slide">
                                             <div class="product__media--preview__items">
                                                 <a class="product__media--preview__items--link glightbox"
                                                     data-gallery="product-media-preview"
                                                     href="{{ asset('storage/media/product_img/' . $list->image) }}"><img
                                                         class="product__media--preview__items--img"
                                                         src="{{ asset('storage/media/product_img/' . $list->image) }}"></a>
                                                 <div class="product__media--view__icon">
                                                     <a class="product__media--view__icon--link glightbox"
                                                         href="{{ asset('storage/media/product_img/' . $list->image) }}"
                                                         data-gallery="product-media-preview">
                                                         <svg class="product__items--action__btn--svg"
                                                             xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                             height="22.443" viewBox="0 0 512 512">
                                                             <path
                                                                 d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                 fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                                 stroke-width="32"></path>
                                                             <path fill="none" stroke="currentColor"
                                                                 stroke-linecap="round" stroke-miterlimit="10"
                                                                 stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                         </svg>
                                                         <span class="visually-hidden">product view</span>
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                             <div class="single__product--nav swiper">
                                 <div class="swiper-wrapper">
                                     <div class="swiper-slide slide_page">
                                         <div class="product__media--nav__items">
                                             <img class="product__media--nav__items--img"
                                                 src="{{ asset('storage/media/product/' . $product->image) }}"
                                                 alt="product-nav-img">
                                         </div>
                                     </div>
                                     @foreach ($product_image as $list)
                                         <div class="swiper-slide slide_page">
                                             <div class="product__media--nav__items">
                                                 <img class="product__media--nav__items--img"
                                                     src="{{ asset('storage/media/product_img/' . $list->image) }}"
                                                     alt="product-nav-img">
                                             </div>
                                         </div>
                                     @endforeach

                                 </div>
                                 <div class="swiper__nav--btn swiper-button-next">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right">
                                         <polyline points="9 18 15 12 9 6"></polyline>
                                     </svg>
                                 </div>
                                 <div class="swiper__nav--btn swiper-button-prev">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left">
                                         <polyline points="15 18 9 12 15 6"></polyline>
                                     </svg>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="product__details--info">
                             <form action="#">
                                 <h2 class="product__details--info__title mb-15">{{ $product->name }}
                                 </h2>
                                 <div class="product__details--info__price mb-12">
                                     <span class="current__price">$58.00</span>
                                     <span class="old__price">$68.00</span>
                                 </div>

                                 <p class="product__details--info__desc mb-15">{!! $product->short_desc !!}</p>
                                 <div class="product__variant">
                                    @if (!empty($product_color))
                                    @php
                                    $color_id = 1;
                                    @endphp
                                    <div class="product__variant--list mb-10">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-8">Color :</legend>
                                            <div class="variant__color d-flex">
                                                @foreach ($product_color as $list)
                                                         @if ($list != '')
                                                         <div class="variant__color--list product_color"
                                                         data-size="{{ $list['size'] }}"
                                                         data-product-image="{{ $list['image'] }}"
                                                         data-color="{{ $list['color'] }}">
                                                         <input id="{{ $list['color'] }}" name="color" type="radio">
                                                         <label class="variant__color--value red "
                                                             for="{{ $list['color'] }}" title="{{ $list['color'] }}">
                                                     </div>
                                                @endif
                                                @endforeach


                                            </div>
                                        </fieldset>
                                    </div>
                                    @endif
                                     @if (!empty($product_size))
                                         <div class="product__variant--list mb-20">
                                             <fieldset class="variant__input--fieldset">
                                                 <legend class="product__variant--title mb-8">Size :</legend>
                                                 <ul class="variant__size d-flex">

                                                     @php
                                                         $size_id = 1;
                                                     @endphp
                                                     @foreach ($product_size as $list)
                                                         <li class="variant__size--list product_size_item"
                                                             data-size="{{ $list['size'] }}">
                                                             <input id="{{ $list['size'] }}" name="size"
                                                                 type="radio">
                                                             <label class="variant__size--value red"
                                                                 for="{{ $list['size'] }}">{{ $list['size'] }}</label>
                                                         </li>
                                                     @endforeach

                                                 </ul>
                                             </fieldset>
                                         </div>
                                     @endif
                                     <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                         <div class="quantity__box">
                                             <button type="button"
                                                 class="quantity__value quickview__value--quantity decrease"
                                                 aria-label="quantity value" value="Decrease Value">-</button>
                                             <label>
                                                 <input type="number" class="quantity__number quickview__value--number"
                                                     value="1" id="qty" data-counter />
                                             </label>
                                             <button type="button"
                                                 class="quantity__value quickview__value--quantity increase"
                                                 aria-label="quantity value" value="Increase Value">+</button>
                                         </div>
                                         <button class="primary__btn quickview__cart--btn add_to_cart" id="add_to_cart"
                                             type="button" data-color-cond="{{ $color_id }}"
                                             data-product_slug="{{ $product->slug }}"
                                             data-size-cond="{{ $size_id }}">Add To Cart</button>

                                     </div>
                                     <div id="cart_response"> </div>
                                     <div class="product__variant--list mb-15">
                                         <a class="variant__wishlist--icon mb-15" href="wishlist.html"
                                             title="Add to wishlist">
                                             <svg class="quickview__variant--wishlist__svg"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                 <path
                                                     d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                     fill="none" stroke="currentColor" stroke-linecap="round"
                                                     stroke-linejoin="round" stroke-width="32" />
                                             </svg>
                                             Add to Wishlist
                                         </a>
                                         <button class="variant__buy--now__btn primary__btn" type="button"
                                             id="buy_now" data-product-slug="{{ $product->slug }}"
                                             data-color-cond="{{ $color_id }}"
                                             data-size-cond="{{ $size_id }}">Buy it now</button>
                                </div>




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product details section -->

    <!-- Start product details tab section -->
    <section class="product__details--tab__section
                                             section--padding">
                                             <div class="container">
                                                 <div class="row row-cols-1">
                                                     <div class="col">
                                                         <ul class="product__tab--one product__details--tab d-flex mb-30">
                                                             <li class="product__details--tab__list active"
                                                                 data-toggle="tab" data-target="#description">Description
                                                             </li>
                                                             <li class="product__details--tab__list" data-toggle="tab"
                                                                 data-target="#technical_specification">Technical
                                                                 Specification </li>
                                                             <li class="product__details--tab__list" data-toggle="tab"
                                                                 data-target="#uses">Uses</li>
                                                             <li class="product__details--tab__list" data-toggle="tab"
                                                                 data-target="#warranty">Warranty</li>
                                                         </ul>
                                                         <div class="product__details--tab__inner border-radius-10">
                                                             <div class="tab_content">
                                                                 <div id="description" class="tab_pane active show">
                                                                     <div class="product__tab--content">
                                                                         {!! $product->desc !!}
                                                                     </div>
                                                                 </div>
                                                                 <div id="technical_specification"
                                                                     class="tab_pane active">
                                                                     <div class="product__tab--content">
                                                                         {!! $product->technical_specification !!}
                                                                     </div>
                                                                 </div>
                                                                 <div id="uses" class="tab_pane active ">
                                                                     <div class="product__tab--content">
                                                                         {!! $product->uses !!}
                                                                     </div>
                                                                 </div>
                                                                 <div id="warranty" class="tab_pane active">
                                                                     <div class="product__tab--content">
                                                                         {!! $product->warranty !!}
                                                                     </div>
                                                                 </div>



                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
         </section>
         <!-- End product details tab section -->

         <!-- Start product section -->
         <section class="product__section section--padding ">
             <div class="container">
                 <div class="section__heading border-bottom mb-30">
                     <h2 class="section__heading--maintitle">You <span>may also like</span></h2>
                 </div>
                 <div class="product__section--inner pb-15 product__swiper--activation swiper">
                     <div class="swiper-wrapper">

                         @foreach ($related_product as $key => $list)
                             <div class="swiper-slide">
                                 <article class="product__card">
                                     <div class="product__card--thumbnail">
                                         <a class="product__card--thumbnail__link display-block"
                                             href="{{ url('product/' . $list->slug) }}">
                                             <img class="product__card--thumbnail__img product__primary--img"
                                                 src="{{ asset('storage/media/product/' . $list->image) }}"
                                                 alt="product-img">

                                         </a>
                                         <span class="product__badge">-{{ $list->discount }}%</span>

                                     </div>
                                     <div class="product__card--content">

                                         <h3 class="product__card--title"><a
                                                 href="{{ $list->slug }}">{{ $list->name }}
                                                 Camera </a></h3>
                                         <div class="product__card--price">
                                             <span class="current__price">{{ $list->price }}</span>
                                             <span class="old__price"> {{ $list->mrp }}</span>
                                         </div>
                                         <div class="product__card--footer add_to_cart" data-color-cond="0"
                                             data-product_slug="{{ $list->slug }}" data-size-cond="0"
                                             data-size="{{ $list->size }}" data-color="{{ $list->color }}">
                                             <a class="product__card--btn primary__btn" href="javascript:void(0)">
                                                 <svg width="14" height="11" viewBox="0 0 14 11" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                     <path
                                                         d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z"
                                                         fill="currentColor" />
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
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class=" -chevron-right">
                             <polyline points="9 18 15 12 9 6"></polyline>
                         </svg>
                     </div>
                     <div class="swiper__nav--btn swiper-button-prev">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class=" -chevron-left">
                             <polyline points="15 18 9 12 15 6"></polyline>
                         </svg>
                     </div>
                 </div>
             </div>
         </section>
         <!-- End product section -->
         <div id="para"> @csrf</div>

     </main>
 @endsection

 @push('custom-script')
     <script type="module" src="{{asset('front/js/custom/product.js')}}"></script>
 @endpush
