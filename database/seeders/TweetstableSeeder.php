<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TweetstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tweetsテーブルにデータをinsert
        DB::table('tweets')->insert([
            [
                'user_id' => 1,
                'body' => 'テストメッセージ',
                'image_name' => null,
                'video_name' => 'F09CD6FF-A7C9-4F3F-9262-53C26E626FF7.mov',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'body' => 'テストメッセージ二回目',
                'image_name' => 'test-tweet-img.jpeg',
                'video_name' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
