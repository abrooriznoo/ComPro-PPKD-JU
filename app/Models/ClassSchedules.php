<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassSchedules extends Model
{
    protected $table = 'class_schedules';    // Nama tabel
    protected $primaryKey = 'id';     // Primary key tabel

    protected $allowedFields = ['major_id', 'end_register', 'class_of', 'start_selection', 'end_selection', 'class_start', 'class_end', 'exam_start', 'exam_end', 'is_active', 'created_at', 'update_at', 'deleted_at', 'is_active']; // Kolom yg boleh diupdate

    // Jika ingin otomatis mengelola created_at dan updated_at, aktifkan ini:
    protected $useTimestamps = true;
}
