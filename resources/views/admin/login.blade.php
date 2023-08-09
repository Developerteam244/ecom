<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Admin Login </title>

    <meta name="robots" content="noindex, nofollow">



    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('admin_assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('admin_assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin_assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{asset('admin_assets/css/dashmix.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{asset('admin_assets/css/themes/xwork.min.css')}}"> -->
    <!-- END Stylesheets -->
    <link rel="stylesheet" href="{{ asset('admin_assets\js\plugins\sweetalert2\sweetalert2.css') }}">
  </head>

  <body>

    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('{{asset("admin_assets/media/photos/photo22@2x.jpg")}}');">
          <div class="row g-0 bg-primary-op">
            <!-- Main Section -->
            <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
              <div class="p-3 w-100">
                <!-- Header -->
                <div class="mb-3 text-center">
                  <a class="link-fx fw-bold fs-1" href="index.html">
                    <span class="text-dark">{{Config::get('constant.site_name')}}</span>
                  </a>
                  <p class="text-uppercase fw-bold fs-sm text-muted">Log In</p>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <div class="row g-0 justify-content-center">
                  <div class="col-sm-8 col-xl-6">
                    <form class="js-validation-signin" action="{{route('admin.auth')}}" method="POST">
                      <div class="py-3">
                        @csrf
                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="email" placeholder="Username">
                        </div>
                        <div class="mb-4">
                          <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="password" placeholder="Password">
                        </div>
                        {{session('error')}}
                      </div>
                      <div class="mb-4">
                        <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                          <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Sign In
                        </button>
                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                          <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="op_auth_reminder.html">
                            <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> Forgot password
                          </a>

                        </p>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- END Sign In Form -->
              </div>
            </div>
            <!-- END Main Section -->

            <!-- Meta Info Section -->
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
              <div class="p-3">
                <p class="display-4 fw-bold text-white mb-3">
                  Welcome to the future
                </p>
                <p class="fs-lg fw-semibold text-white-75 mb-0">
                  Copyright &copy; <span data-toggle="year-copy"></span>
                </p>
              </div>
            </div>
            <!-- END Meta Info Section -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{asset('admin_assets/js/dashmix.app.min.js')}}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{asset('admin_assets/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('admin_assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('admin_assets/js/pages/op_auth_signin.min.js')}}"></script>
    <script src="{{ asset('admin_assets\js\plugins\sweetalert2\sweetalert2.js') }}"></script>
    <script>
        $(document).ready(function() {


            // sweet alert on update or insert

            @if (session()->has('error'))
                Swal.fire({
                    icon: 'error', // You can change the icon as desired (success, error, warning, info, etc.)
                    title: "{{session('error')}}",
                    timer: 2000, // Duration in milliseconds
                    showConfirmButton: false,
                });
            @endif




        });
    </script>
  </body>
</html>
