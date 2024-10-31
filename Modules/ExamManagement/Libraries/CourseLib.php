<?php

namespace Exam\Libraries;

use Exam\Models\CourseModel;
use ReflectionException;

class CourseLib extends CourseModel
{
    public string $course_name;

    public function getAll(): array
    {
        return $this->findAll();
    }

    /**
     * @throws ReflectionException
     */
    public function addCourse(): bool|int|string
    {
        $data = [
            'course_name' => $this->course_name,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];

        return $this->insert($data);
    }

    /**
     * @param mixed $data
     *
     * @throws ReflectionException
     */
    public function updateCourse(int $id, $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteCourse(int $id): bool
    {
        return $this->delete(['id' => $id]);
    }
}
