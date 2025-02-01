<?php

namespace App\Commands;

class Command
{
    private $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function get($key)
    {
        if($this->data[$key]){
            return $this->data[$key];
        }
    }
}