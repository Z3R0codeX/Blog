<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            'name'=>'Luis Jimenez',
            'email'=>'Z3R0@mail.com',
            'password'=>Hash::make('123'),
            'nickname'=>'Z3R0',
            'img'=>'default.jpg',
            'created_at'=>date('Y-m-d h:m:s')

        ]);
        for($i=0;$i<50;$i++){
        DB::table('users')->insert([

            'name'=>'Admin'.$i,
            'email'=>'Admin'.$i.'@mail.com',
            'password'=>Hash::make('987'),
            'nickname'=>'Admin'.$i,
            'img'=>'default.jpg',
            'created_at'=>date('Y-m-d h:m:s')

        ]);

        }

    }
}
