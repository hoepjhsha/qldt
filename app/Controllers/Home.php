<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected string $module_name = '';

    public function index(): string
    {
        return view('welcome_message');
    }
}
