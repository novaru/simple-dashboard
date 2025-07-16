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

        // Check if current user is an admin
        if ($session->get('role') !== 'admin') {
            $data['title'] = 'Access Denied | MyWeb';
            echo view('layouts/header', $data);
            echo view('errors/403',     $data);
            echo view('layouts/footer', $data);
            return;
        }

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

        // Check if current user is an admin
        if ($session->get('role') !== 'admin') {
            $data['title'] = 'Access Denied | MyWeb';
            echo view('layouts/header', $data);
            echo view('errors/403',     $data);
            echo view('layouts/footer', $data);
            return;
        }

        echo view('admin/edit_user', $data);
    }

    public function delete(string $username)
    {
        $session = session();

        if ($session->get('role') !== 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        if ($this->userModel->deleteUser($username)) {
            return redirect()->to('/admin/dashboard')->with('success', 'User deleted successfully');
        } else {
            return redirect()->to('/admin/dashboard')->with('error', 'Failed to delete user');
        }
    }
}
