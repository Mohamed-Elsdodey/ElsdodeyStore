<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\ServiceTrans;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Yajra\DataTables\DataTables;

class LanguageController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $rows = Language::query();
            return DataTables::of($rows)
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
        return view('Admin.CRUDS.language.index');
    }


    public function create()
    {
        return view('Admin.CRUDS.language.parts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'title'=>'required|unique:languages,title',
            'abbreviation'=>'required|unique:languages,abbreviation',
            'is_active'=>'required|in:1,0',
        ]);

        Language::create($data);
        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }




    public function edit( $id)
    {
        $row=Language::findOrFail($id);

        return view('Admin.CRUDS.language.parts.edit', compact('row'));

    }

    public function update(Request $request,  $id)
    {
        $data = $request->validate([
            'title'=>'required|unique:languages,title,'.$id,
            'abbreviation'=>'required|unique:languages,abbreviation,'.$id,
            'is_active'=>'required|in:1,0',
        ]);

        $row=Language::findOrFail($id);

        $row->update($data);
        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!',

            ]);
    }


    public function destroy($id )
    {
        $row=Language::findOrFail($id);

        $row->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تمت العملية بنجاح!'
            ]);
    }//end fun


    public function activate(Request $request)
    {

        $row = Language::findOrFail($request->id);
        if ($row->is_active == 1){
            $row->update(['is_active'=>0]);
        }
        else {
            $row->update(['is_active'=>1]);
        }

        return response()->json(['status' => true]);
    }


}
