<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'level_name'=>'THPT',
            ],
            [
                'level_name'=>'Cao đẳng',
            ],
            [
                'level_name'=>'Đại Học',
            ],
        ];
        foreach($levels as $level){
            Level::create($level);
        }
    }
}
