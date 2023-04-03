<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('employees.update',$employee->id)}}">
    @csrf
    @method('PUT')
    <div class="row">



        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="name" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الاسم</span>
            </label>
            <!--end::Label-->
            <input id="name" required type="text" class="form-control form-control-solid" placeholder="" name="name"
                   value="{{$employee->name}}"/>
        </div>


        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="id_number" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">رقم الهوية</span>
            </label>
            <!--end::Label-->
            <input id="id_number" required type="number" class="form-control form-control-solid" placeholder="" name="id_number"
                   value="{{$employee->id_number}}"/>
        </div>


        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="phone" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الهاتف</span>
            </label>
            <!--end::Label-->
            <input id="phone" required type="number" class="form-control form-control-solid" placeholder="" name="phone"
                   value="{{$employee->phone}}"/>
        </div>



        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="whatsapp" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الواتساب</span>
            </label>
            <!--end::Label-->
            <input id="whatsapp" required type="text" class="form-control form-control-solid" placeholder="" name="whatsapp"
                   value="{{$employee->whatsapp}}"/>
        </div>


        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="email" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">الايميل</span>
            </label>
            <!--end::Label-->
            <input id="email" required type="email" class="form-control form-control-solid" placeholder="" name="email"
                   value="{{$employee->email}}"/>
        </div>



        <div class="d-flex flex-column mb-7 fv-row col-sm-6">
            <!--begin::Label-->
            <label for="hiring_date" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required mr-1">تاريخ التوظيف</span>
            </label>
            <!--end::Label-->
            <input id="hiring_date" required type="date" class="form-control form-control-solid" placeholder="" name="hiring_date"
                   value="{{$employee->hiring_date}}"/>
        </div>

        <div class="d-flex justify-content-center my-2">
            <h2>الفروع</h2>
        </div>



        <div class="row my-4">
            @foreach(\App\Models\Branch::get() as $branch)

                <span class="form-check col-md-4  ">
                  <input @foreach(\App\Models\EmployeeBranch::where('employee_id',$employee->id)->get() as $pivot) @if($pivot->branch_id==$branch->id) checked @endif @endforeach class="form-check-input " type="checkbox" name="branches[]"  value="{{$branch->id}}" id="flexCheckDefault{{$branch->id}}">
                  <label class="form-check-label mx-1" for="flexCheckDefault{{$branch->id}}">
                   {{$branch->name}}
                  </label>
                </span>
            @endforeach
        </div>




    </div>
</form>


