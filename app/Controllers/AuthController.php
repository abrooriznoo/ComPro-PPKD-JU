<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        // Logic to display the login page
        return view('pages/admin/session/login');
    }

    public function doLogin()
    {
        $session = session();
        $model = new Users();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role_id'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to('/admin')->with('message', 'Login successful');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        // Logic to handle logout
        session()->destroy();
        return redirect()->to('/login')->with('message', 'You have been logged out successfully');
    }
}
