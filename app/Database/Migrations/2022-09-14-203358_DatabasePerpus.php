<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabasePerpus extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_perpus' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'nama' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'nama_buku' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'tahun' => [
                    'type' => 'INT',
                ],
                'gambar' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'file' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'tanggal' => [
                    'type' => 'DATE',
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

        $this->forge->addKey('id_perpus', TRUE);
        $this->forge->createTable('perpus');
    }

    public function down()
    {
        $this->forge->dropTable('perpus');
    }
}
