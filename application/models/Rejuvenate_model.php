<?php

class Rejuvenate_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $username
    * @param string $password
    * @return void
    */

    /*Check Login*/


function fetch_patient_billing($id)
 {
 /* $this->db->order_by('id_p_a', 'DESC');
  $this->db->limit(10);
  return $this->db->get('patients_appointments');
  
  $this->db->order_by('idfac', 'DESC');
   $this->db->where('id2',$id);
 $this->db->where('canceled',0);
  return $this->db->get('factura');*/
  
  
  $this->db->select("*");
  $this->db->from('factura_view');
 $this->db->where('id2',$id);
 $this->db->where('canceled',0);
 $this->db->order_by('idfac','desc');
  $query = $this->db->get();
  return $query->result();
  
  
  
  
  
 }
		
}