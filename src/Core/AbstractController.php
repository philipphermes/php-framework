<?php
declare(strict_types=1);

namespace App\Core;

abstract class AbstractController implements ControllerInterface
{
    public function __construct(
        private readonly TwigInterface $twig,
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

    protected function render(): void
    {
        $this->loadParams();
        $this->twig->render();
    }

    protected function addParameter(string $key, mixed $value): void
    {
        $this->twig->addTemplateParameter($key, $value);
    }

    protected function getParameters(): array
    {
        return $this->twig->getTemplateParameters();
    }

    protected function setTemplate(string $template): void
    {
        $this->twig->setTemplate($template);
    }

    private function loadParams(): void
    {
    }
}