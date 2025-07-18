<?php

namespace App\Models;

use CodeIgniter\Model;

class Majors extends Model
{
    protected $table = 'major';    // Nama tabel
    protected $primaryKey = 'id';     // Primary key tabel

    protected $allowedFields = ['nama_jurusan', 'deskripsi', 'created_at', 'update_at', 'deleted_at', 'is_active']; // Kolom yg boleh diupdate

    // Jika ingin otomatis mengelola created_at dan updated_at, aktifkan ini:
    protected $useTimestamps = true;
}
