<?php
    class Obs extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
             $this->ID_USER = $this->session->userdata('sessionIdUuser');
			 $this->ID_CENTRO = $this->session->userdata('id_centro');
            $this->ID_PATIENT = $this->session->userdata('id_patient');
				$this->clinical_history = $this->load->database('clinical_history',TRUE);
        }


        public function form()
        {
            $this->load->library("user_register_info");
            $page = $this->input->get('page');
            $data['obs_data'] = $this->input->get('signo');
            $query_ex_uro = $this->clinical_history->query("SELECT * FROM  h_c_ante_obs WHERE id=$page");
            $data['query_obs'] = $query_ex_uro->result();
            $this->load->view('clinical-history/ginecology/obs/form', $data);
            echo "<script> $('.spinner-border').hide()</script>";
        }



       
		
		
		
		
		
		
		
    }
