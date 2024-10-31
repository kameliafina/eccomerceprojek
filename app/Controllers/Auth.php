<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            session()->set('isLoggedIn', true);
            session()->set('username', $user['username']);
            return redirect()->to('pelangganctrl/bayar'); // Redirect to dashboard or home
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login'); // Redirect to login page
    }

    public function tambah()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');

        $userModel = new UserModel();

        // Cek apakah username sudah ada
        if ($userModel->getUserByUsername($username)) {
            return redirect()->back()->with('error', 'Username sudah digunakan.');
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Simpan pengguna baru
        $userModel->insert([
            'username' => $username,
            'password' => $hashedPassword,
            'email' => $email
        ]);

        return redirect()->to('/login'); // Redirect ke halaman login atau halaman lain
    }

    public function user()
    {
        return view('pendaftaran');
    }
}
