<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'title'     => 'product_access',
                'status'    =>  '1'
            ],
            [
                'title'     => 'product_create',
                'status'    =>  '1'
            ],
            [
                'title'     => 'product_edit',
                'status'    =>  '1'
            ],
            [
                'title'     => 'product_delete',
                'status'    =>  '1'
            ],

        ];

        Permission::insert($permissions);
    }
}
