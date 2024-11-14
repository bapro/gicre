<?php
	class Vascular_surgeon_hist extends CI_Controller {
    public function __construct() {
        parent::__construct();
      $this->load->model('model_enfermedad_actual');
	       $this->ID_PATIENT = $this->session->userdata('id_patient');
            $this->ID_USER = $this->session->userdata('user_id');
            $this->ID_CENTRO = $this->session->userdata('id_centro');
			$this->load->library('user_register_info');
			$this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	
	
	public function form() {
		
		$page= $this->input->get('page');
		$data['id_hist_form'] = $this->input->get('signo');
		$enf_act_sinopsis=$this->clinical_history->select('signopsis')->where('id',$page)->get('h_c_enfermedad_actual')->row('signopsis');
       $data['enf_act_sinopsis'] = $enf_act_sinopsis;
	    $params2 = array('table' => 'h_c_enfermedad_actual', 'id'=>$page);
         echo $this->user_register_info->get_operation_info($params2);
		$this->load->view('clinical-history/vascular-surgeon/enfermedad-actuales/form-hist', $data);
	echo "<script> $('.spinner-border').hide()</script>";
		
	}
	
	}