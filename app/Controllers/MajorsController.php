<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Majors;

class MajorsController extends BaseController
{
    public function index()
    {
        $major = new Majors();
        $data = $major->findAll();

        return view('pages/admin/dashboard', [
            'page' => 'majors',
            'data' => $data
        ]);
    }

    public function store()
    {
        $major = new Majors();

        $data = [
            'nama_jurusan' => $this->request->getPost('name'),
            'deskripsi' => $this->request->getPost('description'),
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $major->insert($data);
        return redirect()->to('/majors');
    }


    public function update($id)
    {
        $major = new Majors();

        $data = [
            'nama_jurusan' => $this->request->getPost('name'),
            'deskripsi' => $this->request->getPost('description'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $major->update($id, $data);
        return redirect()->to('/majors');
    }

    public function destroy($id)
    {
        $major = new Majors();
        $major->delete($id);
        return redirect()->to('/majors');
    }
}
