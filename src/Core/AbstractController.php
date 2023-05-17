<?php
declare(strict_types=1);

namespace App\Core;

abstract class AbstractController implements ControllerInterface
{
    public function __construct(
        private readonly ViewInterface $view,
        public ContainerInterface      $container
    )
    {
    }

    protected function redirect(string $url, int $wait = 0): void
    {
        if ($wait !== 0) {
            $header = sprintf('refresh:%s;url=%s', $wait, $url);
            header($header);
        } else {
            $header = sprintf('Location: %s', $url);
            header($header);

            die();
        }
    }

    protected function display(): void
    {
        $this->loadParams();
        $this->view->display();
    }

    protected function addParameter(string $key, mixed $value): void
    {
        $this->view->addTlpParam($key, $value);
    }

    protected function getParameter(string $key): mixed
    {
        return $this->view->getTlpParam($key);
    }

    protected function setTemplate(string $template): void
    {
        $this->view->addTemplate($template);
    }

    private function loadParams(): void
    {
    }
}