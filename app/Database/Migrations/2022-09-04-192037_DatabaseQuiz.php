<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseQuiz extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_quiz' => [
                    'type' => 'INT',
                    'auto_increment' => TRUE
                ],
                'id_tugas' => [
                    'type' => 'INT',
                ],
                'question' => [
                    'type' => 'TEXT',
                ],
                'choice1' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'choice2' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'choice3' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'choice4' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'choice5' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'answer' => [
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

        $this->forge->addKey('id_quiz', TRUE);
        $this->forge->createTable('quiz');
    }

    public function down()
    {
        $this->forge->dropTable('quiz');
    }
}
