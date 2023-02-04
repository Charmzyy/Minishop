<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
               'name'=>'Admin',
               'email'=>'johndoe@hotmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('07070707'),
            ],
            [
               'name'=>'John',
               'email'=>'john@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('07070707'),
            ],
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
    
}
