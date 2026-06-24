<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role_datas=[
            ['name' => 'client'],
             ['name' => 'delivery_person'],
              ['name' => 'manager']
        ];

        foreach($role_datas as $role_data ){
            Role::create($role_data);
        }
    }

}