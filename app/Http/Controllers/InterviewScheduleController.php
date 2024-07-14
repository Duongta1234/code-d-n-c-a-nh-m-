<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Candidate;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\InterviewResult;
use App\Models\InterviewSchedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InterviewScheduleController extends Controller
{
    public function index(Request $request, InterviewSchedule $interviewSchedule)
    {

        $ListInterviewSchedule = $interviewSchedule->where('status', 1)->get();
        $ListInterviewSchedule->transform(function ($schedule) {
            $schedule->interview_time = Carbon::parse($schedule->interview_time)->format('H:i d-m-Y');
            return $schedule;
        });
        if ($request->isMethod('post')) {
            $ListInterviewSchedule = $interviewSchedule->when($request->search_candidate_name, function ($query) use ($request) {
                $query->whereHas('candidate', function ($subquery) use ($request) {
                    $subquery->where('name', 'like', '%' . $request->search_candidate_name . '%');
                });
            })->when($request->date_apply, function ($query) use ($request) {
                $query->whereDate('interview_time', 'like', '%' . $request->date_apply . '%');
            })->get();
            $ListInterviewSchedule->transform(function ($schedule) {
                $schedule->interview_time = Carbon::parse($schedule->interview_time)->format('H:i d-m-Y');
                return $schedule;
            });
        }
        return view('admin.recruitment.interview_schedule.index', compact('ListInterviewSchedule'));
    }

    public function detail(Request $request, $id, InterviewSchedule $interviewSchedule)
    {
        $candidate = Candidate::get();
        $interviewSchedule_detail = $interviewSchedule->find($id);
        if ($request->isMethod('POST')) {
            $params = $request->all();
            if ($params['status'] == 3) {
                $interviewSchedule_detail->delete();
                Session::flash('success', 'Xóa ứng viên thành công');
                return redirect()->route('route_status_candidate_index');
            } else {
                $result = $interviewSchedule_detail->update($params);
                Session::flash('success', 'Sửa trạng thái ứng viên thành công');
                return redirect()->route('route_status_candidate_detail', ['id' => $id]);
            }
        }

        return view('admin.recruitment.interview_schedule.detail', compact('interviewSchedule_detail', 'candidate'));
    }

    //lực sửa phân quyền
    public function indexAdd(Request $request, InterviewSchedule $interviewSchedule)
    {
        $candidate = Candidate::get();
        $user = User::get();
        $employee = Employee::get();
        // Kiểm tra quyền xem có nên hiển thị tất cả nhân viên hay chỉ nhân viên đang đăng nhập
        if (auth()->user()->can('show-employees')) {
            $ListInterviewSchedule = $interviewSchedule->where('status', 2)->get();
            $ListInterviewSchedule->transform(function ($schedule) {
                $schedule->interview_time = Carbon::parse($schedule->interview_time)->format('H:i d-m-Y');
                return $schedule;
            });
        } else {
            $ListInterviewSchedule = $interviewSchedule->where('status', 2)->whereHas('user.employee', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->get();
            $ListInterviewSchedule->transform(function ($schedule) {
                $schedule->interview_time = Carbon::parse($schedule->interview_time)->format('H:i d-m-Y');
                return $schedule;
            });
        }

        if ($request->isMethod('POST')) {
            $ListInterviewSchedule = $interviewSchedule->when($request->search_candidate_name, function ($query) use ($request) {
                $query->whereHas('candidate', function ($subquery) use ($request) {
                    $subquery->where('name', 'like', '%' . $request->search_candidate_name . '%');
                });
            })->when($request->date_apply, function ($query) use ($request) {
                $query->whereDate('interview_time', Carbon::parse($request->date_apply)->toDateString());
            })->get();
            $ListInterviewSchedule->transform(function ($schedule) {
                $schedule->interview_time = Carbon::parse($schedule->interview_time)->format('H:i d-m-Y');
                return $schedule;
            });

            // Áp dụng kiểm tra quyền vào câu truy vấn
            // if (!auth()->user()->can('show-employees')) {
            //     $sql->whereHas('user.employee', function ($query) {
            //         $query->where('user_id', auth()->user()->id);
            //     });
            // }

            // $ListInterviewSchedule = $sql->with('candidate', 'user.employee')->get();
        }

        return view('admin.recruitment.interview_schedule.index_add', compact('ListInterviewSchedule', 'candidate', 'user', 'employee'));
    }

    public function addSchedule(Request $request, $id)
    {
        $interviewSchedule = new InterviewSchedule();
        $candidate = Candidate::get();
        $user = User::where('status', 'active')->whereHas('employee')->get();
        $employee = Employee::get();
        $interviewSchedule_detail = $interviewSchedule->find($id);
        $interviewSchedule_detail->interview_time = Carbon::parse($interviewSchedule_detail->interview_time)->format('H:i d-m-Y');
        if ($request->isMethod('POST')) {
            $params = $request->all();
            $params['status'] = 2;
            $result = $interviewSchedule_detail->update($params);

            $interviewResultCheck = InterviewResult::where('interview_schedule_id', $id)->get();
            // Nếu không có id lịch trình nào trong bảng kết quả pv giống ở đây thì sẽ thêm vào bảng pv
            if ($interviewResultCheck->isEmpty() && $request->user_id != 0) {
                $interviewResult = new InterviewResult();
                $interviewResult->candidate_id = $interviewSchedule_detail->candidate->id;
                $interviewResult->interview_schedule_id = $id;
                $interviewResult->result_interview = 0;
                $interviewResult->note = null;
                $interviewResult->save();
            }

            if ($result) {
                Session::flash('success', 'Sửa lịch trình phỏng vấn thành công');
                return redirect()->route('route_interview_schedule_detail', ['id' => $id]);
            }
        }

        return view('admin.recruitment.interview_schedule.add_schedule', compact('interviewSchedule_detail', 'candidate', 'user', 'employee'));
    }

    public function interviewScheduleStatus($id)
    {
        $interviewSchedule = InterviewSchedule::find($id);
        $interviewSchedule->status = 2;
        $interviewSchedule->save();
        Session::flash('success', 'Cảm ơn bạn đã xác nhận tham gia phỏng vấn');
        return redirect()->route('route_procedure');
    }
}
