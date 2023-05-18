<?php
declare(strict_types=1);

namespace App\Core;

interface TwigInterface
{
    public function setTemplate(string $template): void;

    public function getTemplate(): string;

    public function addTemplateParameter(string $key, mixed $value): void;

    public function getTemplateParameters(): array;

    public function render(): void;
}