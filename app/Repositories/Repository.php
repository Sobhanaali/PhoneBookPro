<?php

namespace App\Repositories;

interface Repository
{
    public function create($command);
    public function validate($command);
    public function update($command);
    public function delete($command);
}