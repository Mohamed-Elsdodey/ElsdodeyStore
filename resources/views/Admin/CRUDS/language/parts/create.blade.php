<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('languages.store')}}">
    @csrf
    <div class="row g-4">

        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="title" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاسم</span>
            </label>
            <!--end::Label-->
            <input id="title" required type="text" class="form-control form-control-solid" placeholder=" " name="title" value=""/>
        </div>

        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="title" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاختصار</span>
            </label>
            <!--end::Label-->
            <input id="title" required type="text" class="form-control form-control-solid" placeholder=" " name="abbreviation" value=""/>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap col-md-6 my-4 ">
            <div class="form-check">
                <input class="form-check-input filterCoupon" data-type="owner" type="radio" name="is_active" id="exampleRadios1" value="1" >
                <label class="form-check-label" for="exampleRadios1">
                    مفعل
                </label>
            </div>


            <div class="form-check">
                <input class="form-check-input filterCoupon" type="radio" data-type="owner" name="is_active" id="exampleRadios1" value="0" >
                <label class="form-check-label" for="exampleRadios1">
                    غير مفعل
                </label>
            </div>


        </div>

    </div>
</form>

