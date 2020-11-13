<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_emergencia extends CI_Model{
function __construct() {
}

public function emergency_patients($id){
$this->db->select("*");
$this->db->from('emergency_patients');
$this->db->where('enviado_a',$id);
$this->db->where('worked',0);
$this->db->order_by('id_ep','desc');
$query = $this->db->get();
return $query->result();
}


public function emergency_patient($id){
$this->db->select("*");
$this->db->from('emergency_patients');
$this->db->where('id_pat',$id);
$this->db->order_by('id_ep','desc');
$query = $this->db->get();
return $query->result();
}


public function count_emergency_patient_doc($id,$centro){
$this->db->select("*");
$this->db->from('emergency_patients');
$this->db->where('id_pat',$id);
$this->db->where('centro',$centro);
$query = $this->db->get();
return $query->result();
}



}