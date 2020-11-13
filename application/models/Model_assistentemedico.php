<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_assistentemedico extends CI_Model{
   
   
 
function getAsistenteCentro($iduser)
    {
   $this->db->select('*'); 
  $this->db->from('medical_centers');
  $this->db->join('asistent_medico_centro', 'medical_centers.id_m_c = asistent_medico_centro.idcentro');
  $this->db->where('iduser',$iduser);
  $query = $this->db->get();
        return $query->result();
 }
 
 function getAsistenteAp()
    {
   $this->db->select('*'); 
  $this->db->from('patients_appointments');
  //$this->db->join('medical_centers', 'seguro_centro.id_centro = medical_centers.id_m_c');
  //$this->db->where('id_seguro',$id_seguro);
  $query = $this->db->get();
        return $query->result();
 }

	
}