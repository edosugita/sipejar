<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseMatkul extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_matkul' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'id_guru' => [
                    'type' => 'INT',
                ],
                'nama_matkul' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'slug' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'kelas' => [
                    'type' => 'INT',
                ],
                'jurusan' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'offering' => [
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

        $this->forge->addKey('id_matkul', TRUE);
        $this->forge->createTable('matkul');
    }

    public function down()
    {
        $this->forge->dropTable('matkul');
    }
}
