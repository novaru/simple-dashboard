<?php

namespace App\Controllers;

class Admin extends BaseController
{
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
        ];

        echo view('admin/dashboard', $data);
    }
}
