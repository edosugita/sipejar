<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseTugas extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_tugas' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'id_matkul' => [
                    'type' => 'INT',
                ],
                'pertemuan' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'nama_materi' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'deskripsi' => [
                    'type' => 'TEXT',
                ],
                'absen' => [
                    'type' => 'INT',
                ],
                'pengumpulan' => [
                    'type' => 'INT',
                ],
                'ujian' => [
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

        $this->forge->addKey('id_tugas', TRUE);
        $this->forge->createTable('tugas');
    }

    public function down()
    {
        $this->forge->dropTable('tugas');
    }
}
