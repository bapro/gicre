<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_alergy extends CI_Model{
function __construct() {
      	$this->clinical_history = $this->load->database('clinical_history',TRUE);
	 }
	public function saveAlergyTotal($id_patient){
$this->clinical_history->where('id_patient', $id_patient);
			$query = $this->clinical_history->get('h_c_alergy');
			return $query->num_rows();
}


	public function saveUsualDrugTotal($id_patient){
$this->clinical_history->where('id_patient', $id_patient);
			$query = $this->clinical_history->get('h_c_usual_drug');
			return $query->num_rows();
}



}