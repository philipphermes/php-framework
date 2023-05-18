<?php
declare(strict_types=1);

namespace App\Component\Home\Communication\Controller;

use App\Core\AbstractController;

class HomeController extends AbstractController
{

    public function display(array $slugList): void
    {
        self::setTemplate('home');
        self::render();
    }

    public static function getRoute(): string
    {
        return '/';
    }
}