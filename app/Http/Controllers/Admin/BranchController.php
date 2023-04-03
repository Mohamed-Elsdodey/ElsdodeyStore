<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload_Files;
use App\Models\Branch;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
{
    use Upload_Files;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $rows = Branch::query();
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
                ->editColumn('logo', function ($row) {
                    return ' <img src="'.get_file($row->logo).'" class="rounded" style="height:60px;width:60px;"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('address', function ($data) {
                    $link = "https://www.google.com/maps/search/?api=1&query=" . $data->latitude . "," . $data->longitude;
                    return '<a target="_blank" class="btn btn-pill btn-info" href="' . $link . '"> عرض <i class="fa fa-map-marker-alt text-white"></i>  </a>';
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->editColumn('phone', function ($row) {
                 return '<a href="tel:'.$row->phone.'">'.$row->phone.'</a>';
                })

                ->editColumn('whatsapp', function ($row) {
                    return '<a href="https://wa.me/'.$row->whatsapp.'">'.$row->whatsapp.'</a>';
                })

                    ->escapeColumns([])
                ->make(true);


        }
        return view('Admin.CRUDS.branches.index');
    }


    public function create()
    {
        return view('Admin.CRUDS.branches.parts.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:employees,name',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required|unique:employees,phone',
            'whatsapp' => 'required',
            'fax' => 'required',
            'logo' => 'required|image',


        ], [

        ]);
        $data['logo'] = $this->uploadFiles('branches', $request->file('logo'), null);

        Branch::create($data);


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

    public function edit(Branch $branch)
    {
        return view('Admin.CRUDS.branches.parts.edit', compact('branch'));

    }


    public function update(Request $request, Branch $branch)
    {

        $data = $request->validate([
            'name' => 'required|unique:employees,name,'.$branch->id,
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required|unique:employees,phone,'.$branch->id,
            'whatsapp' => 'required',
            'fax' => 'required',
            'logo' => 'nullable|image',


        ], [

        ]);
        if ($request->logo)
        $data['logo'] = $this->uploadFiles('branches', $request->file('logo'), null);

        $branch->update($data);

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح'
            ]);
    }


    public function destroy(Branch $branch)
    {
        $branch->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح'
            ]);
    }


}
