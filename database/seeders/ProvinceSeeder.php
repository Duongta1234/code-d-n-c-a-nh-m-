<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://provinces.open-api.vn/api/?depth=3');
        $datas =json_decode($response,true);
        
        foreach($datas as $data){
        Province::create([
            'province_name' => $data['name'],
        ]);
        }

    }
}
