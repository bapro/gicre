<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hosp_interconsultas extends CI_Controller {
public function __construct()
{
parent::__construct();

 $this->ID_PATIENT= $this->session->userdata('id_patient');
	$this->ID_USER = $this->session->userdata('user_id');
	$this->ID_CENTRO =$this->session->userdata('id_centro');
	  $this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
	  $this->ID_HOSP = $this->session->userdata('ID_HOSP');
	    $this->load->library('user_register_info_hospitalization'); 
}



 public function pagination()
{
   $sql="SELECT *, asked_time as inserted_time FROM hosp_solicutud_consulta WHERE id_patient=$this->ID_PATIENT ORDER BY id DESC";
     $query= $this->hospitalization_emgergency->query($sql);
     
    $params = array('id_paginate' => 'paginate-hospSolCon-li', 'rows'=>$query->result(), 'id'=>'id', 'total'=>$query->num_rows());
        echo $this->user_register_info_hospitalization->list_patients_registers_by_date($params);
}



public function form() {
$data['centro_medico'] =$this->ID_CENTRO; 
$page= $this->input->get('page');
$data['solCon_data'] = $page;
$sql="SELECT * FROM hosp_solicutud_consulta WHERE id=$page";
$queryscon= $this->hospitalization_emgergency->query($sql);
$data['queryscon']=$queryscon->result();
$this->load->view('hospitalization/clinical-history/interconsultas/form', $data);
    
}




public function emailInterconsulta($asked_by,$asked_to,$id_hosp,$patient_id,$id_centro){
$askedTo=$this->db->select('name,correo')->where('id_user',$asked_to)->get('users')->row_array();
$askedToName=$askedTo['name'];
$askedToEmail=$askedTo['correo'];

$askedByInfo=$this->db->select('name,area')->where('id_user',$asked_by)->get('users')->row_array();
$askedByName=$askedByInfo['name'];
$area=$this->db->select('title_area')->where('id_ar',$askedByInfo['area'])->get('areas')->row('title_area');

$centro=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');

$patient=$this->db->select('nombre')->where('id_p_a',$patient_id)->get('patients_appointments')->row('nombre');

$hospitalData=$this->db->select('sala,cama,causa')->where('id',$this->ID_HOSP)->get('hospitalization_data')->row_array();

$sala=$hospitalData['sala'];
$cama=$hospitalData['cama'];
$causa=$hospitalData['causa'];

$link='href="https://www.admedicall.com"';
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;color:red'>
<strong>¡HOLA DR. $askedToName!</strong>,<br/> <br/>   EL DR. $askedByName,<br/>
$area, $centro,  ESTA SOLICITANDO UNA INTERCONSULTA CON <br/> 
USTED PARA EL PACIENTE: $patient  NEC-$patient_id, DIGNOSTICO DE INGRESO: <br/> 
$causa, SALA: $sala  CAMA: $cama <br/> <br/>

<a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;' $link >IR A GICRE</a>

</body>
</html>";
echo $msg;
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to("$askedToEmail");// change it to yours
$this->email->subject('Solicitud De Interconsulta');
$this->email->message($msg);
$this->email->send();
}




public function saveSolInter(){
	
if($this->input->post('hosp_desc_sol_inter')==''){
$response['status'] =  0;
 $response['message'] = 'Los campos con * son obligatorios!';
}	else{
$asked_to=$this->input->post('hosp_sol_int_doc');
$data = array(
'descripcion'=>$this->input->post('hosp_desc_sol_inter'),
'asked_by'=>$this->ID_USER,
'id_hosp'=>$this->ID_HOSP,
'id_patient'=>$this->ID_PATIENT,
//'centro'=>$id_centro,
//'esp'=>$this->input->post('hosp_sol_int_esp'),
'asked_to'=>$asked_to,
'respuesta'=> '',
'asked_time'=>date("Y-m-d H:i:s")
);
if($this->input->post('id_interconsulta')==0){
$this->hospitalization_emgergency->insert("hosp_solicutud_consulta",$data);
}else{
	$where= array(
  'id' =>$this->input->post('id_interconsulta')
);

$this->hospitalization_emgergency->where($where);

$this->hospitalization_emgergency->update('hosp_solicutud_consulta', $data);
}
if($this->hospitalization_emgergency->affected_rows() > 0){
	//$this->emailInterconsulta($asked_by,$asked_to,$id_hosp,$patient_id,$id_centro);
	 $response['message'] = '';
	$response['status'] =  1;
}else{
	 $response['message'] = '';
	$response['status'] =  -1;
}
}
echo json_encode($response);
}


public function registroSolInterDoc(){
$id_user=$this->input->post('id_user');
$patient_id=$this->input->post('patient_id');
$resp=$this->input->post('resp');
if($resp==1){

$data['user']='Nombre Del Solicitante';
$asked=$this->db->select('asked_by,asked_time,responded_time')->where('asked_by',$id_user)->where('id_patient',$patient_id)->get('hosp_solicutud_consulta')->row_array();
$data['fecha_title']='Fecha y hora de solicitud';
$id_doc=$asked['asked_by'];

$data['fecha'] = date("d-m-Y H:i:s", strtotime($asked['asked_time']));


}else{
$data['fecha_title']='Fecha y hora de respuesta';
$asked=$this->db->select('asked_to,asked_time,responded_time')->where('asked_to',$id_user)->where('id_patient',$patient_id)->get('hosp_solicutud_consulta')->row_array();

$id_doc=$asked['asked_to'];

$data['fecha'] = date("d-m-Y H:i:s", strtotime($asked['responded_time']));

$data['user']='Nombre Del Interconsultante';

}
$data['editUser'] = $this->model_admin->editUser($id_doc);
$this->load->view('hospitalizacion/historial/solicitud-interconsulta/registroSolInterDoc',$data);

}

public function updateSolInter(){
//$this->db->trans_start();
if($this->input->post('who')==1){
$data = array(
'descripcion'=> $this->input->post('hosp_desc_sol_inte'),
'asked_time'=>date("Y-m-d H:i:s")
);
}else{
$data = array(
'respuesta'=> $this->input->post('hosp_resp_sol'),
'responded_time'=>date("Y-m-d H:i:s")
);
}
$where= array(
  'id' =>$this->input->post('id')
);

$this->db->where($where);

$this->db->update('hosp_solicutud_consulta', $data);
if($this->db->affected_rows() > 0){
	echo 'hecho';
}else{
   echo 'error';
}


}





public function dataPaginateSolInterCons()
{
$page= $this->input->get('page');
$user_id= $this->input->get('user_id');
$id_patient= $this->input->get('id_patient');
$perfil= $this->input->get('perfil');
$user_field= $this->input->get('user_field');
$data['perfil']=$perfil;
if($perfil=="Admin"){
$contition="";
}else{
$contition="$user_field=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;

$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from hosp_solicutud_consulta where $contition id_patient=$id_patient  ORDER BY id desc limit $start,$per_page";
$data['query_paginate']= $this->db->query($sql);
$this->load->view('hospitalizacion/historial/solicitud-interconsulta/pagination-data',$data);
}




}