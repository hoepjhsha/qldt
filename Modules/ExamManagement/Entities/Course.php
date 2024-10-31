<?php

namespace Exam\Entities;

use CodeIgniter\Entity\Entity;

class Course extends Entity
{
    protected $attributes = [
        'id'          => null,
        'course_name' => null,
        'created_at'  => null,
        'updated_at'  => null,
    ];
    protected $casts = [
        'id' => 'int',
    ];
}
