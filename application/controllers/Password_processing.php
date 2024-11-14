<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Password_processing extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');

}


public function updated_password(){
$pass1=$this->input->post('pass1');
$pass2=$this->input->post('pass2');
$id_user=$this->input->post('id_user');
$id_table=$this->input->post('id_table');

if($pass1=='' || $pass2==''){
 $response['status'] =0;
$response['message'] = 'los dos campos son obligatorios!'; 
} elseif($pass1 != $pass2){
 $response['status'] =2;
$response['message'] = 'la contraseña no coincide!'; 	
}
else{		
$data = array(
  'password' => md5($pass1),
  'updated_by' => $id_user,
  'update_date' => date("Y-m-d H:i:s")
  );
$this->model_admin->DeactivarUser($id_table,$data);
 $response['status'] =1;
$response['message'] = 'Cambiada con éxito!<br/>Logueate de nuevo.'; 
$where = array(
'user_id' =>$id_user
);

$this->db->where($where);
$this->db->delete('current_user_info');


$this->db->like('data', $id_user);
$this->db->delete('ci_sessions');
}
echo json_encode($response);
}




public function updated_password_admin(){
$pass1=$this->input->post('pass1');
$pass2=$this->input->post('pass2');
$id_user=$this->input->post('id_user');
$id_table=$this->input->post('id_table');

if($pass1=='' || $pass2==''){
 $response['status'] =0;
$response['message'] = 'los dos campos son obligatorios!'; 
} elseif($pass1 != $pass2){
 $response['status'] =2;
$response['message'] = 'las contraseña no coinciden!'; 	
}
else{		
$data = array(
  'password' => md5($pass1),
  'updated_by' => $id_user,
  'update_date' => date("Y-m-d H:i:s")
  );
$this->model_admin->DeactivarUser($id_table,$data);
 $response['status'] =1;
$response['message'] = 'Cambiada con éxito!'; 

}
echo json_encode($response);
}










}