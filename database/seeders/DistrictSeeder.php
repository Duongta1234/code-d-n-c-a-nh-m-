<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://provinces.open-api.vn/api/?depth=3');
        $datas =json_decode($response,true);
        
        foreach($datas as $keyData=>$data){
            foreach($data['districts'] as $district){
                District::create([
                    'district_name' => $district['name'],
                    'province_id' => $keyData+1,
                ]);
            }
        }
    }
}
