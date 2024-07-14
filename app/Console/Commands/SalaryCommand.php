<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\BasicSalary;
use App\Models\Salary;
use Illuminate\Console\Command;

class SalaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:create';

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
        $lastMonth = Carbon::now()->subMonth();
        $lastMonthBasicSalaries = BasicSalary::where('year', $lastMonth->year)
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
        if ($lastMonthBasicSalaries) {
            foreach ($lastMonthBasicSalaries as $lastMonthBasicSalary) {
                $newBasicSalary = new BasicSalary([
                    'employee_id' => $lastMonthBasicSalary->employee_id,
                    'month' => Carbon::now()->month,
                    'year' => Carbon::now()->year,
                    'basic_salary' => $lastMonthBasicSalary->basic_salary
                ]);
                $newBasicSalary->save();


                $newSalary = new Salary([
                    'basic_salary_id' => $newBasicSalary->id,
                    'quantity_attendance' => $notSunday,
                    'allowed_leave_days' => 2,
                ]);
                $newSalary->save();
            }
        }
    }
}
