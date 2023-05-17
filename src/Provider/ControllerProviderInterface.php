<?php
declare(strict_types=1);

namespace App\Provider;

interface ControllerProviderInterface
{
    /**
     * @return array<array-key, string>
     */
    public function getList(): array;
}