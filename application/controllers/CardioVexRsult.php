<?php
	class CardioVexRsult extends CI_Controller {
    public function __construct() {
        parent::__construct();
       $this->ID_USER =$this->session->userdata('id_user');
	   $this->ID_PATIENT = $this->session->userdata('id_patient');
	   $this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	
	
	public function form() {
		$this->load->library("user_register_info");
		$page= $this->input->get('page');
		$data['data_eva_cardio_v'] = $this->input->get('signo');
	$query_ex_rst=$this->clinical_history->query("SELECT * FROM  h_c_cardio_vas_resultado_exam WHERE id=$page");
	$data['query_ex_rst']= $query_ex_rst->result();
	$this->load->view('clinical-history/cardiovascular-evaluation/exams-result/form', $data);
			 echo "<script> $('.spinner-border').hide()</script>";
		
	}
	

	public function saveEditExamRstCrdv() {
		
		if($this->input->post('txtarea') > 0 || $this->input->post('radios') > 0){
			$id=$this->input->post('id');
			
			$data = array(
                'rx_torax_radio' => $this->input->post('rx_torax_radio'),
                'rx_torax_txt' => $this->input->post('rx_torax_txt'),
                'ekg_radio_radio' => $this->input->post('ekg_radio_radio'),
                'ekg_radio_txt' => $this->input->post('ekg_radio_txt'),
                'otros_hallazgo_radio' => $this->input->post('otros_hallazgo_radio'),
                'otros_hallazgo_txt' => $this->input->post('otros_hallazgo_txt'),
                'especifique' => $this->input->post('especifique'),
                //'utilizo' => $this->input->post('utilizo'),
                'conclusion' => $this->input->post('evcconclusion'),
                'asa' => $this->input->post('asa'),
				 'id_patient' => $this->ID_PATIENT,
               'inserted_by' => $this->session->userdata('cverin_by'),
				'inserted_time' => $this->session->userdata('cverin_time'),
                'updated_by' => $this->session->userdata('cverup_by'),
                'updated_time' => $this->session->userdata('cverup_time')
            );
			if($id > 0){
            $this->clinical_history->where('id', $id);
            $result = $this->clinical_history->update('h_c_cardio_vas_resultado_exam', $data);
			}else{
				$result =$this->clinical_history->insert("h_c_cardio_vas_resultado_exam", $data);
			}
            if ($result) {
               echo '<i class="bi bi-check-lg text-success fs-4"></i>';
            } else {
              
                echo '<i class="bi bi-check-lg text-danger fs-4"></i>!';
            }
			
		}
		
		
	}
	
	
	}