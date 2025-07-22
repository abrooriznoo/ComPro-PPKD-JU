<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendaftaran extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                "id" => [
                    "type" => "INT",
                    "constraint" => 11,
                    "unsigned" => true,
                    "auto_increment" => true,
                ],
                "nama_lengkap" => [
                    "type" => "VARCHAR",
                    "constraint" => 150,
                ],
                "nik" => [
                    "type" => "VARCHAR",
                    "constraint" => 16,
                ],
                "no_kk" => [
                    "type" => "VARCHAR",
                    "constraint" => 16,
                ],
                "tempat_lahir" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "tanggal_lahir" => [
                    "type" => "DATE",
                ],
                "jenis_kelamin" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "no_telepon" => [
                    "type" => "VARCHAR",
                    "constraint" => 15,
                ],
                "pendidikan" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "tahun_lulus" => [
                    "type" => "VARCHAR",
                    "constraint" => 4,
                ],
                "pekerjaan" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "email" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "major_id" => [
                    "type" => "INT",
                    "constraint" => 11,
                    "unsigned" => true,
                ],
                "nama_jalan" => [
                    "type" => "VARCHAR",
                    "constraint" => 255,
                ],
                "rt" => [
                    "type" => "VARCHAR",
                    "constraint" => 10,
                ],
                "rw" => [
                    "type" => "VARCHAR",
                    "constraint" => 10,
                ],
                "kelurahan" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "kecamatan" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "kota" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "provinsi" => [
                    "type" => "VARCHAR",
                    "constraint" => 100,
                ],
                "uk_baju_sepatu" => [
                    "type" => "VARCHAR",
                    "constraint" => 10,
                ],
                "pas_foto" => [
                    "type" => "VARCHAR",
                    "constraint" => 255,
                ],
                "ktp" => [
                    "type" => "VARCHAR",
                    "constraint" => 255,
                ],
                "kk" => [
                    "type" => "VARCHAR",
                    "constraint" => 255,
                ],
                "ijazah" => [
                    "type" => "VARCHAR",
                    "constraint" => 255,
                ],
                "is_difabel" => [
                    "type" => "TINYINT",
                    "constraint" => 1,
                    "default" => 0,
                ],
                "created_at" => [
                    "type" => "DATETIME",
                    "null" => true,
                ],
                "updated_at" => [
                    "type" => "DATETIME",
                    "null" => true,
                ],
                "deleted_at" => [
                    "type" => "DATETIME",
                    "null" => true,
                ],
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('pendaftaran', true);
        $this->forge->addForeignKey('major_id', 'majors', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('pendaftaran', 'pendaftaran_major_id_foreign');
        $this->forge->dropTable('pendaftaran');
    }
}
