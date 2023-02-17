<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    @include('Admin.Auth.layouts.assets.css')
</head>

<body>
@include('layouts.loader.loader')

<div class="auth-page-wrapper ">
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
    <!-- auth page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        @yield('content')
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">&copy;
                            <script>document.write(new Date().getFullYear())</script> سدودي . {{--Crafted with <i class="mdi mdi-heart text-danger"></i> by Nami--}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->
@include('Admin.Auth.layouts.assets.js')
</body>

</html>
