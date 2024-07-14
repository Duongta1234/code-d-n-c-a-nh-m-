<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Events\LeaveRequestCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LeaveRequestNotification;

class LeaveRequestController extends Controller
{
    //    public function __construct()
    //    {
    //        $this->middleware(['permission:send-leave-request'])->only(['create', 'store', 'edit', 'update']);
    //        $this->middleware(['permission:approve-leave-request'])->only(['approveRequests']);
     //   }
//    public function filterRequests(Request $request)
//    {
//        // Khởi tạo query
//        $query = LeaveRequest::query();
//
//        // Lấy giá trị từ form
//        $startDate = $request->input('start_date');
//        $endDate = $request->input('end_date');
//        $id = $request->input('id');
//        $firstLastName = $request->input('first_last_name');
//
//        // Kiểm tra nếu có ngày bắt đầu, thêm nó vào điều kiện tìm kiếm
//        if ($startDate) {
//            $query->where('end_date', '>=', $startDate);
//        }
//
//        // Kiểm tra nếu có ngày kết thúc, thêm nó vào điều kiện tìm kiếm
//        if ($endDate) {
//            $query->where('start_date', '<=', $endDate);
//        }
//
//        // Kiểm tra nếu có mã nhân viên, thêm nó vào điều kiện tìm kiếm
//        if ($id) {
//            $query->whereHas('user.employee', function ($q) use ($id) {
//                $q->where('id', $id);
//            });
//        }
//        if ($firstLastName) {
//            $query->whereHas('user.employee', function ($q) use ($firstLastName) {
//                $q->where(function ($query) use ($firstLastName) {
//                    $query->where('last_name', 'like', "%$firstLastName%")
//                        ->orWhere('first_name', 'like', "%$firstLastName%")
//                        ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$firstLastName%"]);
//                });
//            });
//        }
//        // Lấy tất cả các đơn, bao gồm cả đã duyệt và từ chối
//        $allLeaveRequests = $query->get();
//
//        // Lấy số lượng yêu cầu đang chờ duyệt
//        $pendingLeaveRequestsCount = $allLeaveRequests->where('status', 'pending')->count();
//
//        // Trả về view với kết quả tìm kiếm và số lượng yêu cầu đang chờ duyệt
//        return view('admin.leave_requests.approval', [
//            'leaveRequests' => $allLeaveRequests,
//            'pendingLeaveRequestsCount' => $pendingLeaveRequestsCount,
//        ])->withInput($request->input());
//    }
//
//    public function approveRequests()
//    {
//        $pendingLeaveRequestsCount = LeaveRequest::where('status', 'pending')->count();
//        $leaveRequests = LeaveRequest::orderBy('status', 'asc')->get();
//        // Truyền các yêu cầu vào view
//        return view('admin.leave_requests.approval', compact('leaveRequests','pendingLeaveRequestsCount'));
//    }
    public function approveRequests(Request $request)
    {
        // Khởi tạo query
        $query = LeaveRequest::query();

        // Lấy giá trị từ form
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $id = $request->input('id');
        $firstLastName = $request->input('first_last_name');
        $status=$request->input('status');

        // Kiểm tra nếu có ngày bắt đầu, thêm nó vào điều kiện tìm kiếm
        if ($startDate) {
            $query->where('end_date', '>=', $startDate);
        }

        // Kiểm tra nếu có ngày kết thúc, thêm nó vào điều kiện tìm kiếm
        if ($endDate) {
            $query->where('start_date', '<=', $endDate);
        }

        // Kiểm tra nếu có mã nhân viên, thêm nó vào điều kiện tìm kiếm
        if ($id) {
            $query->whereHas('user.employee', function ($q) use ($id) {
                $q->where('id', $id);
            });
        }

        // Kiểm tra nếu có họ và tên, thêm nó vào điều kiện tìm kiếm
        if ($firstLastName) {
            $query->whereHas('user.employee', function ($q) use ($firstLastName) {
                $q->where(function ($query) use ($firstLastName) {
                    $query->where('last_name', 'like', "%$firstLastName%")
                        ->orWhere('first_name', 'like', "%$firstLastName%")
                        ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$firstLastName%"]);
                });
            });
        }
        if ($status) {
            $query->where('status', $status);
        }
//        $leaveRequests = $query->orderBy('status', 'asc')
//            ->orderByDesc('created_at')
//            ->get();

        // Lấy tất cả các đơn, bao gồm cả đã duyệt và từ chối
        $leaveRequests = $query->get();

        // Số lượng đơn chưa được duyệt
        $pendingCount = $leaveRequests->where('status', 'pending')->count();

        // Số lượng đơn đã được duyệt
        $approvedCount = $leaveRequests->where('status', 'approved')->count();

        // Số lượng đơn bị từ chối
        $rejectedCount = $leaveRequests->where('status', 'rejected')->count();


        // Truyền các yêu cầu vào view
        return view('admin.leave_requests.approval', compact('leaveRequests', 'pendingCount','approvedCount','rejectedCount'));
    }
//lấy các đơn đang ở trạng thái pending
    public function approve($id)
    {
        $leaveRequest = LeaveRequest::find($id);
        $leaveRequest->status = 'approved';
        $leaveRequest->save();
        Session::flash('success', 'Chấp nhận nghỉ phép thành công !');
        return redirect()->back();
    }

    public function rejected($id)
    {
        $leaveRequest = LeaveRequest::find($id);
        $leaveRequest->status = 'rejected';
        $leaveRequest->save();
        Session::flash('success', 'Từ chối nghỉ phép thành công !');
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $userId = Auth::id();

        // Số lượng đơn chưa được duyệt
        $pendingCount = LeaveRequest::where('user_id', $userId)->where('status', 'pending')->count();

        // Số lượng đơn đã được duyệt
        $approvedCount = LeaveRequest::where('user_id', $userId)->where('status', 'approved')->count();

        // Số lượng đơn bị từ chối
        $rejectedCount = LeaveRequest::where('user_id', $userId)->where('status', 'rejected')->count();

        // Khởi tạo query
        $query = LeaveRequest::where('user_id', $userId);

        // Lấy giá trị từ form
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $status = $request->input('status');

        // Kiểm tra nếu có ngày bắt đầu, thêm nó vào điều kiện tìm kiếm
        if ($startDate) {
            $query->where('end_date', '>=', $startDate);
        }

        // Kiểm tra nếu có ngày kết thúc, thêm nó vào điều kiện tìm kiếm
        if ($endDate) {
            $query->where('start_date', '<=', $endDate);
        }
        // Kiểm tra nếu có trạng thái, thêm nó vào điều kiện tìm kiếm
        if ($status) {
            $query->where('status', $status);
        }

        $leaveRequests = $query->get();

        return view('admin.leave_requests.index', [
            'leaveRequests' => $leaveRequests,
            'pendingCount' => $pendingCount,
            'approvedCount' => $approvedCount,
            'rejectedCount' => $rejectedCount,
        ]);
    }



    public function create()
    {
        return view('admin.leave_requests.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
                function ($attribute, $value, $fail) use ($request) {
                    $startDate = \Carbon\Carbon::parse($request->input('start_date'));
                    $endDate = \Carbon\Carbon::parse($value);
                    $dateDiff = $startDate->diffInDays($endDate);

                    if ($dateDiff > 7) {
                        $fail('Khoảng ngày phải nằm trong 7 ngày.');
                    }
                },
            ],
            'reason' => 'required',
        ], [
            'start_date.required' => 'Vui lòng nhập ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
            'end_date.required' => 'Vui lòng nhập ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'reason.required' => 'Vui lòng nhập lý do nghỉ phép.',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['status'] = 'pending';

        $leaveRequest = LeaveRequest::create($validatedData);

        event(new LeaveRequestCreated($leaveRequest));
        Session::flash('success', 'Thêm thành công yêu cầu nghỉ phép!');
        return redirect()->route('leave_requests.index');
    }



    public function show(LeaveRequest $leaveRequest)
    {
        return view('admin.leave_requests.show', ['leaveRequest' => $leaveRequest]);
    }

    public function edit(LeaveRequest $leaveRequest)
    {
        if (Auth::id() !== $leaveRequest->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.leave_requests.edit', ['leaveRequest' => $leaveRequest]);
    }

    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        if (Auth::id() !== $leaveRequest->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
                function ($attribute, $value, $fail) use ($request) {
                    $startDate = \Carbon\Carbon::parse($request->input('start_date'));
                    $endDate = \Carbon\Carbon::parse($value);
                    $dateDiff = $startDate->diffInDays($endDate);

                    if ($dateDiff > 7) {
                        $fail('Khoảng ngày phải nằm trong 7 ngày.');
                    }
                },
            ],
            'reason' => 'required',
        ], [
            'start_date.required' => 'Vui lòng nhập ngày bắt đầu.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
            'end_date.required' => 'Vui lòng nhập ngày kết thúc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'reason.required' => 'Vui lòng nhập lý do nghỉ phép.',
        ]);

        if($leaveRequest->status == 'pending'){
            $leaveRequest->update($validatedData);
            Session::flash('success', 'Sửa thành công yêu cầu nghỉ phép.');
        }else{
            Session::flash('error', 'Không thể sửa được');
        }


        return redirect()->route('leave_requests.index');
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        if (Auth::id() !== $leaveRequest->user_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($leaveRequest->status =='pending') {
            $leaveRequest->delete();
            Session::flash('success', 'Xóa thành công yêu cầu nghỉ phép.');
        }else{
            Session::flash('error', 'Không thể xóa được');

        }

        return redirect()->route('leave_requests.index');
    }

    //    thống kê
    public function statistics(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        if ($from_date && $to_date) {
            $users = User::all();
            $statistics = [];

            foreach ($users as $user) {
                $leaveRequests = LeaveRequest::where('user_id', $user->id)
                    ->whereBetween('start_date', [$from_date, $to_date])
                    ->whereBetween('end_date', [$from_date, $to_date])
                    ->where('status', 'approved')
                    ->get();

                $totalDays = $leaveRequests->sum(function ($leaveRequest) {
                    $startDate = Carbon::parse($leaveRequest->start_date);
                    $endDate = Carbon::parse($leaveRequest->end_date);
                    return $startDate->diffInDays($endDate) + 1;
                });

                $employee = $user->employee; // Lấy thông tin Employee thông qua User

                if ($employee) { // Kiểm tra xem Employee có tồn tại không
                    $statistics[] = [
                        'employee_id' => $employee->id,
                        'first_name' => $employee->first_name,
                        'last_name' => $employee->last_name,
                        'total_days' => $totalDays,
                    ];
                }
            }


            return view('admin.leave_requests.statistic', compact('statistics'));
        }

        return view('admin.leave_requests.statistic');
    }
}
