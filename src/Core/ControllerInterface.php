<?php

namespace App\Core;

interface ControllerInterface
{
    public function __construct(
        TwigInterface      $twig,
        ContainerInterface $container
    );

    /**
     * @param array<string, string> $slugList
     * @return void
     */
    public function display(array $slugList): void;

    public static function getRoute(): string;
}