<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $data = [
            'title' => 'Dashboard | MyWeb',
            'user' => [
                'name'  => $session->get('name'),
                'email' => $session->get('email'),
                'role'  => $session->get('role'),
            ],
        ];

        echo view('pages/dashboard', $data);
    }
}
