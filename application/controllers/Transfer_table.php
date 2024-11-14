<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Transfer_table extends CI_Controller { 
 public function __construct()
 {
  parent::__construct();
$this->db_gicre = $this->load->database('gicre', TRUE);
  
 }

 
 //get all demands
 public function index(){
 
 
 
  $name = $this->db_gicre->select('name')->where('id_user', 372)->get('users')->row('name');
  echo  $name;
 }
 
 

 
 
 
 
 
 
}