@extends('Admin.Auth.layouts.inc.app')
@section('title')
    تسجيل الدخول
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="p-lg-5 p-4 auth-one-bg h-100" style="    background-image: url('{{asset('assets/frontend/img/banner1-1.jpg')}}');">

                                <div class="bg-overlay"></div>
                                <div class="position-relative h-100 d-flex flex-column">
                                    <div class="mb-4">
                                        <a href="{{route('frontend.index')}}" class="d-block">
                                            <img src="{{get_file($settings->logo_header)}}" alt="" height="18">
                                        </a>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="mb-3">
                                            <i class="ri-double-quotes-l display-4 text-success"></i>
                                        </div>

{{--                                        <div id="qoutescarouselIndicators" class="carousel slide"--}}
{{--                                             data-bs-ride="carousel">--}}
{{--                                            <div class="carousel-indicators">--}}
{{--                                                <button type="button" data-bs-target="#qoutescarouselIndicators"--}}
{{--                                                        data-bs-slide-to="0" class="active" aria-current="true"--}}
{{--                                                        aria-label="Slide 1"></button>--}}
{{--                                                <button type="button" data-bs-target="#qoutescarouselIndicators"--}}
{{--                                                        data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--                                                <button type="button" data-bs-target="#qoutescarouselIndicators"--}}
{{--                                                        data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
{{--                                            </div>--}}
{{--                                            <div class="carousel-inner text-center text-white-50 pb-5">--}}
{{--                                                <div class="carousel-item active">--}}
{{--                                                    <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy--}}
{{--                                                        for customization. Thanks very much! "</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="carousel-item">--}}
{{--                                                    <p class="fs-15 fst-italic">" The theme is really great with an--}}
{{--                                                        amazing customer support."</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="carousel-item">--}}
{{--                                                    <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy--}}
{{--                                                        for customization. Thanks very much! "</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <!-- end carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="p-lg-5 p-4">
                                <div>
                                    <h5 class="text-primary">اهلا بك</h5>
                                    <p class="text-muted">لتسجيل الدخول والمتابعة الي سدودي ستور</p>
                                </div>

                                <div class="mt-4">
                                    <form action="{{route('admin.postLogin')}}" method="post" enctype="multipart/form"
                                          id="Form">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">البريد الإلكترونى</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="أدخل بريد الإلكترونى">
                                        </div>

                                        <div class="mb-3">
                                            {{--                                <div class="float-end">--}}
                                            {{--                                    <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>--}}
                                            {{--                                </div>--}}
                                            <label class="form-label" for="password-input">كلمة المرور</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5" name="password"
                                                       placeholder="أدخل كلمة المرور" id="password-input">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>


                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" id="loginButton" type="submit">تسجيل
                                                الدخول
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
@endsection
@section('js')
    <script>
        $("form#Form").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $('#Form').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('.loader-ajax').show()

                    $('#loginButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                        ' ></span> <span style="margin-left: 4px;">working</span>').attr('disabled', true);
                },
                complete: function () {
                    $('#loginButton').html(`<i id="lockId" class="fa fa-lock" style="margin-left: 6px"></i> Sign In`).attr('disabled', false);

                },
                success: function (data) {

                    if (data == 200) {

                        window.setTimeout(function () {
                            $('.loader-ajax').hide()
                        }, 500);
                        window.setTimeout(function () {
                            toastr.success('welcome back')
                        }, 750);
                        window.setTimeout(function () {
                            window.location = "{{route('admin.index')}}"
                        }, 1000);

                    } else {
                        toastr.error('the password is wrong')
                    }


                },
                error: function (data) {

                    window.setTimeout(function () {
                        $('.loader-ajax').hide()
                        if (data.status === 500) {
                            $('#loginButton').html(`<i id="lockId" class="fa fa-lock" style="margin-left: 6px"></i> Sign In`).attr('disabled', false);
                            toastr.error('there in an error');
                        } else if (data.status === 422) {
                            $('#loginButton').html(`<i id="lockId" class="fa fa-lock" style="margin-left: 6px"></i> Sign In`).attr('disabled', false);
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function (key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function (key, value) {
                                        toastr.error(value, key);
                                    });

                                } else {
                                }
                            });
                        } else {
                            $('#loginButton').html(`<i id="lockId" class="fa fa-lock" style="margin-left: 6px"></i> Sign In`).attr('disabled', false);

                            toastr.error('there in an error');
                        }
                    }, 500);


                }, //end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        $('#password-addon').on('click', function () {
            var type = $('#password-input').attr('type');
            if (type == 'text')
                $('#password-input').attr('type', 'password')
            else
                $('#password-input').attr('type', 'text  ')
        })
    </script>
@endsection
