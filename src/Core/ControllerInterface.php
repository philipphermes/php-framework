<?php

namespace App\Core;

interface ControllerInterface
{
    public function __construct(
        ViewInterface $view,
        ContainerInterface $container
    );

    /**
     * @param array<string, string> $slugList
     * @return void
     */
    public function run(array $slugList): void;

    public static function getRoute(): string;
}