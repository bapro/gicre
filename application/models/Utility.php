<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Utility extends CI_Model
{

 function __construct() {
       // $this->userTbl = 'users';
	 }
  

 

	public function pacientes_por_provincias($limit, $start){
$this->db->select("*");
  $this->db->from('patients_appointments');
    $this->db->join('rendez_vous', 'patients_appointments.id_p_a = rendez_vous.id_patient');
  $this->db->where('doctor',293);
    $this->db->where('provincia',8);
	$this->db->group_by('id_patient');
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query->result();
} 
    

	public function total_pacientes_por_provincias(){
$this->db->select("*");
  $this->db->from('patients_appointments');
    $this->db->join('rendez_vous', 'patients_appointments.id_p_a = rendez_vous.id_patient');
  $this->db->where('doctor',293);
    $this->db->where('provincia',8);
	$this->db->group_by('id_patient');
  $query = $this->db->get();
  return $query->result();
}



}
