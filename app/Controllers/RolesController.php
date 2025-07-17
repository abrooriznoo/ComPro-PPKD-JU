<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Roles;
use CodeIgniter\HTTP\ResponseInterface;

class RolesController extends BaseController
{
    public function index()
    {
        $model = new Roles();
        $data = $model->findAll();

        return view('pages/admin/dashboard', [
            'page' => 'roles',
            'data' => $data
        ]);
    }

    public function store()
    {
        $model = new Roles();

        $data = [
            'name' => $this->request->getPost('name'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $model->insert($data);
        return redirect()->to('/roles');
    }

    public function update($id)
    {
        $model = new Roles();

        $data = [
            'name' => $this->request->getPost('name'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $model->update($id, $data);
        return redirect()->to('/roles');
    }

    public function delete($id)
    {
        $model = new Roles();
        $model->delete($id);
        return redirect()->to('/roles');
    }
}
