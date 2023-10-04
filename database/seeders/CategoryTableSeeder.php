<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'category'   => 'Project Website',
                'status'     => 'active',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'category'   => 'Project Mobile',
                'status'     => 'active',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'category'   => 'Project Games',
                'status'     => 'active',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        DB::table('m_category_task')->insert($data);
    }
}
