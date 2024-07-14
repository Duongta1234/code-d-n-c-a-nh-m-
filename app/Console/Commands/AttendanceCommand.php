<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\TimeSheet;
use Illuminate\Console\Command;

class AttendanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:create';

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
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $today = Carbon::now();
            $timesheetDate = TimeSheet::where('employee_id', $employee->id)
                ->where('log_date', $today->toDateString())->exists();
            $holiday = Holiday::where('date', $today->toDateString())->exists();

            // Kiểm tra xem ngày hiện tại là ngày làm việc bình thường hoặc là thứ 7, và nhân viên chưa chấm công
            $timesheet = new TimeSheet();
            if (($today->isWeekday() || $today->isSaturday()) && !$timesheetDate && !$holiday) {
                $timesheet->employee_id = $employee->id;
                $timesheet->log_date = $today->format('Y-m-d');
                $timesheet->time_in = '00:00:00';
                $timesheet->time_out = '00:00:00';
                $timesheet->reason = 'Không chấm công';
                $timesheet->save();
            } else if (($today->isWeekday() || $today->isSaturday()) && !$timesheetDate && $holiday) {
                $timesheet->employee_id = $employee->id;
                $timesheet->log_date = $today->format('Y-m-d');
                $timesheet->time_in = '00:00:00';
                $timesheet->time_out = '00:00:00';
                $timesheet->status = 1;
                $timesheet->reason = 'Nghỉ lễ';
                $timesheet->save();
            }
        }
    }
}
