<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusEmployeeRequest;
use App\Models\StatusEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StatusEmployeeController extends Controller
{
    public function index()
    {
        $title = "Status_employee list";
        $status_employees = StatusEmployee::get();
        return view('admin.status_employee.index', compact('title',  'status_employees'));
    }
    public function add(StatusEmployeeRequest $request)
    {
        if ($request->isMethod('POST')) { //tồn tại phương thức post

            $params = $request->except('_token');

            $status_employee = StatusEmployee::create($params);
            if ($status_employee->id) {

                Session::flash('success', 'Add StatusEmployee Successfully');
                return redirect()->route('route_status_employee_add');
            }
        }
        return view('admin.status_employee.add');
    }
    public function  edit(StatusEmployeeRequest $request, $id)
    {

        $status_employee = StatusEmployee::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if($params['status'] == 2){
                if($status_employee->employee){
                    $status_employee->employee->status = 0;
                    $status_employee->employee->save();
                    if($status_employee->employee->user){
                        $status_employee->employee->user->status = 'inactive';
                        $status_employee->employee->user->save();
                    }
                }
            }
            $result = StatusEmployee::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'Edit StatusEmployee Successfully ');
                return redirect()->route('route_status_employee_edit', ['id'=>$id]);
            }
        }
        return view('admin.status_employee.edit', compact('status_employee'));
    }
    public function delete($id) {
        StatusEmployee::where('id', $id)->delete();
        Session::flash('success', 'Delete StatusEmployee Successfully with ID: '.$id);
        return redirect()->route('route_status_employee_index');
    }
}
