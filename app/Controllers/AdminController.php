<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {
        //
    }

    public function dashboard(): string
    {
        // Logic to display the admin dashboard
        return view('pages/admin/dashboard');
    }

    public function lowongan(): string
    {
        $db = \Config\Database::connect();
        $lowongan = $db->table('lowongan')->get()->getResultArray();

        // Logic to display lowongan management
        return view('pages/admin/dashboard', [
            'page' => 'lowongan',
            'lowongan' => $lowongan
        ]);
    }
}
