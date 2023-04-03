<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeBranch;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $rows = Employee::query();
            return DataTables::of($rows)
                ->addColumn('action', function ($row) {


                    return '
                            <button  class="editBtn btn rounded-pill btn-primary waves-effect waves-light"
                                    data-id="' . $row->id . '"
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </span>
                            </button>
                            <button   class="btn rounded-pill btn-danger waves-effect waves-light delete"
                                    data-id="' . $row->id . '">
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </span>
                            </button>
                       ';

                })




                ->editColumn('created_at', function ($city) {
                    return date('Y/m/d', strtotime($city->created_at));
                })
                ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.employees.index');
    }


    public function create()
    {
        return view('Admin.CRUDS.employees.parts.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:employees,name',
            'id_number' => 'required|unique:employees,id_number',
            'phone'=>'required|unique:employees,phone',
            'whatsapp'=>'required|unique:employees,whatsapp',
            'email'=>'required|email|unique:employees,email',
            'hiring_date'=>'required|date',
        ],[

        ]);

        $branches = $this->validate($request,[
            'branches'=>'required|array',
            'branches.*'=>'required',
        ]);

        $row= Employee::create($data);

        if ($request->branches)
            for ($i=0;$i<count($request->branches);$i++){
                EmployeeBranch::create([
                    'employee_id'=>$row->id,
                    'branch_id'=>$request->branches[$i],
                ]);
            }

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح'
            ]);
    }


    public function show($id)
    {
        //
    }

    public function edit(Employee $employee)
    {
        return view('Admin.CRUDS.employees.parts.edit',compact('employee'));

    }


    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'name' => 'required|unique:employees,name,'.$employee->id,
            'id_number' => 'required|unique:employees,id_number,'.$employee->id,
            'phone'=>'required|unique:employees,phone,'.$employee->id,
            'whatsapp'=>'required|unique:employees,whatsapp,'.$employee->id,
            'email'=>'required|email|unique:employees,email,'.$employee->id,
            'hiring_date'=>'required|date',
        ],[

        ]);

        $branches = $this->validate($request,[
            'branches'=>'required|array',
            'branches.*'=>'required',
        ]);

        $employee->update($data);

        EmployeeBranch::where('employee_id',$employee->id)->delete();
        if ($request->branches)
            for ($i=0;$i<count($request->branches);$i++){
                EmployeeBranch::create([
                    'employee_id'=>$employee->id,
                    'branch_id'=>$request->branches[$i],
                ]);
            }

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح'
            ]);
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح'
            ]);
    }



}
