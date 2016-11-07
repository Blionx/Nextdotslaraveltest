<?php namespace App\Repositories\Models;
 
use App\Repositories\RepositoryInterface;
use App\Repositories\Repository;
 
class PropertyModel extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Property';
    }
}