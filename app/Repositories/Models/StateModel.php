<?php namespace App\Repositories\Models;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class StateModel extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\State';
    }
}