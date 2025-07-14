<?php

namespace App\Controllers;

use Config\Database;
use Config\Services;

class Auth extends BaseController
{
    public function login()
    {
        echo view('layouts/header');
        echo view('auth/login');
    }

    public function doLogin()
    {
        $db = Database::connect();

        $request = Services::request();
        $session = Services::session();
        $builder = $db->table('users');

        $email = $request->getPost('email');
        $password = $request->getPost('password');

        $valid = $builder->where('email', $email)
            ->where('password', password_hash($password, PASSWORD_DEFAULT))
            ->countAllResults() > 0;

        $username = $builder->where('email', $email)
            ->get()
            ->getRow();

        if ($valid) {
            $session->set('logged_in', true);
            $session->set('username', $username);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'Invalid username or password');
            return redirect()->back();
        }
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function doRegister() {}

    public function logout() {}
}
