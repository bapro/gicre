<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emergency extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('model_general');
$this->load->model('model_alergy');
$this->CENTRO_ID=$this->session->userdata('id_centro');
$this->PATIENT_ID=$this->session->userdata('id_patient');
$this->ID_USER = $this->session->userdata('user_id');
$this->load->library('emergency_lib');
$this->load->library("search_patient_photo");
$this->load->library("user_register_info");
$this->load->library('form_validation');
$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
$this->clinical_history = $this->load->database('clinical_history', TRUE);
$this->ID_HOSP = $this->session->userdata('ID_HOSP');
}

public function saveInsumoSaved()
{
$table_insumo=$this->input->post('table_insumo');
$table_insumo_link=$this->input->post('table_insumo_link');
$data['user_id']=$this->ID_USER;
$save = array(
'user' =>$this->ID_USER,
'pat' =>$this->PATIENT_ID,
'cent' =>$this->CENTRO_ID,
'id_hosp' =>$this->ID_HOSP,
'drug_id' =>1
);
$this->hospitalization_emgergency->insert($table_insumo_link, $save);
$id_last=$this->hospitalization_emgergency->insert_id();
	
//--------------------------UPDATE PETICION-------------------------------------------

$datas = array(
'saved'=>1,
'link'=>$id_last
);

$where = array(
'id_user' =>$this->ID_USER,
'id_patient' =>$this->PATIENT_ID,
'centro' =>$this->CENTRO_ID,
'saved' =>0
);
$this->hospitalization_emgergency->where($where);

$this->hospitalization_emgergency->update($table_insumo, $datas);

//----------------
}



public function saveInsumo()
{
$table_insumo=$this->input->post('table_insumo');

$save = array(
  'insumo' =>$this->input->post('insumo'),
   'cantidad' =>$this->input->post('cantidad_insumo'),
  'inserted_time' =>date('Y-m-d H:i:s'),
  'updated_time' =>date('Y-m-d H:i:s'),
  'updated_by' =>$this->ID_USER,
  'id_user' =>$this->ID_USER,
  'id_patient' =>$this->input->post('id_patient'),
  'centro' =>$this->input->post('centro'),
  'idemp' =>$this->input->post('id_hospit'),
  'cantidad'=>$this->input->post('cantidad_insumo'),
  'cobertura' =>0.8,
  'descuento' =>0
);

$this->hospitalization_emgergency->insert($table_insumo, $save);
}



  function loadInsumo()
  {
   $saved = $this->input->post('saved');
   $id_patient = $this->input->post('id_patient');
   $id_centro = $this->input->post('id_centro');
   $data['id_centro'] = $id_centro;
    $data['id_patient'] = $id_patient;
    $data['user_id'] = $this->ID_USER ;
    $showinsumoedit = $this->input->post('showinsumoedit');
    $data['showinsumoedit'] = $showinsumoedit;
    $table_insumo = $this->input->post('table_insumo');
    $data['table_insumo'] = $table_insumo;
    $table_insumo_link = $this->input->post('table_insumo_link');
	$data['table_insumo_link'] = $table_insumo_link;
    if ($showinsumoedit == 'none') {
      $sql = "SELECT $table_insumo.id as id, id_user, $table_insumo.insumo, $table_insumo.inserted_time,cantidad, $table_insumo.centro from $table_insumo
 WHERE  id_patient=$id_patient && $table_insumo.centro=$id_centro && saved=$saved ORDER BY $table_insumo.id DESC";
      $querydata = $this->hospitalization_emgergency->query($sql);
      $data['totorden'] = 0;
      $countInsumoVal = $querydata->num_rows();
      $data['querydata'] = $querydata;
    } else {
      $sql = "SELECT id from $table_insumo_link WHERE pat=$id_patient && cent=$id_centro ORDER BY id DESC";
      $querydatasave = $this->hospitalization_emgergency->query($sql);
      $data['querydatasave'] = $querydatasave;
      $data['totorden'] = $querydatasave->num_rows();

      $countInsumoVal = $querydatasave->num_rows();
    }
    $data['countInsumoVal'] = $countInsumoVal;
	
   $this->load->view('emergency/clinical-history/insumo/data', $data);
  }





public function patients_record($val){
	$vald=decrypt_url($val);
	
	 $title = ($vald==0) ? 'Listado de Pacientes <span class="text-danger">I</span>ngresados' : 'Listado de Pacientes <span class="text-danger">E</span>gresados';
	
	 if($this->session->userdata('user_perfil')=='Enfermera'){
		$this->session->set_userdata('USER_CONTROLLER', 'medico');
		$data['perfil'] = $this->session->userdata('user_perfil');
		$data['user_name'] = $this->session->userdata('user_name');
		$data['user_perfil'] = $this->session->userdata('user_perfil');
		 $this->load->view('header-nurse', $data);
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

$this->emergency_lib->patients_admitted_page($values);

}

function loadAllMedicamentos2(){
$sql_med ="SELECT name FROM medicaments ORDER BY name ASC ";
$rs_meds=$this->clinical_history->query($sql_med);
foreach ($rs_meds->result() as $row_med) {
echo '<option value=' . $row_med->name . '   >' . $row_med->name . '</option>';
}

}

function loadAllMedicamentos(){
$centro=$this->input->post('centro_id');
$sql ="SELECT id, name, cantidad_comp FROM  emergency_medicaments WHERE centro=$this->CENTRO_ID && selected=0";
$query = $this->hospitalization_emgergency->query($sql);
 echo '<option value="" >Medicamentos del almacen</option>';
foreach ($query->result() as $row){
echo '<option value="'.$row->id.'">'.$row->name.'</option>';
}

}
//---------------------------------------------------------------------------------------


public function history_clinica_general_forms($id_hosp, $id_patient, $id_centro, $id_doctor, $orgine)
	{
		
		
		if($this->session->userdata('user_perfil')=='Medico'){
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
$data['admitted_time'] = '';
$data['causa'] = '';
$data['cama'] = '';


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
		$query_ex = $this->hospitalization_emgergency->query("SELECT * FROM emerg_exam_fisico WHERE id_patient=$patient  && centro=$centro  ORDER BY id DESC");
		$data['ex_fis_totals'] = $query_ex->num_rows();
		$data['ex_fis_data'] = 0;
		$data['query_ex_fis'] = $query_ex->result();
		
		
		// --- NOTAS EXAMEN FISICO
		$query_notas = $this->hospitalization_emgergency->query("SELECT * FROM emerg_exam_fis_nota WHERE id_patient=$patient && centro=$centro ORDER BY id DESC");
		$data['ex_notas_fis_totals'] = $query_notas->num_rows();
		$data['ex_notas_fis_data'] = 0;
		$data['query_ex_notas_fis'] = $query_notas->result();
		
		
			//--------CONCLUSION EGRESO
		$query_coneg = $this->hospitalization_emgergency->query("SELECT * FROM  emerg_conclusion_ingreso WHERE id_patient=$patient && id_centro=$centro  ORDER BY id DESC");
		$data['query_coneg_total'] = $query_coneg->num_rows();
		$data['con_eg_data'] = 0;
		$data['query_coneg'] = $query_coneg->result();
		//--------EVALUATION CONDITION
		$query_evcond = $this->hospitalization_emgergency->query("SELECT * FROM  emerg_eval_cond WHERE id_patient=$patient  ORDER BY id DESC");
		$data['query_evcond_total'] = $query_evcond->num_rows();
		$data['evcond_data'] = 0;
		$data['query_evcond'] = $query_evcond->result();
		
		//VIOLENCIA INTRAFAMILIA Y OTROS ANTECEDENTES

		$query_sql_v_at = $this->clinical_history->query("SELECT * FROM  h_c_ante_otros WHERE historial_id=$patient  && eva_cardio=0");
	
$data['table_insumo']='emerg_peticion';
$data['table_insumo_link']='emerg_peticion_link';
		$data['query_sql_v_at'] = $query_sql_v_at;
//--KARDEX----

$data['query_k_ordm']  = $this->hospitalization_emgergency->query("SELECT * from emerg_orden_medica_recetas WHERE historial_id=$patient && kardex=0 && canceled=0");
	
$sqlkx ="SELECT *, id AS id_med FROM  emerg_orden_medica_recetas WHERE historial_id=historial_id=$patient && kardex=1 order by kardex_fecha desc";
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
		$this->load->view('emergency/clinical-history/header', $data);
	}



	public function clinic_history($id_admition, $id_patient, $id_centro, $id_doctor,$origine)
	{
		$this->history_clinica_general_forms($id_admition, $id_patient, $id_centro, $id_doctor,$origine);
         $id_centro = decrypt_url($id_centro);
		$patient = decrypt_url($id_patient);
		// EXAMEN SISTEMA============
		$query_ex_sis = $this->hospitalization_emgergency->query("SELECT * FROM  emerg_examen_sistema WHERE historial_id=$patient && centro =$id_centro ORDER BY id DESC");
		$data['sis_totals'] = $query_ex_sis->num_rows();
		$data['sis_data'] = 0;
		$data['query_sis'] = $query_ex_sis->result();
         $data['data_eva_cardio'] = 0;
		$data['aside'] = 'historial_general';
		$this->load->view('emergency/clinical-history/index', $data);
	}


function savePrintInsumo(){
 $id_print = $this->input->post('id_print');
 $tablePrint=$this->input->post('tablePrint');
  $action_time = date("Y-m-d H:i:s");
 $this->session->set_userdata("CURRENT_PRINT_INSUMO_TIME-$tablePrint", $action_time);
 
	     foreach ($id_print as $key => $val) {
            $arrayData[] = array(
               'id' => $id_print[$key],
                'print_session' => $action_time,
             'id_user'=>$this->ID_USER               
            );
         }         
        $this->hospitalization_emgergency->insert_batch($tablePrint, $arrayData);
 
 
}


//------------------------------------------------------------------------------------------
}