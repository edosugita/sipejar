<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseDiskusi extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ],
                'nama' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255'
                ],
                'topik' => [
                    'type' => 'text',
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

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('diskusi');
    }

    public function down()
    {
        $this->forge->dropTable('diskusi');
    }
}
