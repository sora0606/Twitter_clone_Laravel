<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::unprepared("ALTER TABLE users AUTO_INCREMENT = 1 ");

        //usersテーブルにデータをinsert
        DB::table('users')->insert([
            [
                'nickname' => '太郎',
                'name' => 'user1',
                'email' => 'test1@gmail.com',
                'password' => Hash::make('testpass1'),
                'file_name' => 'IMG_3523.JPG',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nickname' => '花子',
                'name' => 'user2',
                'email' => 'test2@gmail.com',
                'password' => Hash::make('testpass2'),
                'file_name' => '4B8DB850-D666-4279-AF1E-B9C501E4097A.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
