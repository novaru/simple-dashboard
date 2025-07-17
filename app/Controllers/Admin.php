<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $session = session();
        $data = [
            'title' => 'Admin Dashboard | MyWeb',
            'user' => [
                'name'  => $session->get('name'),
                'email' => $session->get('email'),
                'role'  => $session->get('role'),
            ],
            'users' => $this->userModel->getAllUsers(),
        ];

        echo view('admin/dashboard', $data);
    }

    public function update(string $username)
    {
        $session = session();
        $data = [
            'title' => 'Edit User | MyWeb',
            'user' => [
                'name'  => $session->get('name'),
                'email' => $session->get('email'),
                'role'  => $session->get('role'),
            ],
            'targetUser' => $this->userModel->where('username', $username)->first(),
        ];

        echo view('admin/edit_user', $data);
    }

    public function updateUser()
    {
        $userId = $this->request->getVar('id');

        $updateData = [
            'id'       => $userId,
            'name'     => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'role'     => $this->request->getVar('role'),
            'status'   => $this->request->getVar('status'),
        ];

        if ($this->userModel->update($userId, $updateData)) {
            return redirect()->to('/admin/dashboard')->with('success', 'User updated successfully');
        } else {
            $errors = $this->userModel->errors();
            $errorMessage = implode(', ', $errors);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update user: ' . $errorMessage);
        }
    }

    public function delete(string $username)
    {
        if ($this->userModel->deleteUser($username)) {
            return redirect()->to('/admin/dashboard')->with('success', 'User deleted successfully');
        } else {
            return redirect()->to('/admin/dashboard')->with('error', 'Failed to delete user');
        }
    }
}
