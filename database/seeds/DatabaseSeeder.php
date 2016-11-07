<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(facilitiestable::class);
        $this->call(States::class);
        $this->call(Usertable::class);
    }
}
