<?php

namespace App\Repositories;

//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Illuminate\Support\Facades\DB;


abstract class AbstractBaseRepository
{
    protected $model;

    public function __construct()
    {
        $model = $this->model();
        $this->model = new $model();
    }

    abstract public function model();

    public function listRepository()
    {
        return $this->model->list();
    }

    public function insertRepository($input)
    {
        return $this->model->insert($input);
    }

    public function updateRepository($input)
    {
        return $this->model->update($input);
    }

    public function deleteRepository($input)
    {
        return $this->model->delete($input);
    }

/*    public function findRepository($input)
    {
        $input['columns'] ??= ['*'];
        return $this->model->findOrFail($input['id'], $input['columns']);
    }*/

/*    public function showRepository($input)
    {
        $function = $this->model->where($input['where']);//->orWhere($input['or_where']);
        return $function
            ->orderBy($input['order_by_column'], $input['order_by_direction'])
            ->first();
    }*/
}
