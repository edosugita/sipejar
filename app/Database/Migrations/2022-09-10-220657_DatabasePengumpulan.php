<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabasePengumpulan extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_pengum' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'id_tugas' => [
                    'type' => 'INT',
                ],
                'id_siswa' => [
                    'type' => 'INT',
                ],
                'tugas' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255'
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

        $this->forge->addKey('id_pengum', TRUE);
        $this->forge->createTable('pengumpulan');
    }

    public function down()
    {
        $this->forge->dropTable('pengumpulan');
    }
}
