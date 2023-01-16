
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>LaraEcomm Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset("panel/assets/images/favicon.ico")}}">
        <script src="{{asset('panel/assets/libs/toastr/build/toastr.min.js')}}"></script>
        <!-- Bootstrap Css -->
        <link href="{{asset('panel/assets/libs/toastr/build/toastr.min.css')}}"  rel="stylesheet" type="text/css" />
        <link href="{{asset("panel/assets/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset("panel/assets/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset("panel/assets/css/app.min.css")}}" id="app-style" rel="stylesheet" type="text/css" />
@livewireStyles
    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            {{--Top NavBar --}}
            @include('layouts.inc.admin.navbar')
           {{--Top NavBar --}}

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.inc.admin.sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">@yield('page_name','Ecommerce Dashboard')</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                            <li class="breadcrumb-item active">Starter page</li>
                                        </ol>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div>
                            @if (session()->has('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{session('status')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{session('message')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif


                            @yield('content')
                        </div>
                    </div>
                     <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Upcube.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('panel/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('panel/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('panel/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('panel/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('panel/assets/libs/node-waves/waves.min.js')}}"></script>


        <script src="{{asset('panel/assets/js/app.js')}}"></script>




        @livewireScripts
        @stack('script')
    </body>

</html>
