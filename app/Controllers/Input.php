<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Input_model;
use App\Models\Menu_model;
use App\Models\Supplier_model;
use Config\Services;
use CodeIgniter\I18n\Time;

class Input extends Controller
{
    protected $modul = "input";

    public function index()
    {
        $model = new Input_model();
        $data['inputs'] =  $model->getInput();
        $data['title'] = 'Input List';
        $data['arr'] = 'List';
        Services::template('inputs/index', $data);
    }

    public function add()
    {
        $model = new Menu_model();
        $models = new Supplier_model();
        $data['menu'] =  $model->getMenu();
        $data['suppliers'] =  $models->getSupplier();
        $data['urlmethod'] = $this->modul . '/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Input';
        Services::template('inputs/form', $data);
    }

    public function save()
    {
        $supplier = $this->request->getPost('supplier_id');
        $menu_id = $this->request->getPost('idbrg');
        $amount = $this->request->getPost('qty');
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');
        $createdBy = session('firstname') . ' ' . session('lastname');
        $model = new Input_model();

        for ($i = 0; $i < count($menu_id); $i++) {
            $data = array(
                'supplier_id' => $supplier,
                'menu_id' => $menu_id[$i],
                'amount' => $amount[$i],
                'time' => $myTime,
                'createdBy' => $createdBy
            );
            $model->saveInput($data);
        }

        session()->setFlashData('success', 'Data is saved successfully!');
        return redirect()->to('/input');
    }



    public function view($id, $time)
    {
        $model = new Input_model();
        $data['input'] = $model->getInput($id, $time);
        $data['arr'] = 'View';
        $data['urlmethod'] = $this->modul;
        $data['v'] = "";
        $data['title'] = 'Input Detail';
        Services::template('inputs/form', $data);
    }


    public function delete($id, $time)
    {

        try {
            $model =  new Input_model();
            $model->deleteInput($id, $time);
        } catch (\Throwable $th) {
            //throw $th;
            session()->setFlashData('error', 'Something wrongs because ' . $th->getMessage());
            return redirect()->to('/input');
        }

        return redirect()->to('/input');
    }
}
