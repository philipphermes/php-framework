<?php
declare(strict_types=1);

namespace App\Core;

use App\Component\Error\Communication\Controller\ErrorController;
use Dotenv\Dotenv;

class Load
{
    public function load(): void
    {
        $this->loadEnvVars();

        $dependencies = new Dependencies();
        $dependencies->create();

        try {
            $controllerLoader = new ControllerLoader();
            $controllerLoader->load($dependencies);
        } catch (\Error $error) {
            $responseController = new ErrorController($dependencies->twig, $dependencies->container);
            $responseController->setError($error->getMessage(), 505);
            $responseController->display([]);
        }

        $dependencies->destroy();
    }

    private function loadEnvVars(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../', '.env');
        $vars = $dotenv->load();

        foreach ($vars as $key => $var) {
            if (str_contains($key, 'PATH')) {
                $_ENV[$key] = __DIR__ . '/../../' . $var;
            }
        }
    }
}