<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_Search extends CI_Model{
    function __construct() {
   }

function searchPatient($search){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->where('nombre',$search);
 $this->db->or_where('id_p_a',$search);
 $this->db->or_where('cedula',$search);
 $query = $this->db->get();
  return $query->result();
}
}