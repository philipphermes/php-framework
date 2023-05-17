<?php
declare(strict_types=1);

namespace App\Provider;

interface DependencyProviderInterface
{
    public function load(): void;
}