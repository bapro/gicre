<?php
	class Clinical_history extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			// $this->load->model('model_medico');
			$this->load->model('model_enfermedad_actual');
			$this->load->model('model_conclusion_diagno');
			$this->load->model('model_alergy');
			$this->load->model('model_signo_vital');
			$this->load->model('model_general');
			 $this->load->model('model_control_prenatal');
			$this->load->library("user_register_info");
			$this->load->helper('form');
			$this->load->library("search_patient_photo");
			$this->load->library("get_table_data_by_id");
			$this->ID_USER =$this->session->userdata('user_id');
			$this->load->library("create_forms");
			$this->load->library('form_validation'); 
			 $this->IS_ADMINISTRATIVO=$this->session->userdata('admin_position_centro');
			$this->clinical_history = $this->load->database('clinical_history', TRUE);
			$this->load->library('auto_complete_input');
			 $this->USER_CONTROLLER = $this->session->userdata('USER_CONTROLLER');
			 $this->load->library('medico_see_all_pat_hist');
			  $this->WHERE_ID_USER =  $this->medico_see_all_pat_hist->index();
					 
			 if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			 redirect('login');
			}
		}
	
	
		public function patient_history_has_been_saved_($id_patient,$id_centro){
			$id_pat=encrypt_url($id_patient);
			$id_cent=encrypt_url($id_centro);
			redirect("clinical_history/patient_history_has_been_saved/$id_pat/$id_cent");
		}
	
	
	public function patient_history_has_been_saved($id_pat,$id_centro){
		$id_patient = decrypt_url($id_pat);
		$data['id_patient'] = $id_patient;
		$data['id_centro'] = decrypt_url($id_centro);
		[$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id] = $this->get_table_data_by_id->getPatientInfo($id_patient);

$array_values_for_photo_large = array(
			'id_p_a' => $get_patient_info_by_id['id_p_a'],
			'cedula' => $get_patient_info_by_id['cedula'],
			'image_class' => "rounded-circle",
			'style' => "style='width:80px'"

		);


		$data['patient_photo_large'] = $this->search_patient_photo->search_patient($array_values_for_photo_large);
		$data['get_patient_info_by_id'] = $get_patient_info_by_id;
		$patient_age = $this->model_general->calculatePatientAge($get_patient_info_by_id['date_nacer']);
		$data['patient_age'] = $patient_age['age_complete'];
	$this->load->view('clinical-history/history_medical_saved', $data);	
	}
	
	
	public function patient_history($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area)
	{
		

		$this->history_clinica_general_forms($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area);

		$this->session->set_userdata('doctorEspecialidad', 'historial_general');

		$patient = decrypt_url($id_patient);
		// EXAMEN SISTEMA============
		$query_ex_sis = $this->clinical_history->query("SELECT * FROM  h_c_examen_sistema WHERE historial_id=$patient $this->WHERE_ID_USER  ORDER BY id DESC");
		$data['sis_totals'] = $query_ex_sis->num_rows();
		$data['sis_data'] = 0;
		$data['query_sis'] = $query_ex_sis->result();

		$data['aside'] = 'historial_general';
		$this->load->view('clinical-history/general/index', $data);
	}
	
	public function history_clinica_general_forms($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area)
	{
		
		$patient = decrypt_url($id_patient);
		$doctor = decrypt_url($id_doctor);
		$area = decrypt_url($id_area);
		$data['id_doctor_save'] = $doctor;

$update = array(
	'singular_id' => 0,
	'printing' => 0,
	);

	$this->clinical_history->where('operator', $doctor);
	$this->clinical_history->update('h_c_indicaciones_medicales',$update);

	$update2 = array(
	'singular_id' => 0,
	'printing' => 0,
	);

	$this->clinical_history->where('operator', $doctor);
	$this->clinical_history->update('h_c_indications_labs',$update2);

$area_title = $this->db->select('title_area')->where('id_ar', $area)->get('areas')->row('title_area');

	$centro = decrypt_url($id_centro);

		[$result_centro_medicos] = $this->create_forms->getCentroMedicoForCita($centro);
		$data['result_centro_medicos'] = $result_centro_medicos;


		$id_apoint = decrypt_url($id_apoint);
        $causa=$this->db->select('causa')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('causa');
		$this->session->set_userdata('causa', $causa);
	
      $data['servicio_name_to_show'] = $area_title;
		$data['controller'] = "medico";

		$aside = $this->session->userdata('doctorEspecialidad');
		$data['aside'] = $aside;
		$data['doctor'] = $doctor;

		$centro_medico_name = $this->db->select('name')->where('id_m_c', $centro)->get('medical_centers')->row('name');
		$data['centro_medico_name'] = $centro_medico_name;
		$data['centro_medico'] = $centro;
		$this->session->set_userdata('centro_medico', $centro);
		$this->session->set_userdata('centro_medico_name', $centro_medico_name);

		$data['idpatient'] = $patient;
		$data['id_apoint'] = $id_apoint;
		$data['date_nacer'] = "";
		$data['hide_ex_fis_mamas'] = "";
		//$patient_info = $this->model_general->calculatePatientAge($patient);

		$data['birthday'] = '1980-09-09';

		//$data['edad'] = 12;
		$data['id_user'] = $this->ID_USER;
		$this->session->set_userdata('sessionIdUuser', $this->ID_USER);
		$this->session->set_userdata('id_patient', $patient);
		$this->session->set_userdata('id_centro', $centro);
		$this->session->set_userdata('menu-aside', 1);
		//--ALERGY==================================================
		$total_alery = $this->model_alergy->saveAlergyTotal($patient);
		$data['total_alery'] = $total_alery;

		$total_usual_drug = $this->model_alergy->saveUsualDrugTotal($patient);
		$data['total_usual_drug'] = $total_usual_drug;
           $today = date('Y-m-d');
		//--ENFERMEDAD ACTUAL==================================================
		if ($aside == 'vascular_urgeon') {
			$cirujano_vascular = $this->clinical_history->query("SELECT * from h_c_cirujano_vascular where id_historial=$patient ORDER BY id DESC");
			$enfermedad = $cirujano_vascular->result();
          $isSeenToday=$this->clinical_history->select('id_historial')->like('inserted_time',$today)->where('inserted_by',$doctor)->where('id_historial',$patient)->where('centro_medico',$centro)->get('h_c_cirujano_vascular')->row('id_historial');
			$follow_up = $this->clinical_history->query("SELECT * from  h_c_cirujano_vascular WHERE id_historial=$patient && inserted_by=$this->ID_USER ORDER BY id DESC");
			$enfermedad_follow_up = $follow_up->result();
			//------------ENFERMEDAD ACTUAL HISTORICITY----
			  $enf_hist_q = $this->clinical_history->query("SELECT * from  h_c_enfermedad_actual WHERE historial_id=$patient $this->WHERE_ID_USER ORDER BY id DESC");
			$enf_hist_result= $enf_hist_q->result();
			$data['enf_hist_result']=$enf_hist_result;
			$data['enf_hist_total'] = count($enf_hist_result);
			
		} else {
			$enfermedad_sql = $this->clinical_history->query("SELECT * from  h_c_enfermedad_actual WHERE historial_id=$patient $this->WHERE_ID_USER  ORDER BY id DESC");
			$enfermedad = $enfermedad_sql->result();
       $isSeenToday=$this->clinical_history->select('historial_id')->like('inserted_time',$today)->where('inserted_by',$doctor)->where('historial_id',$patient)->where('centro_medico',$centro)->get('h_c_enfermedad_actual')->row('historial_id');
       $follow_up = $this->clinical_history->query("SELECT * from  h_c_enfermedad_actual WHERE historial_id=$patient && inserted_by=$this->ID_USER ORDER BY id DESC");
			$enfermedad_follow_up = $follow_up->result();
		}
		$data['enfermedad'] = $enfermedad;
		$data['enfermedad_total'] = count($enfermedad);
		$data['number_of_view'] = count($enfermedad_follow_up);
		$data['enfermedad_follow_up'] = count($enfermedad_follow_up);
		$data['enfermedad_data'] = 0;
		
   /// ---------SI HAY HISTORIA POR HOY------------

	$data['isSeenToday'] = $isSeenToday;
	//--SI LA CITA ES DE HOY---------
	    $isBtnHsit=$this->db->select('id_apoint')->where('id_patient',$patient)->where('doctor',$doctor)->where('filter_date',$today)->get('rendez_vous')->row('id_apoint');
		$data['isBtnHsit'] = $isBtnHsit;
	//---------------CONCLUSION DIAG----------------------
		$data['conclusion_data'] = 0;
		$concluciones_sql = $this->clinical_history->query("SELECT * from  h_c_conclusion_diagno WHERE historial_id=$patient $this->WHERE_ID_USER ORDER BY id DESC");
		$concluciones = $concluciones_sql->result();



		$data['count_conc'] = count($concluciones);
		$data['concluciones'] = $concluciones;


		//------ANTECEDENTES PERSONALES Y FAMILIARES
		$query_ant_p_f = $this->clinical_history->query("SELECT * FROM   h_c_marque_positivo WHERE historial_id=$patient  && eva_cardio=0");

		$data['query_ant_p_f'] = $query_ant_p_f;


		//--EXAMEN FISICO
		$query_ex = $this->clinical_history->query("SELECT * FROM h_c_examen_fisico WHERE historial_id=$patient  && eva_cardio=0 $this->WHERE_ID_USER ORDER BY id DESC");
		$data['ex_fis_totals'] = $query_ex->num_rows();
		$data['ex_fis_data'] = 0;
		$data['query_ex_fis'] = $query_ex->result();
		//VIOLENCIA INTRAFAMILIA Y OTROS ANTECEDENTES

		$query_sql_v_at = $this->clinical_history->query("SELECT * FROM  h_c_ante_otros WHERE historial_id=$patient AND eva_cardio=0  ");



		$data['query_sql_v_at'] = $query_sql_v_at;


		//SOSPECHA DE ABUSO O MALTRATO
		$query_abuse_mistreat = $this->clinical_history->query("SELECT * FROM h_c_abuse_suspition WHERE historial_id=$patient");

		$data['query_abuse_mistreat'] = $query_abuse_mistreat;


		//HABITOS TOXICOS

		$query_toxic_habits = $this->clinical_history->query("SELECT * FROM h_c_habitos_toxicos WHERE historial_id=$patient && eva_cardio=0");

		$data['query_toxic_habits'] = $query_toxic_habits;

		

			$data['ant_p_f_data'] = $query_ant_p_f->num_rows();
			$data['v_at_data'] = $query_sql_v_at->num_rows();
			$data['hab_tox_data'] = $query_toxic_habits->num_rows();
			$data['abuse_mistreat_data'] = $query_abuse_mistreat->num_rows();

			//---------------SIGNOS VITALES----------------------


			$signos_vitales_sql = $this->clinical_history->query("SELECT * from  h_c_signo_vitales WHERE id_patient=$patient $this->WHERE_ID_USER ORDER BY id DESC");
			$signos_vitales = $signos_vitales_sql->result();
          
			$data['signos_vitales_by_id'] = $signos_vitales;
			$data['signo_data'] = 0;

			$data['signos_vitales_conc'] = count($signos_vitales);


			$data['data_eva_cardio'] = 0;
	
		$data['desc_surgery_data'] = 0;
		$data['general_repo_data'] = 0;
		$data['orden_medica_data'] = 0;
		$data['colpos_data'] = 0;
		$data['vulvoscopy_data'] = 0;

		$lastIdGr = $this->clinical_history->select('id')->where('historial_id', $patient)->where('inserted_by', $this->ID_USER)->order_by('id', 'desc')->limit(1)->get('h_c_enfermedad_actual')->row('id');
		$data['lastIdGr'] = $lastIdGr;


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
		$this->load->view('clinical-history/header', $data);
	}


	public function ginecology($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area)
	{
		

		$this->history_clinica_general_forms($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area);
		$patient = decrypt_url($id_patient);
		$this->session->set_userdata('doctorEspecialidad', 'ginecology');
		$sql_ssr = "SELECT * FROM  h_c_ant_ssr WHERE hist_id=$patient $this->WHERE_ID_USER ORDER BY id DESC";
		$query_ssr = $this->clinical_history->query($sql_ssr);
		$data['ssr_totals'] = $query_ssr->num_rows();
		$data['ssr_data'] = 0;
		$data['query_ssr'] = $query_ssr->result();
		// OBS============
		$sql_obs = "SELECT * FROM  h_c_ante_obs WHERE hist_id=$patient $this->WHERE_ID_USER ORDER BY id DESC";
		$query_obs = $this->clinical_history->query($sql_obs);
		$data['obs_totals'] = $query_obs->num_rows();
		$data['obs_data'] = 0;
		$data['query_obs'] = $query_obs->result();
		
		
		  $lastOBS = $this->clinical_history->select('semana_amorea, fum_cal_ges, fpp_cal_ges')->where('hist_id', $patient)->order_by('id', 'desc')->limit(1)->get('h_c_ante_obs')->row_array();
			
		 if($lastOBS){
        $data['amorrea_semana'] = preg_replace('/[^0-9]/', '', $lastOBS['semana_amorea']);
		 $data['fum_cal_ges_database'] = $lastOBS['fum_cal_ges'];
         $data['fpp_cal_ges_database'] = $lastOBS['fpp_cal_ges'];
		}else{
		  $data['amorrea_semana'] = '';
		 $data['fum_cal_ges_database'] = '';
         $data['fpp_cal_ges_database'] = '';
		}
		// CONTROL PRENATAL============
		$query_con_pren = $this->clinical_history->query("SELECT * FROM  h_c_control_prenatal WHERE historial_id=$patient $this->WHERE_ID_USER GROUP BY id_registro ORDER BY inserted_time DESC");
		$data['query_con_pren'] = $query_con_pren->result();
		$data['con_pren_totals'] = $query_con_pren->num_rows();

        $data['showCpBtnA'] = "style='display:none'";

		$data['con_pren_data'] = 0;
$data['semana_amorea'] = '';
   $data['end_pregnancy_val']=$this->model_control_prenatal->showBtnNewPregnancy($patient);
  $this->load->view('clinical-history/ginecology/index', $data);
	}


	public function vascular_surgery($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area)
	{
		$this->session->set_userdata('doctorEspecialidad', 'vascular_urgeon');
		$this->history_clinica_general_forms($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area);
		$patient = decrypt_url($id_patient);
		$data['data_vas_surgery'] = 0;
		$data['aside'] = 'vascular_urgeon';
		$this->load->view('clinical-history/vascular-surgeon/index', $data);
	}



	public function ophthalmology($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area)
	{
		
		$this->session->set_userdata('btnSaveHist', 'btnSaveOftalmology');
		$this->session->set_userdata('doctorEspecialidad', 'ophthalmology');
		$this->history_clinica_general_forms($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area);
		$patient = decrypt_url($id_patient);
		// OFTALMOLOGIA============
		$query_ophtal = $this->clinical_history->query("SELECT * FROM  h_c_oftalmologia WHERE id_historial=$patient $this->WHERE_ID_USER ORDER BY id DESC");
		$data['ophtal_totals'] = $query_ophtal->num_rows();
		$data['data_ophtal'] = 0;
		$data['query_ophtal'] = $query_ophtal->result();
		//REFRACCION ==================
		$query_ref = $this->clinical_history->query("SELECT * FROM  h_c_of_refracion WHERE id_hist=$patient $this->WHERE_ID_USER ORDER BY id DESC");
		$data['ref_totals'] = $query_ref->num_rows();
		$data['data_ophtal'] = 0;
		$data['query_ref'] = $query_ref->result();

		$data['data_refraccion'] = 0;
		$data['aside'] = 'ophthalmology';


		$this->load->view('clinical-history/ophtalmology/index', $data);
	}


	public function urology($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area)
	{

		$this->history_clinica_general_forms($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area);
		$patient = decrypt_url($id_patient);
		$this->session->set_userdata('doctorEspecialidad', 'urology');
		$sql_ex_uro = "SELECT * FROM  h_c_urology WHERE id_patient=$patient";
		$query_ex_uro = $this->clinical_history->query($sql_ex_uro);
		$data['ex_uro_totals'] = $query_ex_uro->num_rows();
		$data['ant_ex_uro_data'] = 0;

		$data['query_ex_uro'] = $query_ex_uro->result();

		$sql_ant_uro = "SELECT * FROM  h_c_urology_antecedentes WHERE id_patient=$patient";
		$query_ant_uro = $this->clinical_history->query($sql_ant_uro);
		if ($query_ant_uro->num_rows() > 0) {
			$data['ant_uro_data'] = 1;
		} else {
			$data['ant_uro_data'] = 0;
		}
		$data['query_ant_uro'] = $query_ant_uro;
		$data['aside'] = 'urology';
		$this->load->view('clinical-history/urology/index', $data);
	}


public function pediatry($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area)
	{
		$this->history_clinica_general_forms($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area);
		$patient = decrypt_url($id_patient);
		$this->session->set_userdata('doctorEspecialidad', 'pediatry');
		$sql_query_ant_ped = "SELECT * FROM h_c_ant_pedia WHERE hist_id=$patient";
		$query_ant_ped = $this->clinical_history->query($sql_query_ant_ped);
		if ($query_ant_ped->num_rows() > 0) {
			$data['ant_ped_data'] = 1;
		} else {
			$data['ant_ped_data'] = 0;
		}

		$data['query_ant_ped'] = $query_ant_ped;



		$sql_query_vacunation = "SELECT * FROM h_c_vacunation_new WHERE hist_id=$patient";
		$query_vacunation = $this->clinical_history->query($sql_query_vacunation);
		$data['query_vacunation'] = $query_vacunation;

		if ($query_vacunation->num_rows() > 0) {
			$data['ant_vacunation'] = 1;
		} else {
			$data['ant_vacunation'] = 0;
		}

		$data['aside'] = 'pediatry';
		$this->load->view('clinical-history/pediatry/index', $data);
	}




	public function cardiovascular_evaluation($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area)
	{
		$this->history_clinica_general_forms($id_apoint, $id_patient, $id_centro, $id_doctor, $id_area);
		$patient = decrypt_url($id_patient);
		$this->session->set_userdata('doctorEspecialidad', 'evaluacion-dardiovascular');
		$query_rst_exm= $this->clinical_history->query("SELECT * FROM  h_c_cardio_vas_resultado_exam WHERE id_patient=$patient ORDER BY id DESC");
		$data['query_rst_exm_totals'] = $query_rst_exm->num_rows();
		$data['query_rst_exm'] = $query_rst_exm->result();
		$data['data_eva_cardio_v'] = 0;
		$this->load->view('clinical-history/cardiovascular-evaluation/index', $data);
	}
		
	}