<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_test extends CI_Controller {
public function __construct()
{
parent::__construct();


 $this->load->library('email');
 $this->load->helper('email');
$this->load->model('navigation/account_demand_model');
$this->load->model('user');
$this->load->model('model_admin');
$this->load->model("model_emergencia");
$this->load->model("product");
$this->load->model("padron_model");
$this->load->model("model_paginate_citas");
	  $this->clinical_history = $this->load->database('clinical_history', TRUE);
$this->load->library("ajax_pagination");
$this->perPage = 10; 
$this->load->model('cita_pagination_model');
$this->PERFIL="Admin";
$this->USER_CONTROLLER="admin";
$this->load->library("search_patient_photo");
$this->load->library('user_agent');
   $this->load->model('login_model');
    $this->load->library("header_user");
    $this->load->library("pagination");
	 $this->load->library('form_validation'); 
$this->IS_ADMIN_CENTRO =$this->session->userdata('admin_position_centro');


 
}
	
	public function appointments2(){
		$this->header_user->headerAdmin(1);
$data = array(); 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->cita_pagination_model->getRows($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('admin_test/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        ); 
        $data['posts'] = $this->cita_pagination_model->getRows($conditions); 
         
        // Load the list page view 
        $this->load->view('testing-list', $data); 

}


function ajaxPaginationData(){ 
        // Define offset 
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 
         
        // Set conditions for search and filter 
        $keywords = $this->input->post('keywords'); 
        $sortBy = $this->input->post('sortBy'); 
        if(!empty($keywords)){ 
            $conditions['search']['keywords'] = $keywords; 
        } 
        if(!empty($sortBy)){ 
            $conditions['search']['sortBy'] = $sortBy; 
        } 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->cita_pagination_model->getRows($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('admin_test/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions['start'] = $offset; 
        $conditions['limit'] = $this->perPage; 
        unset($conditions['returnType']); 
        $data['posts'] = $this->cita_pagination_model->getRows($conditions); 
         
        // Load the data list view 
        $this->load->view('testing-list-data', $data, false); 
    } 






























}