<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hospitalization extends CI_Controller {
public function __construct()
{
parent::__construct();
	
		$this->load->model('model_alergy');
		
		$this->load->model('model_general');
		$this->load->model('model_hospitalization');
		$this->load->library("user_register_info");
		$this->load->helper('form');
		$this->load->library("search_patient_photo");
		$this->load->library("get_table_data_by_id");
		$this->ID_USER = $this->session->userdata('user_id');
		$this->load->library("create_forms");
		$this->load->library('form_validation');
		$this->load->library('hospitalization_lib');
		$this->load->library("header_user");
		$this->PERFIL= $this->session->userdata('user_perfil');
			$this->load->library('auto_complete_input');
		$this->clinical_history = $this->load->database('clinical_history', TRUE);
		$this->USER_CONTROLLER = 'medico';
		
		$this->table_insumo ='hosp_peticion';
        $this->table_insumo_link ='hosp_peticion_link';
		
		
		
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
		//$this->load->library("pagination");
		if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			redirect('login');
		}
}

public function header_users(){
$this->session->set_userdata('USER_CONTROLLER', 'medico');
		$data['perfil'] = $this->session->userdata('user_perfil');
		$data['user_name'] = $this->session->userdata('user_name');
		$data['user_perfil'] = $this->session->userdata('user_perfil');
		 $this->load->view('header-nurse', $data);

}

public function patients_record($val){
	$vald=decrypt_url($val);
	 $title = ($vald==0) ? 'Listado de Pacientes Ingresados' : 'Listado de Pacientes Egresados';
	 if($this->PERFIL=='Enfermera' || $this->PERFIL=='Auditoria Medico'){
		$this->header_users();
	 }else{
	$this->header_user->headerMedico($this->ID_USER);
	 }
		[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors] = $this->create_forms->getCentroAndSeguroByPerfil(0);

		$values = array(
			'desde' => 0,
			'hasta' => 0,
			'centro' => 0,
			'table_title' => $title,
			'origine'=>$vald,
			'result_centro_medicos' => $result_centro_medicos
		);

$this->hospitalization_lib->patients_admitted_page($values);

}






public function patients_admitted_form(){
	
	
	$data['hosp_pat_created_by']=$this->ID_USER; 
$data['hosp_pat_updated_by']= $this->ID_USER;
$data['hosp_pat_created_time'] = date("Y-m-d H:i:s"); 
$data['hosp_pat_updated_time'] =date("Y-m-d H:i:s");
	
$data['creation_hosp_pat_info'] ='';
	
	 [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]= $this->create_forms->getCentroAndSeguroByPerfil(0);
  [$result_centro_medicos_cita]= $this->create_forms->getCentroMedicoForCita(0);
    $data['result_centro_medicos_cita'] = $result_centro_medicos_cita;
  $data['result_doc_by_centers'] = $result_doc_by_centers;
	$this->load->view('hospitalization/patient/form', $data);

}


public function patients_admitted_saved()
{
if($this->input->post('hosp_pat_centro') =='' ||
$this->input->post('hosp_pat_doctor') =='' || $this->input->post('hosp_pat_causa') ==''||
$this->input->post('hosp_pat_via') =='' || $this->input->post('hosp_pat_sala') =='' ||
$this->input->post('hosp_pat_servicio') =='' || $this->input->post('hosp_pat_cama') =='' ){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
}
elseif(($this->input->post('id_seguro') !=11) && ($this->input->post('hosp_pat_auto') =='' || $this->input->post('hosp_pat_auto_por') =='')){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
}

else{ 
 $savedas = array(
'centro'=> $this->input->post('hosp_pat_centro'),
'doc'=> $this->input->post('hosp_pat_doctor'),
'causa' =>$this->input->post('hosp_pat_causa'),
'via' =>$this->input->post('hosp_pat_via'),
'id_patient' => $this->input->post('id_p_a'),
'sala' => $this->input->post('hosp_pat_sala'),
'servicio' => $this->input->post('hosp_pat_servicio'),
'cama' => $this->input->post('hosp_pat_cama'),
'hosp_auto' => $this->input->post('hosp_pat_auto'),
'hosp_auto_por' => $this->input->post('hosp_pat_auto_por'),
'inserted' => $this->ID_USER ,
'updated' => $this->ID_USER ,
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






  function hospitalization_patients_admitted_query($fecha_hoy, $origine){
if ($this->PERFIL == "Medico") {
	   $query = $this->hospitalization_emgergency->query("SELECT * FROM hospitalization_data WHERE doc=$this->ID_USER && alta =$origine && cancelar= 0 ORDER BY id DESC");	
		}else{
		$query = $this->hospitalization_emgergency->query("SELECT * FROM hospitalization_data WHERE inserted=$this->ID_USER && alta =$origine && cancelar= 0 ORDER BY id DESC");	
		}
		
		return $query;
		
}

	
  public function patients_admitted_data(){
	  $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
	$desde = $this->input->get("desde");
	$hasta = $this->input->get("hasta");
	$origine = $this->input->get("origine");
	$centro1 =intval($this->input->get("centro"));
	
	$fecha_hoy = date("Y-m-d");
	if($centro1==0){
	$query=$this->hospitalization_patients_admitted_query($fecha_hoy, $origine);
	}else{
		 $values = array(
		 'date1' => $desde,
		 'date2' => $hasta,
		 'doctor' => $this->ID_USER,
		 'centro' => $centro1,
		 'perfil' => $this->PERFIL
		 );
	//$query=$this->model_admin->date_range_appointments_query($values);
	$condition = "CAST(timeinserted AS DATE) BETWEEN " . "'" . $date1 . "'" . " AND " . "'" . $date2 . "'";
	$query = $this->hospitalization_emgergency->query("SELECT * FROM hospitalization_data WHERE  $condition  && alta =$origine && canceled = 0  ORDER BY id DESC");
	return $query;		
	
	
	
	}
    $data = [];
    foreach ($query->result() as $row) {
		     $paciente=$this->db->select('nombre,photo,ced1,ced2,ced3,date_nacer,nec1,seguro_medico,plan,afiliado')->where('id_p_a',$row->id_patient)->get('patients_appointments')->row_array(); 
		 $timeinserted=date("d-m-Y H:i:s", strtotime($row->timeinserted));
	
	$seguro_medico=$this->db->select('title')->where('id_sm',$paciente['seguro_medico'])
 ->get('seguro_medico')->row('title');
$id_seg=$paciente['seguro_medico'];
 $nss=$this->db->select('input_name,inputf')->where('patient_id',$row->id_patient)
 ->get('saveinput')->row_array();

  $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
	
	$centro=$this->db->select('name')->where('id_m_c',$row->centro )
->get('medical_centers')->row('name');
	
	$doctor=$this->db->select('name,area')->where('id_user',$row->doc)
   ->get('users')->row_array();
	
	  $cama=$this->hospitalization_emgergency->select('num_cama')->where('id',$row->cama)
   ->get('mapa_de_cama')->row('num_cama');
   
   
   $go_to_hist ='<a  class="dropdown-item"  href="'.site_url()."hospitalization/clinic_history/".encrypt_url($row->id).'/'.encrypt_url($row->id_patient).'/'.encrypt_url($row->centro).'/'.encrypt_url($row->doc).'/0" title="Historia clinica"><i class="bi bi-hospital"></i> Historia clinica</a>';
		
   $go_to_patient_data ='<a  href="'.site_url().''.$this->USER_CONTROLLER.'/patient/'.encrypt_url($row->id_patient).'/'.encrypt_url($row->id).'/'.encrypt_url($row->centro).'" >'.strtoupper($paciente['nombre']).'</a>';
	if($row->fecha_alta ==NULL){
		$fecha_egreso = '<em class="text-danger" >pendiente</em>';
	}else{
		$fecha_alta=date("d-m-Y H:i:s", strtotime($row->fecha_alta));
		$fecha_egreso = "<em class='text-success' >$fecha_alta</em>";	
	}
   $menu=$this->hospitalization_lib->menu_mas_admitted_patients($row->id, $row->id_patient, $row->centro, $row->doc, $origine);
  		$actions = "<div class='btn-group' style='position:absolute;' >
		<ul class='nav navbar-nav'>
	<li class='dropdown' >

 <button type='button' class='btn btn-primary btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'></button>
<ul class='dropdown-menu z-index-20'>
     $menu
		</ul>
		</div>
		
		";
	
		if($this->PERFIL=='Asistente Medico'){
			$actions ='';
		}else{
		$actions =$actions;	
		}
 $sub_array = array();
 $sub_array[] = $row->id;
  $sub_array[] = $go_to_patient_data ;
		$sub_array[] = $timeinserted;
		 $sub_array[] = $fecha_egreso ;
  $sub_array[] = $paciente['date_nacer'];
     $sub_array[] = $seguro_medico;
      $sub_array[] = $centro;
      $sub_array[] = $row->causa;
     $sub_array[] = $row->via;
	  $sub_array[] = $row->sala;
	  $sub_array[] = $row->servicio;
      $sub_array[] = $row->cama;
       $sub_array[] = $actions;
      $data[] = $sub_array;
    }

    $rowesult = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    echo json_encode($rowesult);
    exit();
}



public function history_clinica_general_forms($id_hosp, $id_patient, $id_centro, $id_doctor, $orgine)
	{
		
		
		if($this->session->userdata('user_perfil')=='Medico' || $this->session->userdata('user_perfil')=='Auditoria Medico'){
		   $show_edit_btn = "";
	   }else{
		  $show_edit_btn = "style='display:none'";  
	   }
		
		$this->session->set_userdata('show_edit_btn', $show_edit_btn);
		
		
		$data['orgine'] = $orgine;
		$id_hosp_ = decrypt_url($id_hosp);
		$centro = decrypt_url($id_centro);
		$patient = decrypt_url($id_patient);
		$doctor = decrypt_url($id_doctor);
		$data['id_doctor_save'] = $doctor;

$ifPatHasAnt = $this->clinical_history->select('historial_id')->where('historial_id', $patient)->get('h_c_marque_positivo')->row('historial_id');
$data['ifPatHasAnt'] = $ifPatHasAnt;
$hospDdata = $this->hospitalization_emgergency->select('timeinserted, causa, cama')->where('id', $id_hosp_)->get('hospitalization_data')->row_array();
 $mapa_de_cama=$this->hospitalization_emgergency->select('num_cama, sala, servicio')->where('id',$hospDdata['cama'])->get('mapa_de_cama')->row_array();
$data['admitted_time'] = date("d-m-Y H:i:s", strtotime($hospDdata['timeinserted']));
$data['causa'] = $hospDdata['causa'];
$data['cama'] = $mapa_de_cama['num_cama'];


			$data['id_user'] = $this->ID_USER;
		$this->session->set_userdata('sessionIdUuser', $this->ID_USER);
		$this->session->set_userdata('id_patient', $patient);
		$this->session->set_userdata('id_centro', $centro);
		$this->session->set_userdata('ID_HOSP', $id_hosp_);
		$this->session->set_userdata('orgine_list', decrypt_url($orgine));
$data['id_hospit'] = $id_hosp_;


	

	$data['controller'] = "medico";

		$aside = $this->session->userdata('doctorEspecialidad');
		$data['aside'] = $aside;
		$data['doctor'] = $doctor;

		$centroData= $this->db->select('name, logo')->where('id_m_c', $centro)->get('medical_centers')->row_array();
		$data['centro_medico_name'] = $centroData['name'];
		$data['centro_medico'] = $centro;
		$data['centro_logo'] = $centroData['logo'];
		$this->session->set_userdata('centro_medico', $centro);
		$this->session->set_userdata('centro_medico_name', $centroData['name']);
//$data['result_centro_medicos'] = "<option value='$centro'>$centro_medico_name</option>";	
		$data['idpatient'] = $patient;
		
		$data['date_nacer'] = "";
		$data['hide_ex_fis_mamas'] = "";
		//$patient_info = $this->model_general->calculatePatientAge($patient);

		$data['birthday'] = '1980-09-09';

		//$data['edad'] = 12;
	
		//--ALERGY==================================================
		$total_alery = $this->model_alergy->saveAlergyTotal($patient);
		$data['total_alery'] = $total_alery;

		$total_usual_drug = $this->model_alergy->saveUsualDrugTotal($patient);
		$data['total_usual_drug'] = $total_usual_drug;
           $today = date('Y-m-d');
		


		//------ANTECEDENTES PERSONALES Y FAMILIARES
		$query_ant_p_f = $this->clinical_history->query("SELECT * FROM   h_c_marque_positivo WHERE historial_id=$patient  && eva_cardio=0");

		$data['query_ant_p_f'] = $query_ant_p_f;


		//--EXAMEN FISICO
		$query_ex = $this->hospitalization_emgergency->query("SELECT * FROM hosp_exam_fisico WHERE id_patient=$patient  && centro=$centro  ORDER BY id DESC");
		$data['ex_fis_totals'] = $query_ex->num_rows();
		$data['ex_fis_data'] = 0;
		$data['query_ex_fis'] = $query_ex->result();
		
		
		// --- NOTAS EXAMEN FISICO
		$query_notas = $this->hospitalization_emgergency->query("SELECT * FROM hosp_exam_fis_nota WHERE id_patient=$patient && centro=$centro ORDER BY id DESC");
		$data['ex_notas_fis_totals'] = $query_notas->num_rows();
		$data['ex_notas_fis_data'] = 0;
		$data['query_ex_notas_fis'] = $query_notas->result();
		
		       //-----EXAMEN NEURO
        $query_ex_sis = $this->hospitalization_emgergency->query("SELECT * FROM  hosp_exam_neuro WHERE id_pat=$patient && id_centro=$centro ORDER BY id DESC");
		$data['exn_totals'] = $query_ex_sis->num_rows();
		$data['exn_data'] = 0;
		$data['query_exn'] = $query_ex_sis->result();
		
		
		
			//--------CONCLUSION EGRESO
		$query_coneg = $this->hospitalization_emgergency->query("SELECT * FROM  hosp_conclusion_ingreso WHERE id_patient=$patient && id_centro=$centro  ORDER BY id DESC");
		$data['query_coneg_total'] = $query_coneg->num_rows();
		$data['con_eg_data'] = 0;
		$data['query_coneg'] = $query_coneg->result();
		//--------EVALUATION CONDITION
		$query_evcond = $this->hospitalization_emgergency->query("SELECT * FROM  hosp_eval_cond WHERE id_patient=$patient  ORDER BY id DESC");
		$data['query_evcond_total'] = $query_evcond->num_rows();
		$data['evcond_data'] = 0;
		$data['query_evcond'] = $query_evcond->result();
		
		//VIOLENCIA INTRAFAMILIA Y OTROS ANTECEDENTES

		$query_sql_v_at = $this->clinical_history->query("SELECT * FROM  h_c_ante_otros WHERE historial_id=$patient  && eva_cardio=0");
	
$data['table_insumo']=$this->table_insumo;
$data['table_insumo_link']=$this->table_insumo_link;
		$data['query_sql_v_at'] = $query_sql_v_at;
//--KARDEX----

$data['query_k_ordm']  = $this->hospitalization_emgergency->query("SELECT * from hosp_orden_medica_recetas WHERE historial_id=$patient && kardex=0 && canceled=0");
	
$sqlkx ="SELECT *, id AS id_med FROM  hosp_orden_medica_recetas WHERE historial_id=historial_id=$patient && kardex=1 order by kardex_fecha desc";
$querykardex=$this->hospitalization_emgergency->query($sqlkx);
$data['querykardex']=$querykardex;
$data['nb_kardex']=$querykardex->num_rows();

		//SOSPECHA DE ABUSO O MALTRATO
		$query_abuse_mistreat = $this->clinical_history->query("SELECT * FROM h_c_abuse_suspition WHERE historial_id=$patient");

		$data['query_abuse_mistreat'] = $query_abuse_mistreat;


		//HABITOS TOXICOS

		$query_toxic_habits = $this->clinical_history->query("SELECT * FROM h_c_habitos_toxicos WHERE historial_id=$patient");

		$data['query_toxic_habits'] = $query_toxic_habits;

		 $data['solCon_data'] =0;
$data['desc_surgery_data'] =0;
			$data['ant_p_f_data'] = $query_ant_p_f->num_rows();
			$data['v_at_data'] = $query_sql_v_at->num_rows();
			$data['hab_tox_data'] = $query_toxic_habits->num_rows();
			$data['abuse_mistreat_data'] = $query_abuse_mistreat->num_rows();

		
		$data['orden_medica_data'] = 0;
		
		[$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id] = $this->get_table_data_by_id->getPatientInfo($patient);

		$array_values_for_photo = array(
			'id_p_a' => $get_patient_info_by_id['id_p_a'],
			'cedula' => $get_patient_info_by_id['cedula'],
			'image_class' => "rounded-circle",
			'style' => ''

		);
		$data['img_patient'] = $this->search_patient_photo->search_patient($array_values_for_photo);


		$array_values_for_photo_header = array(
			'id_p_a' => $get_patient_info_by_id['id_p_a'],
			'cedula' => $get_patient_info_by_id['cedula'],
			'image_class' => "rounded-circle",
			'style' => "style='width:50%'"

		);


		$data['patient_photo'] = $this->search_patient_photo->search_patient($array_values_for_photo_header);

		$array_values_for_photo_large = array(
			'id_p_a' => $get_patient_info_by_id['id_p_a'],
			'cedula' => $get_patient_info_by_id['cedula'],
			'image_class' => "rounded-circle",
			'style' => "style='width:45%'"

		);


		$data['patient_photo_large'] = $this->search_patient_photo->search_patient($array_values_for_photo_large);
		$data['get_patient_info_by_id'] = $get_patient_info_by_id;
		$patient_age = $this->model_general->calculatePatientAge($get_patient_info_by_id['date_nacer']);
		$data['patient_age'] = $patient_age['age_complete'];
		$data['patient_adress'] = $patient_adress;
		$this->session->set_userdata('sessionPatientAge', $patient_age['age_complete']);
		$data['get_patient_seguro_info_by_id'] = $get_patient_seguro_info_by_id;
		$this->load->view('hospitalization/clinical-history/header', $data);
	}













	public function clinic_history($id_admition, $id_patient, $id_centro, $id_doctor,$origine)
	{
		 $this->hospitalization_emgergency->where('id_user',$this->ID_USER);
        $this->hospitalization_emgergency->delete('hosp_kardex_print');

		$this->history_clinica_general_forms($id_admition, $id_patient, $id_centro, $id_doctor,$origine);
         $id_centro = decrypt_url($id_centro);
		$patient = decrypt_url($id_patient);
		// EXAMEN SISTEMA============
		$query_ex_sis = $this->hospitalization_emgergency->query("SELECT * FROM  hosp_examen_sistema WHERE historial_id=$patient && centro =$id_centro ORDER BY id DESC");
		$data['sis_totals'] = $query_ex_sis->num_rows();
		$data['sis_data'] = 0;
		$data['query_sis'] = $query_ex_sis->result();
         $data['data_eva_cardio'] = 0;
		$data['aside'] = 'historial_general';
		$this->load->view('hospitalization/clinical-history/index', $data);
	}









}