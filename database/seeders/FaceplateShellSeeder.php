<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaceplateShellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            $faceplateName = "C" . $i < 10 ? "0" . $i : $i;
            DB::table('faceplate')->insert([
                'name' => $faceplateName,
                'available' => 1, // 1: available, 0: not available
            ]);
        }

        for ($i = 1; $i <= 15; $i++) {
            $shellName = "T" . $i < 10 ? "0" . $i : $i;
            DB::table('faceplate')->insert([
                'name' => $shellName,
                'available' => 1, // 1: available, 0: not available
            ]);
        }
    }
}
