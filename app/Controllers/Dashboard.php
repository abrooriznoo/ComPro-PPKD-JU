<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {

        return view('dashboard');
    }

    public function lowongan(): string
    {

        return view('lowongan');
    }
}
