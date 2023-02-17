<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('frontend.index')}}" class="logo logo-dark">
            <span class="logo-sm">
{{--                <img src="{{get_file($settings->fave_icon)}}" alt="">--}}
            </span>
            <span class="logo-lg">
{{--                <img src="{{get_file($settings->logo_header)}}" alt="">--}}
            </span>
        </a>
        <!-- Light Logo-->
        <a href="" class="logo logo-light">
            <span class="logo-sm">
{{--                <img src="{{get_file($settings->fave_icon)}}" alt="">--}}
            </span>
            <span class="logo-lg">
{{--                <img src="{{get_file($settings->logo_header)}}" alt="">--}}
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="fa-light fa-circle"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.index')}}">
                        <i class="fal fa-gauge"></i>
                        <span>الرئيسية</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('languages.index')}}">
                        <i class="fal fa-language"></i>
                        <span>اللغات</span>
                    </a>
                </li>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
