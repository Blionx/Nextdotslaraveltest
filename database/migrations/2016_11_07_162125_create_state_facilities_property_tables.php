<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateFacilitiesPropertyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('State', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('Property', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('address');
            $table->string('town');
            $table->string('county');
            $table->string('country');
            $table->integer('state_id');
            $table->timestamps();
        });
        Schema::create('properies_facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->integer('facility_id');
            $table->timestamps();
        });
        Schema::create('Facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('State');
        Schema::drop('Property');
        Schema::drop('properies_facilities');
        Schema::drop('Facilities');
    }
}
