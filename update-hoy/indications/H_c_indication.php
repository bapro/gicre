<?php
	class H_c_indication extends CI_Controller {
    public function __construct() {
        parent::__construct();
     $this->ID_USER =$this->session->userdata('user_id');
	  $this->PERFIL_USER =$this->session->userdata('user_perfil');
	 $this->load->library("load_history_resume");
	
    }
	
	
	
	
	
		
	
	

	
	
	function eliminate_duplicated_indications(){
		$id_patient=$this->input->post('id_patient');
		$table=$this->input->post('table');
		$date = date("Y-m-d");
	$this->clinical_history->query("DELETE FROM $table WHERE operator=$this->ID_USER AND historial_id=$id_patient AND DATE(insert_time)='$date'");	
	}
	
	

	
	}