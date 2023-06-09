<?php
declare(strict_types=1);

namespace App\Core;

use App\Provider\ControllerProvider;
use App\Provider\ControllerProviderInterface;
use App\Provider\DependencyProvider;

class Dependencies implements DependenciesInterface
{
    public TwigInterface $twig;
    public ContainerInterface $container;
    public ControllerProviderInterface $controllerProvider;

    public function create(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $this->twig = new Twig();
        $this->container = new Container();
        $this->controllerProvider = new ControllerProvider();

        (new DependencyProvider($this->container))->load();
    }

    public function destroy(): void
    {
    }
}