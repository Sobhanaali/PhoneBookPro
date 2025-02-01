<?php

namespace App\Queries;

class FindAllHandler
{
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function handle($query)
    {
        return $this->repository->findAll($query);
    }
}