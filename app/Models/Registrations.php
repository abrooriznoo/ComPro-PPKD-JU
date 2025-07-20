<?php

namespace App\Models;

use CodeIgniter\Model;

class Registrations extends Model
{
    protected $table            = 'pendaftaran';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['nama_lengkap', 'nik', 'no_kk', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_telepon', 'pendidikan', 'tahun_lulus', 'pekerjaan', 'email', 'major_id', 'nama_jalan', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'uk_baju_sepatu', 'pas_foto', 'ktp', 'kk', 'ijazah', 'is_difabel', 'created_at', 'updated_at', 'deleted_at']; // Kolom yg boleh diupdate

    // Jika ingin otomatis mengelola created_at dan updated_at, aktifkan ini:
    protected $useTimestamps = true;
}
