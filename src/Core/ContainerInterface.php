<?php

namespace App\Core;

interface ContainerInterface
{
    public function set(string $class, object $object): void;

    public function get(string $class);
}