<?php

namespace Exam\Models;

use CodeIgniter\Model;
use Exam\Entities\ExamScore;

class ExamScoreModel extends Model
{
    protected $table         = 'courses';
    protected $primaryKey    = 'id';
    protected $returnType    = ExamScore::class;
    protected $allowedFields = [
        'student_id',
        'course_id',
        'score',
        'exam_date',
    ];
    protected $validationRules = [
        'student_id' => 'required|is_natural_number',
        'course_id'  => 'required|is_natural_number',
        'score'      => 'required|greater_than_equal_to[0]|less_than_equal_to[10]',
        'exam_date'  => 'required|valid_date',
    ];
    protected $validationMessages = [
        'student_id' => [
            'required'          => 'Student ID is required.',
            'is_natural_number' => 'Student ID must be a natural number.',
        ],
        'course_id' => [
            'required'          => 'Course ID is required.',
            'is_natural_number' => 'Course ID must be a natural number.',
        ],
        'score' => [
            'required'              => 'Score is required.',
            'greater_than_equal_to' => 'Score must be greater than or equal to 0.',
            'less_than_equal_to'    => 'Score must be less than or equal to 10.',
        ],
        'exam_date' => [
            'required'   => 'Exam date is required.',
            'valid_date' => 'Exam date must be a valid date.',
        ],
    ];
    protected $useTimestamps = true;
}
