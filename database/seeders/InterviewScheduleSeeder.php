<?php

namespace Database\Seeders;

use App\Models\InterviewSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterviewScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InterviewSchedule::factory()->count(10)->create();
    }
}
