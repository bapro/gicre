<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_paginate_citas extends CI_Model{
    
    function __construct() {
        // Set table name
      
    }
    
   	public function getConfirmSolicitudTestSpeed($limit, $start, $centro){
$this->db->select("*");
  $this->db->from('rendez_vous');
  $this->db->where('confirmada',0);
   $this->db->where('filter_date',date("Y-m-d"));
   if($centro){
	$this->db->where('centro',$centro);  
  }
  $this->db->where('cancelar',0);
  $this->db->order_by('id_apoint', 'desc');
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query->result();
}

}