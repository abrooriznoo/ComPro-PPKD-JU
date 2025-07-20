<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationsMTU extends Model
{
    protected $table            = 'pendaftaran_mtu';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['nama_lengkap', 'no_telepon', 'link_lokasi', 'major_id', 'surat_permohonan', 'created_at', 'updated_at', 'deleted_at']; // Kolom yg boleh diupdate

    // Jika ingin otomatis mengelola created_at dan updated_at, aktifkan ini:
    protected $useTimestamps = true;
}
