<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'taro',
            'mail' => 'taro@co.jp',
            'password' => 'password',
        ]);
    }
}
