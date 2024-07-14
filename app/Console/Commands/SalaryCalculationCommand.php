<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Salary;
use App\Models\TimeSheet;
use Illuminate\Console\Command;

class SalaryCalculationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salarycalculation:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // lấy ra salary với tháng và năm hiện tại
        $salaries = Salary::whereHas('basicSalary', function ($query) {
            $query->where('month', Carbon::now()->month)->where('year', Carbon::now()->year);
        })->get();

        $currentMonth = Carbon::now()->month;
        if ($salaries) {
            foreach ($salaries as $salary) {

                //lương 1 ngày của nhân viên đó
                $salaryPerDay = $salary->BasicSalary->basic_salary / $salary->quantity_attendance;
                // dd($salaryPerDay);
                // Lấy số ngày nghỉ từ cơ sở dữ liệu hoặc từ biến khác
                $absentDays = TimeSheet::where('employee_id', $salary->BasicSalary->employee_id)
                    ->where('status', '<>', 1)
                    ->whereMonth('log_date', $currentMonth)
                    ->count();

                // ngày đi làm tới hiện tại của nhân viên
                $workDays = TimeSheet::where('employee_id', $salary->BasicSalary->employee_id)
                    ->whereMonth('log_date', $currentMonth)
                    ->count();
                // Lấy danh sách ngày nghỉ phép được duyệt theo đơn
                $approvedDay = $salary->BasicSalary->employee->user->leaveRequest()
                    ->where('status', 'approved')
                    ->where(function ($query) use ($currentMonth) {
                        $query->whereMonth('start_date', $currentMonth)
                            ->orWhereMonth('end_date', $currentMonth);
                    })
                    ->get()->sum(function ($leaveRequest) use ($currentMonth) {
                        $startDate = Carbon::parse($leaveRequest->start_date);
                        $endDate = Carbon::parse($leaveRequest->end_date);
                        if ($startDate->month == $endDate->month && $startDate->month == $currentMonth) {
                            return $startDate->diffInDays($endDate) + 1;
                        } elseif ($startDate->month == $currentMonth) {
                            $lastDayOfCurrentMonth = Carbon::now()->endOfMonth();
                            return $startDate->diffInDays($lastDayOfCurrentMonth) + 1;
                        } elseif ($endDate->month == $currentMonth) {
                            $firstDayOfCurrentMonth = Carbon::now()->startOfMonth();
                            return $endDate->diffInDays($firstDayOfCurrentMonth) + 1;
                        }
                        return 0;
                    });

                // kiểm tra ngày phép đã làm đơn chưa
                if ($absentDays) {
                    if ($salary->allowed_leave_days > $approvedDay) {
                        $extraAbsentDays =  $absentDays -  $approvedDay;
                        // Tính lương bị trừ cho các ngày nghỉ vượt quá
                        $deductedSalary = $salaryPerDay * $extraAbsentDays;
                        // Tính lương cuối cùng
                        $finalSalary = ($salaryPerDay * $workDays) - $deductedSalary;
                    } else {
                        $extraAbsentDays =  $absentDays - $salary->allowed_leave_days;
                        // Tính lương bị trừ cho các ngày nghỉ vượt quá
                        $deductedSalary = $salaryPerDay * $extraAbsentDays;
                        // Tính lương cuối cùng
                        $finalSalary = ($salaryPerDay * $workDays) - $deductedSalary;
                    }
                } else {
                    $deductedSalary = 0;
                    $finalSalary = $salaryPerDay * $workDays;
                }

                // Cập nhật thông tin lương cho nhân viên
                $salary->fill([
                    'absent_days' => $absentDays,
                    'approved_leave_days' => $approvedDay,
                    'deducted_salary' => $deductedSalary,
                    'final_salary' => $finalSalary,
                ]);

                // Lưu hoặc tạo mới bản ghi lương
                $salary->save();
            }
        }
    }
}
