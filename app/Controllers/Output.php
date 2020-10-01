<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Output_model;
use App\Models\Menu_model;
use App\Models\Customer_model;
use Config\Services;
use CodeIgniter\I18n\Time;

class Output extends Controller
{
    protected $modul = "output";

    public function index()
    {  
        $model = new Output_model();
        $data['outputs'] =  $model->getOutput();
        $data['title'] = 'Output List';
        $data['arr'] = 'List';
        Services::template('outputs/index', $data);
    }
    
    public function add()
    {
        $model = new Menu_model();
        $models = new Customer_model();
        $data['menu'] =  $model->getMenu();
        $data['customers'] =  $models->getCustomer();
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Output';
        Services::template('outputs/form', $data);
    }

    public function save()
    {
        $supplier = $this->request->getPost('customer_id');
        $menu_id = $this->request->getPost('idbrg');
        $amount = $this->request->getPost('qty');
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');
        $createdBy = session('firstname').' '.session('lastname');
        $model = new Output_model();
        
        for ($i=0; $i < count($menu_id); $i++) { 
            $data = array(
                 'customer_id' => $supplier ,
                 'menu_id' => $menu_id[$i],
                 'amount' => $amount[$i],
                 'time' => $myTime,
                 'createdBy' => $createdBy
            );
            $model->saveOutput($data);
        }
        
        session()->setFlashData('success', 'Data is saved successfully!');
        return redirect()->to('/output');
    }



    public function view($id,$time)
    {
        $model = new Output_model();
        $data['output'] = $model->getOutput($id,$time);
        $data['arr'] = 'View';
        $data['urlmethod'] = $this->modul;
        $data['v'] = "";
        $data['title'] = 'Output Detail';
        Services::template('outputs/form', $data);
    }

    
    public function delete($id,$time)
    {
        
        try {
            $model =  new Output_model();
            $model->deleteOutput($id,$time);
        } catch (\Throwable $th) {
            //throw $th;
            session()->setFlashData('error', 'Something wrongs because '.$th->getMessage());
            return redirect()->to('/output');
        }
       
        return redirect()->to('/output');
    }
}
