<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Action_for_patient_hosp extends CI_Controller {
public function __construct()
{
parent::__construct();

  $this->load->library('form_validation'); 
}


public function save_update_hosp()
{
	
if($this->input->post('hosp_centro') =='' || $this->input->post('hosp_esp1') ==''||
$this->input->post('hosp_doctor') =='' || $this->input->post('hosp_causa') ==''||
$this->input->post('hosp_ingreso') =='' || $this->input->post('hosp_sala') =='' ||
$this->input->post('hosp_servicio') =='' || $this->input->post('hosp_cama') =='' ){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
}
elseif(($this->input->post('id_seguro') !=11) && ($this->input->post('hosp_auto') =='' || $this->input->post('hosp_auto_por') =='')){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
}

else{ 		
 $update = array(
'centro'=> $this->input->post('hosp_centro'),
'esp'  => $this->input->post('hosp_esp1'),
'doc'=> $this->input->post('hosp_doctor'),
'causa' =>$this->input->post('hosp_causa'),
'via' =>$this->input->post('hosp_ingreso'),
'sala' => $this->input->post('hosp_sala'),
'servicio' => $this->input->post('hosp_servicio'),
'cama' => $this->input->post('hosp_cama'),
'hosp_auto' => $this->input->post('hosp_auto'),
'hosp_auto_por' => $this->input->post('hosp_auto_por'),
'updated' => $this->input->post('id_user'),
'timeupdated' =>date("Y-m-d H:i:s"),
'canceled'=> 0
   );

$where= array(
  'id' =>$this->input->post('id_hosp')
);

$this->db->where($where);
$this->db->update("hospitalization_data",$update);

if($this->db->affected_rows() > 0){
$response['message'] = 'Cambiado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  2;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
}
echo json_encode($response);
}







public function add_new_hosp()
{
if($this->input->post('hosp_centro') =='' || $this->input->post('hosp_esp') ==''||
$this->input->post('hosp_doctor') =='' || $this->input->post('hosp_causa') ==''||
$this->input->post('hosp_ingreso') =='' || $this->input->post('hosp_sala') =='' ||
$this->input->post('hosp_servicio') =='' || $this->input->post('hosp_cama') =='' ){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
}
elseif(($this->input->post('id_seguro') !=11) && ($this->input->post('hosp_auto') =='' || $this->input->post('hosp_auto_por') =='')){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
}

else{ 
 $savedas = array(
'centro'=> $this->input->post('hosp_centro'),
'esp'  => $this->input->post('hosp_esp'),
'doc'=> $this->input->post('hosp_doctor'),
'causa' =>$this->input->post('hosp_causa'),
'via' =>$this->input->post('hosp_ingreso'),
'id_patient' => $this->input->post('id_p_a'),
'sala' => $this->input->post('hosp_sala'),
'servicio' => $this->input->post('hosp_servicio'),
'cama' => $this->input->post('hosp_cama'),
'hosp_auto' => $this->input->post('hosp_auto'),
'hosp_auto_por' => $this->input->post('hosp_auto_por'),
'inserted' => $this->input->post('id_user'),
'updated' => $this->input->post('id_user'),
'timeinserted' =>date("Y-m-d H:i:s"),
'timeupdated' =>date("Y-m-d H:i:s"),
'canceled' =>0
   );
$this->db->insert("hospitalization_data",$savedas);
if($this->db->affected_rows() > 0){
$response['message'] = 'Cambiado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  2;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
}
echo json_encode($response);
}













}