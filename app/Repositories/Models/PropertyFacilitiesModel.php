<?php namespace App\Repositories\Models;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class PropertyFacilitiesModel extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\PropertyFacilities';
    }
}