<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_table_data_by_id {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				$this->CI->load->model('model_admin');
				$this->ID_USER =$this->CI->session->userdata('user_id');
		  }

 public function getPatientInfo($id_patient){
 $get_patient_info_by_id=$this->CI->db->select('*')->where('id_p_a',$id_patient)->get('patients_appointments_view')->row_array();
 
 $get_patient_seguro_info_by_id=$this->CI->db->select('*')->where('id_sm',$get_patient_info_by_id['seguro_medico'])->get('seguro_medico')->row_array();
 
 $provincia=$this->CI->db->select('title')->where('id',$get_patient_info_by_id['provincia'])->get('provinces')->row('title');
$patient_adress = $provincia. ", ". $get_patient_info_by_id['calle']. ", ". $get_patient_info_by_id['barrio'];
return [$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id];

}


 public function getSeguroById($id){

 $getSeguroById=$this->CI->db->select('*')->where('id_sm',$id)->get('seguro_medico')->row_array();
 
return $getSeguroById;

}



 public function getCentroInfo($id_centro){
$get_centro_info_by_id=$this->CI->db->select('name, type, logo, rnc, primer_tel, segundo_tel, email, provincia, municipio, barrio, calle, pagina_web')->where('id_m_c',$id_centro)->get('medical_centers')->row_array();


$provincia=$this->CI->db->select('title')->where('id',$get_centro_info_by_id['provincia'])->get('provinces')->row('title');
$muncipio=$this->CI->db->select('title_town')->where('id_town',$get_centro_info_by_id['municipio'])->get('townships')->row('title_town');
$centro_adress = $provincia. ", ".$muncipio. ", ". $get_centro_info_by_id['calle']. ", ". $get_centro_info_by_id['barrio'];


return [$get_centro_info_by_id, $centro_adress];

}


public function getDoctorInfo($id_doctor){
$get_doctor_info_by_id=$this->CI->db->select('*')->where('id_user',$id_doctor)->get('users')->row_array();

$doctor_area=$this->CI->db->select('title_area')->where('id_ar',$get_doctor_info_by_id['area'])->get('areas')->row('title_area');

return [$get_doctor_info_by_id, $doctor_area];	
}

		
public function getCodigoContrato($type, $cent, $seg, $doc){

if($type=='privado'){
	//--codigo contrato para factura de centro medico privado (doctor)
	$codigo_contrato=$this->CI->db->select('codigo')->where('id_seguro',$seg)->where('id_doctor',$doc)->get('codigo_contrato')->row('codigo');
	
	$password=$this->CI->db->select('passwordDoc')->where('id_doctor',$doc)->where('id_seguro',$seg)->get('doctor_web_services_credentials')->row('passwordDoc');

$cedulaDoc=$this->CI->db->select('cedula')->where('id_user',$doc)->get('users')->row('cedula');
$disabledNap="";
$consultar_nap="consultar_nap";	
$ced1=substr($cedulaDoc,0,3);
$ced2=substr($cedulaDoc,3,7);
$ced3=substr($cedulaDoc,-1);
$cedulaFormat = $ced1.'-'.$ced2.'-'.$ced3;
}else{
	//--codigo contrato para factura de centro medico publico 
	$codigo_contrato=$this->CI->db->select('codigo')->where('id_centro',$cent)->where('id_seguro',$seg)->get('codigo_contrato')->row('codigo');
	
	$credentialsCentro=$this->CI->db->select('passwordCentro, id_user')->where('id_centro',$cent)->where('id_seguro',$seg)->get('doctor_web_services_credentials')->row_array();
if($credentialsCentro)
 {
 
$password=$credentialsCentro['passwordCentro'];

$cedulaDoc=$this->CI->db->select('cedula')->where('id_user',$credentialsCentro['id_user'])->get('users')->row('cedula');

$disabledNap="disabled";
$consultar_nap="consultar_nap_centro";	

$ced1=substr($cedulaDoc,0,3);
$ced2=substr($cedulaDoc,3,7);
$ced3=substr($cedulaDoc,-1);
$cedulaFormat = $ced1.'-'.$ced2.'-'.$ced3;
	 
}else{
	 
$cedulaFormat = '';
$password='';
$disabledNap="";	
}	
}




return [$codigo_contrato, $password, $cedulaFormat, $disabledNap];

}



public function getTarifariosPorDoctorPrivado($data){
	
	if($data['seguroTitle']=="PRIVADO"){
 $doc_seg_privado = array(
'id_doctor'=> $data['doctor'],
'id_seguro'  =>$data['seguroId'],
'id_cm'  =>$data['centro']
);
$tarifarios_privados=$this->CI->model_admin->ServiciomssmPrivado($doc_seg_privado);
$count_medico_tariff=$this->CI->model_admin->count_medico_seguro_privado_tariff($doc_seg_privado);
}else{
	 $doc_seg = array(
'id_doctor'=> $data['doctor'],
'id_seguro'  =>$data['seguroId'],
'plan'  =>$data['patientPlan']
);
	$tarifarios_privados=$this->CI->model_admin->Serviciomssm($doc_seg); 
	$count_medico_tariff=$this->CI->model_admin->count_medico_seguro_publico_tariff($doc_seg); 
}



$tarifarios = '';
$tarifarios = '<option></option>';
foreach($tarifarios_privados as $row) {
	
	 $tarifarios .= '<option value="' . $row->id_tarif.'" >' . $row->procedimiento . '</option>';	
	
}

	
return	[$tarifarios, $count_medico_tariff];
	
}

public function getTarifariosPorCentro($id_cm, $seg){
	
$get_tarifarios_centro=$this->CI->model_admin->Service_centro($id_cm,$seg); 
$count_centro_tariff=$this->CI->model_admin->count_centro_tariff($id_cm,$seg); 


$tarifarios_centro = '';
$tarifarios_centro = '<option></option>';
foreach($get_tarifarios_centro as $row) {
	
	 $tarifarios_centro .= '<option value="' . $row->id_tarif.'" >' . $row->procedimiento . '</option>';	
	
}

	
return	[$tarifarios_centro, $count_centro_tariff];
	
}


public function getUserData($id){
	
$get_user_info_by_id=$this->CI->db->select('*')->where('id_user',$id)->get('users')->row_array();

	
return	$get_user_info_by_id;
	
}



public function getDevise($id_user){

	
$tasa=$this->CI->db->select('*')->where('updated_by',$id_user)->get('tasa_de_cambio')->row_array();

	
return	$tasa;
	
}


public function tarifarios_temporal_for_current_user(){
	
    $id_doctor=$this->CI->session->userdata('doctor');
	$id_seguro=$this->CI->session->userdata('seguroId');
	$id_plan=$this->CI->session->userdata('patientPlan');
	$id_patient=$this->CI->session->userdata('patient');
	$id_cm =$this->CI->session->userdata('centro');
	$seguro_title=$this->CI->session->userdata('seguroTitle');
	if($seguro_title=='PRIVADO'){
		$plan = $id_cm;
	}else{
		$plan = $id_plan;
	}
	
	 $queryHist = $this->CI->db->get_where('tarifarios_temporal',array('id_usuario'=>$this->ID_USER));
if($queryHist->num_rows() == 0){	
$query= $this->CI->db->query("SELECT id_tarif, procedimiento, monto, id_seguro, plan, id_doctor, centro FROM tarifarios_test WHERE id_doctor =$id_doctor && id_seguro =$id_seguro && plan=$plan");	
if($query->num_rows() > 0){
$arrayBatch =  array(); 
foreach ($query->result() as $row) {
     $arrayBatch[] = array(
	 'id_tarif'=>$row->id_tarif,
	 'procedimiento'=>$row->procedimiento,
	 'monto'=>$row->monto,
	 'id_seguro'=>$row->id_seguro,
	 'plan'=>$row->plan,
	 'id_doctor'=>$row->id_doctor,
	 'id_centro'=>$row->centro,
	 'id_patient'=>$id_patient,
	 'id_usuario'=>$this->ID_USER
	 );  
} 
$this->CI->db->insert_batch('tarifarios_temporal', $arrayBatch);
}
}
}
	



public function centro_tarifarios_temporal_for_current_user(){
	
    $id_doctor=$this->CI->session->userdata('doctor');
	$id_seguro=$this->CI->session->userdata('seguroId');
	$id_plan=$this->CI->session->userdata('patientPlan');
	$id_patient=$this->CI->session->userdata('patient');
	$id_cm =$this->CI->session->userdata('centro');
	$seguro_title=$this->CI->session->userdata('seguroTitle');
	if($seguro_title=='PRIVADO'){
		$plan = $id_cm;
	}else{
		$plan = $id_plan;
	}
	
	 $queryHist = $this->CI->db->get_where('tarifarios_temporal',array('id_usuario'=>$this->ID_USER));
if($queryHist->num_rows() == 0){	
$query= $this->CI->db->query("SELECT id_c_taf, sub_groupo, monto, seguro_id, centro_id  FROM centros_tarifarios_test WHERE centro_id =$id_cm && seguro_id =$id_seguro");	
if($query->num_rows() > 0){
$arrayBatch =  array(); 
foreach ($query->result() as $row) {
     $arrayBatch[] = array(
	 'id_tarif'=>$row->id_c_taf,
	 'procedimiento'=>$row->sub_groupo,
	 'monto'=>$row->monto,
	 'id_seguro'=>$row->seguro_id,
	 'id_centro'=>$row->centro_id,
	 'id_patient'=>$id_patient,
	 'id_usuario'=>$this->ID_USER
	 );  
} 
$this->CI->db->insert_batch('tarifarios_temporal', $arrayBatch);
}
}
}


function doctorSeguroMedicos($id){
	
$seguro_medicos = $this->CI->model_admin->view_doctor_seguro($id);	
	
$result_doctor_seguro='';
foreach($seguro_medicos as $rows) {
	
	$codigo_contrado = $this->CI->db->select('codigo')->where('id_seguro', $rows->id_sm)->where('id_doctor', $id)->get('codigo_contrato')->row('codigo');
	if($codigo_contrado){
	$show ='<em><u>Codigo Contrato: <span class="badge bg-primary rounded-pill"> '.$codigo_contrado.'</span></u></em>';
	}else{
	$show='';	
	}
    $result_doctor_seguro .= '<li class="list-group-item" id="' . $rows->id_sm .'" >' . $rows->title . ' '.$show.' </li>';
}

return $result_doctor_seguro;


}
	








}
				
