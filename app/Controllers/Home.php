<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('manajemen-frontend/homepage/index');
    }
    public function portfolio()
    {
        return view('manajemen-frontend/homepage/portfolio');
    }
}
