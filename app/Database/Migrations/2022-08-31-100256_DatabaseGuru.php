<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseGuru extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_guru' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'bg_image' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'bg_color' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'picture' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
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

        $this->forge->addKey('id_guru', TRUE);
        $this->forge->createTable('guru');
    }

    public function down()
    {
        $this->forge->dropTable('guru');
    }
}
