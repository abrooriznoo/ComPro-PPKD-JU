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
            'skema_biaya' => $this->request->getPost('skema_biaya'),
            'is_mtu' => $this->request->getPost('is_mtu') ? 1 : 0,
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Handle file upload if needed
        $photo = $this->request->getFile('photos');
        $photoName = null;
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            // Pindahkan foto ke folder public/uploads (lebih standar)
            $photo->move(FCPATH . 'uploads/class_photos', $photoName);
            $data['photos'] = $photoName;
        }

        $major->insert($data);
        return redirect()->to('/majors')->with('success', 'Data jurusan berhasil ditambahkan.');
    }


    public function update($id)
    {
        $major = new Majors();

        $data = [
            'nama_jurusan' => $this->request->getPost('name'),
            'deskripsi' => $this->request->getPost('description'),
            'is_mtu' => $this->request->getPost('is_mtu') ? 1 : 0,
            'skema_biaya' => $this->request->getPost('skema_biaya'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $photo = $this->request->getFile('photos');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            $photo->move(FCPATH . 'uploads/class_photos', $photoName);
            $data['photos'] = $photoName;
        } else {
            // Ambil data lama jika foto tidak diupload
            $existing = $major->find($id);
            if ($existing && isset($existing['photos'])) {
                $data['photos'] = $existing['photos'];
            }
        }

        $major->update($id, $data);
        return redirect()->to('/majors')->with('success', 'Data jurusan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $major = new Majors();
        $major->delete($id);
        return redirect()->to('/majors')->with('success', 'Data jurusan berhasil dihapus.');
    }
}
