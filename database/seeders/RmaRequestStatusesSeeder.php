<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RmaRequestStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rma_request_statuses')->insert([
            ['status' => 'requested'],
            ['status' => 'ongoing updated'],
            ['status' => 'ongoing replied'],
            ['status' => 'accepted'],
            ['status' => 'returning'],
            ['status' => 'returned'],
            ['status' => 'required payment'],
            ['status' => 'queued'],
            ['status' => 'processing'],
            ['status' => 'fulfilled'],
            ['status' => 'completed'],
        ]);
    }
}
