<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {


      echo("database seeder call");
      $this->call([
        RoleSeeder::class,
        PermitionSeeder::class,
        RolePermitionSeeder::class,
        CategorieSeeder::class,
        ArticleSeeder::class,
        ClientSeeder::class,
        StaffSeeder::class,
        OrderSeeder::class,



        ]);

        // User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        // ]);
    }
}