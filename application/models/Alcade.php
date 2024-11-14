<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Alcade extends CI_Model{
  function __construct() {
        // Set table name

    }
    
  
	public function getCoordinadores($limit, $start){
$this->db->select("*");
  $this->db->from('soto_coordinador');
  $this->db->order_by('nombres', 'ASC');
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query->result();
}


public function showCoordinadores(){
$this->db->select("*");
  $this->db->from('soto_coordinador');
  $this->db->order_by('nombres', 'ASC');
  $query = $this->db->get();
  return $query->result();
}



}