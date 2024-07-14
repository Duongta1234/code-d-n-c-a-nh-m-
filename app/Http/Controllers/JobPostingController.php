<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\JobPosting;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CandidateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\JobPostingRequest;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

class JobPostingController extends Controller
{
    public function index(JobPostingRequest $request)
    {
        $job_posting = new JobPosting();
        $job_position = JobPosition::get();
        $user = User::get();
        $ListJobPosting = $job_posting::all();
        if ($request->post()) {
            $sql = $job_posting::query();
            if ($request->search_job_posting){
                $sql->where('title', 'like', '%' . $request->search_job_posting . '%');
            }else if (intval($request->status) === 1 || intval($request->status) === 0){
                $sql->where('status',$request->status);
            }
            $ListJobPosting = $sql->get();
        }
        return view('admin.recruitment.job_posting.index', compact('ListJobPosting', 'job_position', 'user'));
    }

    public function add(JobPostingRequest $request){
        $job_position = JobPosition::get();
        $users= User::get();

        if ($request->isMethod('POST')) { //tồn tại phương thức post
            $params = $request->all();
            $params['user_id'] = Auth::user()->id;
            $job_posting = JobPosting::create($params);
            if ($job_posting->id) {
                Session::flash('success', 'Thêm bài đăng tuyển dụng thành công');
                return redirect()->route('route_job_posting_add');
            }
        }

        return view('admin.recruitment.job_posting.add', compact( 'job_position','users'));
    }

    public function  edit(JobPostingRequest $request, $id)
    {
        $job_position = JobPosition::get();
        $users= User::get();
        $job_posting = JobPosting::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $result = $job_posting->update($params);
            if ($result) {
                Session::flash('success', 'Sửa bài đăng tuyển dụng thành công');
                return redirect()->route('route_job_posting_edit', ['id'=>$id]);
            }
        }
        return view('admin.recruitment.job_posting.edit', compact('job_posting','job_position','users'));
    }

    public function  detail(JobPostingRequest $request, $id)
    {
        $job_posting = new JobPosting();
        $job_position = JobPosition::get();
        $user= User::get();
        $ListJobPosting = $job_posting::where('status', 1)->inRandomOrder()->take(3)->get();
        $job_posting_detail = JobPosting::find($id);
        $time = new DateTime($job_posting_detail->application_deadline);
        $job_posting_detail->application_deadline= $time->format('d-m-Y');
        return view('layouts.recruitment_interface.career', compact('job_posting','job_position','user','job_posting_detail','ListJobPosting'));

    }
    public function list_vacancies(){
        $job_posting = new JobPosting();
        $job_position = JobPosition::get();
        $ListJobPosting = $job_posting::where('status', 1)->get();
        return view('layouts.recruitment_interface.list_vacancies',compact('job_posting','job_position','ListJobPosting'));
    }

    public function delete($id) {
        JobPosting::where('id', $id)->delete();
        Session::flash('success', 'Xóa bài đăng tuyển dụng thành công ');
        return redirect()->route('route_job_posting_index');
    }
}
