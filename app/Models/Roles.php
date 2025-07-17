<?php

namespace App\Models;

use CodeIgniter\Model;

class Roles extends Model
{
    protected $table = 'roles';    // Nama tabel
    protected $primaryKey = 'id';     // Primary key tabel

    protected $allowedFields = ['name', 'created_at', 'update_at', 'deleted_at']; // Kolom yg boleh diupdate

    // Jika ingin otomatis mengelola created_at dan updated_at, aktifkan ini:
    protected $useTimestamps = true;
}
