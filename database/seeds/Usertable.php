<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Hash;

class Usertable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $info = array('name'=>'superadmin','email'=>'superadmin@user.com','password'=> Hash::make('password'));
        User::create($info);
    }
}
