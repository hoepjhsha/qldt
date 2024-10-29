<?php

namespace Home\Controllers;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Home extends \App\Controllers\BaseController
{
    protected string $module_name = 'Home';

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(): string
    {
        if (session()->has('user')) {
            $user_info = session()->get('user')['name'];
            $user_info = ucwords($user_info);
        } else {
            $user_info = 'Guest';
        }

        $csrf_token = csrf_token();
        $csrf_hash  = csrf_hash();

        return $this->twig->renderView('index.html.twig', [
            'user'       => $user_info,
            'csrf_token' => $csrf_token,
            'csrf_hash'  => $csrf_hash,
        ]);
    }
}
