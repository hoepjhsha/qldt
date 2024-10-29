<?php

namespace TeacherManagement\Controllers;

use App\Controllers\BaseController;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class TeacherManagement extends BaseController
{
    protected string $module_name = 'TeacherManagement';

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
            $user_flag = session()->get('user')['flag_name'];
        } else {
            $user_info = 'Guest';
        }

        $csrf_token = csrf_token();
        $csrf_hash  = csrf_hash();

        return $this->twig->renderView('index.html.twig', [
            'user'       => $user_info,
            'user_flag'  => $user_flag,
            'csrf_token' => $csrf_token,
            'csrf_hash'  => $csrf_hash,
        ]);
    }
}
