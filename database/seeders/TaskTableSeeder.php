<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
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
                'id_category'   => '1',
                'id_user'       => '2',
                'task'          => 'Create Design Website',
                'status'        => 'progress',
                'description'   => 'Create layout homepage using figma',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '1',
                'id_user'       => '2',
                'task'          => 'Integrasi API',
                'status'        => 'hold',
                'description'   => 'Integrasi API List Article',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '2',
                'id_user'       => '2',
                'task'          => 'Testing Feature Scan Barcode',
                'status'        => 'progress',
                'description'   => 'Testing feature scan barcode with developer',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '1',
                'id_user'       => '2',
                'task'          => 'Integrasi API',
                'status'        => 'hold',
                'description'   => 'Integrasi API List Article',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '2',
                'id_user'       => '2',
                'task'          => 'Testing Feature Scan Barcode',
                'status'        => 'progress',
                'description'   => 'Testing feature scan barcode with developer',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '1',
                'id_user'       => '2',
                'task'          => 'Integrasi API',
                'status'        => 'hold',
                'description'   => 'Integrasi API List Article',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '2',
                'id_user'       => '2',
                'task'          => 'Testing Feature Scan Barcode',
                'status'        => 'progress',
                'description'   => 'Testing feature scan barcode with developer',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '1',
                'id_user'       => '3',
                'task'          => 'Integrasi API',
                'status'        => 'hold',
                'description'   => 'Integrasi API List Article',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '2',
                'id_user'       => '3',
                'task'          => 'Testing Feature Scan Barcode',
                'status'        => 'progress',
                'description'   => 'Testing feature scan barcode with developer',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '2',
                'id_user'       => '3',
                'task'          => 'Testing Feature Scan Barcode',
                'status'        => 'progress',
                'description'   => 'Testing feature scan barcode with developer',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_category'   => '2',
                'id_user'       => '3',
                'task'          => 'Testing Feature Scan Barcode',
                'status'        => 'progress',
                'description'   => 'Testing feature scan barcode with developer',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
        ];

        DB::table('task')->insert($data);
    }
}
