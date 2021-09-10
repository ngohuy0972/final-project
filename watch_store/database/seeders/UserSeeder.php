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
            'email'=>'huyngoit@gmail.com',
            'password'=>Hash::make('huyngo0972'),
            'role'=>'1'
        ]);

        User::create([
            'name'=>'Huy Bapp',
            'email'=>'ngohuy0164@gmail.com',
            'password'=>Hash::make('huyngo0972'),
            'role'=>'2'
        ]);
    }
}
