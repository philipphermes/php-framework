<?php

namespace App\Core;

interface ViewInterface
{
    public function addTlpParam(string $key, mixed $value): void;

    public function getTlpParam(string $key): mixed;

    public function addTemplate(string $template): void;

    public function display(): void;

    public function getTemplate(): string;
}