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
        $controller = null;
        $parsedUrl = rtrim($_SERVER['REQUEST_URI'], '/');

        if (!str_contains($parsedUrl, 'login') && !str_contains($parsedUrl, 'logout')) {
            $_SESSION['last_page'] = $parsedUrl;
        }

        $urlNoGet = explode('?', $parsedUrl)[0];
        $pathArray = explode('/', $urlNoGet);

        /** @var \App\Core\ControllerInterface $controllerClass */
        foreach ($dependencies->controllerProvider->getList() as $controllerClass) {
            $controllerPath = rtrim($controllerClass::getRoute(), '/');
            $controllerPathArray = explode('/', $controllerPath);

            if (count($controllerPathArray) !== count($pathArray)) {
                continue;
            }

            $pathsMatch = true;
            $slugList = [];

            foreach ($controllerPathArray as $key => $path) {
                if (!isset($pathArray[$key])) {
                    $pathsMatch = false;
                    break;
                }

                if (str_contains($path, '{') && str_contains($path, '}')) {
                    $slugName = str_replace(['{', '}'], '', $path);
                    $slugList[$slugName] = urldecode($pathArray[$key]);
                } elseif ($path !== $pathArray[$key]) {
                    $pathsMatch = false;
                    break;
                }
            }

            if ($pathsMatch === true) {
                $controller = new $controllerClass(
                    $dependencies->twig,
                    $dependencies->container
                );
                break;
            }
        }

        if (!$controller instanceof ControllerInterface) {
            $controller = new ErrorController(
                $dependencies->twig,
                $dependencies->container
            );
            $controller->setError('Page ' . $parsedUrl .  ' not found');
        }

        $controller->display($slugList ?? []);
    }
}