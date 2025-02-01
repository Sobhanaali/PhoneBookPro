<?php

namespace App\Queries;

class FindHandler
{
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function handle($query)
    {
        return $this->repository->find($query);
    }
}