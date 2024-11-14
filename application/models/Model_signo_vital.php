<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_signo_vital extends CI_Model{
  function __construct() {
      	$this->clinical_history = $this->load->database('clinical_history',TRUE);
	 }
	 
	public function signos_vitales($historial_id, $eva_cardio){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_signo_vitales');
 $this->clinical_history->where('id_patient',$historial_id);
  $this->clinical_history->where('eva_cardio',$eva_cardio);
  $this->clinical_history->order_by('id', 'desc');
 $query = $this->clinical_history->get();
 return $query->result();
}

public function signos_vitales_by_id($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_signo_vitales');
  $this->clinical_history->where('id',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}

public function signos_vitales_by_id_result($id){
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_signos_vitales_results');
  $this->clinical_history->where('id_sig',$id);
 $query = $this->clinical_history->get();
 return $query->result();
}

	
}