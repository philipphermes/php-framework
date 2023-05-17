<?php
declare(strict_types=1);

namespace App\Core;

use App\Component\Error\Communication\Controller\ErrorController;

class Load
{
    public function load(): void
    {
        $dependencies = new Dependencies();
        $dependencies->create();

        try {
            $controllerLoader = new ControllerLoader();
            $controllerLoader->load($dependencies);
        } catch (\Error $error) {
            $responseController = new ErrorController($dependencies->view, $dependencies->container);
            $responseController->setErrorObj($error);
            $responseController->setError('Internal Server Error', 505);
            $responseController->run([]);
        }

        $dependencies->destroy();
    }
}