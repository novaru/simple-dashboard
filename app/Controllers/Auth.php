<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login | MyWeb'
        ];
        echo view('layouts/header', $data);
        echo view('auth/login');
        echo view('layouts/footer', $data);
    }

    public function doLogin()
    {
        $session = session();

        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'error' => [
                    'required'      => 'Email is required',
                    'valid_email'   => 'Please enter valid email',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'error' => [
                    'required'      => 'Password is required',
                    'min_length[6]' => 'Password must be at least 6 characters'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');

        $user = $this->userModel->getUserByEmail($email);
        if (!$user) {
            return redirect()->back()->withInput()->with('errors', 'Invalid email or password');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('errors', 'Invalid email or password');
        }

        if ($user['status'] !== 'active') {
            return redirect()->back()->withInput()->with('errors', 'Your account is currently inactive');
        }

        $sessionData = [
            'user_id'   => $user['id'],
            'name'      => $user['name'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'logged_in' => true,
        ];

        $session->set($sessionData);

        if ($user['role'] === 'admin') {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Login | MyWeb'
        ];
        echo view('layouts/header', $data);
        echo view('auth/register');
        echo view('layouts/footer', $data);
    }

    public function doRegister()
    {
        $session = session();

        $validationRules = $this->userModel->getValidationRules();

        $validation = $this->validate([
            'name' => [
                'rules' => $validationRules['name'],
                'errors' => [
                    'required'    => 'Name is required',
                    'min_length'  => 'Name must be at least 3 characters long',
                    'max_length'  => 'Name cannot exceed 100 characters',
                ]
            ],
            'username' => [
                'rules' => $validationRules['username'],
                'errors' => [
                    'required'    => 'Username is required',
                    'min_length'  => 'Username must be at least 3 characters long',
                    'is_unique'   => 'This username is already taken',
                    'max_length'  => 'Name cannot exceed 100 characters',
                ]
            ],
            'email' => [
                'rules' => $validationRules['email'],
                'errors' => [
                    'required'    => 'Email is required',
                    'valid_email' => 'Please enter a valid email address',
                    'is_unique'   => 'This email is already registered',
                ]
            ],
            'password' => [
                'rules' => $validationRules['password'],
                'errors' => [
                    'required'    => 'Password is required',
                    'min_length'  => 'Password must be at least 6 characters long',
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'username'  => $this->request->getPost('username'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'      => $this->request->getPost('role')   ?? 'member',
            'status'    => $this->request->getPost('status') ?? 'active',
        ];

        if ($this->userModel->createUser($data)) {
            $session->setFlashdata('success', 'Registration successful. Please login.');
            return redirect()->to('/auth/login');
        } else {
            return redirect()->back()->withInput()->with('errors', ['Registration failed. Please try again.']);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth/login');
    }
}
