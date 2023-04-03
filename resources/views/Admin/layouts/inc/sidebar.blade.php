<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('frontend.index')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{get_file($settings->header_logo)}}" alt="">
            </span>
            <span class="logo-lg">
                <img src="{{get_file($settings->header_logo)}}" alt="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{get_file($settings->header_logo)}}" alt="">
            </span>
            <span class="logo-lg">
                <img src="{{get_file($settings->header_logo)}}" alt="">
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
                    <a class="nav-link menu-link" href="{{route('admins.index')}}">
                        <i class="fa fa-user-secret"></i>
                        <span>المشرفين</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('settings.index')}}">
                        <i class="fa fa-cog"></i>
                        <span>الاعدادات</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('branches.index')}}">
                        <i class="fas fa-code-branch"></i>
                        <span>الفروع</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('employees.index')}}">
                        <i class="fa fa-user"></i>
                        <span>الموظفين</span>
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
