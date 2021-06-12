<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('Crud');
    }
	
	public function test_post()
	{
       
        $theCredential = $this->user_data;
        $this->response($theCredential, 200); // OK (200) being the HTTP response code
        
	}

    public function users_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getUser = $this->Crud->readData('id,name,username,role','table_user')->result();
            if ($getUser)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success Get User',
                    'data'=> $getUser
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No Users Were Found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->Crud->readData('id,name,username,role','table_user',$where)->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success Get User',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get User or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }

    public function users_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','table_user',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    "name"      => $this->put('name'),
                    "username"  => $this->put('username'),
                    "password"  => sha1($this->put('password')),
                    "role"      => $this->put('role')
                ];

                $updateData = $this->Crud->updateData('table_user',$data,$where);
                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success Edit User',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed Edit User',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed Delete User Or Id Not Found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }
    public function users_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','table_user',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('table_user',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success delete user',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete user or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }
    public function barang_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getBarang = $this->Crud->readData('id,nama_barang,jenis,jumlah,input_date,status','table_barang')->result();
            if ($getBarang)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success Get Barang',
                    'data'=> $getBarang
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No Barang Were Found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->Crud->readData('id,nama_barang,jenis,jumlah,input_date,status','table_barang',$where)->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success Get User',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get User or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }

    public function barang_post(){
        $nama_barang = $this->post ('nama_barang');
        $jenis = $this->post ('jenis');
        $jumlah = $this->post ('jumlah');
        $input_date = $this->post ('input_date');
        $status = $this->post ('status');
        

        $data = [
            "nama_barang"=>$nama_barang,
            "jenis"=>$jenis,
            "jumlah"=>$jumlah,
            "input_date"=>$input_date,
            "status"=>$status
        ];

        $createuser = $this->Crud->createData('table_barang',$data);
        
        if ($createuser){
            $output = [
                'status' => 200,
                'error' => false,
                'massage' => 'Succses Create Data',
                'data' => $data
            ];
            $this -> set_response($output, REST_Controller ::HTTP_OK);
        }else{
            $output = [
            'status' => 400,
            'error' => false,
            'massage' => 'Failed Create Data',
            'data' => []
        ];
            $this -> set_response($output, REST_Controller ::HTTP_BAD_REQUEST);
        }
    }
    public function barang_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','table_barang',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    "nama_barang" => $this->put('nama_barang'),
                    "jenis" => $this->put('jenis'),
                    "jumlah" => $this->put('jumlah'),
                    "input_date" => $this->put('input_date'),
                    "status" => $this->put('status'),
                ];

                $updateData = $this->Crud->updateData('table_barang',$data,$where);
                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success Edit User',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed Edit User',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed Delete User Or Id Not Found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }
    public function barang_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','table_barang',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('table_barang',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Successfully Deleted Items',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Item Not Found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }
}
