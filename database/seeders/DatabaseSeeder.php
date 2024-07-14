<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this::call([
            RoleSeeder::class,
            UserSeeder::class,
            CardSeeder::class,
            ReligionSeeder::class,
            NationalitySeeder::class,
            EthnicitySeeder::class,
            PositionSeeder::class,
            LevelSeeder::class,
            EmployeeSeeder::class,
            StatusEmployeeSeeder::class,
            ContractSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            WardSeeder::class,
            JobPositionSeeder::class,
            JobPostingSeeder::class,
            CandidateSeeder::class,
            InterviewScheduleSeeder::class,
            InterviewResultSeeder::class,
            TimeSheetSeeder::class,
            BasicSalarySeeder::class,
            SalarySeeder::class
        ]);
    }
}
