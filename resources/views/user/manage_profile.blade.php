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
                                <li class="breadcrumb__content--menu__items"><span>Manage Profile </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->


        <div class=" section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="main">
                            <form action="{{route('manage_profile_process')}}" method="post">
                                @csrf
                                <div>

                                    <div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-5" for="name"> Name <span
                                                            class="checkout__input--label__star" >*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="First name " id="name" type="text"
                                                        name="name" value="{{$name}}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-5" for="mobile"> Mobile No.
                                                        <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Please Enter your Mobile No." id="mobile"
                                                        type="text" name="mobile" value="{{$mobile}}" >
                                                </div>
                                            </div>


                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input4">Area, Street,
                                                        Sector,Village <span
                                                            class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Please Enter Your Area " id="area" name="area"
                                                        type="text" value="{{$area}}" >
                                                </div>
                                            </div>


                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="town">Town/City
                                                        <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="City"
                                                        id="town" name="city" type="text" value="{{$city}}" >
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="state">State <span
                                                            class="checkout__input--label__star">*</span></label>
                                                    <div class="checkout__input--select select">
                                                        <select class="checkout__input--select__field border-radius-5"
                                                            id="state" name="state">
                                                            <option value="assam">Assam</option>
                                                            <option value="bangal">Bangal</option>
                                                            <option value="chhattisgarh">Chhattisgarh</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="pin">Postal Code
                                                        <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Pin code" id="pin" name="pin"
                                                        type="text" value="{{$pin}}" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <button type="submit" class="primary__btn w-100"> Update </button>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @endsection

 @push('custom-scripts')



 @endpush
