<?php
	class Enfermedad_actual extends CI_Controller {
    public function __construct() {
        parent::__construct();
      $this->load->model('model_enfermedad_actual');
	       $this->ID_PATIENT = $this->session->userdata('id_patient');
            $this->ID_USER = $this->session->userdata('user_id');
            $this->ID_CENTRO = $this->session->userdata('id_centro');
			$this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	
	
	public function form() {
		$this->load->library("user_register_info");
		$page= $this->input->get('page');
		$data['enfermedad_data'] = $this->input->get('signo');
		$data['show_enf'] = $this->model_enfermedad_actual->show_enfermedad($page);
		$data['id_servicio'] = $this->session->userdata('id_servicio');
		$this->load->view('clinical-history/enfermedad-actuales/form', $data);
		$visibility = $page == 0 ? 'show': 'hide';
			echo "<script> $('.spinner-border').hide()</script>";
		
	}
	
		public function updateEnfAct() {
	if ($this->input->post('enf_motivo') == "") {
            $response['message'] = "<span style='color:red'>*</span> El motivo es obligatorio.";
            $response['status']  = 1;
        } elseif ($this->input->post('is_sinopsis_empty') == "") {
            $response['message'] = "<span style='color:red'>*</span> Signopsis es obligatorio.";
            $response['status']  = 2;
        }  else {
            
            
             $data = array( 
                'enf_motivo' => $this->input->post('enf_motivo'),
                'signopsis' => $this->input->post('enf_signopsis'),
                'laboratorios' => $this->input->post('enf_laboratorios'),
                'estudios' => $this->input->post('enf_estudios'),
				'updated_time' => date("Y-m-d H:i:s"),
				'updated_by' => $this->ID_USER 
				
            );
			$this->clinical_history->where('id', $this->input->post('id'));
		   $this->clinical_history->update('h_c_enfermedad_actual',$data);
			
			$response['message'] = "<i class='bi bi-check'></i> guardado";
            $response['status']  = 0;
			
		}
		 echo json_encode($response);
	}
	
	}