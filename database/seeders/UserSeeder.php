<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            'name' => 'LETSHUOER',
            'type' => 1, // Main / admin company
        ]);

        DB::table('companies')->insert([
            'name' => 'Livezoner41',
            'order_prefix' => 'LZ',
            'type' => 4, // ODM or OEM partner
        ]);

        DB::table('users')->insert([
            'name' => 'Joseph Lee',
            'email' => 'support@letshuoer.com',
            'workos_id' => 'user_01JW2V3DZQZ11ER3TSHKBNM886',
            'avatar' => 'https://workoscdn.com/images/v1/F2XgLySXt0-cmYFXUYSdfGrX8vvwfq3ExAPURap9asI',
            'type' => 4, // Super admin
            'company_id' => 1
        ]);

        

        DB::table('users')->insert([
            'name' => 'Test User',
            'workos_id' => 'user_01KEXGR3689V7QQ907VVACRAPP',
            'email' => 'wetsandals@gmail.com',
            'avatar' => 'https://workoscdn.com/images/v1/F2XgLySXt0-cmYFXUYSdfGrX8vvwfq3ExAPURap9asI',
        ]);

        DB::table('users')->insert([
            'name' => 'Test ODM User',
            'workos_id' => 'user_01JW2X87CV96AK435RQPRT664R',
            'email' => 'tinwai.joseph.lee@gmail.com',
            'type' => 2, // Company admin
            'company_id' => 2, // Assuming the second company is the ODM or OEM partner
            'avatar' => 'https://workoscdn.com/images/v1/I0rUObntPQTvwNc0RT0cVzsfcYvxncr8xEOCdwNWfw0',
        ]);

        
    }
}
