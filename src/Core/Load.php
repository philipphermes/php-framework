<?php
declare(strict_types=1);

namespace App\Core;

use App\Component\Error\Communication\Controller\ErrorController;
use Dotenv\Dotenv;

class Load
{
    public function load(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../', '.env');
        $dotenv->load();

        $dependencies = new Dependencies();
        $dependencies->create();

        try {
            $controllerLoader = new ControllerLoader();
            $controllerLoader->load($dependencies);
        } catch (\Error $error) {
            $responseController = new ErrorController($dependencies->view, $dependencies->container);
            $responseController->setError($error->getMessage(), 505);
            $responseController->run([]);
        }

        $dependencies->destroy();
    }
}