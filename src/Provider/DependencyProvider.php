<?php
declare(strict_types=1);

namespace App\Provider;

use App\Core\ContainerInterface;

class DependencyProvider implements DependencyProviderInterface
{
    public function __construct(
        private ContainerInterface     $container,
    )
    {
    }

    public function load(): void
    {
    }
}