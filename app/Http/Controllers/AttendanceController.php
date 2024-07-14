<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TimeSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ip = strcmp($request->ip(),'58.186.122.41');
        $sunday = Carbon::now()->isSunday();
        $timesheet = TimeSheet::where('employee_id', auth()->user()->employee->id)
            ->where('log_date', Carbon::now()->toDateString())->first();
        $timesheets = TimeSheet::where('employee_id', auth()->user()->employee->id)->orderBy('log_date', 'desc')->get();
      $years = TimeSheet::where('employee_id', Auth::user()->employee->id)->get()->groupBy(function ($attendance) {
            return Carbon::parse($attendance->log_date)->format('Y');
        });
        return view('admin.attendance.index', compact('timesheet', 'timesheets','years','sunday','ip'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->checkbox == 'true') {
            $timesheet =  new Timesheet();
            $timesheet->log_date = Carbon::now()->toDateString();
            $timesheet->employee_id = auth()->user()->employee->id;
            $timesheet->time_in = $request->time;
            $timesheet->save();
        }

        return response()->json(['timesheet' => $timesheet]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->checkbox == 'false') {
            $timesheet = TimeSheet::find($request->id);
            $timesheet->time_out = $request->time;
            $timesheet->status = 1;
            $timesheet->save();
            return response()->json(['timesheet' => $timesheet]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexAdmin(Request $request)
    {
        if (auth()->user()->can('view-attendance')) {
            // Lấy tất cả thông tin nhân viên nếu người dùng có quyền view-all
            $employees = Employee::get();
        } else {
            // Chỉ trả về thông tin của chính họ nếu không có quyền view-all
            $employees = Employee::where('user_id', auth()->user()->id)->get();
        }
        //        $employees = Employee::all();

        foreach ($employees as $employee) {
            $employee->attendance = $employee->attendance()
                ->whereYear('log_date', Carbon::now()->year)
                ->whereMonth('log_date', Carbon::now()->month)->get();

            if ($employee->attendance) {
                foreach ($employee->attendance as $attendance) {
                    $attendance->log_date = Carbon::parse($attendance->log_date);
                }
            }
        }

        return view('admin.attendance.admin', compact('employees'));
    }

    public function getAdminFind($id)
    {
        $timesheet = TimeSheet::find($id);
        return response()->json(['timesheet' => $timesheet]);
    }

    public function postAdminFind(Request $request, $id)
    {
        $validator = Validator::make($request->all(), ['reason' => 'required'], ['required' => 'Reason không được bỏ trống!']);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            $timesheet = TimeSheet::find($id);
            $request->checkbox == 'true' ? $timesheet->status = 1 : $timesheet->status = 0;
            $timesheet->reason = $request->reason;
            $timesheet->save();
            return response()->json(['timesheet' => $timesheet]);
        }
    }

    public function search(Request $request)
    {
        if ($request->id != null && $request->month != 0) {
            // search month va id
            $employees = Employee::where('id', $request->id)->get();
            foreach ($employees as $employee) {
                $employee->attendance = $employee->attendance()
                    ->whereMonth('log_date', $request->month)
                    ->whereYear('log_date', Carbon::now()->year)->get();
                if ($employee->attendance) {
                    foreach ($employee->attendance as $attendance) {
                        $attendance->log_date = Carbon::parse($attendance->log_date);
                    }
                }
            }
            return view('admin.attendance.admin', compact('employees'));
        } else if ($request->id == null && $request->month != 0) {
            // search month
            $employees = Employee::all();

            foreach ($employees as $employee) {
                $employee->attendance = $employee->attendance()
                    ->whereMonth('log_date', $request->month)
                    ->whereYear('log_date', Carbon::now()->year)->get();

                if ($employee->attendance) {
                    foreach ($employee->attendance as $attendance) {
                        $attendance->log_date = Carbon::parse($attendance->log_date);
                    }
                }
            }
            return view('admin.attendance.admin', compact('employees'));
        } else if ($request->id != null && $request->month == 0) {
            // // search id
            $employee = Employee::where('id', $request->id)->first();
            $employee->attendance = $employee->attendance()
                ->orderBy('log_date', 'desc')
                ->get();
            if ($employee->attendance) {
                foreach ($employee->attendance as $attendance) {
                    $attendance->log_date = Carbon::parse($attendance->log_date);
                }
            }
            $months = $employee->attendance->groupBy(function ($attendance) {
                return Carbon::parse($attendance->log_date)->format('m');
            });
            return view('admin.attendance.search', compact('employee', 'months'));
        } else {
            return view('admin.attendance.admin');
        }
    }

    public function clientSearch(Request $request)
    {
        $timesheet = TimeSheet::where('employee_id', auth()->user()->employee->id)
            ->where('log_date', Carbon::now()->toDateString())->first();
        $sql = TimeSheet::where('employee_id', Auth::user()->employee->id);
        $request->date && $sql->where('log_date', Carbon::createFromFormat('d/m/Y',$request->date)->toDateString());
        $request->month && $sql->whereMonth('log_date', $request->month);
        $request->year && $sql->whereYear('log_date', $request->year);
        $timesheets = $sql->orderBy('log_date', 'desc')->get();
        $years = TimeSheet::where('employee_id', Auth::user()->employee->id)->get()->groupBy(function ($attendance) {
            return Carbon::parse($attendance->log_date)->format('Y');
        });
        return view('admin.attendance.index', compact('timesheet', 'timesheets','years'));
    }
}
