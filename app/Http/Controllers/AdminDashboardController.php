<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\InterviewResult;
use App\Models\InterviewSchedule;
use App\Models\JobPosting;
use App\Models\LeaveRequest;
use App\Models\Permisson;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Can;

use function Laravel\Prompts\table;


class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()->can('show-employees')) {
            return view('admin.admin_dashboard.index');
        } else {
            return redirect()->route('route_procedure');
        }
    }

    public function countId(Request $request)
    {
        if (auth()->user()->can('show-employees')) {
            $employees = Employee::paginate(5);
            $countEmployee = DB::table('employees')->count();
            $countRole = DB::table('roles')->count();
            $countUser = DB::table('users')->count();
            $countCadidate = DB::table('candidates')->count();
            //chức vụ
            $countPosition = Position::count();
            //lịch trình
            $countInterviewSchedule = InterviewSchedule::where('status', '2')->count();
            $users = User::paginate(8);
            $pendingCount = LeaveRequest::where('status', 'pending')->count();
            //kêết qua
            $countInterviewSesult = InterviewResult::where('result_interview', '0')->count();
            //sl bai tuyen dung
            $count_job_posting = JobPosting::where('status', '1')->count();
            return view(
                'admin.admin_dashboard.index',
                compact(
                    'employees',
                    'countEmployee',
                    'countRole',
                    'users',
                    'countUser',
                    'countCadidate',
                    'pendingCount',
                    'countPosition',
                    'countInterviewSchedule',
                    'countInterviewSesult',
                    'count_job_posting'
                )
            );
        } else {
            $employees = Employee::where('user_id', auth()->user()->id)->get();
            $firstEmployeeID = $employees->first()->id;
            return redirect()->route('employees.detail',['employee'=>$firstEmployeeID]);
        }
    }
}
