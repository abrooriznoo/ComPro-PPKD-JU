<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lowongan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'company' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'update_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('lowongan', true);


        // Sample data insertion
        // $this->db->table('lowongan')->insertBatch([
        //     [
        //         'title'       => 'Store Keeper, Chef and Demi Chef',
        //         'company'     => 'Hariston Hotel & Suites',
        //         'description' => 'Requirements: 1. Minimum 2 (two) years experience in the same position within hospitality industry...',
        //         'posted_at'   => date('Y-m-d H:i:s', strtotime('2025-06-25')),
        //     ],
        //     [
        //         'title'       => 'Chief Engineering',
        //         'company'     => 'Hariston Hotel & Suites',
        //         'description' => 'Requirements: 1. Minimum 2 (two) years experience in the same position within hospitality industry...',
        //         'posted_at'   => date('Y-m-d H:i:s', strtotime('2025-06-25')),
        //     ],
        //     [
        //         'title'       => 'Welder',
        //         'company'     => 'PT. Seacon Bintang Sejahtera',
        //         'description' => 'Requirements: 1. Minimum 2 (two) years experience in the same position within manufacturing industry...',
        //         'posted_at'   => date('Y-m-d H:i:s', strtotime('2025-06-25')),
        //     ],
        // ]);
    }

    public function down()
    {
        $this->forge->dropTable('lowongan', true);
    }
}
