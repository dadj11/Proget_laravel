<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /**
         * resource.view
         * resource.create
         * resource.update
         * resource.delete
         * resource.action
         */
        $permition_names=[
            "article.view",
            "article.create",
            "article.update",
            "article.delete",

            "order.view",
            "order.create",
            "order.update",

            "staff.view",
            "staff.create",
            "staff.update",
            "staff.delete",

            "categorie.view",
            "categorie.create",
            "categorie.update",
            "categorie.delete",
        ];


        foreach($permition_names as $permition_name ){
            Permission::create( ['name' => $permition_name]);
        }
    }
}
