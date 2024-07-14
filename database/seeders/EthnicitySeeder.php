<?php

namespace Database\Seeders;

use App\Models\Ethnicity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ethnicities = [
            ['ethnicity_name'=>'Kinh'],
            ['ethnicity_name'=>'Mông'],
            ['ethnicity_name'=>'Thái'],
            ['ethnicity_name'=>'Tày'],
        ];

        foreach($ethnicities as $ethnicity){
            Ethnicity::create($ethnicity);
        }
    }
}
