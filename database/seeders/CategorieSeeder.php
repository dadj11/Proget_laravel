<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    for($i=0 ;$i<10;$i++){
        echo("categorie seeder call");
        DB::table('categories')->insert([
            ['label'=>"Electronique$i",
            'is_active'=>true,
            'nb_article'=>4,
            'slug'=>"electronique$i"]
            //  ,
            //   ['label'=>'Vetement',
            // 'is_active'=>true,
            // 'nb_article'=>4,
            // 'slug'=>'vetement']


        ]); };
    }

}
