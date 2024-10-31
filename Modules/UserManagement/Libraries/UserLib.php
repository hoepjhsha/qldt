<?php

namespace User\Libraries;

use Auth\Models\AccountModel;
use ReflectionException;

class UserLib extends AccountModel
{
    public function getAllStudent(): array
    {
        return $this->where('flag', 2)->findAll();
    }

    public function getUserById($userId): object
    {
        return $this->where('id', $userId)->first();
    }

    public function deleteUser($userId): bool
    {
        return $this->delete(['id' => $userId]);
    }

    /**
     * @param mixed $data
     *
     * @throws ReflectionException
     */
    public function createUser($data): bool
    {
        return $this->insert($data);
    }

    public function updateUser($id, $data): bool
    {
        return $this->update($id, $data);
    }
}
