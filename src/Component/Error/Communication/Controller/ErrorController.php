<?php
declare(strict_types=1);

namespace App\Component\Error\Communication\Controller;

use App\Core\AbstractController;

class ErrorController extends AbstractController
{
    private string $error = 'Page not found!';
    private int $response = 404;

    public function setError(string $error, int $response = 404): void
    {
        $this->error = $error;
        $this->response = $response;
    }

    public function display(array $slugList): void
    {
        $this->addParameter('response', $this->response);
        $this->addParameter('error', $this->error);
        $this->setTemplate('error');
        $this->render();
    }

    public static function getRoute(): string
    {
        return '/error';
    }
}