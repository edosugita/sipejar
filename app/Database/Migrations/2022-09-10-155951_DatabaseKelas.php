<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseKelas extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_kelas' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'id_matkul' => [
                    'type' => 'INT',
                ],
                'id_siswa' => [
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

        $this->forge->addKey('id_kelas', TRUE);
        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}
