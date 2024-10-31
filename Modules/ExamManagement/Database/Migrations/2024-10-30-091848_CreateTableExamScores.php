<?php

namespace Exam\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableExamScores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'student_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'course_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'score' => [
                'type'     => 'FLOAT',
                'unsigned' => true,
            ],
            'exam_date' => [
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('student_id');
        $this->forge->addKey('course_id');
        $this->forge->createTable('exam_scores');
    }

    public function down()
    {
    }
}
