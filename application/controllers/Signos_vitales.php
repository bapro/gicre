<?php
	class Signos_vitales extends CI_Controller {
    public function __construct() {
        parent::__construct();
      $this->load->model('model_signo_vital');
	  $this->load->library("pagination");
       $this->ID_USER =$this->session->userdata('sessionIdUuser');
    }
	
	
	public function form() {
		$this->load->library("user_register_info");
		$page= $this->input->get('page');
		$data['id_user'] =  $this->ID_USER;
		$data['signo_data'] = $this->input->get('signo');
		$data['signos_vitales_by_id'] = $this->model_signo_vital->signos_vitales_by_id($page);
		$data['signos_vitales_by_id_result'] = $this->model_signo_vital->signos_vitales_by_id_result($page);
		$data['data_eva_cardio']=0;
		$this->load->view('clinical-history/vital-signals/form', $data);
		
			 echo "<script> $('.spinner-border').hide()</script>";
	}
	
	
	public function updateSignosVitales() {
	$rowSigVit = array(
                'peso' => $this->input->post('signo_v_peso_lb'),
                'kg' => $this->input->post('signo_v_peso_kg'),
                'talla' => $this->input->post('signo_v_talla'),
                'imc' => $this->input->post('signo_v_talla_imc'),
				'talla_imc' => $this->input->post('signo_v_talla_m'),
				'ta' => $this->input->post('signo_v_ta_mm'),
                'fr' => $this->input->post('signo_v_fr'),
                'fc' => $this->input->post('signo_v_fc'),
                'hg' => $this->input->post('signo_v_ta_hg'),
                'tempo' => $this->input->post('signo_v_temp'),
                'pulso' => $this->input->post('signo_v_pulso'),
                'glicemia' => $this->input->post('signo_v_glicemia'),
                'radio' => $this->input->post('signo_v_aspecto_general'),
				'signo_v_per_cef' => $this->input->post('signo_v_per_cef'),
				'updated_by' => $this->input->post('sessionIdUuser'),
                'updated_time' => date("Y-m-d H:i:s")
				);
				
				$this->db->where('id', $this->input->post('id_sig'));
		   $this->db->update('h_c_signo_vitales',$rowSigVit);
		  
		              $rowSigVitRslt = array(
                'fr' => $this->input->post('signo_fr_result'),
                'fc' => $this->input->post('signo_fc_result'),
                'ft' => $this->input->post('signo_temp_result'),
                'sist' => $this->input->post('tens_art_sis_result'),
				'diast' => $this->input->post('tens_art_dias_result'),
				'glicemia' => $this->input->post('glicemia_rslt')
				);
				
			$this->db->where('id', $this->input->post('id_sig_rslt'));
		   $this->db->update('h_c_signos_vitales_results',$rowSigVitRslt);
		   echo '<i class="bi bi-check  text-green" ></i>';
	}
	
	
	
	
	
	
	
	
	
	}