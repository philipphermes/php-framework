<?php
declare(strict_types=1);

namespace App\Core;

interface DependenciesInterface
{
    public function create(): void;

    public function destroy(): void;
}