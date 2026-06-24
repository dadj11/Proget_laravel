<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('orders')->insert([[
            'client_id'=>1,
            'date'=>'10/02/2025',

            ]]);

             DB::table('order_lines')->insert([[
            'price'=>500,
            'quantity'=>2,
            'amount'=>1000,
            'order_id'=>1,
            'article_id'=>1]]);
    }
}
