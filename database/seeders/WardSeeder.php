<?php

namespace Database\Seeders;

use App\Models\Ward;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://provinces.open-api.vn/api/?depth=3');
        $datas =json_decode($response,true);
        
        foreach($datas as $keyData=>$data){
            foreach($data['districts'] as $keyDistrict=>$district){
                foreach($district['wards'] as $ward){
                    Ward::create([
                        'ward_name' => $ward['name'],
                        'district_id' => $keyDistrict+1,
                    ]);
                }
            }
        }
    }
}
