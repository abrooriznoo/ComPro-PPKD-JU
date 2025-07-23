<?php

namespace App\Controllers;

use App\Models\ClassSchedules;
use App\Models\Majors;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('dashboard');
    }

    public function pelatihanReg()
    {
        $model = new Majors();
        $schedules = new ClassSchedules();

        // Ambil semua data pelatihan
        $data = $model->where(['is_mtu' => 0, 'is_active' => 1])->findAll();
        $jadwal = $schedules->findAll();

        return view('pelatihan', [
            'page' => 'pelatihan-reg',
            'data' => $data,
            'jadwal' => $jadwal
        ]);
    }

    public function pelatihanMTU()
    {
        $model = new Majors();

        // Ambil semua data pelatihan MTU
        $data = $model->where(['is_mtu' => 1, 'is_active' => 1])->findAll();

        return view('pelatihan', [
            'page' => 'pelatihan-mtu',
            'data' => $data
        ]);
    }
}
