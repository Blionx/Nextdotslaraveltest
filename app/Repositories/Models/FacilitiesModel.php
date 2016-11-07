<?php namespace App\Repositories\Models;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class FacilitiesModel extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Facilities';
    }
}