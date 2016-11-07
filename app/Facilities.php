<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Facilities extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Name of the table.
     *
     * @var string
     */
    protected $table="Facilities";
}