<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Emerg_notas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_admin');

		$this->load->library('form_validation');
		$this->load->library('user_register_info_hospitalization');

		$this->ID_PATIENT = $this->session->userdata('id_patient');
		$this->ID_CENTRO = $this->session->userdata('id_centro');
		$this->ID_USER = $this->session->userdata('user_id');
		$this->ID_HOSP = $this->session->userdata('ID_HOSP');
		$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
	}

	public function eliminarHospNota()
	{
		$where = array(
			'id' => $this->input->post('id')
		);

		$this->db->where($where);
		$this->db->delete('emerg_signo_vitales');
	}

	public function saveExamenFisico()
	{
		$id = $this->input->post('id_sig');

		if ($id != "") {
			$updated_time = date("Y-m-d H:i:s");
			$inserted_time = $this->input->post('updated_time');
		} else {
			$inserted_time = date("Y-m-d H:i:s");
			$updated_time = $this->input->post('updated_time');
		}

		if ($this->input->post('nombre_nota') == "" || $this->input->post('hallazgo') == "") {
			$response['status'] = 0;
			$response['alert'] = "<p class='alert alert-warning'>La nota y la descripcion son obligatorios!</p>";
		} else {
			$query = $this->db->get_where('emerg_signo_vitales_nombre_nota', array('nombre' => $this->input->post('nombre_nota')));
			if ($query->num_rows() == 0) {
				$savep = array(
					'nombre' => $this->input->post('nombre_nota')
				);
				$this->db->insert("emerg_signo_vitales_nombre_nota", $savep);
			}
			$save = array(
				'peso' => $this->input->post('peso'),
				'kg' => $this->input->post('kg'),
				'talla' => $this->input->post('talla'),
				'imc' => $this->input->post('imc'),
				'ta' => $this->input->post('ta'),
				'fr' => $this->input->post('fr'),
				'fc' => $this->input->post('fc'),
				'hg' => $this->input->post('hg'),
				'tempo' => $this->input->post('tempo'),
				'glicemia' => $this->input->post('glicemia'),
				'pulso' => $this->input->post('pulso'),
				'radio' => $this->input->post('radio_signo'),
				'fcf' => $this->input->post('fcf'),
				'satoe' => $this->input->post('satoe'),
				'hallazgo' => $this->input->post('hallazgo'),
				'nombre_nota' => $this->input->post('nombre_nota'),
				'inserted_by' => $this->input->post('updated_by'),
				'id_user' => $this->input->post('updated_by'),
				'inserted_time' => $inserted_time,
				'historial_id' => $this->input->post('patient_id'),
				'updated_by' => $this->input->post('updated_by'),
				'updated_time' => $updated_time
			);

			if ($id > 0) {
				$this->db->where('id', $id);
				$this->db->update("emerg_signo_vitales", $save);
			} else {
				$this->db->insert("emerg_signo_vitales", $save);
			}

			if ($this->db->affected_rows() > 0) {
				$response['status'] = 1;
				$response['alert'] = "<p class='alert alert-success'>Grabado con exito!</p>";

			} else {
				$response['status'] = -1;
				$response['alert'] = "<p class='alert alert-danger'>Grabacion fallo!</p>";
			}

		}
		echo json_encode($response);
	}
	public function paginateSignosVitales()
	{
		$data['user_id'] = $this->input->post('user_id');
		$data['id_historial'] = $this->input->post('id_historial');
		$data['perfil'] = $this->db->select('perfil')->where('id_user', $this->input->post('user_id'))->get('users')->row('perfil');
		$this->load->view('emergency/historial/hosp-notas/signo-vitales-pagination-number', $data);
	}
	public function getNotaName()
	{
		if (!empty($this->input->post('keyword'))) {
			$nombre = $this->input->post('keyword');
			$sql = "SELECT nombre FROM emerg_signo_vitales_nombre_nota WHERE nombre like '" . $nombre . "%' ORDER BY nombre LIMIT 0,6 ";
			$data['query'] = $this->db->query($sql);
			$this->load->view('emergency/historial/hosp-notas/nota-name', $data);
		}
	}

	// ===========================================================================================================
	// ======================================= BEGIN NOTAS FORM ACTION ===========================================
	// ===========================================================================================================
	function saveExamenFisicoNotas()
	{
		$rowSigNota = array(
			// 'NEC_PRO' => 
			'inserted_by' => $this->input->post('inserted_by'),
			'inserted_time' => $this->input->post('inserted_time'),
			'updated_by' => $this->input->post('updated_by'),
			'updated_time' => $this->input->post('updated_time'),
			'description_nota' => $this->input->post('descNotas'),
			'nombre_nota' => $this->input->post('nameNotas'),
			'centro' => $this->ID_CENTRO,
			'id_hosp'=>$this->ID_HOSP,
			'id_patient' => $this->ID_PATIENT,	// TODO - WILL IDENTITY WITH TEAMMATE
		);

		if ($this->input->post('idExF') == 0) {
			//INSERT NOTA
			$this->hospitalization_emgergency->insert('emerg_exam_fis_nota', $rowSigNota);
			$id_nota = $this->hospitalization_emgergency->insert_id();

			//INSERT SIGNO VITALES
			$rowSigVit = array(
				'peso' => $this->input->post('signo_v_peso_lb'),
				'kg' => $this->input->post('signo_v_peso_kg'),
				'talla' => $this->input->post('signo_v_talla'),
				'imc' => $this->input->post('signo_v_talla_imc'),
				'talla_imc' => $this->input->post('signo_v_talla_m'),
				'ta' => $this->input->post('signo_v_ta_mm'),
				'signo_sat' => $this->input->post('signo_sat'),
				'signo_fcf' => $this->input->post('signo_fcf'),
				'fr' => $this->input->post('signo_v_fr'),
				'fc' => $this->input->post('signo_v_fc'),
				'hg' => $this->input->post('signo_v_ta_hg'),
				'tempo' => $this->input->post('signo_v_temp'),
				'pulso' => $this->input->post('signo_v_pulso'),
				'signo_v_per_cef' => $this->input->post('signo_v_per_cef'),
				'signo_v_sat_ox' => $this->input->post('signo_v_sat_ox'),
				'id_nota' => $id_nota
			);

			$this->hospitalization_emgergency->insert('emerg_signo_vitales', $rowSigVit);

			$rowSigVitRslt = array(
				'fr' => $this->input->post('signo_fr_result'),
				'fc' => $this->input->post('signo_fc_result'),
				'ft' => $this->input->post('signo_temp_result'),
				'sist' => $this->input->post('tens_art_sis_result'),
				'diast' => $this->input->post('tens_art_dias_result'),
				'id_sig' => $id_nota
			);
			$this->hospitalization_emgergency->insert('emerg_signos_vitales_results', $rowSigVitRslt);
		} else {
			$this->hospitalization_emgergency->where('id', $this->input->post('idExF'));
			$this->hospitalization_emgergency->update('emerg_exam_fis_nota', $rowSigNota);

			$rowSigVit = array(
				'peso' => $this->input->post('signo_v_peso_lb'),
				'kg' => $this->input->post('signo_v_peso_kg'),
				'talla' => $this->input->post('signo_v_talla'),
				'imc' => $this->input->post('signo_v_talla_imc'),
				'talla_imc' => $this->input->post('signo_v_talla_m'),
				'ta' => $this->input->post('signo_v_ta_mm'),
				'signo_sat' => $this->input->post('signo_sat'),
				'signo_fcf' => $this->input->post('signo_fcf'),
				'fr' => $this->input->post('signo_v_fr'),
				'fc' => $this->input->post('signo_v_fc'),
				'hg' => $this->input->post('signo_v_ta_hg'),
				'tempo' => $this->input->post('signo_v_temp'),
				'pulso' => $this->input->post('signo_v_pulso'),
				'signo_v_per_cef' => $this->input->post('signo_v_per_cef'),
				'signo_v_sat_ox' => $this->input->post('signo_v_sat_ox'),
			);
			$this->hospitalization_emgergency->where('id_nota', $this->input->post('idExF'));
			$this->hospitalization_emgergency->update('emerg_signo_vitales', $rowSigVit);
			$row = array(
				'fr' => $this->input->post('signo_fr_result'),
				'fc' => $this->input->post('signo_fc_result'),
				'ft' => $this->input->post('signo_temp_result'),
				'sist' => $this->input->post('tens_art_sis_result'),
				'diast' => $this->input->post('tens_art_dias_result'),

			);
			$this->hospitalization_emgergency->where('id_sig', $this->input->post('idExF'));
			$this->hospitalization_emgergency->update('emerg_signos_vitales_results', $row);

		}
		echo '<i class="bi bi-check  text-green" ></i>';
	}

    public function form()
    {
        $data['id_user'] = $this->ID_USER;
        $page = $this->input->get('page');
        $data['ex_notas_fis_data'] = $page;

        $sql = "SELECT *, emerg_exam_fis_nota.id AS idSearch FROM emerg_exam_fis_nota INNER JOIN  emerg_signo_vitales ON emerg_exam_fis_nota.id = emerg_signo_vitales.id_nota WHERE emerg_exam_fis_nota.id=$page";
        $query_ex_notas_fis = $this->hospitalization_emgergency->query($sql);
        $data['query_ex_notas_fis'] = $query_ex_notas_fis->result();

        $sqlSr = "SELECT * FROM emerg_signos_vitales_results WHERE id_sig=$page";
        $signos_vitales_by_id_result = $this->hospitalization_emgergency->query($sqlSr);
        $data['notas_signos_vitales_by_id_result'] = $signos_vitales_by_id_result->result();

        $this->load->view('emergency/clinical-history/notas/form', $data);
        echo "<script>$('.spinner-border').hide()</script>";

    }

    public function pagination()
    {
        $sql = "SELECT * FROM emerg_exam_fis_nota WHERE id_patient=$this->ID_PATIENT ORDER BY id DESC";
        $query = $this->hospitalization_emgergency->query($sql);

        $params = array('id_paginate' => 'paginate-notas-examfisico-li', 'rows' => $query->result(), 'id' => 'id', 'total' => $query->num_rows());
        echo $this->user_register_info_hospitalization->list_patients_registers_by_date($params);

    }
// ===========================================================================================================
// ======================================== END NOTAS FORM ACTION ============================================
// ===========================================================================================================
}