<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'username', 'email', 'password', 'status', 'role', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUserByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

    public function createUser(array $data): bool
    {
        return $this->insert($data);
    }

    public function updateUser(int $id)
    {
        $this->update($id);
    }

    public function deleteUser(int $id)
    {
        $this->delete($id);
    }
}
