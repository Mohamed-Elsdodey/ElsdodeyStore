<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload_Files;
use App\Models\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    use Upload_Files;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $admins = Admin::where('id', '!=', auth('admin')->user()->id)->where('id','!=',1)->get();
            return Datatables::of($admins)
                ->addColumn('action', function ($row) {

                    $edit='';
                    $delete='';


                    return '
                             <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-circle-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item edit-item-btn editBtn" data-id="' . $row->id . '">
                                            <i class="fa-regular fa-pen-to-square align-bottom me-2 text-muted"></i>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item remove-item-btn delete" data-id="' . $row->id . '">
                                            <i class="fa-regular fa-trash align-bottom me-2 text-muted"></i>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                       ';

                })


                ->editColumn('image', function ($admin) {
                    return ' <img height="60px" src="' . get_file($admin->image) . '" class=" w-60 rounded"
                             onclick="window.open(this.src)">';
                })


                ->editColumn('is_active', function ($row) {
                    $active = '';
                    $operation='';
//                    if (!checkPermission(39))
//                        $operation='disabled';
                    if ($row->is_active == 1)
                        $active = 'checked';
                    return '<div class="form-check form-switch">
  <input ' .$operation. '  class="form-check-input activeBtn" data-id="' . $row->id . ' " type="checkbox" role="switch" id="flexSwitchCheckChecked" ' . $active . '  >
</div>';
                })


                ->editColumn('created_at', function ($admin) {
                    return date('Y/m/d', strtotime($admin->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.admin.index');
    }


    public function create()
    {
        return view('Admin.CRUDS.admin.parts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email' ,
            'password' => 'required',
//             'business_name'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif,svg,webp,avif',
            'is_active'=>'required',

        ]);
        $data["image"] =  $this->uploadFiles('admins',$request->file('image'),null );

        $data['password']=bcrypt($request->password);

//        $data['image'] = $this->createImageFromTextManual('admins' , $request->name ,256 , '#000', '#fff');

     $admin=Admin::create($data);
//     if ($request->role_id)
//         AdminRole::updateOrCreate([
//             'admin_id'=>$admin->id,
//             'role_id'=>$request->role_id,
//         ]);



        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }


    public function show(Admin $admin)
    {

        $html= view('Admin.CRUDS.admin.parts.show', compact('admin'))->render();
        return response()->json([
           'code'=>200,
           'html'=>$html,
        ]);

        //
    }


    public function edit(Admin $admin)
    {

        return view('Admin.CRUDS.admin.parts.edit', compact('admin'));

    }

    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable',
//            'business_name'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif,svg,webp,avif',
            'is_active'=>'nullable',


        ]);
        if ($request->passwoerd) {

            $data['password']=bcrypt($request->password);

        } else {

            $data['password']=$admin->password;
}
        if ($request->image){
            $data["image"] =  $this->uploadFiles('admins',$request->file('image'),null );

        }
        $old=$admin;
        $admin->update($data);

//        AdminRole::where('admin_id',$admin->id)->delete();
//        if ($request->role_id)
//            AdminRole::updateOrCreate([
//                'admin_id'=>$admin->id,
//                'role_id'=>$request->role_id,
//            ]);



        $html= view('Admin.CRUDS.admin.parts.header')->render();


        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',
                'html'=>$html,
                'name'=>$admin->name,
                'logo'=>get_file($admin->image),
                'business_name'=>$admin->business_name,
            ]);
    }


    public function destroy(Admin $admin)
    {
        $admin->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun


    public function activate(Request $request)
    {

        $admin = Admin::findOrFail($request->id);
        $old=$admin;
        if ($admin->is_active == '1'){
            $admin->is_active = '0';
            $admin->save();
        }
        else {
            $admin->is_active = '1';
            $admin->save();
        }

        return response()->json(['status' => true]);
    }


}
