<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseAbsen extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_absen' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'id_tugas' => [
                    'type' => 'INT',
                ],
                'id_siswa' => [
                    'type' => 'INT',
                ],
                'status' => [
                    'type' => 'INT',
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                ],
                'deleted_at' => [
                    'type' => 'DATETIME',
                    'null' => TRUE,
                ],
            ]
        );

        $this->forge->addKey('id_absen', TRUE);
        $this->forge->createTable('absen');
    }

    public function down()
    {
        $this->forge->dropTable('absen');
    }
}
