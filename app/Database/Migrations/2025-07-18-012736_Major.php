<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Major extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "nama_jurusan" => [
                "type" => "VARCHAR",
                "constraint" => 150,
            ],
            "skema_biaya" => [
                "type" => "VARCHAR",
                "constraint" => 20,
            ],
            "deskripsi" => [
                "type" => "TEXT",
            ],
            "photos" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true,
            ],
            "is_mtu" => [
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
            "is_active" => [
                "type" => "TINYINT",
                "constraint" => 1,
                "default" => 1,
            ],
        ]);
        $this->forge->addKey("id", true);
        $this->forge->createTable("major", true);
    }

    public function down()
    {
        $this->forge->dropTable("major", true);
    }
}
