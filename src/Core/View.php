<?php

namespace App\Core;

class View implements ViewInterface
{
    private array $params = [];
    private string $template = "error.tpl";

    public function __construct(
        private readonly \Smarty $smarty,
    )
    {
        $this->smarty->caching = false;
        $this->smarty->setTemplateDir(__DIR__ . '/../../templates');
        $this->smarty->setCompileDir(__DIR__ . '/../../smarty/templates_c');
        $this->smarty->setCacheDir(__DIR__ . '/../../smarty/cache');
        $this->smarty->setConfigDir(__DIR__ . '/../../smarty/config');
    }

    public function addTlpParam(string $key, mixed $value): void
    {
        $this->params[$key] = $value;
    }

    public function getTlpParam(string $key): mixed
    {
        return $this->params[$key];
    }

    public function addTemplate(string $template): void
    {
        if(!str_contains('.tpl', $template)) {
            $template .= '.tpl';
        }

        $this->template = $template;
    }

    public function display(): void
    {
        try {
            $this->smarty->assign($this->params);
            $this->smarty->display($this->template);
        } catch (\Exception $e) {
            exit("Error: {$e}");
        }
    }

    public function getTemplate(): string
    {
        return $this->template;
    }
}