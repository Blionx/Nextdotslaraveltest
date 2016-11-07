<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Property extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description','address','town','county','country','state_id',
    ];

    /**
     * Name of the table.
     *
     * @var string
     */
    protected $table="Property";

    public function State(){
        return $this->hasOne('App\State','id','state_id');
    }
    public function fac(){
        return $this->hasMany('App\PropertyFacilities','property_id','id');
    }
}