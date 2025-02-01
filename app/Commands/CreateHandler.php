<?php

namespace App\Commands;

class CreateHandler
{
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function handle($command)
    {
        return $this->repository->create($command);
    }
}