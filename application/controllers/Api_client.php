<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api_client extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->ID_USER =$this->session->userdata('user_id');
}


function storeNewClientApiIntegration(){

$client_id=$this->input->post('client_id');
$instance_id=$this->input->post('instance_id');
$token=$this->input->post('token');
$api_link=$this->input->post('api_link');


if($client_id=="")
{
$response['message'] = 'Seleccione el nombre del client del api'; 
$response['status'] =  0;
}else{
if($this->input->post('action')==0){
$data = array(
'client_id'=>$client_id,
'instance_id'=>$instance_id,
'token'=>$token,
'api_link'=>$api_link,
'inserted_by'=>$this->ID_USER,
'updated_by'=>$this->ID_USER,
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s")
);
$this->db->insert("api_client_integration",$data);
}else{
$data = array(
'instance_id'=>$instance_id,
'token'=>$token,
'api_link'=>$api_link,
'updated_by'=>$this->ID_USER,
'updated_time'=>date("Y-m-d H:i:s")
);
$where = array(
'client_id'=>$client_id
);
$this->db->where($where);
$this->db->update("api_client_integration",$data);	
}

if($this->db->affected_rows() > 0){
$response['message'] = 'Creado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  2;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
}
echo json_encode($response);

	
}




function getClientApiData(){
	$client_id=$this->input->post('client_id');
	$api=$this->db->select('*')->where('client_id',$client_id)->get('api_client_integration')->row_array();
   if($api){ 
   $created_by=$this->db->select('name')->where('id_user',$api['inserted_by'])->get('users')->row('name');
   $updated_by=$this->db->select('name')->where('id_user',$api['updated_by'])->get('users')->row('name');
  $insed_time = date("d-m-Y H:i:s", strtotime($api['inserted_time']));
 $upda_time = date("d-m-Y H:i:s", strtotime($api['updated_time']));			
   $response = array(
'instance_id'   =>$api['instance_id'],
'token' => $api['token'],
'api_link' => $api['api_link'],
'creation_info' => "<div class='alert alert-primary p-1' style='font-size:13px' role='alert'>
			creado por $created_by $insed_time cambiado por $updated_by $upda_time 
			</div>",  

'action'=> 1

);
	}else{
	$response = array(
	'amount'   =>"",
	'money' => "",
	'creation_info' => "",
	'action'=> 0
	); 
}
echo json_encode($response);
}








}