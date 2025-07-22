<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PendaftaranMtu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'link_lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            "major_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            'surat_permohonan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pendaftaran_mtu', true);
        $this->forge->addForeignKey('major_id', 'majors', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('pendaftaran_mtu', true);
        // $this->forge->dropForeignKey('pendaftaran_mtu', 'pendaftaran_mtu_major_id_foreign');
    }
}
