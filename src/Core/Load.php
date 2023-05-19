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

        if ($_ENV['DEV'] === true || $_ENV['DEV'] === 'true') {
            $this->rmdirRecursive($_ENV['TWIG_CACHE_PATH']);
        }

        $dependencies = new Dependencies();
        $dependencies->create();

        try {
            $controllerLoader = new ControllerLoader();
            $controllerLoader->load($dependencies);
        } catch (\Error | \Exception $e) {
            $responseController = new ErrorController($dependencies->twig, $dependencies->container);
            $responseController->setError($e->getMessage(), 500);
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
                $_ENV[$key] = __DIR__ . '/../..' . $var;
            }
        }
    }

    private function rmdirRecursive($dir): void {
        foreach(scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) $this->rmdirRecursive("$dir/$file");
            else unlink("$dir/$file");
        }
        rmdir($dir);
    }
}