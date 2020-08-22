<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "user_code" => "QTV-012345",
                "name" => "Nguyễn Văn Hiệp",
                "email" => "admin@admin.com",
                'level' => 0,
                "password" => bcrypt(123456),
                "user_practise" => "system admin",
                "status" => 1
            ]
        ]);
    }
}
