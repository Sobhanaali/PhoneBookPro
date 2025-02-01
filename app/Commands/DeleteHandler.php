<?php

namespace App\Commands;

class DeleteHandler extends Handler
{
    public function handle($command)
    {
        $this->repository->delete($command);
    }
}