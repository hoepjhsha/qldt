<?php

namespace Exam\Libraries;

use Exam\Models\ExamScoreModel;
use ReflectionException;

class ExamScoreLib extends ExamScoreModel
{
    public function getAll(): array
    {
        return $this->findAll();
    }

    /**
     * @param mixed $data
     *
     * @throws ReflectionException
     */
    public function addES($data): bool|int|string
    {
        return $this->insert($data);
    }

    /**
     * @param mixed $id
     * @param mixed $data
     *
     * @throws ReflectionException
     */
    public function updateES($id, $data): bool|int|string
    {
        return $this->update($id, $data);
    }

    public function deleteES($id): bool
    {
        return $this->delete(['id' => $id]);
    }
}
