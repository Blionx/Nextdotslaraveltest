<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Facilities;

class facilitiestable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facilities = array('name'=>'Edificio con ascensor');
        Facilities::create($facilities);
        $facilities = array('name'=>'Piscina');
        Facilities::create($facilities);
        $facilities = array('name'=>'Estacionamiento');
        Facilities::create($facilities);
        $facilities = array('name'=>'Cocina');
        Facilities::create($facilities);
        $facilities = array('name'=>'Aire Acondicionado');
        Facilities::create($facilities);
        $facilities = array('name'=>'Calefacción');
        Facilities::create($facilities);
    }
}
