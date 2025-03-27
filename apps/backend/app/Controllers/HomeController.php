<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        $pageData = [
            'title' => 'Home Page',
        ];
        return page('home', $pageData);
    }
}
