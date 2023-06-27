
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Website Anti Narkoba" name="description" />
        <meta content="ReanID" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/borex/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/borex/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/borex/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-dark">
        <section class="authentication-bg min-vh-100 py-5 py-lg-0">
            <div class="bg-overlay bg-dark"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mb-5">
                                        @yield('content')
                                        <div class="mt-5 text-center">
                                            <a class="btn btn-primary waves-effect waves-dark px-3 py-1" href="{{ route('dashboard') }}">Back to Dashboard</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row justify-content-center">
                                <div class="col-md-8 col-xl-7">
                                    <div class="mt-2">
                                        <img src="{{ asset('assets/borex/images/error-img.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/borex/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/borex/libs/metismenujs/metismenujs.min.js') }}"></script>
        <script src="{{ asset('assets/borex/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/borex/libs/eva-icons/eva.min.js') }}"></script>

    </body>
</html>
