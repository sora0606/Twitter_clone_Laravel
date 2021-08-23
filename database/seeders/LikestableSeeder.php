<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikestableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //likesテーブルにデータをinsert
        DB::table('likes')->insert([
            [
                'user_id' => 1,
                'tweet_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
