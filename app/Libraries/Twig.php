<?php

namespace App\Libraries;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Twig
{
    private Environment $twig;

    public function __construct($modulePath)
    {
        $loader     = new \Twig\Loader\FilesystemLoader(is_dir($modulePath) ? $modulePath : APPPATH . 'Views');
        $this->twig = new Environment($loader, [
            'cache'       => WRITEPATH . 'cache/twig',
            'auto_reload' => true,
        ]);
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function renderView(mixed $template, ?array $data = []): string
    {
        return $this->twig->render($template, $data);
    }
}
