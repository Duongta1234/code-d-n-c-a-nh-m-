<?php

namespace Database\Seeders;

use App\Models\JobPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $job_positions = [
            [
                'title'=>'Thực tập sinh PHP',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Thực tập sinh Java',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Nhân viên Digital Marketing ',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Content Web',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Socal Media',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Nhân viên quan hệ công chúng',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Chuyên viên SEO',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Thực tập sinh Marketing',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Chuyên viên chạy Ads',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
            [
                'title'=>'Quản lý thương hiệu',
                'description' => fake()->text(50),
                'quantity'=>fake()->numberBetween(1,10),
            ],
        ];

        foreach($job_positions as $job_position){
            JobPosition::create($job_position);
        }
    }
}
