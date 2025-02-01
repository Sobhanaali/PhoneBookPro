<?php

namespace App\Repositories;

interface Repository
{
    public function create($command);
    public function find($query);
    public function validate($command);
}