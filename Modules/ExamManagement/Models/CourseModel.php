<?php

namespace Exam\Models;

use CodeIgniter\Model;
use Exam\Entities\Course;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $returnType = Course::class;
    protected $allowedFields = [];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $useTimestamps = true;
}