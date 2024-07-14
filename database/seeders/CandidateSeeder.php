<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $candidates = [
        [
            'name'=>'Nguyễn Huy Dương',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv1.pdf',
        ],
        [
            'name'=>'Trần Đình Tùng',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv2.pdf',
        ],
        [
            'name'=>'Tạ Hoàng Châu',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv3.pdf',
        ],
        [
            'name'=>'Kiều Hồng Hạnh',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv4.pdf',
        ],
        [
            'name'=>'Vũ Phạm Minh',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv5.pdf',
        ],
        [
            'name'=>'Nguyễn Văn Nguyên',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv6.pdf',
        ],
        [
            'name'=>'Trần Minh Hậu',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv7.pdf',
        ],
        [
            'name'=>'Hoàng Văn Hùng',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv8.pdf',
        ],
        [
            'name'=>'Nguyễn Huy Thọ',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv9.pdf',
        ],
        [
            'name'=>'Nguyễn Văn Tuyên',
            'email' => fake()->unique()->safeEmail(),
            'phone'=>'0329483928',
            'address'=>'Mê Linh, Mê Linh, Hà Nội',
            'job_posting_id'=>fake()->numberBetween(1,10),
            'file_cv'=>'cv10.pdf',
        ],
       ];

       foreach ($candidates as $candidate) {
        Candidate::create($candidate);
       }
    }
}
