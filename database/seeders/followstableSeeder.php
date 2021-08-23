<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class followstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //followsテーブルにデータをinsert
        DB::table('follows')->insert([
            [
                'follow_user_id' => 2,
                'followed_user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
