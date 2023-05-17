<?php

namespace App\Core;

class Container implements ContainerInterface
{
    /** @var object[] */
    private array $objectList = [];

    public function set(string $class, object $object): void
    {
        $this->objectList[$class] = $object;
    }

    public function get(string $class)
    {
        if(!array_key_exists($class, $this->objectList)) {
            $message = substr("Class: %s not found in Container", $class);
            throw new \RuntimeException($message);
        }

        return $this->objectList[$class];
    }
}