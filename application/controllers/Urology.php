<?php
	class Urology extends CI_Controller {
    public function __construct() {
        parent::__construct();
       $this->ID_USER =$this->session->userdata('user_id');
	   $this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	
	
	public function form() {
		$this->load->library("user_register_info");
		$page= $this->input->get('page');
		$data['ant_ex_uro_data'] = $this->input->get('signo');
	$query_ex_uro=$this->clinical_history->query("SELECT * FROM  h_c_urology WHERE id=$page");
	$data['query_ex_uro']= $query_ex_uro->result();
	$this->load->view('clinical-history/urology/examen-fisico', $data);
		echo "<script> $('.spinner-border').hide()</script>";
		
	}
	
	
	
	
	
	
	}