<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $data = [
            [
                'name' => 'Admin',
                'email'=> 'myadmin@gmail.com',
                'role' => 'admin',
                'password'  => md5('admin123'),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Alexander',
                'email'=> 'alexander@gmail.com',
                'role' => 'user',
                'password'   => md5('alexander3'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Romeo',
                'email'=> 'romeo@gmail.com',
                'role' => 'user',
                'password'   => md5('alexander3'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        DB::table('users')->insert($data);
    }
}
