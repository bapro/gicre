<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Creation extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('model_medico');
 $this->load->model('navigation/account_demand_model');
$this->load->model('excel_import_model');
$this->load->library('excel');
$this->load->library('session');
   $this->load->library('form_validation');
}



function get_doc_user_form()
{
$perfil=$this->input->post('perfil');
$data['perfil']=$perfil;
$data['controller']=$this->input->post('cont');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
//$data['execuatur'] = $this->model_admin->getExecuatur();
$data['causa']=$this->model_admin->getCausa();
if($perfil=='Medico'){
$this->load->view('admin/medicos/get_doc_user_form', $data);
} else{
if($perfil=='Asistente Medico'){
$data['medical_centers'] = $this->model_admin->display_all_medical_centers();
}else{	
$sql ="SELECT id_m_c, name FROM  medical_centers WHERE type='Salud ocupacional'";
$query = $this->db->query($sql);
$data['medical_centers']=$query->result();			
}
	
$this->load->view('admin/medicos/get_asist_doc_user_form', $data);
}
$this->load->view('admin/medicos/footer');
}




function getCentro()
{
if($this->input->post('checked')==1){
	
$sql ="SELECT id_m_c, name FROM  medical_centers WHERE type='Salud ocupacional'";
$query = $this->db->query($sql);
$medical_centers=$query->result();	
}else{
$medical_centers= $this->model_admin->display_all_medical_centers();
}
foreach($medical_centers as $row)
{ 
echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}
}








function getClockResultData($val,$id_user,$id_cm,$display, $sql)
{
$data['val']= $val;
$data['id_user'] = $id_user;
$data['id_cm'] = $id_cm;
$data['queryEmp'] = $this->db->query($sql);
$data['display'] =$display;

$this->load->view('ficha-empleado/get-clock-result', $data);

}





 





function loadPatientPhoto(){
$idp=$this->input->post('id_p_a');
$pat=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$idp)->get('patients_appointments')->row_array();

$this->padron_database = $this->load->database('padron',TRUE);

if($pat['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat['ced1'])
->where('SEQ_CED',$pat['ced2'])
->where('VER_CED',$pat['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$img= '<img style="display:inline-block; width:100%; height:auto;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
}else{
$img= '<img  style="width:100%;height:auto;" src="'.base_url().'/assets/img/user.png"  />';	
}

} 
elseif($pat['photo']==""){
$img= '<img  style="display:inline-block; width:100%; height:auto;" src="'.base_url().'/assets/img/user.png"  />';
	
}
else{

$img= '<img  style="display:inline-block; width:100%; height:auto;" src="'.base_url().'/assets/img/patients-pictures/'.$pat['photo'].'"  />';


}
echo $img;

}






function savePatientPartOne (){

$query = $this->db->get_where('patients_appointments',array('date_nacer'=>$this->input->post('date_nacer'), 'tel_cel'=>$this->input->post('tel_cel')));
$query2 = $this->db->get_where('patients_appointments',array('cedula'=>$this->input->post('cedula')));

if($this->input->post('nombre') ==""
 || $this->input->post('date_nacer') ==""
 || $this->input->post('tel_cel') ==""  
  || $this->input->post('sexo') =="" 
 || $this->input->post('estado_civil') =="" 
 || $this->input->post('provincia') ==""
|| $this->input->post('municipio') ==""
 || $this->input->post('nacionalidad') ==""){
$response['message'] = "Los campos con * son obligatorios!"; 
$response['status'] = 1;

}
elseif($query->num_rows() > 0){
$response['message'] = "Ya tenemos un paciente con esta <strong>Fecha nacimiento</strong> y este <strong>Teléfono celular</strong>.";

$response['status'] = 3;
	
	
}

elseif($query2->num_rows() > 0){
$response['message'] = "<span class='alert alert-danger'>Ya tenemos un paciente con  esta <strong>cedula</strong>!</span>";

$response['status'] = 4;
	
	
}
else{

if($_FILES["picture"]['name'])
{
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
 }

else {

$logo = "";

	}

$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");	
$save = array(
  'nombre'  => $this->input->post('nombre'),
    'apodo'  => $this->input->post('apodo'),
  'photo'  => $logo,
  'cedula' => $this->input->post('cedula'),
 'date_nacer' => $this->input->post('date_nacer'),
  'date_nacer_format' => $this->input->post('date_nacer_format'),
   'edad' => $this->input->post('age'),
  'frecuencia'=> $this->input->post('frecuencia'),
 'tel_resi'  => $this->input->post('tel_resi'),
  'tel_cel'=> $this->input->post('tel_cel'),
  'email' => $this->input->post('email'),
  'sexo' => $this->input->post('sexo'),
   'estado_civil' => $this->input->post('estado_civil'),
  'nacionalidad'=> $this->input->post('nacionalidad'),
  'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
  'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
   'responsable_legal' => $this->input->post('responsable_legal'),
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'inserted_by' =>$this->input->post('id_user'),
  'insert_date' => $insert_date,
  'filter_date' => $filter_date,
  'update_date' => $insert_date,
  'updated_by' => $this->input->post('id_user'),

  );
$id_pat=$this->model_admin->save_patient($save);

$this->session->set_userdata('sessionIdPatient',$save);
 $saveN = array(
'nec1'  => "NEC-$id_pat"
);

$this->model_admin->insert_nec($id_pat,$saveN);


$response['message'] = "Datos guardados con exito, seguimos!"; 
$response['status'] = $id_pat;

}	
echo json_encode($response);
}



public function savePatientCita(){
	
	
	$controller= $this->input->post('controller');
$idpatient = $this->input->post('idpatient');

$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');

if($this->input->post('seguro_medico')==11){
	$plan=0;
}else{
	if($this->input->post('plan')){
$plan=$this->input->post('plan');
	}else{
		$plan=0;
	}
}

$saveP = array(
 'seguro_medico'  => $this->input->post('seguro_medico'),
 'afiliado'  => $this->input->post('afiliado'),
 'plan'  => $plan
  );
  
  $this->model_admin->saveUpdatePatient($idpatient,$saveP);
  
  for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$idpatient,
	'input_name' => $inp,
	'inputf' => $inf,
	'seguro_id' =>$this->input->post('seguro_medico')//when remove a seguro field we remove it in patient seguro field as well with this id
	);

	$this->model_admin->saveInput($saveInputs);
}



$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain',$centro_type);
$this->session->set_userdata('sessionIdPatientNewCita',$idpatient);
$this->session->set_userdata('sessionIdDocNewCita', $this->input->post('doctor'));
$this->session->set_userdata('sessionIdCentNewCita',$this->input->post('centro_medico'));
$this->session->set_userdata('sessionIdSegNewCita',$this->input->post('seguro_medico'));
$this->session->set_userdata('id_user', $this->input->post('id_user'));
$this->session->set_userdata('sessionIdPatient',$idpatient);


if($this->input->post('orientation')==0){
$dayNumber=$this->db->select('id')->where('title',$this->input->post('fecha_filter'))->get('diaries')->row('id');
$filter_date1 = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
 $save2 = array(
'nec'=> "NEC-$idpatient",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' =>$this->input->post('especialidad'),
'doctor' =>$this->input->post('doctor'),
'id_patient' => $idpatient,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' =>$dayNumber,
'update_by' => $this->input->post('id_user'),
'inserted_by' => $this->input->post('id_user'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date1,
'cancelar' =>0,
'hora_de_cita' =>$this->input->post('hora_de_cita')
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);

$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('causa')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('causa'),
	   'inserted_by' => $this->input->post('id_user'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('id_user'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}
//------------------------------------------------------------------------------------------------
$area_id= $this->db->select('area')->where('id_user',$this->input->post('id_user'))->get('users')->row('area');
if($area_id=='87'){
redirect("medico/index");
}else{
redirect("medico/gh0rtgkrr4g5");
}
}


//------HOSPITALIZACION----------------------------------------------------------------
if($this->input->post('orientation')==3){
 $savedas = array(
'centro'=> $this->input->post('hosp_centro'),
'esp'  => $this->input->post('hosp_esp'),
'doc'=> $this->input->post('hosp_doctor'),
'causa' =>$this->input->post('hosp_causa'),
'via' =>$this->input->post('hosp_ingreso'),
'id_patient' => $idpatient,
'sala' => $this->input->post('hosp_sala'),
'servicio' => $this->input->post('hosp_servicio'),
'cama' => $this->input->post('hosp_cama'),
'hosp_auto' => $this->input->post('hosp_auto'),
'hosp_auto_por' => $this->input->post('hosp_auto_por'),
'inserted' => $this->input->post('id_user'),
'updated' => $this->input->post('id_user'),
'timeinserted' => $insert_date,
'timeupdated' => $insert_date,
'cancelar' =>0
   );
$this->db->insert("hospitalization_data",$savedas);

//------------------------------------------------------------------------------------------------
 $id_user=$this->input->post('id_user');
redirect("hospitalizacion/hospitalizacion_list/$idpatient/$id_user");
}



elseif($this->input->post('orientation')==2){

//-------------------------------SAVE EMERGENCIA DATA------------------------------------------------
$query1 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('em_name')));
if($query1->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('em_name'),
'id'=>1
);
$this->db->insert("emergency_adm_data",$save);
}

//----------------------------------------------------------------------------------------

$query2 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('paciente_referido')));
if($query2->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('paciente_referido'),
'id'=>2
);
$this->db->insert("emergency_adm_data",$save);
}


//----------------------------------------------------------------------------------------

$query3 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('medio_llegado')));
if($query3->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('medio_llegado'),
'id'=>3
);
$this->db->insert("emergency_adm_data",$save);
}

//----------------------------------------------------------------------------------------

$query3 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('estado_paciente')));
if($query3->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('estado_paciente'),
'id'=>4
);
$this->db->insert("emergency_adm_data",$save);
}

if($this->input->post('enviado_a')==1){
	$go_to="triaje";
}else{
$go_to="Emergencia General";	
}
$save = array(
'idpatient'=>$idpatient,
'centro'=>$this->input->post('emergencia-centro'),
'causa'=>$this->input->post('em_name'),
'paciente_referido_por'=>$this->input->post('paciente_referido'),
'medio_de_llegado'=>$this->input->post('medio_llegado'),
'enviado_a'=>$this->input->post('enviado_a'),
'enviado_name'=>$go_to,
'estado_de_paciente'=>$this->input->post('estado_paciente'),
'inserted_by'=>$this->input->post('id_user'),
'update_by'=>$this->input->post('id_user'),
'created_date'=>date("Y-m-d"),
'create_time'=>date("H:i:s"),
'update_date'=>date("Y-m-d"),
'update_time'=>date("H:i:s")
);
$this->db->insert("emergency_patients",$save);
$enviado_a=$this->input->post('enviado_a');
$id_pat_emergencia= $idpatient;
$iduser=$this->input->post('id_user');
redirect("emergency/emergency_patient/$enviado_a/$id_pat_emergencia/$iduser");

}

else{
$this->session->set_userdata('id_cm',$this->input->post('factura-centro'));
$this->session->set_userdata('id_d',$this->input->post('facturar-doc'));
$this->session->set_userdata('id_p_a',$idpatient);
$this->session->set_userdata('id_seg',$this->input->post('seguro_medico'));
redirect("$controller/redirect_fac");
}
	
	
	
}




public function saveNewPassWebService(){
$perfil= $this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$password=$this->input->post('password');
$id_seguro=$this->input->post('id_seguro');
$id_user=$this->input->post('id_user');
$id_centro=$this->input->post('id_centro');
if($perfil=="Medico"){
	$passField = "passwordDoc";
	$centro_type = "privado";
	$idUserField="id_doctor";
	$idUserValue=$id_user;
}else{
	$passField = "passwordCentro";
	$centro_type = "publico";
    $idUserField="id_centro";
    $idUserValue=$id_centro;	
}

$query = $this->db->get_where('doctor_web_services_credentials',
array(
$idUserField=>$idUserValue,
'id_seguro'=>$id_seguro,
));



if($password=='' || $id_seguro==''){
 $response['status'] =0;
$response['message'] = 'los dos campos son obligatorios!'; 
} elseif($query->num_rows() == 1){
	$where= array(
   'id_seguro' => $id_seguro,
  $idUserField => $idUserValue
);


$data = array(
  $passField => $password
 );


 
$this->db->where($where);
$this->db->update("doctor_web_services_credentials",$data);
 $response['status'] =2;
$response['message'] = 'Cambiado con éxito.'; 
}
else{	
$data = array(
  $passField => $password,
  'id_seguro' => $id_seguro,
  $idUserField => $idUserValue,
  'centro_type' =>$centro_type,
   'id_user' =>$this->input->post('id_user')   
  );	
$this->db->insert("doctor_web_services_credentials",$data);
 $response['status'] =1;
$response['message'] = 'Agregado con éxito.'; 

}
echo json_encode($response);
}

function checkWebServicePass(){
$id_seguro=$this->input->post('id_seguro');
$id_user=$this->input->post('id_user');
$id_centro=$this->input->post('id_centro');

$perfil= $this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');

if($perfil=="Medico"){
$password=$this->db->select('passwordDoc')->where('id_seguro',$id_seguro)->where('id_doctor',$id_user)->get('doctor_web_services_credentials')->row('passwordDoc');
}else{
$password=$this->db->select('passwordCentro')->where('id_seguro',$id_seguro)->where('id_centro',$id_centro)->get('doctor_web_services_credentials')->row('passwordCentro');

}
echo $password;
}


public function saveUserEdit(){
	$nombre = $this->input->post('nombre');
	if($nombre !=""){
		
		
	$editCentro = array(
  'id_centro'=> $this->input->post('centro')
  );

$whereC= array(
  'id_user' =>$this->input->post('id_user')
);

$this->db->where($whereC);
$this->db->update("internal_drugstores_center",$editCentro);	
		
			
$save = array(
  'name'  => $nombre,
  'cell_phone'=> $this->input->post('cell_phone'),
  'updated_by' =>$this->input->post('id_operator'),
 'update_date' =>date("Y-m-d H:i:s")
  );

$where= array(
  'id_user' =>$this->input->post('id_user')
);

$this->db->where($where);
$this->db->update("users",$save);
if($this->db->affected_rows() > 0){
$response['message'] = 'guadado con exito!'; 
$response['status'] =  1;
$this->session->set_userdata('farm_int_name', $nombre);
}else{
   $response['status'] =  0;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}



}else{
	$response['status'] =  2;
	   $response['message'] = 'los campos son vacios!'; 
}

echo json_encode($response);
}

	

}