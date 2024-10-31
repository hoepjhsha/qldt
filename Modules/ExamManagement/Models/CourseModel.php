<?php

namespace Exam\Models;

use CodeIgniter\Model;
use Exam\Entities\Course;

class CourseModel extends Model
{
    protected $table         = 'courses';
    protected $primaryKey    = 'id';
    protected $returnType    = Course::class;
    protected $allowedFields = [
        'course_name',
        'created_at',
        'updated_at',
    ];
    protected $validationRules = [
        'course_name' => 'required|alpha_numeric_space',
    ];
    protected $validationMessages = [
        'course_name' => [
            'required'            => 'Course name is required.',
            'alpha_numeric_space' => 'Course name must be alphanumeric and space-separated.',
        ],
    ];
    protected $useTimestamps = true;
}
