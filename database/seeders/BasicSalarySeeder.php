<?php

namespace Database\Seeders;

use App\Models\BasicSalary;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BasicSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        for ($i=1; $i <=12 ; $i++) { 
            foreach ($employees as $employee){
                BasicSalary::create([
                    'employee_id' => $employee->id,
                    'month'=> $i,
                    'year' => 2023,
                    'basic_salary' =>mt_rand(5000000, 15000000)
                ]);
            }
        }
        
    }
}
