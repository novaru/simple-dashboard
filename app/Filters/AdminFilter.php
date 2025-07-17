<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->get('role') != 'admin') {
            $data['title'] = 'Access Denied | MyWeb';
            echo view('layouts/header', $data);
            echo view('errors/403',     $data);
            echo view('layouts/footer', $data);
            return;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
