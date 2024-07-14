<?php

namespace Database\Seeders;

use App\Models\TimeSheet;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $startDate = Carbon::now()->subMonths(3); // Ngày bắt đầu: 3 tháng trước
        // $endDate = Carbon::now(); // Ngày kết thúc: ngày hiện tại
        // $employeeIds = ['PE01', 'PE02', 'PE03', 'PE04', 'PE05', 'PE06', 'PE07', 'PE08', 'PE09', 'PE10'];

        // $dates = [];
        // while ($startDate->lte($endDate)) {
        //     $dates[] = $startDate->copy();
        //     $startDate->addDay(); // Tăng ngày lên 1
        // }

        // foreach ($dates as $date) {
        //     foreach ($employeeIds as $employeeId) {
        //         TimeSheet::create([
        //             'employee_id' => $employeeId,
        //             'log_date' => $date,
        //             'time_in' => Carbon::now()->format('H:i:s'),
        //             'time_out' => Carbon::now()->format('H:i:s'),
        //             'status'=> 1
        //         ]);
        //     }
        // }

        $startDate = Carbon::parse('2023-01-01'); // Thay đổi ngày bắt đầu theo nhu cầu của bạn
        $endDate = $endDate = Carbon::now(); // Thay đổi ngày kết thúc theo nhu cầu của bạn
        $employeeIds = ['PE01', 'PE02', 'PE03', 'PE04', 'PE05', 'PE06', 'PE07', 'PE08', 'PE09', 'PE10'];


        // Lặp qua từng ngày từ ngày bắt đầu đến ngày kết thúc
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            // Kiểm tra xem ngày hiện tại có phải là chủ nhật không
            if ($date->dayOfWeek !== Carbon::SUNDAY) {
                foreach ($employeeIds as $employeeId) {
                            TimeSheet::create([
                                'employee_id' => $employeeId,
                                'log_date' => $date,
                                'time_in' => Carbon::now()->format('H:i:s'),
                                'time_out' => Carbon::now()->format('H:i:s'),
                                'status'=> 1
                            ]);
                        }
            }
        }

    }
}
