<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_control_prenatal extends CI_Model {
    function __construct() {
      $this->clinical_history = $this->load->database('clinical_history', TRUE);
	  $this->ID_PATIENT = $this->session->userdata('id_patient');
	 }

   public function showBtnNewPregnancy($id_patient)
    {
	 $query_is_pregnant_end = $this->clinical_history->select('end_pregnancy')->where('id_patient',$id_patient)->where('end_pregnancy',0)->get('h_c_control_prenatal_end_pregnancy')->row('end_pregnancy');
    return $query_is_pregnant_end;
  
    }
	
	
}