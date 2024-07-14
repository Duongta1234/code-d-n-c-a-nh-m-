<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\TimeSheet;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use function Termwind\renderUsing;

class SalaryController extends Controller
{

//    public function index(Request $request)
//    {
//        $salaries = Salary::whereHas('basicSalary', function ($query) {
//            $query->where('month', Carbon::now()->month)->where('year', Carbon::now()->year);
//        })->get();
//
//        if($request->employee_id || $request->month)
//        $salaries = Salary::whereHas('basicSalary', function ($query) use ($request) {
//            if ($request->employee_id)
//                $query->where('employee_id', $request->employee_id);
//            if ($request->month)
//                $query->where('month', $request->month);
//        })->get();
////        dd($salaries);
//        return view('admin.salary.index', compact('salaries'));
//    }
    public function index(Request $request)
    {
        // Check if the user has the 'show-employee' permission
        if (!auth()->user()->can('show-employees')) {
            // Redirect the user to the 'viewClient' route with their own ID
            return redirect()->route('salary.viewClient', ['id' => auth()->user()->employee->id]);
        }

        $query = Salary::whereHas('basicSalary', function ($query) {
            $query->where('month', Carbon::now()->month)->where('year', Carbon::now()->year);
        });

        // Additional conditions based on user input
        if ($request->employee_id) {
            $query->whereHas('basicSalary', function ($query) use ($request) {
                $query->where('employee_id', $request->employee_id);
            });
        }

        if ($request->month) {
            $query->whereHas('basicSalary', function ($query) use ($request) {
                $query->where('month', $request->month);
            });
        }

        $salaries = $query->get();

        return view('admin.salary.index', compact('salaries'));
    }

    public function viewClient($id){
        $salary = Salary::whereHas('basicSalary',function($query)use ($id) {
            $query->where('employee_id',$id)->where('month',Carbon::now()->month);
        })->first();
        $workDays = TimeSheet::where('employee_id', $id)
                    ->whereMonth('log_date', Carbon::now()->month)
                    ->where('status',1)
                    ->count();
        return view('admin.salary.client',compact('salary','workDays'));
    }
}
