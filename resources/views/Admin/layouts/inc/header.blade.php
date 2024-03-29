<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="" class="logo logo-dark">
                        <span class="logo-sm">
                            <img class="logo_basic" src="{{get_file($settings->logo_header)}}" alt=""
                                 style="height: 50px ; object-fit: contain ; padding: 5px">
                        </span>
                        <span class="logo-lg">
                            <img class="logo_basic" src="{{get_file($settings->logo_header)}}" alt=""
                                 style="height: 50px ; object-fit: contain ; padding: 5px">
                        </span>
                    </a>
                    <a href="" class="logo logo-light">
                        <span class="logo-sm">
                            <img class="logo_basic" src="{{get_file($settings->logo_header)}}" alt=""
                                 style="height: 50px ; object-fit: contain ; padding: 5px">
                        </span>
                        <span class="logo-lg">
                            <img class="logo_basic" src="{{get_file($settings->logo_header)}}" alt=""
                                 style="height: 50px ; object-fit: contain ; padding: 5px">
                        </span>
                    </a>

                </div>
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <!-- App Search-->

            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="fa-light fa-magnifying-glass fs-18"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                           aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="fa-light fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            data-toggle="fullscreen">
                        <i class="fa-regular fa-expand fs-20"></i>
                    </button>
                </div>
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                            class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class="fa-light fa-moon fs-20"></i>
                    </button>
                </div>


                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                 src="{{get_file(auth()->guard('admin')->user()->image)}}"
                                 alt="">
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{auth()->guard('admin')->user()->name}}</span>
                                <span
{{--                                    class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{auth()->guard('admin')->user()->business_name}}</span>--}}
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{auth()->guard('admin')->user()->name}}!</h6>
                        <a class="dropdown-item editProfile" href=""><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle "> حسابي </span></a>

                        {{--                            <a class="dropdown-item" href="{{route('settings.index')}}">--}}
                        {{--                                <i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>--}}
                        {{--                                <span class="align-middle">الاعدادات</span></a>--}}

                        <a class="dropdown-item" href="{{route('admin.logout')}}"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">تسجيل الخروج</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
