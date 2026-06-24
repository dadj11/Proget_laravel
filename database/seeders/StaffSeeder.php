<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([[
            'firstname'=>'Jamse'
        ,'lastname'=> 'Wountou'
        ,'email'=> 'WWountou25@gmail.com',
        'gender'=> 'M',
        'phone'=>'71452002',
        'password'=>Hash::make('125**ww'),
        'birth_day'=>'12/09/2010']]);
        DB::table('staffs')->insert([[
            'user_id'=>2
        ]]);

        $user=User::firstWhere("email",'WWountou25@gmail.com');
        $user->assignRole('manager');
    }
}
