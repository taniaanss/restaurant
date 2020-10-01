<?php 
namespace App\Controllers;
use Config\Services;
use Firebase\JWT\JWT;
use CodeIgniter\RESTful\ResourceController;

class ApiMenu extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\Menu_model';

    public function index()
    {
       
        return $this->respond($this->model->getMenu(), 200);
    }

    public function create()
    {
       
        $validation = \Config\Services::validation();
        $name = $this->request->getPost('menu_name');
        $price = $this->request->getPost('menu_price');
        $stock = $this->request->getPost('menu_stock');
        $category = $this->request->getPost('menu_category');
        $description = $this->request->getPost('description');
        $photo = $this->request->getFile('photo');
        $id = $this->request->getPost('menu_id');

        if (!$id) {

            if ($photo != NULL) {
                $photo->move(ROOTPATH.'public/upload');
                $getPhoto = $photo->getName();
             } else {
                $getPhoto = NULL;
             }
    
    
            $data = [
                'menu_name' => $name,
                'menu_price' => $price,
                'menu_stock' => $stock,
                'menu_category' => $category,
                'description' => $description,
                'photo' => $getPhoto
            ];
            if ($validation->run($data, 'menu') == FALSE) {
                $response = [
                    'status' => 500,
                    'error' => true,
                    'data' => $validation->getErrors(),
                ];
                return $this->respond($response, 500);
    
            } else {
                $simpan = $this->model->savemenu($data);
                if ($simpan) {
                    $msg = ["message" => "Berhasil disimpan"];
                    $response = [
                        'status' => 200,
                        'error' => false,
                        'data' => $msg
                    ];
                    return $this->respond($response, 200);
                }
                
            }

        } else {
            
            $cek = $this->model->where('menu_id',$id)->first();
    
            if ($photo != NULL) {
               unlink(ROOTPATH.'public/upload/'.$cek["photo"]);
               $photo->move(ROOTPATH.'public/upload');
               $getPhoto = $photo->getName();
            } else {
               $getPhoto = $cek["photo"];
            }
    
            $data = [
                'menu_name' => $name,
                'menu_price' => $price,
                'menu_stock' => $stock,
                'menu_category' => $category,
                'description' => $description,
                'photo' => $getPhoto
            ];
    
            if ($validation->run($data, 'menu') == FALSE) {
                
                $response = [
                    'status' => 500,
                    'error' => true,
                    'data' => $validation->getErrors()
                ];
                return $this->respond($response,500);
            } else {
                $simpan = $this->model->updatemenu($data, $id);
                if ($simpan) {
                    $msg = ['message' => 'Data berhasil diupdate'];
                    $response = [
                        'status' => 200,
                        'error' => false,
                        'data' => $msg
                    ];
                    return $this->respond($response, 200);
                }
    
            }
        }
    
    }


    public function show($id = NULL)
    {
        $get = $this->model->getmenu($id)->getRowArray();
        if ($get) {
            $code = 200;
            $response = [
                'status' => $code ,
                'error' => false,
                'data' => $get
            ];
        } else {
            $code = 404;
            $response = [
                'status' => $code ,
                'error' => true,
                'data' => ['message' => 'Not Found']
            ];
        }
        return $this->respond($response, $code);
    }

    public function edit($id = NULL)
    {
        $get = $this->model->getmenu($id)->getRowArray();

        if ($get) {
            $code = 200;
            $response = [
                'status' => $code ,
                'error' => false,
                'data' => $get
            ];
        } else {
            $code = 404;
            $response = [
                'status' => $code ,
                'error' => true,
                'data' => ['message' => 'Not Found']
            ];
        }
        return $this->respond($response, $code);
    }


   

    public function update($id = NULL)
    {
        helper(['form', 'array','text']);
        
        $validation = \Config\Services::validation();
        var_dump($_REQUEST);die();
        $name = $this->request->getPost('menu_name');
        $price = $this->request->getPost('menu_price');
        $stock = $this->request->getPost('menu_stock');
        $category = $this->request->getPost('menu_category');
        $description = $this->request->getPost('description');
        var_dump($this->request->getRawInput());die();
        $cek = $this->model->where('menu_id',$id)->first();
        $photo = $this->request->getFile('photo');

        if ($photo != NULL) {
           unlink(ROOTPATH.'public/upload/'.$cek["photo"]);
           $photo->move(ROOTPATH.'public/upload');
           $getPhoto = $photo->getName();
        } else {
           $getPhoto = $cek["photo"];
        }

        $data = [
            'menu_name' => $name,
            'menu_price' => $price,
            'menu_stock' => $stock,
            'menu_category' => $category,
            'description' => $description,
            'photo' => $getPhoto
        ];

        if ($validation->run($data, 'menu') == FALSE) {
            
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors()
            ];
            return $this->respond($response,500);
        } else {
            $simpan = $this->model->updatemenu($data, $id);
            if ($simpan) {
                $msg = ['message' => 'Data berhasil diupdate'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg
                ];
                return $this->respond($response, 200);
            }

        }
        

    }


    public function delete($id = NULL)
    {
        $hapus = $this->model->deletemenu($id);
        if ($hapus) {
            $code = 200;
            $msg = ['message' => 'Deleted category successfully'];
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $msg
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg
            ];
         
        }
        return $this->respond($response);
    }


}
