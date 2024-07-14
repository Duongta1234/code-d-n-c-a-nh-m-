<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class WageParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wage_parameters')->insert([
            'employee_id' => 'PE01', // replace with actual employee id
            'base_salary' => '20.00',
            'overtime_rate' => '30.00',
            'holiday_rate' => '40.00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
