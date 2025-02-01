<?php

namespace App\Commands;

class UpdateHandler extends Handler
{
    public function handle($command)
    {
        $this->repository->update($command);
    }
}