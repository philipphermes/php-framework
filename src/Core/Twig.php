<?php
declare(strict_types=1);

namespace App\Core;

use Twig\Environment;
use Twig\Error\Error;
use Twig\Loader\FilesystemLoader;

class Twig implements TwigInterface
{
    private Environment $twig;
    private string $template = 'home.html.twig';
    private array $templateParameters = [];

    public function __construct()
    {
        $loader = new FilesystemLoader($_ENV['TWIG_TEMPLATE_PATH']);
        $this->twig = new Environment($loader, [
            'cache' => $_ENV['TWIG_CACHE_PATH']
        ]);
    }

    public function setTemplate(string $template): void
    {
        if (!str_contains($template, '.html.twig')) {
            $template .= '.html.twig';
        }

        $this->template = $template;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function addTemplateParameter(string $key, mixed $value): void
    {
        $this->templateParameters[$key] = $value;
    }

    public function getTemplateParameters(): array
    {
        return $this->templateParameters;
    }

    public function render(): void
    {
        try {
            $template = $this->twig->load($this->template);
            echo $template->render($this->templateParameters);
        } catch (Error $error) {
            exit("Error: {$error}");
        }
    }
}