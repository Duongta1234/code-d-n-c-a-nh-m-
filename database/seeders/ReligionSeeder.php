<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = [
            [
                'religion_name' => 'Hồi giáo',
                'religion_another_name' => 'Hồi giáo'
            ],
            [
                'religion_name' => 'Phật giáo',
                'religion_another_name' => 'Phật giáo'
            ],
            [
                'religion_name' => 'Thiên chúa giáo',
                'religion_another_name' => 'Thiên chúa giáo'
            ],
        ];

        foreach($religions as $religion){
            Religion::create($religion);
        }
    }
}
