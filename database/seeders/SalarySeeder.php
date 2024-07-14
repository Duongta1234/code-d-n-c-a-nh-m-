<?php

namespace Database\Seeders;

use App\Models\Salary;
use App\Models\BasicSalary;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basicSalaries = BasicSalary::all();
        foreach ($basicSalaries as $basicSalary) {
            if ($basicSalary->month == 1 || $basicSalary->month == 3 || $basicSalary->month == 5 || $basicSalary->month == 8 || $basicSalary->month == 8) {
                $quantity = 27;
            } else if ($basicSalary->month == 4 || $basicSalary->month == 6 || $basicSalary->month == 7 || $basicSalary->month == 9 || $basicSalary->month == 11 || $basicSalary->month == 12) {
                $quantity = 26;
            }else if($basicSalary->month == 2){
                $quantity = 24;
            }
            Salary::create([
                'basic_salary_id' => $basicSalary->id,
                'quantity_attendance' => $quantity,
                'allowed_leave_days' => 2,
                'absent_days' => 0, // Generate a random number between 0 and 5
                'deducted_salary' => 0, // Adjust the range as needed
                'final_salary' => 0, // Adjust the range as needed
                // Thêm các trường khác nếu cần
            ]);
        }
    }
}
