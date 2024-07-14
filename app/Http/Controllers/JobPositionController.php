<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPositionRequest;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobPositionController extends Controller
{
    public function index(JobPositionRequest $request)
    {
        $job_position= new JobPosition();
        //$position = Position::get();
        $ListJobPosition = $job_position::all();
        if ($request->post() && $request->search_job_position) {
            $ListJobPosition = $job_position::where('title', 'like', '%' . $request->search_job_position.'%')
                ->get();

        }
        return view('admin.recruitment.job_position.index', compact( 'ListJobPosition'));
    }

    public function add(JobPositionRequest $request)
    {
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            $params = $request->except('_token');

            $job_position = JobPosition::create($params);
            if ($job_position->id) {
                Session::flash('success', 'Thêm vị trí tuyển dụng thành công');
                return redirect()->route('route_job_position_add');
            }
        }
        return view('admin.recruitment.job_position.add');
    }

    public function  edit(JobPositionRequest $request, $id)
    {

        $job_position = JobPosition::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $result = JobPosition::where('id', $id)
                ->update($params);
            if ($result) {
                Session::flash('success', 'Sửa vị trí tuyển dụng thành công');
                return redirect()->route('route_job_position_edit', ['id'=>$id]);
            }
        }
        return view('admin.recruitment.job_position.edit', compact('job_position'));
    }

    public function delete($id) {
        JobPosition::where('id', $id)->delete();
        Session::flash('success', 'Xóa chức vụ thành công ');
        return redirect()->route('route_job_position_index');
    }
}
