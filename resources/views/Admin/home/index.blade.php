@extends('Admin.layouts.inc.app')
@section('title')
    الرئيسية
@endsection
@section('css')
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                        <span
                            class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                            <i data-feather="users" class="text-primary"></i>
                        </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">

                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> مجموع الصور ف البانرالمتحرك </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                            data-target="100">0</span>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span
                                class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i class="bx bx-user-pin text-warning"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">

                                <p class="text-uppercase fw-medium text-muted mb-3"> مجموع    القيم والمبادء </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                            data-target="100">0</span>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->


        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                        <span
                            class="avatar-title bg-soft-success text-success rounded-2 fs-2">
                            <i class=" ri-file-list-3-line text-success"></i>
                        </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">

                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">      مجموع انواع المشاريع </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                            data-target="100">0</span>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span
                                class="avatar-title bg-soft-secondary text-secondary rounded-2 fs-2">
                                <i class=" ri-file-list-line text-secondary"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">

                                <p class="text-uppercase fw-medium text-muted mb-3">  مجموع مواقع المشاريع </p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                            data-target="100">0</span>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->
        <div class="col-lg-4 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-dark text-dark rounded-2 fs-2">
                                                        <i class=" las la-clipboard-list text-dark"></i>
                                                    </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden ms-3">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> مجموع    صور المشاريع
                                 </p>
                            <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                                        data-target="100">0</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><!-- end col -->



    </div><!-- end row -->



@endsection


@section('js')

@endsection
