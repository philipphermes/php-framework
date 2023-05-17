<?php
declare(strict_types=1);

namespace App\Component\Error\Communication\Controller;

use App\Core\AbstractController;

class ErrorController extends AbstractController
{
    private string $error;
    private int $response;

    public function setError(string $error, int $response = 404): void
    {
        $this->error = $error;
        $this->response = $response;
    }

    public function run(array $slugList): void
    {
        $this->addParameter('response', $this->response);
        $this->addParameter('error', $this->error);
        $this->setTemplate('error');
        $this->display();
    }

    public static function getRoute(): string
    {
        return '/error';
    }
}