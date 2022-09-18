<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseComment extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_comment' => [
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ],
                'id_diskusi' => [
                    'type' => 'INT',
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

        $this->forge->addKey('id_comment', TRUE);
        $this->forge->createTable('comment');
    }

    public function down()
    {
        $this->forge->dropTable('comment');
    }
}
