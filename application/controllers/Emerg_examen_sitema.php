<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Emerg_examen_sitema extends CI_Controller
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
		$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
	}

	

	  function saveExamenSistema()
        {
            if ($this->input->post('form_inputs') > 0) {
                $data              = array(
                    'sisneuro' => $this->input->post('sisneuro'),
                    'neurologico' => $this->input->post('neurologico'),
                    'siscardio' => $this->input->post('siscardio'),
                    'cardiova' => $this->input->post('cardiova'),
                    'sist_uro' => $this->input->post('sist_uro'),
                    'urogenital' => $this->input->post('urogenital'),
                    'sis_mu_e' => $this->input->post('sis_mu_e'),
                    'musculoes' => $this->input->post('musculoes'),
                    'sist_resp' => $this->input->post('sist_resp'),
                    'nervioso' => $this->input->post('nervioso'),
                    'nerviosostext' => $this->input->post('nerviosostext'),
                    'linfatico' => $this->input->post('linfatico'),
                    'linfaticotext' => $this->input->post('linfaticotext'),
                    'digestivo' => $this->input->post('digestivo'),
                    'respiratorio' => $this->input->post('respiratorio'),
                    'genitourinario' => $this->input->post('genitourinario'),
                    'genitourinariotext' => $this->input->post('genitourinariostext'),
                    'sist_diges' => $this->input->post('sist_diges'),
                    'sist_endo' => $this->input->post('sist_endo'),
                    'endocrino' => $this->input->post('endocrino'),
                    'sist_rela' => $this->input->post('sist_rela'),
                    'otros_ex_sis' => $this->input->post('otros_ex_sis'),
                    'cardiova' => $this->input->post('cardiova'),
                    'dorsales' => $this->input->post('dorsales'),
                    'dorsalestext' => $this->input->post('dorsalesstext'),
                   'historial_id' => $this->ID_PATIENT,
				   'centro' => $this->ID_CENTRO,
                    'inserted_by' =>  $this->session->userdata('ta_in_by'),
                'updated_by' =>  $this->session->userdata('si_up_by'),
                'inserted_time' => $this->session->userdata('si_in_time'),
                'updated_time' =>  $this->session->userdata('si_up_time'),

                );
                if ($this->input->post('id') == 0) {
                    $this->hospitalization_emgergency->insert("emerg_examen_sistema", $data);
					echo '<i class="bi bi-check  text-green" ></i>';
                } else {
                    $this->hospitalization_emgergency->where('id', $this->input->post('id'));
                    $this->hospitalization_emgergency->update('emerg_examen_sistema', $data);
                    echo '<i class="bi bi-check  text-green" ></i>';
                }
            }else{
				echo '<i class="bi bi-check  text-danger" >El formulario esta vacio</i>';
			}
        }

	
	public function pagination() {
    $sql="SELECT * FROM emerg_examen_sistema WHERE historial_id=$this->ID_PATIENT ORDER BY id DESC";
     $query= $this->hospitalization_emgergency->query($sql);
     
    $params = array('id_paginate' => 'paginate-examsistema-li', 'rows'=>$query->result(), 'id'=>'id', 'total'=>$query->num_rows());
        echo $this->user_register_info_hospitalization->list_patients_registers_by_date($params);
    
}
	



	public function form() {
		$this->load->library("user_register_info");
		$page= $this->input->get('page');
		$data['sis_data'] = $this->input->get('signo');
	$query_sis=$this->hospitalization_emgergency->query("SELECT * FROM  emerg_examen_sistema WHERE id=$page");
	$data['query_sis']= $query_sis->result();
	$this->load->view('emergency/clinical-history/examen-sistema/form', $data);
			 echo "<script> $('.spinner-border').hide()</script>";
		
	}
	
}

  
