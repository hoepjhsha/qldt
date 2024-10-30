<?php

namespace Exam\Models;

use CodeIgniter\Model;
use Exam\Entities\ExamScore;

class ExamScoreModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $returnType = ExamScore::class;
    protected $allowedFields = [];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $useTimestamps = true;
}