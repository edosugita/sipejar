<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseSiswa extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_siswa' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'nama_siswa' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255'
                ],
                'picture' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
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

        $this->forge->addKey('id_siswa', TRUE);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
