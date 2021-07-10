<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function index(){

    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'role' => $this->session->userdata('role'),
          'title' => 'Dashboard | Home'
        ];
        if($data['role']=='admin'){
          $this->load->view('layout/header',$data);
          $this->load->view('layout/sidebar');
          $this->load->view('layout/navbar',$data);
          $this->load->view('dashboard');
          $this->load->view('layout/footer');
        }else{
          $this->load->view('layout/header',$data);
          $this->load->view('layout/sidebarUser');
          $this->load->view('layout/navbar',$data);
          $this->load->view('dashboard');
          $this->load->view('layout/footer');
        }
        
      }
    }
  }

  public function login(){

    $this->load->view('login');
  }

  public function prosesLogin(){
    $url = base_url('/api/auth/login');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

    $data = array(
            'username'      => $username,
            'password' => $password 
    );

    $data_string = json_encode($data);

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data_string))
    );

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

    // Send the request
    $result = curl_exec($curl);

    // Free up the resources $curl is using
    curl_close($curl);

    $cekLogin = json_decode($result,true);

    if(isset($cekLogin['status'])){
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Invalid Login');
          window.location.href='".base_url('dashboard/login')."';
          </script>");
      return;
    }
    if(isset($cekLogin['token'])){
      if($cekLogin['role'] == 'admin'){
        $this->session->set_userdata('token', $cekLogin['token']);
        $this->session->set_userdata('username', $username);
        $this->session->set_userdata('role', $cekLogin['role']);
        $this->session->set_userdata('isLoginAdmin', true);
        return redirect(base_url('dashboard'));
      }else{
        $this->session->set_userdata('token', $cekLogin['token']);
        $this->session->set_userdata('username', $username);
        $this->session->set_userdata('role', $cekLogin['role']);
        $this->session->set_userdata('id', $cekLogin['id']);
        $this->session->set_userdata('isLoginAdmin', true);
        return redirect(base_url('dashboard'));
      }
    }
   
  }

  public function logout(){
    if($this->session->userdata('token')){
      session_destroy();
    }
    return redirect(base_url('dashboard/login'));
  }
  
  public function list_user(){
    
    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | User'
        ];

    $url = base_url('/api/main/users');
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Authorization: Bearer '.$this->session->userdata('token'))
    );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
    // Send the request
    $result = curl_exec($curl);
    // Free up the resources $curl is using
    curl_close($curl);

    $getUser = json_decode($result,true);
    $user['datauser'] = $getUser['data'];
    
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar');
    $this->load->view('user',$user);
    $this->load->view('layout/footer');
      }
    }
  }
  
  public function delete_user($id){
    $url = base_url('/api/main/users/id/'.$id);
           $curl = curl_init($url);
           curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
       
           curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.$this->session->userdata('token'))
           );
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
           // Send the request
           $result = curl_exec($curl);
           // Free up the resources $curl is using
           curl_close($curl);
           $deleteUser = json_decode($result,true);
           if($deleteUser['status'] == 200){
             echo ("<script LANGUAGE='JavaScript'>
             window.alert('Successfully Deleted!');
             window.location.href='".base_url('dashboard/list_user')."';
             </script>");
           }else{
             echo ("<script LANGUAGE='JavaScript'>
             window.alert('Failed to delete');
             window.location.href='".base_url('dashboard/list_user')."';
             </script>");
           }
   }
  public function list_barang(){

    $url = base_url('/api/main/barang');
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'role' => $this->session->userdata('role'),
          'id' => $this->session->userdata('id'),
          'title' => 'Dashboard | User'
        ];

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Authorization: Bearer '.$this->session->userdata('token'))
    );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
    // Send the request
    $result = curl_exec($curl);
    // Free up the resources $curl is using
    curl_close($curl);

    $getBarang = json_decode($result,true);
    $barang['databarang'] = $getBarang['data'];
    $barang['username'] = $data['username'];
    
    if($data['role']=='admin'){
      $this->load->view('layout/header');
      $this->load->view('layout/sidebar');
      $this->load->view('layout/navbar');
      $this->load->view('barang',$barang);
      $this->load->view('layout/footer');
    }else{
      $this->load->view('layout/header');
    $this->load->view('layout/sidebarUser');
    $this->load->view('layout/navbar');
    $this->load->view('baranguser',$barang);
    $this->load->view('layout/footer');
    }
    
      }
    }
  }
  
  public function list_hasil(){

    $url = base_url('/api/main/barang');
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'role' => $this->session->userdata('role'),
          'title' => 'Dashboard | User'
        ];

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Authorization: Bearer '.$this->session->userdata('token'))
    );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
    // Send the request
    $result = curl_exec($curl);
    // Free up the resources $curl is using
    curl_close($curl);

    $getBarang = json_decode($result,true);
    $barang['databarang'] = $getBarang['data'];
    $barang['username'] = $data['username'];
    if($data['role']=='admin'){
      $this->load->view('layout/header');
      $this->load->view('layout/sidebar');
      $this->load->view('layout/navbar');
      $this->load->view('hasil',$barang);
      $this->load->view('layout/footer');
    }else{
      $this->load->view('layout/header');
    $this->load->view('layout/sidebarUser');
    $this->load->view('layout/navbar');
    $this->load->view('hasiluser',$barang);
    $this->load->view('layout/footer');
    }
    
      }
    }
  }
  

   public function delete_barang($id){
    $url = base_url('/api/main/barang/id/'.$id);
           $curl = curl_init($url);
           curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
       
           curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.$this->session->userdata('token'))
           );
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
           // Send the request
           $result = curl_exec($curl);
           // Free up the resources $curl is using
           curl_close($curl);
           $deleteBarang = json_decode($result,true);
           if($deleteBarang['status'] == 200){
             echo ("<script LANGUAGE='JavaScript'>
             window.alert('Successfully deleted!');
             window.location.href='".base_url('dashboard/list_barang')."';
             </script>");
           }else{
             echo ("<script LANGUAGE='JavaScript'>
             window.alert('Failed to delete');
             window.location.href='".base_url('dashboard/list_barang')."';
             </script>");
           }
   }
   public function create_barang(){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'id' => $this->session->userdata('id'),
          'title' => 'Dashboard | Menu'
        ];
        $dataCreate = [
          'nama_barang'=> $this->input->post('nama_barang'),
          'jenis'=> $this->input->post('jenis'),
          'jumlah'=> $this->input->post('jumlah'),
          'harga'=> $this->input->post('harga'),
          'input_date'=> $this->input->post('input_date'),
          'status'=> 'Pending',
          'username'=> $data['username'],
        ];


              $url = base_url('/api/main/barang');
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
          
              curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer '.$this->session->userdata('token')
                )
              );
      
              /* Set JSON data to POST */
              curl_setopt($curl, CURLOPT_POSTFIELDS, $dataCreate);
      
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
              // Send the request
              $result = curl_exec($curl);
              // Free up the resources $curl is using
              curl_close($curl);
      
              $getMenu = json_decode($result,true);
              $menu['datamenu'] = $getMenu['data'];
      
              
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Saved successfully');
              window.location.href='".base_url('dashboard/list_barang')."';
              </script>");
              return;
      }
    }
  }
  public function create_user(){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $dataCreate = [
          'name'=> $this->input->post('name'),
          'username'=> $this->input->post('username'),
          'password'=> $this->input->post('password'),
          'role'=> $this->input->post('role'),
        ];


              $url = base_url('/api/auth/register');
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
          
              curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer '.$this->session->userdata('token')
                )
              );
      
              /* Set JSON data to POST */
              curl_setopt($curl, CURLOPT_POSTFIELDS, $dataCreate);
      
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
              // Send the request
              $result = curl_exec($curl);
              // Free up the resources $curl is using
              curl_close($curl);
      
              $getMenu = json_decode($result,true);
              $menu['datamenu'] = $getMenu['data'];
      
              
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Saved successfully');
              window.location.href='".base_url('dashboard/list_user')."';
              </script>");
              return;
      }
    }
  }
  public function edit_barang($id){

    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $url = base_url('/api/main/baranguser/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];

        $this->load->view('layout/header',$data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar',$data);
        $this->load->view('edit_barang',$menu);
        $this->load->view('layout/footer');
      }
    }
  }
  public function edit_user($id){

    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $url = base_url('/api/main/users/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $menu['datamenu'] = $getMenu['data'];

        $this->load->view('layout/header',$data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar',$data);
        $this->load->view('edit_user',$menu);
        $this->load->view('layout/footer');
      }
    }
  }
  public function proses_edit_barang($id){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $dataCreate = [
          'status'=> 'Approve' ,
        ];

        $url = base_url('/api/main/barang/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $datamenu = $getMenu['data'];



              $dataPut= json_encode($dataCreate);


              // var_dump($dataCreate);die();
              $url = base_url('/api/main/barang/id/'.$id);
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          
              curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer '.$this->session->userdata('token'),
                'Content-Type:application/json'
                )
              );

              /* Set JSON data to POST */
              curl_setopt($curl, CURLOPT_POSTFIELDS, $dataPut);
      
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
              // Send the request
              $result = curl_exec($curl);
              // Free up the resources $curl is using
              curl_close($curl);
      
              $getMenu = json_decode($result,true);
              $menu['datamenu'] = $getMenu['status'];
             
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('successfully approved');
              window.location.href='".base_url('dashboard/list_barang')."';
              </script>");
              return;
      }
    }
  }
  public function proses_edit_user($id){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $dataCreate = [
          'username'=> $this->input->post('username'),
          'name'=> $this->input->post('name'),
          'password'=> $this->input->post('password'),
          'role'=> $this->input->post('role')
        ];

        $url = base_url('/api/main/users/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $datamenu = $getMenu['data'];



              $dataPut= json_encode($dataCreate);


              // var_dump($dataCreate);die();
              $url = base_url('/api/main/users/id/'.$id);
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          
              curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer '.$this->session->userdata('token'),
                'Content-Type:application/json'
                )
              );

              /* Set JSON data to POST */
              curl_setopt($curl, CURLOPT_POSTFIELDS, $dataPut);
      
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
              // Send the request
              $result = curl_exec($curl);
              // Free up the resources $curl is using
              curl_close($curl);
      
              $getMenu = json_decode($result,true);
              $menu['datamenu'] = $getMenu['status'];
             
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Edited successfully');
              window.location.href='".base_url('dashboard/list_user')."';
              </script>");
              return;
      }
    }
  }
  public function proses_edit_baranguser($id){
    if($this->session->userdata('token') == ''){
      return redirect(base_url('dashboard/login'));
    }else{
      if($this->session->userdata('isLoginAdmin') == true){
        $data = [
          'username' => $this->session->userdata('username'),
          'title' => 'Dashboard | Menu'
        ];
        $dataCreate = [
          'nama_barang'=> $this->input->post('nama_barang'),
          'jenis'=> $this->input->post('jenis'),
          'jumlah'=> $this->input->post('jumlah'),
          'harga'=> $this->input->post('harga'),
          'input_date'=> $this->input->post('input_date'),
          'status'=> 'Pending',
          'username'=> $data['username'],
        ];

        $url = base_url('/api/main/baranguser/id/'.$id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer '.$this->session->userdata('token')
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getMenu = json_decode($result,true);
        $datamenu = $getMenu['data'];



              $dataPut= json_encode($dataCreate);


              // var_dump($dataCreate);die();
              $url = base_url('/api/main/baranguser/id/'.$id);
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          
              curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer '.$this->session->userdata('token'),
                'Content-Type:application/json'
                )
              );

              /* Set JSON data to POST */
              curl_setopt($curl, CURLOPT_POSTFIELDS, $dataPut);
      
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
              // Send the request
              $result = curl_exec($curl);
              // Free up the resources $curl is using
              curl_close($curl);
      
              $getMenu = json_decode($result,true);
              $menu['datamenu'] = $getMenu['status'];
             
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Edited successfully');
              window.location.href='".base_url('dashboard/list_barang')."';
              </script>");
              return;
      }
    }
  }
  
}
