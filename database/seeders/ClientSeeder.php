<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([[
            'firstname'=>'Abdel'
        ,'lastname'=> 'sourou'
        ,'email'=> 'abdel25@gmail.com',
        'gender'=> 'M',
        'phone'=>'70152304',
        'password'=>Hash::make('125**Abdel'),
        'birth_day'=>'12/12/2010']]);
        DB::table('clients')->insert([[
            'user_id'=>1
            ]]);

        $user=User::firstWhere("email",'abdel25@gmail.com');
        $user->assignRole('client');

    }
}
