<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_conclusion_diagno extends CI_Model{
function __construct() {
      	$this->clinical_history = $this->load->database('clinical_history',TRUE);
	 }
	public function concluciones($historial_id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_conclusion_diagno');
 $this->clinical_history->where('historial_id',$historial_id);
  $this->clinical_history->order_by('id', 'desc');
 $query = $this->clinical_history->get();
 return $query->result();
}

public function show_con_by_id($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_conclusion_diagno');
  $this->clinical_history->where('id',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}



	
}