<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Auth_model;

class Login extends Controller
{

    public function __construct()
    {
        $this->auth = new Auth_model();
    }

    public function index()
    {
        echo view('layout/header');
        echo view('login');
        echo view('layout/footerlogin');
    }


    public function proses()
    {
        $email = htmlspecialchars($this->request->getPost('email'));
        $password = htmlspecialchars($this->request->getPost('password'));

        $cek_login = $this->auth->cek_login($email);

        if (password_verify($password, $cek_login['password'])) {
            session()->set("id", $cek_login['id']);
            session()->set("password", $cek_login['password']);
            session()->set("email", $cek_login['email']);
            session()->set("firstname", $cek_login['first_name']);
            session()->set("lastname", $cek_login['last_name']);

            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        echo view('layout/header');
        echo view('register');
        echo view('layout/footerlogin');
    }

    public function prosesRegister()
    {
        $firstname = $this->request->getPost('first_name');
        $lastname = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        // $data = json_decode(file_get_contents('php://input'));

        $data = [
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'password' => $password_hash
        ];

        $this->auth->register($data);
        session()->setFlashData('success', 'Data is saved successfully!');
        return redirect()->to('/login');
    }
}
