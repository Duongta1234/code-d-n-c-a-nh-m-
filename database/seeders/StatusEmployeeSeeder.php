<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\StatusEmployee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusEmployees = [
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE01',
            ],
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE02',
            ],
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE03',
            ],
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE04',
            ], [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE05',
            ],
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE06',
            ],
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE07',
            ],
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE08',
            ],
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE09',
            ],
            [
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'end_date'=> Carbon::createFromFormat('Y-m-d', '2023-01-01')->format('Y-m-d'),
                'status'=> 0,
                'employee_id'=>'PE10',
            ]
        ];

        foreach($statusEmployees as $statusEmployee){
            StatusEmployee::create($statusEmployee);
        }
    }
}
