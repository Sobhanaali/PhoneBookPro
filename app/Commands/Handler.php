<?php

namespace App\Commands;

abstract class Handler
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    abstract public function handle($command);
}