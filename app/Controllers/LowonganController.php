<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Lowongan;

class LowonganController extends BaseController
{
    public function index()
    {
        $model = new Lowongan();

        // Ambil semua data lowongan
        $data = $model->findAll();

        return view('lowongan', ['data' => $data]);
    }

    public function create(): string
    {
        $model = new Lowongan();

        // Ambil semua data lowongan
        $data = $model->findAll();

        return view('pages/lowongan/create', ['data' => $data]);
    }

    public function store(): ResponseInterface
    {
        $model = new Lowongan();

        $title = $this->request->getPost('title');
        $company = $this->request->getPost('company');
        $photo = $this->request->getFile('photo');
        $desc = $this->request->getPost('description');
        $is_active = 1;

        if (!$title || !$company || !$desc) {
            return redirect()->back()->with('error', 'All fields are required.');
        }

        $photoName = null;
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            // Pindahkan foto ke folder public/uploads (lebih standar)
            $photo->move(ROOTPATH . 'public/uploads', $photoName);
        }

        $insertData = [
            'title' => $title,
            'company' => $company,
            'photo' => $photoName,
            'description' => $desc,
            'is_active' => $is_active,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($model->insert($insertData)) {
            return redirect()->to('/lowongan-admin')->with('success', 'Lowongan berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan lowongan.');
        }
    }

    public function update($id)
    {
        $model = new Lowongan();

        $title = $this->request->getPost('title');
        $company = $this->request->getPost('company');
        $desc = $this->request->getPost('description');
        $photo = $this->request->getFile('photo');

        // Ambil data lama via model
        $oldData = $model->find($id);
        if (!$oldData) {
            return redirect()->to('/lowongan-admin')->with('error', 'Data tidak ditemukan.');
        }

        // Siapkan data update
        $updateData = [
            'title' => $title,
            'company' => $company,
            'description' => $desc,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Upload folder
        $uploadPath = ROOTPATH . 'public/uploads/';

        // Jika ada file foto baru dan valid
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {

            // Hapus foto lama jika ada
            if (!empty($oldData['photo']) && file_exists($uploadPath . $oldData['photo'])) {
                unlink($uploadPath . $oldData['photo']);
            }

            // Pindahkan foto baru
            $photoName = $photo->getRandomName();
            $photo->move($uploadPath, $photoName);
            $updateData['photo'] = $photoName;
        }

        // Update data via model
        if ($model->update($id, $updateData)) {
            return redirect()->to('/lowongan-admin')->with('success', 'Lowongan berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui lowongan.');
        }
    }


    public function delete($id)
    {
        $model = new Lowongan();

        // Ambil data lama via model
        $oldData = $model->find($id);

        if (!$oldData) {
            return redirect()->to('/lowongan-admin')->with('error', 'Data tidak ditemukan.');
        }

        $uploadPath = ROOTPATH . 'public/uploads/';

        // Hapus file foto jika ada
        if (!empty($oldData['photo']) && file_exists($uploadPath . $oldData['photo'])) {
            unlink($uploadPath . $oldData['photo']);
        }

        // Hapus data dari database via model
        if ($model->delete($id)) {
            return redirect()->to('/lowongan-admin')->with('success', 'Lowongan berhasil dihapus.');
        } else {
            return redirect()->to('/lowongan-admin')->with('error', 'Gagal menghapus lowongan.');
        }
    }

}
