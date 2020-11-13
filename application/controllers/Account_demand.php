<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Account_demand extends CI_Controller { 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('navigation/account_demand_model');
   $this->load->model('user');
  
 }
 public function index()
 {
  $this->load->view('navigation/view_registration');
 }
 
 
 //get all demands
 public function display_demand(){
 
 
 
  if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->user->getRows(array('id_acd'=>$this->session->userdata('userId')));
			 $query = $this->account_demand_model->getDemands();
			  $data['EMPLOYEES'] = null;
			   $data['EMPLOYEES'] =  $query;
            //load the view
            $this->load->view('display_demands', $data);
        }else{
            redirect('welcome');
        }
 }
 
 

 
 
 
 
 
 
}