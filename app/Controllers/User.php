<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;
use Config\Services;

class User extends Controller
{
    protected $modul = "user";

    public function index()
    {
        $model = new User_model();
        $data['users'] =  $model->getUser();
        $data['title'] = 'User List';
        $data['arr'] = 'List';
        Services::template('users/index', $data);
    }

    public function add()
    {
        $data['urlmethod'] = $this->modul . '/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form User';
        Services::template('users/form', $data);
    }

    public function save()
    {
        $model = new User_model();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $data = array(
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $email,
            'password' => $password_hash,
        );

        return redirect()->to('/user');
    }


    public function edit($id)
    {
        $model = new User_model();
        $data['user'] = $model->getUser($id)->getRow();
        $data['urlmethod'] = $this->modul . '/update';
        $data['arr'] = 'Edit';
        $data['title'] = 'Form User';
        Services::template('users/form', $data);
    }


    public function view($id)
    {
        $model = new User_model();
        $data['user'] = $model->getUser($id)->getRow();
        $data['arr'] = 'View';
        $data['urlmethod'] = $this->modul;
        $data['v'] = "";
        $data['title'] = 'User Detail';
        Services::template('users/form', $data);
    }

    public function update()
    {
        $model = new User_model();
        $id = $this->request->getPost('id');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        if ($password != "") {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
        } else {
            $password_hash = $this->request->getPost('passwordhint');
        }


        $data = array(
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $email,
            'password' => $password_hash,
        );

        $model->updateUser($data, $id);
        session()->setFlashData('success', 'Data is updated successfully!');
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        try {
            $model =  new User_model();
            $model->deleteUser($id);
        } catch (\Throwable $th) {
            //throw $th;
            session()->setFlashData('error', 'Something wrongs because ' . $th->getMessage());
            return redirect()->to('/user');
        }

        return redirect()->to('/user');
    }
}
