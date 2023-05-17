<?php

namespace App\Core;

use App\Component\Error\Communication\Controller\ErrorController;

class ControllerLoader
{
    /**
     * @param \App\Core\Dependencies $dependencies
     * @return void
     */
    public function load(DependenciesInterface $dependencies): void
    {
        //TODO fix loading
        $view = $dependencies->view;
        $container = $dependencies->container;
        $controllerProvider = $dependencies->controllerProvider;

        $controller = null;

        $parsed_url = rtrim($_SERVER['REQUEST_URI'], '/');

        if (!str_contains($parsed_url, 'login') && !str_contains($parsed_url, 'logout')) {
            $_SESSION['last_page'] = $parsed_url;
        }

        $pathArray = explode('/', $parsed_url);
        $slugList = [];

        /** @var \App\Core\ControllerInterface $controllerClass */
        foreach ($controllerProvider->getList() as $controllerClass) {
            $controllerPathArray = explode('/', $controllerClass::getRoute());

            $pathsMatch = true;
            $slugList = [];

            /**
             * @var int $key
             * @var string $path
             */
            foreach ($pathArray as $key => $path) {
                if (!isset($controllerPathArray[$key])) {
                    $pathsMatch = false;
                    break;
                }

                $pathRemovedGet = explode('?', $path)[0];

                if ($controllerPathArray[$key] === $pathRemovedGet) {
                    continue;
                } elseif (str_contains($controllerPathArray[$key], '{')
                    && str_contains($controllerPathArray[$key], '}')) {
                    $slugName = str_replace(['{', '}'], '', $controllerPathArray[$key]);
                    $slugList[$slugName] = urldecode($pathRemovedGet);
                } else {
                    $pathsMatch = false;
                    break;
                }
            }

            if ($pathsMatch === true) {
                $controller = new $controllerClass($view, $container);
                break;
            }
        }

        if (!$controller instanceof ControllerInterface) {
            $controller = new ErrorController($view, $container);
            $controller->setError('Page ' . $parsed_url .  ' not found', 404);
        }

        $controller->run($slugList);
    }
}