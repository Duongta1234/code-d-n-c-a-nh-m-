<?php

namespace App\Http\Controllers;


use App\Http\Requests\BasicSalaryRequest;
use App\Models\BasicSalary;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class BasicSalaryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
//    public function index(Request $request)
//    {
//        //
//        $employees = Employee::all();
//        $basicSalary= new BasicSalary();
//        $list_basicSalary = $basicSalary::all();
//        if ($request->post() && $request->search_basicSalary) {
//            $list_basicSalary = $basicSalary::where('employee_id', 'like', '%' . $request->search_basicSalary.'%')
//                ->get();
//
//        }
//        return view('admin.basicSalary.index', compact( 'list_basicSalary','employees'));
//    }
    public function index(Request $request)
    {
        // Kiểm tra quyền của người dùng
        if (!auth()->user()->can('show-employees')) {
            // Nếu không có quyền, chỉ lấy thông tin của người đăng nhập
            $employees = Employee::where('user_id', auth()->user()->id)->get();
//dd($employees);
            // Lấy danh sách lương của người đăng nhập
            $basicSalary = new BasicSalary();
            $list_basicSalary = $basicSalary->where('employee_id', auth()->user()->employee->id)->get();
//            dd($list_basicSalary);
        } else {
            // Nếu có quyền, lấy tất cả nhân viên và tất cả lương
            $employees = Employee::all();
            $basicSalary = new BasicSalary();
            $list_basicSalary = $basicSalary::all();
        }

        if ($request->post() && $request->search_basicSalary) {
            $list_basicSalary = $basicSalary->where('employee_id', 'like', '%' . $request->search_basicSalary . '%')
                ->get();
        }

        return view('admin.basicSalary.index', compact('list_basicSalary', 'employees'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lấy danh sách nhân viên
        $employees = Employee::get();
        return view('admin.basicSalary.create', compact('employees'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BasicSalaryRequest $request)
    {
        if(request()->isMethod('post')) {
            // Xử lý logic để lấy dữ liệu từ request và tạo đối tượng BasicSalary
            $basicSalary = new BasicSalary([
                'id' => request('id'),
                'employee_id' => request('employee_id'),
                'month' => request('month'),
                'year' => request('year'),
                'basic_salary' => request('basic_salary'),
            ]);
            // Lưu đối tượng BasicSalary
            $basicSalary->save();
            // Lấy thông tin của đối tượng vừa được tạo
            $basicSalary = BasicSalary::find($basicSalary->id);

            $lastMonth = Carbon::now()->subMonth();
            $lastMonthBasicSalaries = $basicSalary->where('year', $lastMonth->year)
                ->where('month', $lastMonth->month)
                ->get();
            $startDate = Carbon::now()->copy()->startOfMonth();
            $endDate = Carbon::now()->copy()->endOfMonth();
            $notSunday = 0;
            while ($startDate->lessThanOrEqualTo($endDate)) {
                if ($startDate->dayOfWeek != Carbon::SUNDAY) {
                    $notSunday++;
                }
                $startDate->addDay();
            }
            // Tạo đối tượng Salary tương ứng
            Salary::create([
                'basic_salary_id' => $basicSalary->id,
                'quantity_attendance' => $notSunday,
                'allowed_leave_days' => 2,
            ]);
        }
        Session::flash('success', 'Thêm Lương cơ bản thành công!');
        return redirect()-> route('basicSalary.index', compact('basicSalary'));
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
        $employees = Employee::get();
        $basicSalary = BasicSalary::findOrFail($id);
        return view('admin.basicSalary.edit',compact('basicSalary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BasicSalaryRequest $request, string $id)
    {
        $basicSalary = BasicSalary::findOrFail($id);
        $dataUpdate=$request->all();
        $basicSalary->update($dataUpdate);
        Session::flash('success', 'Sửa lương cơ bản thành công!');
        return redirect()->route('basicSalary.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        BasicSalary::where('id', $id)->delete();
        Session::flash('success', 'Xóa lương cơ bản thành công!');
        return redirect()->route('basicSalary.index');
    }
}
