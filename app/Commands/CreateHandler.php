<?php

namespace App\Commands;

class CreateHandler extends Handler
{
    public function handle($command)
    {
        return $this->repository->create($command);
    }
}