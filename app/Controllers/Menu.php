<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Menu_model;
use App\Models\Category_model;
use Config\Services;

class Menu extends Controller
{

    protected $modul = "menu";

    public function __construct()
    {
        helper('form');
        helper('file');
    }

    public function index()
    {
        $model = new Menu_model();
        $data['menu'] =  $model->getMenu();
        $data['title'] = 'Menu List';
        $data['arr'] = 'List';
        Services::template('menu/index', $data);
    }

    public function add()
    {
        $model = new Category_model();
        $data['categories'] = $model->getCategory();
        $data['urlmethod'] = $this->modul . '/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Menu';
        Services::template('menu/form', $data);
    }

    public function save()
    {
        $model = new Menu_model();
        if ($_FILES['photo']['name'] != "") {
            $photo = $this->request->getFile('photo');
            $photo->move(ROOTPATH . 'public/upload');
            $getPhoto = $photo->getName();
        } else {
            $getPhoto = NULL;
        }

        $data = array(
            'menu_name' => $this->request->getPost('menu_name'),
            'menu_price' => $this->request->getPost('menu_price'),
            'menu_stock' => $this->request->getPost('menu_stock'),
            'menu_category' => $this->request->getPost('menu_category'),
            'photo' => $getPhoto,
            'description' => $this->request->getPost('description')

        );
        $model->saveMenu($data);
        session()->setFlashData('success', 'Data is saved successfully!');
        return redirect()->to('/menu');
    }

    public function edit($id)
    {
        $model = new Menu_model();
        $modelCat = new Category_model();
        $data['categories'] = $modelCat->getCategory();
        $data['menu'] = $model->getMenu($id)->getRow();
        $data['urlmethod'] = $this->modul . '/update';
        $data['arr'] = 'Edit';
        $data['title'] = 'Form Menu';
        Services::template('menu/form', $data);
    }


    public function view($id)
    {
        $model = new Menu_model();
        $data['menu'] = $model->getMenu($id)->getRow();
        $data['arr'] = 'View';
        $data['urlmethod'] = $this->modul;
        $data['v'] = "";
        $data['title'] = 'Menu Detail';
        Services::template('menu/form', $data);
    }

    public function update()
    {

        $model = new Menu_model();
        $id = $this->request->getPost('menu_id');
        $cek = $model->where('menu_id', $id)->first();
        if ($_FILES['photo']['name'] != "") {
            $photo = $this->request->getFile('photo');
            if ($cek["photo"] != NULL) {
                unlink(ROOTPATH . 'public/upload/' . $cek["photo"]);
            }
            $photo->move(ROOTPATH . 'public/upload');
            $getPhoto = $photo->getName();
        } else {
            $getPhoto = $cek["photo"];
        }

        $value = '';
        $data = array(
            'menu_name' => $this->request->getPost('menu_name'),
            'menu_price' => $this->request->getPost('menu_price'),
            'menu_stock' => $this->request->getPost('menu_stock'),
            'menu_category' => $this->request->getPost('menu_category'),
            'photo' => $getPhoto,
            'description' => $this->request->getPost('description')
        );
        $model->updateMenu($data, $id);
        session()->setFlashData('success', 'Data is updated successfully!');
        return redirect()->to('/menu');
    }

    public function delete($id)
    {
        $model =  new Menu_model();
        $cek = $model->where('menu_id', $id)->first();
        if ($cek["photo"] != NULL) {
            unlink(ROOTPATH . 'public/upload/' . $cek["photo"]);
        }
        $model->deleteMenu($id);
        session()->setFlashData('success', 'Data is deleted successfully!');
        return redirect()->to('/menu');
    }
}
