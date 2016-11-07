<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\State;

class States extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = array('name'=>'En revision');
        State::create($states);
        $states = array('name'=>'Inactivo');
        State::create($states);
        $states = array('name'=>'Activo');
        State::create($states);
    }
}
