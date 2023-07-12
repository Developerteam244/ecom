@extends('front.layout')
 @section('content')
 <main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">Product</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Category</span></li>
                            <li class="breadcrumb__content--menu__items"><span data-page="{{$category_slug}}">{{$category_name}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <div class="offcanvas__filter--sidebar widget__area">
        <button type="button" class="offcanvas__filter--close" data-offcanvas>
            <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg> <span class="offcanvas__filter--close__text">Close</span>
        </button>
        <div class="offcanvas__filter--sidebar__inner">
            <div class="single__widget widget__bg">
                <h2 class="widget__title h3">Size</h2>
                <ul class="widget__tagcloud side_filter_size">
                    @foreach ($sizes  as $list)

                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link radio_btn" data-value="{{$list}}" data-type="size" >{{$list}}
                    </a></li>

                    @endforeach
                </ul>
            </div>

            <div class="single__widget price__filter widget__bg">
                <h2 class="widget__title h3">Filter By Price</h2>
                <form class="price__filter--form" action="#">
                    <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-GTE">From</label>
                            <div class="price__filter--input">

                                <input class="price__filter--input__field border-0 min_price" name="filter.v.price.gte" id="Filter-Price-GTE" type="number" placeholder="{{$min_price}}" >
                            </div>
                        </div>
                        <div class="price__divider">
                            <span>-</span>
                        </div>
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-LTE">To</label>
                            <div class="price__filter--input">

                                <input class="price__filter--input__field border-0 max_price" name="filter.v.price.lte" id="Filter-Price-LTE" type="number"  min="{{$min_price}}" max="{{$max_price}}" placeholder="{{$max_price}}" >
                            </div>
                        </div>
                    </div>
                    <button class="primary__btn price__filter--btn" type="button">Filter</button>
                </form>
            </div>

            <div class="single__widget widget__bg">
                <h2 class="widget__title h3">Color</h2>
                <ul class="widget__tagcloud side_filter_color">
                    @foreach ($colors  as $list )

                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link radio_btn" data-value="{{$list}}" data-type="color"> {{$list}}
                    </a></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

    <!-- Start shop section -->
    <div class="shop__section section--padding">
        <div class="container">
            <div class="row">
                {{--  filter side baar --}}
                <div class="col-xl-3 col-lg-4 shop-col-width-lg-4">
                    <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Size</h2>
                            <ul class="widget__tagcloud side_filter_size">
                                @foreach ($sizes as $list)

                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link radio_btn" data-value="{{$list}}" data-type="size"> {{$list}}
                                </a></li>
                                @endforeach


                            </ul>
                        </div>

                        <div class="single__widget price__filter widget__bg">
                            <h2 class="widget__title h3">Filter By Price</h2>
                            <form class="price__filter--form" action="#">
                                <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                    <div class="price__filter--group">
                                        <label class="price__filter--label" for="Filter-Price-GTE2">From</label>
                                        <div class="price__filter--input border-radius-5 d-flex align-items-center">

                                            <input class="price__filter--input__field border-0 min_price" name="filter.v.price.gte" id="Filter-Price-GTE2" type="number" placeholder="{{$min_price}}" min="{{$min_price}}" max="{{$max_price}}">
                                        </div>
                                    </div>
                                    <div class="price__divider">
                                        <span>-</span>
                                    </div>
                                    <div class="price__filter--group">
                                        <label class="price__filter--label" for="Filter-Price-LTE2">To</label>
                                        <div class="price__filter--input border-radius-5 d-flex align-items-center">

                                            <input class="price__filter--input__field border-0 max_price" name="filter.v.price.lte" id="Filter-Price-LTE2" type="number" placeholder="{{$max_price}}"min="{{$min_price}}" max="{{$max_price}}">
                                        </div>
                                    </div>
                                </div>
                                <button class="primary__btn price__filter--btn" type="button">Filter</button>
                            </form>
                        </div>


                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Color</h2>
                            <ul class="widget__tagcloud side_filter_color">
                                @foreach ($colors  as $list)

                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link radio_btn" data-value="{{$list}}" data-type="color"> {{$list}}
                                </a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                {{-- // fitler end side baar --}}
                <div class="col-xl-9 col-lg-8 shop-col-width-lg-8">
                    <div class="shop__right--sidebar">
                        <!-- Start categories section -->

                        <!-- End categories section -->
                        <div class="shop__product--wrapper">
                            <div class="shop__header d-flex align-items-center justify-content-between mb-30">
                                <div class="product__view--mode d-flex align-items-center">
                                    <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas>
                                        <svg  class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/><circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/></svg>
                                        <span class="widget__filter--btn__text">Filter</span>
                                    </button>
                                    <div class="product__view--mode__list product__short--by align-items-center d-flex ">
                                        <label class="product__view--label">Prev Page :</label>
                                        <div class="select shop__header--select">
                                            <select class="product__view--select" name="num_count">
                                                @php
                                                    $view_num_item = [10,25,50,100];
                                                @endphp
                                                @forelse ($view_num_item as $item)
                                                @if ($item<=$count)

                                                <option  value="{{$item}}">{{$item}} </option>
                                                @else
                                                <option  value="{{$count}}"> {{$count}}</option>
                                                @break

                                                @endif
                                                @empty
                                                <option  value="{{$count}}"> {{$count}}</option>


                                                @endforelse
                                                <option  value="1">1</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="product__view--mode__list product__short--by align-items-center d-flex">
                                        <label class="product__view--label">Sort By :</label>
                                        <div class="select shop__header--select">
                                            <select class="product__view--select" name="sort_by">
                                                <option value="name" >Name</option>
                                                <option value="price" >Price</option>
                                                <option value="date" >Date</option>


                                            </select>
                                        </div>

                                    </div>
                                    <div class="product__view--mode__list product__short--by align-items-center d-flex">
                                        <label class="product__view--label">Sort Order :</label>
                                        <div class="select shop__header--select">
                                            <select class="product__view--select" name="sort_type">
                                                <option value="asc" >Ascending</option>
                                                <option value="desc" >Descending</option>



                                            </select>
                                        </div>

                                    </div>
                                    <div class="product__view--mode__list product__short--by align-items-center d-flex">
                                        <button class="btn btn-danger px-3 py-2" id="top_filter_btn">Apply</button>

                                    </div>
                                    <div class="product__view--mode__list">
                                        <div class="product__tab--one product__grid--column__buttons d-flex justify-content-center">
                                            <button class="product__grid--column__buttons--icons active" aria-label="grid btn" data-toggle="tab" data-target="#product_grid">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                                    <g  transform="translate(-1360 -479)">
                                                      <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor"/>
                                                      <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor"/>
                                                      <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor"/>
                                                      <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                            </button>
                                            <button class="product__grid--column__buttons--icons" aria-label="list btn" data-toggle="tab" data-target="#product_list">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 13 8">
                                                    <g id="Group_14700" data-name="Group 14700" transform="translate(-1376 -478)">
                                                      <g  transform="translate(12 -2)">
                                                        <g id="Group_1326" data-name="Group 1326">
                                                          <rect id="Rectangle_5729" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"/>
                                                          <rect id="Rectangle_5730" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"/>
                                                        </g>
                                                        <g id="Group_1328" data-name="Group 1328" transform="translate(0 -3)">
                                                          <rect id="Rectangle_5729-2" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"/>
                                                          <rect id="Rectangle_5730-2" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"/>
                                                        </g>
                                                        <g id="Group_1327" data-name="Group 1327" transform="translate(0 -1)">
                                                          <rect id="Rectangle_5731" data-name="Rectangle 5731" width="3" height="2" transform="translate(1364 487)" fill="currentColor"/>
                                                          <rect id="Rectangle_5732" data-name="Rectangle 5732" width="9" height="2" transform="translate(1368 487)" fill="currentColor"/>
                                                        </g>
                                                      </g>
                                                    </g>
                                                  </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <p class="product__showing--count show_num_count">Showing 1–9 of 21 results</p>
                            </div>
                            <div class="tab_content">
                                <div id="product_grid" class="tab_pane active show">
                                    <div class="product__section--inner">
                                        <div class="row mb--n30">
                                            @foreach ($products  as $list)
                                            @php
                                                $price = $list->price;
                                                $mrp = $list->mrp;
                                                $discount = 100-($price/$mrp)*100;
                                                $discount = round($discount);
                                            @endphp
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                                <article class="product__card">
                                                    <div class="product__card--thumbnail">
                                                        <a class="product__card--thumbnail__link display-block" href="{{url('product/'.$list->slug)}}">
                                                            <img class="product__card--thumbnail__img product__primary--img" src="{{asset('storage/media/product/'.$list->image)}}" alt="product-img">

                                                        </a>
                                                        <span class="product__badge">-{{$discount}}%</span>

                                                    </div>
                                                    <div class="product__card--content">

                                                        <h3 class="product__card--title"><a href="{{url('product/'.$list->slug)}}"> {{$list->name}} </a></h3>
                                                        <div class="product__card--price">
                                                            <span class="current__price">Rs. {{$list->price}}</span>
                                                            <span class="old__price"> Rs. {{$list->mrp}}</span>
                                                        </div>
                                                        <div class="product__card--footer add_to_cart"  data-color-cond="0" data-product_slug="{{$list->slug}}" data-size-cond="0" data-size="{{$list->size}}" data-color="{{$list->color}}">
                                                            <a class="product__card--btn primary__btn" href="javascript:void(0)">
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
                                <div id="product_list" class="tab_pane">
                                    <div class="product__section--inner product__section--style3__inner">
                                        <div class="row row-cols-1 mb--n30">
                                            @foreach ($products  as $list)
                                                @php
                                                    $price = $list->price;
                                                    $mrp = $list->mrp;
                                                    $discount = 100-($price/$mrp)*100;
                                                    $discount = round($discount);
                                                @endphp

                                            <div class="col mb-30">
                                                <div class="product__card product__list d-flex align-items-center">
                                                    <div class="product__card--thumbnail product__list--thumbnail">
                                                        <a class="product__card--thumbnail__link display-block" href="{{url('product/'.$list->slug)}}">
                                                            <img class="product__card--thumbnail__img product__primary--img" src="{{asset('storage/media/product/'.$list->image)}}" alt="product-img">

                                                        </a>
                                                        <span class="product__badge">-{{$discount}}%</span>

                                                    </div>
                                                    <div class="product__card--content product__list--content">
                                                        <h3 class="product__card--title"><a href="{{url('product/'.$list->slug)}}"> {{$list->name}} </a></h3>

                                                        <div class="product__list--price">
                                                            <span class="current__price">Rs. {{$list->price}}</span>
                                                            <span class="old__price"> Rs.{{$list->mrp}}</span>
                                                        </div>
                                                        <p class="product__card--content__desc mb-20">
                                                         {!!$list->short_desc!!}

                                                        </p>
                                                        <a class="product__card--btn primary__btn add_to_cart" href="javascript:void(0)" data-product_slug="{{$list->slug}}" data-size-cond="0" data-size="{{$list->size}}" data-color="{{$list->color}}">+ Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination__area">

                                <nav class="pagination justify-content-center">
                                    <ul class="pagination__wrapper d-flex align-items-center justify-content-center" id="pagination_list">
                                        @if ($products->currentPage()>1)

                                        <li class="pagination__list">
                                            <a href="{{$products->previousPageUrl()}}" class="pagination__item--arrow  link " id="prev_page" data-page-type="prev" data-page-no="{{$products->currentPage()-1}}">
                                                <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg>
                                                <span class="visually-hidden">page left arrow {{$products->currentPage()}}</span>
                                            </a>
                                        </li>
                                            @endif
                                            @php
                                                $total_page = 3;
                                            @endphp
                                            @for ($i=$products->currentPage();$i<=$products->lastPage()&& $i<$total_page+$products->currentPage(); $i++)
                                           @if ($i==$products->currentPage())

                                           <li class="pagination__list"><span class="pagination__item pagination__item--current" data-page-type="page" data-page-no="{{$products->currentPage()}}">{{$products->currentPage()}}</span></li>
                                           @else
                                           @if ($products->lastPage()>$total_page)

                                                @if ($i==$products->currentPage()+$total_page-1)
                                                <li class="pagination__list">...</li>
                                                <li class="pagination__list"><a  class="pagination__item link" data-page-type="page" data-page-no="{{$products->lastPage()}}">{{$products->lastPage()}}</a></li>

                                                @break

                                                @endif
                                           <li class="pagination__list"><a href="{{$products->url($i)}}" class="pagination__item link"  data-page-type="page" data-page-no="{{$i}}">{{$i}}</a></li>

                                           @else

                                           <li class="pagination__list"><a href="{{$products->url($i)}}" class="pagination__item link" data-page-type="page" data-page-no="{{$i}}">{{$i}}</a></li>
                                           @endif



                                           @endif
                                            @endfor


                                                @if ($products->currentPage()<$products->lastPage())
                                                <li class="pagination__list">
                                                    <a  class="pagination__item--arrow  link " id="next_page" data-page-type="next" data-page-no="{{$products->currentPage()+1}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg>
                                                        <span class="visually-hidden">page right arrow</span>
                                                    </a>
                                                    <li>
                                                        @endif
                                                    </ul>
                                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End shop section -->



</main>


 @endsection

 @push('custom-script')


 <script type="module">
    import {page} from "{{asset('front/js/custom/filter.js')}}";
        page.page="category";
      page.filter= document.querySelector("[data-page]").getAttribute('data-page');;






     </script>
     <script type="module" src="{{asset('front/js/custom/filter.js')}}"></script>

 @endpush
