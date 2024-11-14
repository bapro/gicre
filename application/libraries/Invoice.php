<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				
					    $this->NEC_PRO =$this->CI->session->userdata('NEC_PRO');
						$this->PERFIL =$this->CI->session->userdata('user_perfil');
						$this->ID_USER =$this->CI->session->userdata('user_id');
						$this->USER_NAME =$this->CI->session->userdata('user_name');
						$this->IS_ADMINISTRATIVO =$this->CI->session->userdata('admin_position_centro');
						$this->CI->load->model('model_admin');
						$this->CI->load->model('navigation/account_demand_model');
						 $this->CI->load->library('get_table_data_by_id');
						 $this->CI->load->library('search_patient_photo');
						 $this->CI->load->model('model_general');
						$this->controller = $this->CI->session->userdata('USER_CONTROLLER');
						$this->CI->padron_database = $this->CI->load->database('padron',TRUE);
						if($this->CI->session->userdata('is_logged_in')=='')
						{
						$this->CI->session->set_flashdata('msg','Please Login to Continue');
						redirect('login');
						}
        }

public function create_invoice($id_centro, $id_apoint, $id_doct, $id_seguro, $centro_type)
	{
		$this->CI->header_user->headerMedico($this->CI->ID_USER);
		$this->CI->db->where_in('id_usuario', $this->CI->ID_USER);
		$this->CI->db->delete('tarifarios_temporal');
		
		$id_ap = decrypt_url($id_apoint);
		$doc = decrypt_url($id_doct);
		$cent = decrypt_url($id_centro);
		$seg = decrypt_url($id_seguro);

		$id_patient = $this->CI->session->userdata('ID_PATIENT');



		$seguro_title = $this->CI->db->select('title')->where('id_sm', $seg)->get('seguro_medico')->row('title');




		[$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id] = $this->CI->get_table_data_by_id->getPatientInfo($this->CI->session->userdata('ID_PATIENT'));
		$data['patient_adress'] = $patient_adress;
		[$get_centro_info_by_id, $centro_adress] = $this->CI->get_table_data_by_id->getCentroInfo($cent);
		$data['centro_adress'] = $centro_adress;


		[$get_doctor_info_by_id, $doctor_area] = $this->CI->get_table_data_by_id->getDoctorInfo($doc);
		$data['get_doctor_info_by_id'] = $get_doctor_info_by_id;
		$data['doctor_area'] = $doctor_area;
		[$codigo_contrato, $password, $cedulaFormat, $disabledNap] = $this->CI->get_table_data_by_id->getCodigoContrato($get_centro_info_by_id['type'], $cent, $seg, $doc);

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
			$patientNss = $this->CI->db->select('input_name')->where('patient_id', $this->CI->session->userdata('ID_PATIENT'))->get('saveinput')->row('input_name');
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
			'patient' => $this->CI->session->userdata('ID_PATIENT'),
		);

		$this->CI->session->set_userdata($sessions_data);


		if ($centro_type == "privado") {
			$tipo_tarifario = "Doctor Tarifarios";
			$this->CI->get_table_data_by_id->tarifarios_temporal_for_current_user($sessions_data);
			$select_servicios = "";
		} else {
			//$tipo_tarifario="Centro Tarifarios <span><input  type='checkbox' id='pdss'/> PDSS</span>";
			$tipo_tarifario = "Servicios";
			$this->CI->get_table_data_by_id->centro_tarifarios_temporal_for_current_user($sessions_data);

			$select_servicios = $this->CI->db->query("SELECT id_c_taf, groupo FROM  centros_tarifarios_test WHERE centro_id=$cent  && seguro_id=$seg GROUP BY groupo");

			$data['select_servicios'] = $select_servicios;
		}
		$data['tipo_tarifario'] = $tipo_tarifario;
         $this->CI->session->set_userdata('TIPO_TARIFF', $tipo_tarifario);
		  $this->CI->session->set_userdata('SELECT_SERVICIOS', $select_servicios);
		[$tarifarios, $count_medico_tariff] = $this->CI->get_table_data_by_id->getTarifariosPorDoctorPrivado($sessions_data);
		[$tarifarios_centro, $count_centro_tariff] = $this->CI->get_table_data_by_id->getTarifariosPorCentro($cent, $seg);
		$tasa = $this->CI->get_table_data_by_id->getDevise($this->CI->ID_USER);

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
		$data['numauto'] = $this->CI->session->userdata('factura_numauto');
		$data['autopor'] = $this->CI->session->userdata('factura_autopor');
		$data['numauto'] = $this->CI->session->userdata('factura_numauto');
		$data['pendienteCaja'] = '';
		$data['tarjeta'] = '';
		$data['transferencia'] = '';
		$data['effectivo'] = '';
		$data['cheque'] = '';
		$data['tipo_monena']='RD$';
		$data['comment'] = $this->CI->session->userdata('factura_comment');
		$data['checqueNumero'] = '';
		$data['btn_fecha_com'] = "style='display:none'";
		$data['disabled_modalidad_de_pago'] = '';
		$data['modalidadDePagoId'] = 0;
		$data['current_controller'] = $this->controller;
		$this->CI->get_table_data_by_id->tarifarios_temporal_for_current_user($sessions_data);
		$data['wslCentro'] = "http://arssenasa2.gob.do/webservices/webservicesautorizaciones/WSAutorizacionLaboratorio.asmx?WSDL";
		if ($centro_type == "privado") {
			$this->CI->load->view('patient/factura/create-factura-centro-privado', $data);
		} else {
			if($seg==11){
				$this->CI->load->view('patient/factura/createPulicCenterInvoiceForPrivateInsurance', $data);
			}else{
				$this->CI->load->view('patient/factura/createPulicCenterInvoiceForPublicInsurance', $data);
			}
			//$this->CI->load->view('patient/factura/create-factura-centro-publico', $data);
		}
	}

}
				
