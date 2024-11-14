<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas_list extends CI_Controller {

   public function __construct(){

     parent::__construct();
     $this->load->helper('url');
      $this->load->library("search_patient_photo");
	   	  $this->clinical_history = $this->load->database('clinical_history', TRUE);
		  $this->PERFIL =$this->session->userdata('user_perfil');
		  $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
     $this->load->library('header_user');
     $this->load->model('citas_list_model');

   }

   public function index(){

    $this->header_user->headerAdmin(1);
     $this->load->view('citas');

   }

   public function citasList(){
     
     // POST data
     $postData = $this->input->post();

     // Get data
     $data = $this->citas_list_model->getEmployees($postData);

     echo json_encode($data);
  }

}