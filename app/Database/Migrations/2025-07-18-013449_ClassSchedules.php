<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClassSchedules extends Migration
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
            "major_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "end_register" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "class_of" => [
                "type" => "VARCHAR",
                "constraint" => 150,
            ],
            "start_selection" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "end_selection" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "class_start" => [
                "type" => 'DATETIME',
                "null" => true,
            ],
            "class_end" => [
                "type" => 'DATETIME',
                "null" => true,
            ],
            "exam_start" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "exam_end" => [
                "type" => "DATETIME",
                "null" => true,
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
        $this->forge->addForeignKey("major_id", "major", "id", "CASCADE", "CASCADE");
        $this->forge->createTable("class_schedules", true);
    }

    public function down()
    {
        $this->forge->dropTable("class_schedules", true);
    }
}
