@extends('Admin.layouts.inc.app')
@section('title')
    الفروع
@endsection
@section('css')
@endsection
@section('breadCramp')
    breadCramp
@endsection

@section('content')



    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 mt-2">
                            <div class="pull-right">
                                <button  id="addBtn" class="btn btn-primary waves-effect waves-light btndd" >اضافة الفروع</button>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="card-body">

                    <div class="table-responsive1 mt-2">
                        <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اللوجو</th>
                                <th>الاسم</th>
                                <th>الهاتف</th>
                                <th>الواتساب</th>
                                <th>الفاكس</th>
                                <th>العنوان</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>

                            <tbody>

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-lg mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content" id="modalContent">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2><span id="operationType"></span> فرع </h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" style="cursor: pointer"
                         data-bs-dismiss="modal" aria-label="Close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)"
                                      fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="black"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" id="form-load">

                </div>
                <!--end::Modal body-->
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">
                            الغاء
                        </button>
                        <button form="form" type="submit" id="submit" class="btn btn-primary">
                            <span class="indicator-label"> اتمام </span>
                        </button>
                    </div>
                </div>
            </div>

            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>




@endsection
@section('js')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'logo', name: 'logo'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'whatsapp', name: 'whatsapp'},
            {data: 'fax', name: 'fax'},
            {data: 'address', name: 'address'},
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ];
    </script>
    @include('Admin.layouts.inc.ajax',['url'=>'branches'])

@endsection
