<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SaveHistorialUrology extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_medical_history');
        $this->load->library('form_validation');
 $this->ID_USER =$this->session->userdata('sessionIdUuser');
  $this->ID_CENTRO =$this->session->userdata('id_centro');
  $this->ID_PATIENT =$this->session->userdata('id_patient');
    }
  
   
      
        
   
	
	
	
	}
 



