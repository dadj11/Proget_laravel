<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $client_role=Role::where("name","client")->first();
        echo($client_role);

        $client_role->syncPermissions(Permission::where("name",'article.view')
                                                ->get());

        $manager_role=Role::where("name","manager")->first();
        $manager_role->syncPermissions(Permission::all());
    }
}
