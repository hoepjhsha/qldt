<?php

namespace Exam\Entities;

use CodeIgniter\Entity\Entity;

class ExamScore extends Entity
{
    protected $attributes = [
        'id'         => null,
        'student_id' => null,
        'course_id'  => null,
        'score'      => null,
        'exam_date'  => null,
        'created_at' => null,
        'updated_at' => null,
    ];
    protected $dates = ['created_at', 'updated_at', 'exam_date'];
    protected $casts = [
        'id'         => 'int',
        'student_id' => 'int',
        'course_id'  => 'int',
        'score'      => 'float',
    ];
}
