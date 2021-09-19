<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Huy Ngo',
            'email'=>'huyngoit99@gmail.com',
            'password'=>Hash::make('huyngo0972'),
            'role_id'=>'1',
            'phonenumber'=>0,
            'country'=>'',
            'city'=>'',
            'address'=>'',
            'zipcode'=>0
        ]);

        User::create([
            'name'=>'Huy Bapp',
            'email'=>'ngohuy0164@gmail.com',
            'password'=>Hash::make('huyngo0972'),
            'role_id'=>'2',
            'phonenumber'=>0,
            'country'=>'',
            'city'=>'',
            'address'=>'',
            'zipcode'=>0
        ]);
    }
}
