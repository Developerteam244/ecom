<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin_assets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    {{-- dropify css --}}
    <link href="{{ asset('admin_assets/css/dropify.min.css') }}" rel="stylesheet" media="all">



    <!-- Main CSS-->
    <link href="{{ asset('admin_assets/css/theme.css') }}" rel="stylesheet" media="all">

</head>


<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo.png" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"> <i class="fa fa-bars"></i></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a  href="{{url('admin/dashboard')}}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/category')}}">
                            <i class="fas fa-tachometer-alt"></i>Category</a>

                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="images/icon/logo.png" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="has-sub">
                        <a  href="{{url('admin/dashboard')}}" class="@yield('dashboard_select')">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/category')}}" class="@yield('category_select')">
                            <i class="fas fa-list"></i>Category</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/coupon')}}" class="@yield('coupon_select')">
                            <i class="fas fa-tag"></i>Coupon</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/size')}}" class="@yield('size_select')">
                            <img src="{{asset('admin_assets/icon/size.svg')}}" width="15px" alt=""> Size</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/color')}}" class="@yield('size_select')">
                            <img src="{{asset('admin_assets/icon/color.svg')}}" width="15px" alt=""> Color</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/product')}}" class="@yield('product_select')">
                            <img src="{{asset('admin_assets/icon/product.svg')}}" width="20px" alt=""> Product</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/brand')}}" class="@yield('brand_select')">
                            <img src="{{asset('admin_assets/icon/brand.svg')}}" alt="" > Brand</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/tex')}}" class="@yield('tex_select')">
                            <img src="{{asset('admin_assets/icon/tax.svg')}}" width="20px" alt=""> Tex</a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/customer')}}" class="@yield('customer_select')">
                            <img src="{{asset('admin_assets/icon/customer.svg')}}" width="15px" alt="">Customer </a>

                    </li>
                    <li class="has-sub">
                        <a  href="{{url('admin/banner')}}" class="@yield('customer_select')">
                            <img src="{{asset('admin_assets/icon/banner.svg')}}" width="20px" alt=""> Banner </a>

                    </li>

                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">

                        <div class="header-button">

                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">

                                    <div class="content">
                                        <a class="js-acc-btn" href="#">Welcome Admin</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">

                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>


                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="{{url('admin/logout')}}">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @yield('container')

                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTAINER-->

</div>



<!-- Jquery JS-->
<script src="{{ asset('admin_assets/vendor/jquery-3.2.1.min.js ') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('admin_assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('admin_assets/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/select2/select2.min.js') }}"></script>

{{-- dropify js --}}
<script src="{{ asset('admin_assets/js/dropify.min.js') }}"></script>

<!-- Main JS-->
<script src="{{ asset('admin_assets/js/main.js') }}"></script>
<script src="{{ asset('admin_assets/js/script.js') }}"></script>

</body>

</html>
<!-- end document-->
