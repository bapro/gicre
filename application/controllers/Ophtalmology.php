<?php
	class Ophtalmology extends CI_Controller {
    public function __construct() {
        parent::__construct();
       $this->ID_USER =$this->session->userdata('user_id');
	     $this->ID_CENTRO =$this->session->userdata('id_centro');
  $this->ID_PATIENT =$this->session->userdata('id_patient');
   $this->clinical_history = $this->load->database('clinical_history',TRUE);
    $this->load->library("user_register_info");
    }
	
	
	public function form() {
		$this->load->library("user_register_info");
		$page= $this->input->get('page');
		$data['data_ophtal'] = $this->input->get('signo');
	$query_ex_uro=$this->clinical_history->query("SELECT * FROM  h_c_oftalmologia WHERE id=$page");
	$data['query_ophtal']= $query_ex_uro->result();
	$this->load->view('clinical-history/ophtalmology/form-oph', $data);
			echo "<script> $('.spinner-border').hide()</script>";
		
	}
	

	public function pagination() {
    $sql="SELECT * FROM h_c_oftalmologia WHERE id_historial=$this->ID_PATIENT ORDER BY id DESC";
     $query= $this->clinical_history->query($sql);
     $ophtal_totals= $query->num_rows();
     $query_ophtal=$query->result();
	
   $params = array('id_paginate' => 'paginate-ophtalmology-li', 'rows'=>$query_ophtal, 'id'=>'id', 'total'=>$ophtal_totals);
        echo $this->user_register_info->list_patients_registers_by_date($params);
    
}

	
	
	}