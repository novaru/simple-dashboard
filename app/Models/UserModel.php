<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'username', 'email', 'password', 'status', 'role'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id'       => 'permit_empty|is_natural_no_zero',
        'name'      => 'required|min_length[3]|max_length[100]',
        'username'  => 'required|min_length[3]|max_length[100]|is_unique[users.username,id,{id}]',
        'email'     => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password'  => 'required|min_length[6]'
    ];

    protected function hashPassword($data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function getUserByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

    public function deleteUser(int $id)
    {
        $this->delete($id);
    }
}
