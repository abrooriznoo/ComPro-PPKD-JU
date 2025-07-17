<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;

class UsersController extends BaseController
{
    public function index()
    {
        // Logika untuk menampilkan daftar pengguna
        $model = new Users();
        $data = $model->findAll();

        // Ambil data roles dari model Roles
        $rolesModel = new \App\Models\Roles();
        $roles = $rolesModel->findAll();

        return view('pages/admin/dashboard', [
            'page' => 'users',
            'roles' => $roles,
            'users' => $data
        ]);
    }

    public function store()
    {
        // Logika untuk menyimpan pengguna baru
        $model = new Users();
        $data = [
            'username' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id' => $this->request->getPost('role'),
            'is_active' => 1, // Default to active
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Handle photo upload
        $photo = $this->request->getFile('photo');
        $photoName = null;
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            // Pindahkan foto ke folder public/uploads (lebih standar)
            $photo->move(ROOTPATH . 'public/uploads/users-pict', $photoName);
            $data['photo'] = $photoName;
        }

        if ($model->insert($data)) {
            return redirect()->to('users')->with('message', 'User created successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function update($id)
    {
        // Logika untuk memperbarui pengguna
        $model = new Users();
        $data = [
            'username' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role_id' => $this->request->getPost('role'),
            'is_active' => $this->request->getPost('is_active'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Handle photo upload
        $oldUser = $model->find($id);

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName();
            // Hapus foto lama jika ada dan bukan default
            if (!empty($oldUser['photo']) && file_exists(ROOTPATH . 'public/uploads/users-pict/' . $oldUser['photo'])) {
            @unlink(ROOTPATH . 'public/uploads/users-pict/' . $oldUser['photo']);
            }
            // Pindahkan foto ke folder public/uploads/users-pict
            $photo->move(ROOTPATH . 'public/uploads/users-pict', $photoName);
            $data['photo'] = $photoName;
        } else {
            // Jika tidak upload foto, gunakan foto lama
            if (!empty($oldUser['photo'])) {
            $data['photo'] = $oldUser['photo'];
            }
        }

        if ($model->update($id, $data)) {
            return redirect()->to('users')->with('message', 'User updated successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function delete($id)
    {
        // Logika untuk menghapus pengguna
        $model = new Users();
        $user = $model->find($id);

        if ($user) {
            // Hapus foto jika ada
            if (!empty($user['photo']) && file_exists('public/uploads/users-pict/' . $user['photo'])) {
                @unlink('public/uploads/users-pict/' . $user['photo']);
            }

            $model->delete($id);
            return redirect()->to('users')->with('message', 'User deleted successfully');
        } else {
            return redirect()->back()->with('errors', ['User not found']);
        }
    }
}
