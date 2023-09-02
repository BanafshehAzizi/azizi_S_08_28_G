<?php

namespace App\Services;


abstract class AbstractBaseService
{
    protected $repository;

    public function __construct()
    {
        $repository = $this->repository();
        return $this->repository = new $repository();
    }

    abstract public function repository();

    public function listService()
    {
        return $this->repository->listRepository();
    }

    public function insertService($input)
    {
        return $this->repository->insertRepository($input);
    }

    public function updateService($input)
    {
        return $this->repository->updateRepository($input);
    }

    public function deleteService($input)
    {
        $this->repository->deleteRepository($input);
    }

    public function findService($input)
    {
        return $this->repository->findRepository($input);
    }

    public function showWithFailService($input)
    {
        return $this->repository->showWithFailRepository($input);
    }

    public function showService($input)
    {
        return $this->repository->showRepository($input);
    }

}
