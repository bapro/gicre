<?php
class Medico extends CI_Controller
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
		$this->load->library("user_register_info");
		$this->load->helper('form');
		$this->load->library("search_patient_photo");
		$this->load->library("get_table_data_by_id");
		$this->ID_USER = $this->session->userdata('user_id');
		$this->load->library("create_forms");
		$this->load->library('form_validation');
		$this->load->library('show_pages');
		$this->load->library("header_user");
		$this->clinical_history = $this->load->database('clinical_history', TRUE);
		$this->USER_CONTROLLER = $this->session->set_userdata('USER_CONTROLLER', 'medico');
$this->load->library('auto_complete_input');
		//$this->load->library("pagination");
		if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			redirect('login');
		}
	}





	function search_patient_by_nombres()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$this->create_forms->search_patient_form();
	}

	function search_patient_name_in_gicre($name, $app1 = "", $app2 = "")
	{
		$this->header_user->headerMedico($this->ID_USER);
		$nombres = urldecode($name) . " " . urldecode($app1) . " " . urldecode($app2);
		$data['nombres'] = $nombres;

		$this->session->set_userdata('gicre_names', $nombres);
		$data['controller'] = $this->session->userdata('USER_CONTROLLER');
		$this->load->view("patient/search/result-in-gicre", $data);
	}



	public function appointments_by_date_range()
	{
		$this->header_user->headerMedico($this->ID_USER);
		[$result_centro_medicos] = $this->create_forms->getCentroMedicoForCita(0);

		$values = array(
			'desde' => $this->input->get('desde'),
			'hasta' => $this->input->get('hasta'),
			'centro' => $this->input->get('centro'),
			'table_title' => "Citas desde " . date("d-m-Y", strtotime($this->input->get('desde'))) . " hasta " . date("d-m-Y", strtotime($this->input->get('hasta'))),
			'result_centro_medicos' => $result_centro_medicos
		);
       $this->session->set_userdata('SHOW_BTN_SAVE_HIS', 0);
		$this->show_pages->show_page_appointments($values);
	}


public function ms_appointments_by_date_range()
	{
		$this->header_user->headerMedico($this->ID_USER);
		[$result_centro_medicos] = $this->create_forms->getCentroMedicoForCita(0);

		$values = array(
			'desde' => $this->input->get('desde'),
			'hasta' => $this->input->get('hasta'),
			'centro' => $this->input->get('centro'),
			'table_title' => "Citas desde " . $this->input->get('desde') . " hasta " . $this->input->get('hasta'),
			'result_centro_medicos' => $result_centro_medicos
		);
       $this->session->set_userdata('SHOW_BTN_SAVE_HIS', 0);
		$this->show_pages->show_page_ms_appointments($values);
	}


	public function appointments()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$where = array('seen_hoy' => 0, 'doctor' => $this->session->userdata('user_id'));
		$update = array('seen_hoy' => 1);
		$this->db->where($where);
		$this->db->update("rendez_vous", $update);
	[$result_centro_medicos] = $this->create_forms->getCentroMedicoForCitaS(0);

		$values = array(
			'desde' => 0,
			'hasta' => 0,
			'centro' => 0,
			'table_title' => "Citas de hoy",
			'result_centro_medicos' => $result_centro_medicos
		);
        
		$this->show_pages->show_page_appointments($values);
	}



	public function ms_appointments()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$where = array('seen_hoy' => 0, 'doctor' => $this->session->userdata('user_id'));
		$update = array('seen_hoy' => 1);
		$this->db->where($where);
		$this->db->update("rendez_vous", $update);
	[$result_centro_medicos] = $this->create_forms->getCentroMedicoForCita(0);

		$values = array(
			'desde' => 0,
			'hasta' => 0,
			'centro' => 0,
			'table_title' => "Citas de hoy",
			'result_centro_medicos' => $result_centro_medicos
		);
        
		$this->show_pages->show_page_ms_appointments($values);
	}





	public function invoice_ars_claim_reports()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$this->create_forms->create_invoice_ncf_form();
	}


	public function tariffs()
	{
		$this->show_pages->tariffs();
	}



	public function show_invoice_tariff_by_insurance()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$doct_tarif = $this->input->post('id_doctor');
		$id_centro = $this->input->post('id_centro');
		$data['get_centro_id'] = $id_centro;
		[$get_centro_info_by_id, $centro_adress] = $this->get_table_data_by_id->getCentroInfo($id_centro);
		$data['get_centro_name'] = $get_centro_info_by_id['name'];
		[$get_doctor_info_by_id, $doctor_area] = $this->get_table_data_by_id->getDoctorInfo($doct_tarif);
		$data['doctor_name'] = $get_doctor_info_by_id['name'];
		$data['id_doctor'] = $doct_tarif;
		$results = $this->model_admin->display_tarif_doc($doct_tarif);
		$data['results'] = $results;
		$count = count($results);
		$id_seguro_medico = $this->db->select('seguro_medico')->where('id_doctor', $doct_tarif)->get('doctor_seguro')->row('seguro_medico');
		$data['id_seguro_medico'] = $id_seguro_medico;
		$data['count'] = $count;
		$data['show_select'] = 1;
		$data['get_seg_plan'] = 0;
		$this->load->view('tarifario/doc-tariff-result', $data);
	}


	public function upload_tariff_form($doctor_ct, $seguro_ct, $tarif_plan_ct, $centro_med)
	{
		$this->db->where_in('id_usuario', $this->ID_USER);
		$this->db->delete('tarifarios_temporal');
		$this->header_user->headerMedico($this->ID_USER);
		$doctor_ct = decrypt_url($doctor_ct);
		$seguro_ct = decrypt_url($seguro_ct);
		$tarif_plan_ct = decrypt_url($tarif_plan_ct);
		$centro_med = decrypt_url($centro_med);
		[$get_centro_info_by_id, $centro_adress] = $this->get_table_data_by_id->getCentroInfo($centro_med);
		$data['get_centro_name'] = $get_centro_info_by_id['name'];

		$this->create_forms->upload_tariff_form($doctor_ct, $seguro_ct, $tarif_plan_ct, $centro_med);
		$data['id_doctor'] = $doctor_ct;
		$data['id_seguro_medico'] = $seguro_ct;
		$data['get_centro_id'] = $centro_med;
		$data['show_select'] = 1;
		$data['get_seg_plan'] = $tarif_plan_ct;
		$this->load->view('tarifario/footer', $data);
	}




	public function invoice_report()
	{
		$this->header_user->headerMedico($this->ID_USER);
		[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors] = $this->create_forms->getCentroAndSeguroByPerfil(0);
		$data['result_doctors'] = $result_doctors;
		$data['result_centro_medicos'] = $result_centro_medicos;
		$data['search_date_range_seguro_factura'] = $this->model_admin->search_date_range_seguro_factura_adm();

		$this->load->view('factura/reporte-de-facturas/index', $data);
	}


	public function exchange_rate()
	{
		$this->header_user->headerMedico($this->ID_USER);
		[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors] = $this->create_forms->getCentroAndSeguroByPerfil(0);
		$data['result_doctors'] = $result_doctors;
		$this->load->view('medico/tarifarios/tasa-de-cambio', $data);
	}

	public function patient_appointment_requests()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$this->load->view('patient/request/patients_requests');
	}

	public function patient($id_patient, $id_apoint=0, $id_centro)
	{
	
		$this->show_pages->patient($id_patient, $id_apoint=0, $id_centro);
	}

	public function laboratory()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$this->labList();
	}

	public function labList()
	{
		$medico_id = $this->session->userdata['user_id'];
		$data['medico_id'] = $medico_id;

		$sqllbb = "SELECT * FROM h_c_groupo_lab WHERE id_doc=$medico_id && rmvd=0 GROUP BY groupo ORDER BY id DESC";
		$querylbb = $this->clinical_history->query($sqllbb);
		$data['totallab'] = $querylbb->num_rows();
		$sqlgl = "SELECT * FROM h_c_groupo_lab WHERE rmvd=0 && id_doc='$medico_id' GROUP BY groupo ORDER BY id DESC";
		$querygl = $this->clinical_history->query($sqlgl);
		$data['querygl'] = $querygl;
		$data['show_select'] = "";
		$data['totallab'] = $querygl->num_rows();
		$this->load->view('medico/laboratory/lab', $data);
	}

	public function doctor_account()
	{
		$this->show_pages->doctor_account($this->ID_USER);
	}


   public function medical_assistent()
	{
		$this->show_pages->medical_assistent($this->ID_USER);
	}

	public function create_patient()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$this->create_forms->create_patient_form();
	}

	public function testMe()
	{
		$id_doctor = $this->session->userdata('doctor');
		$id_seguro = $this->session->userdata('seguroId');
		$id_plan = $this->session->userdata('patientPlan');
		$id_patient = $this->session->userdata('patient');
		$id_cm = $this->session->userdata('centro');
		$seguro_title = $this->session->userdata('seguroTitle');
		if ($seguro_title == 'PRIVADO') {
			$plan = $id_cm;
		} else {
			$plan = $id_plan;
		}


		echo " id_doctor =$id_doctor && id_seguro =$id_seguro && plan=$plan";
	}

	public function create_invoice_ambulatory()
	{
		$centro=encrypt_url($this->input->get('centro'));
		$fac = encrypt_url("fac");
		$doc=encrypt_url($this->input->get('doc'));
		$seguro =  encrypt_url($this->input->get('seg'));
		$id_patient =  encrypt_url($this->input->get('id_patient'));
		
		$this->db->where_in('id_usuario', $this->ID_USER);
		$this->db->delete('tarifarios_temporal');
		$this->header_user->headerMedico($this->ID_USER);
		$centro_type = $this->db->select('type')->where('id_m_c', $this->input->get('centro'))->get('medical_centers')->row('type');
		redirect($this->session->userdata('USER_CONTROLLER') . "/invoice/" . $centro . "/" . $fac . "/" . $doc . "/" . $seguro . "/" . "/".$centro_type. "/".$id_patient);
	}

	public function create_invoice($id_centro, $id_apoint, $id_doct, $id_seguro, $id_pat)
	{
		$id_ap = decrypt_url($id_apoint);

		$cent = decrypt_url($id_centro);


		$centro_type = $this->db->select('type')->where('id_m_c', $cent)->get('medical_centers')->row('type');

		$is_appointment_already_billed = $this->db->select('id_rdv, idfacc')->where('id_rdv', $id_ap)->get('factura2')->row_array();

		if ($is_appointment_already_billed) {
			redirect("medico/factura_by_id/" . encrypt_url($is_appointment_already_billed['idfacc']) . "/" . $centro_type);
		} else {
			$this->invoice($id_centro, $id_apoint, $id_doct, $id_seguro, $centro_type, $id_pat);
		}
	}



public function create_invoice_back($id_centro, $id_apoint, $id_doct, $id_seguro)
	{
		$id_ap = decrypt_url($id_apoint);

		$cent = decrypt_url($id_centro);


		$centro_type = $this->db->select('type')->where('id_m_c', $cent)->get('medical_centers')->row('type');
      $id_pat = $this->db->select('id_patient')->where('id_apoint', $id_ap)->get('rendez_vous')->row('id_patient');
	  $id_p = encrypt_url($id_pat);
		$this->invoice($id_centro, $id_apoint, $id_doct, $id_seguro, $centro_type, $id_p);
		
	}


	public function invoice($id_centro, $id_apoint, $id_doct, $id_seguro, $centro_type, $id_pat)
	{
		$this->header_user->headerMedico($this->ID_USER);
		$this->db->where_in('id_usuario', $this->ID_USER);
		$this->db->delete('tarifarios_temporal');
		
		$id_ap = decrypt_url($id_apoint);
		$doc = decrypt_url($id_doct);
		$cent = decrypt_url($id_centro);
		$seg = decrypt_url($id_seguro);
        $id_patient = decrypt_url($id_pat);
		//$id_patient = $this->session->userdata('ID_PATIENT');



		$seguro_title = $this->db->select('title')->where('id_sm', $seg)->get('seguro_medico')->row('title');




		[$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id] = $this->get_table_data_by_id->getPatientInfo($id_patient);
		$data['patient_adress'] = $patient_adress;
		[$get_centro_info_by_id, $centro_adress] = $this->get_table_data_by_id->getCentroInfo($cent);
		$data['centro_adress'] = $centro_adress;


		[$get_doctor_info_by_id, $doctor_area] = $this->get_table_data_by_id->getDoctorInfo($doc);
		$data['get_doctor_info_by_id'] = $get_doctor_info_by_id;
		$data['doctor_area'] = $doctor_area;
		[$codigo_contrato, $password, $cedulaFormat, $disabledNap] = $this->get_table_data_by_id->getCodigoContrato($get_centro_info_by_id['type'], $cent, $seg, $doc);

		$data['get_centro_info_by_id'] = $get_centro_info_by_id;

		$data['codigo_contrato'] = $codigo_contrato;
		$data['password'] = $password;
		$data['cedulaFormat'] = $cedulaFormat;
		$data['get_patient_info_by_id'] = $get_patient_info_by_id;
		$data['disabledNap'] = $disabledNap;

		if ($seguro_title == "PRIVADO") {
			$tarif_plan = $cent;
			$patientNss = '';
		} else {
			$tarif_plan = $get_patient_info_by_id['plan'];
			$patientNss = $this->db->select('input_name')->where('patient_id', $id_patient)->get('saveinput')->row('input_name');
		}
		$data['patientNss'] = $patientNss;
		if ($password) {
			$ws = "";
		} else {
			$ws = "none";
		}

		$data['ws'] = $ws;
		$data['centro_type_get'] = $centro_type;

		$sessions_data = array(
			'seguroTitle' => $seguro_title,
			'patientPlan'  => $get_patient_info_by_id['plan'],
			'doctor'  => $doc,
			'id_apoint' => $id_ap,
			'centro' => $cent,
			'seguroId' => $seg,
			'patientNss' => $patientNss,
			'patient' => $id_patient,
		);

		$this->session->set_userdata($sessions_data);


		if ($centro_type == "privado") {
			$tipo_tarifario = "Doctor Tarifarios";
			$this->get_table_data_by_id->tarifarios_temporal_for_current_user($sessions_data);
			$select_servicios = "";
		} else {
			//$tipo_tarifario="Centro Tarifarios <span><input  type='checkbox' id='pdss'/> PDSS</span>";
			$tipo_tarifario = "Servicios";
			$this->get_table_data_by_id->centro_tarifarios_temporal_for_current_user($sessions_data);

			$select_servicios = $this->db->query("SELECT id_c_taf, groupo FROM  centros_tarifarios_test WHERE centro_id=$cent  && seguro_id=$seg GROUP BY groupo");

			$data['select_servicios'] = $select_servicios;
		}
		$data['tipo_tarifario'] = $tipo_tarifario;
         $this->session->set_userdata('TIPO_TARIFF', $tipo_tarifario);
		  $this->session->set_userdata('SELECT_SERVICIOS', $select_servicios);
		[$tarifarios, $count_medico_tariff] = $this->get_table_data_by_id->getTarifariosPorDoctorPrivado($sessions_data);
		[$tarifarios_centro, $count_centro_tariff] = $this->get_table_data_by_id->getTarifariosPorCentro($cent, $seg);
		$tasa = $this->get_table_data_by_id->getDevise($this->ID_USER);

		$data['tasa'] = $tasa;
		$data['tarifarios'] = $tarifarios;
		$data['count_medico_tariff'] = $count_medico_tariff;
		$data['tarifarios_centro'] = $tarifarios_centro;
		$data['count_centro_tariff'] = $count_centro_tariff;
		$data['values_container_decrpyted'] = $sessions_data;
		$data['get_patient_seguro_info_by_id'] = $get_patient_seguro_info_by_id;




		$array_encrypted = array(
			'doctor_ct' => $id_doct,
			'seguro_ct' => $id_seguro,
			'tarif_plan_ct' => encrypt_url($tarif_plan),
			'centro' => $id_centro
		);

		$data['values_container'] = $array_encrypted;

		$data['tarif_plan'] = $tarif_plan;
		$data['fecha_factura'] = date('Y-m-d');
		$data['numauto'] = $this->session->userdata('factura_numauto');
		$data['autopor'] = $this->session->userdata('factura_autopor');
		$data['numauto'] = $this->session->userdata('factura_numauto');
		$data['pendienteCaja'] = '';
		$data['tarjeta'] = '';
		$data['transferencia'] = '';
		$data['effectivo'] = '';
		$data['cheque'] = '';
		$data['comment'] = $this->session->userdata('factura_comment');
		$data['checqueNumero'] = '';
		$data['btn_fecha_com'] = "style='display:none'";
		$data['disabled_modalidad_de_pago'] = '';
		$data['modalidadDePagoId'] = 0;
		$data['current_controller'] = 'medico';
		$data['tipo_monena']='RD$';
		$this->get_table_data_by_id->tarifarios_temporal_for_current_user($sessions_data);
		$data['wslCentro'] = "http://arssenasa2.gob.do/webservices/webservicesautorizaciones/WSAutorizacionLaboratorio.asmx?WSDL";
		if ($centro_type == "privado") {
			$this->load->view('patient/factura/create-factura-centro-privado', $data);
		} else {
			if($seg==11){
				$this->load->view('patient/factura/createPulicCenterInvoiceForPrivateInsurance', $data);
			}else{
				$this->load->view('patient/factura/createPulicCenterInvoiceForPublicInsurance', $data);
			}
			//$this->load->view('patient/factura/create-factura-centro-publico', $data);
		}
	}

	public function factura_by_id()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$id = $this->uri->segment(3);
		$identificar = $this->uri->segment(4);
		$this->db->where_in('id_usuario', $this->ID_USER);
		$this->db->delete('tarifarios_temporal');
		$this->ver_factura_by_id($id, $identificar);
	}

	public function ver_factura_by_id($idFac, $ident)
	{
		$data['id'] = $idFac;
		$data['identificar'] = $ident;
		$this->load->view('patient/factura/ver-factura-queries', $data);
	}



	
public function see_medical_center()
{
$this->header_user->headerMedico($this->ID_USER);
	$id_medical_center= $this->uri->segment(3);

$this->show_pages->medical_center($id_medical_center);

}

	

	public function display_tarif_centro_categoria($id_centro, $id_seguro)
	{
		$this->header_user->headerMedico($this->ID_USER);
		$results = $this->model_admin->display_tarif_centro_categoria($id_centro, $id_seguro);
		$data['results'] = $results;
		$data['id_seguro'] = $id_seguro;
		$data['id_centro'] = $id_centro;

		$this->load->view('footer-footerJs', $data);
		if ($results) {
			$link = 'href="' . base_url() . 'medico/tariffs"';
			$data['searchTarif'] = "<a $link >Buscar Tarifarios</a>";
			$this->load->view('tarifario/centro/display_tarif_centro', $data);
		} else {
			$this->create_forms->upload_center_tariffs($id_centro, $id_seguro, 0);
		}
	}

	public function upload_center_tariffs($centro, $seguro)
	{
		$this->db->where_in('id_usuario', $this->ID_USER);
		$this->db->delete('tarifarios_temporal');
		$this->header_user->headerMedico($this->ID_USER);
		$this->create_forms->upload_center_tariffs($centro, $seguro, 1);
	}

	








	
	
	
	
}
