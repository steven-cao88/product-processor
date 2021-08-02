<?php

namespace App\Processors;

abstract class BaseProcessor
{
    protected $payload = [];

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->payload)) {
            return $this->payload[$name];
        }

        return null;
    }

    public function __isset(string $name)
    {
        return isset($this->payload[$name]);
    }

    abstract public function process();
}