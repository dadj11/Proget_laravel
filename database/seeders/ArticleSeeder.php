<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        echo("article seeder call");
        for($i=0 ;$i<10;$i++){
        $categories=DB::table('categories')->pluck('id');
        DB::table('articles')->insert([
            ['label'=>"Clavier$i",
            'quantite'=>4,
            'current_price'=>500,
            'is_active'=>true,
            'categorie_id'=>$categories[$i]]

        ]);
    }}
}
