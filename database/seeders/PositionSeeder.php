<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $position_name_arr = ['Designer', 'Web Developer', 'Developer', 'System Analyst'];
        foreach ($position_name_arr as $key => $value) {
            DB::table('position')->insert([
                'position_name' => $value,
            ]);
        }
    
    }
}
