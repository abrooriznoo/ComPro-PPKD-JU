<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ClassSchedules;
use \App\Models\Majors;

class ClassSchedulesController extends BaseController
{

    public function dashboard()
    {
        $schedules = new ClassSchedules();
        $data = $schedules->findAll();

        $majorsModel = new Majors();
        $majors = $majorsModel->findAll();

        return view('schedules', ['data' => $data, 'majors' => $majors]);
    }

    public function index()
    {
        $schedules = new ClassSchedules();
        $data = $schedules->findAll();

        // Ambil data major dari model Majors
        $majorsModel = new Majors();
        $majors = $majorsModel->findAll();


        return view('pages/admin/dashboard', [
            'page' => 'schedules',
            'majors' => $majors,
            'data' => $data
        ]);
    }

    public function store()
    {
        $schedules = new ClassSchedules();

        $data = [
            'major_id' => $this->request->getPost('major'),
            'end_register' => $this->request->getPost('end_register'),
            'class_of' => $this->request->getPost('class_of'),
            'start_selection' => $this->request->getPost('start_selection'),
            'end_selection' => $this->request->getPost('end_selection'),
            'class_start' => $this->request->getPost('class_start'),
            'class_end' => $this->request->getPost('class_end'),
            'exam_start' => $this->request->getPost('exam_start'),
            'exam_end' => $this->request->getPost('exam_end'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_active' => 1, // Default to active
        ];

        $schedules->insert($data);
        return redirect()->to('/schedules-admin');
    }

    public function update($id)
    {
        $schedules = new ClassSchedules();

        $data = [
            'major_id' => $this->request->getPost('major'),
            'end_register' => $this->request->getPost('end_register'),
            'class_of' => $this->request->getPost('class_of'),
            'start_selection' => $this->request->getPost('start_selection'),
            'end_selection' => $this->request->getPost('end_selection'),
            'class_start' => $this->request->getPost('class_start'),
            'class_end' => $this->request->getPost('class_end'),
            'exam_start' => $this->request->getPost('exam_start'),
            'exam_end' => $this->request->getPost('exam_end'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_active' => $this->request->getPost('is_active'), // Update is_active based on form input
        ];

        $schedules->update($id, $data);
        return redirect()->to('/schedules-admin');
    }

    public function destroy($id)
    {
        $schedules = new ClassSchedules();
        $schedules->delete($id);
        return redirect()->to('/schedules-admin');
    }
}
