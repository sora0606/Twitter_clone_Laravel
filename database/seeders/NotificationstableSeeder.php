<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //notificationsテーブルにデータをinsert
        DB::table('notifications')->insert([
            [
                'recleved_user_id' => 1,
                'sent_user_id' => 2,
                'message' => 'フォローされました。',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'recleved_user_id' => 2,
                'sent_user_id' => 1,
                'message' => 'いいね！されました。',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
