<?php
declare(strict_types=1);

namespace App\Core;

use App\Provider\ControllerProvider;
use App\Provider\ControllerProviderInterface;
use App\Provider\DependencyProvider;

class Dependencies implements DependenciesInterface
{
    public \Smarty $smarty;
    public ViewInterface $view;
    public ContainerInterface $container;
    public ControllerProviderInterface $controllerProvider;

    public function create(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $this->smarty = new \Smarty();
        $this->view = new View($this->smarty);
        $this->container = new Container();
        $this->controllerProvider = new ControllerProvider();

        (new DependencyProvider($this->container))->load();
    }

    public function destroy(): void
    {
    }
}