<?php
declare(strict_types=1);

namespace App\Provider;

use App\Component\Error\Communication\Controller\ErrorController;
use App\Component\Home\Communication\Controller\HomeController;

class ControllerProvider implements ControllerProviderInterface
{
    /**
     * @return array<array-key, string>
     */
    public function getList(): array
    {
        return [
            HomeController::class,
            ErrorController::class,
        ];
    }
}