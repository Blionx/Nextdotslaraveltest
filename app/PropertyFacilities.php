<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PropertyFacilities extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id','facility_id',
    ];

    /**
     * Name of the table.
     *
     * @var string
     */
    protected $table="properies_facilities";
}