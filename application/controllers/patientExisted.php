<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PatientExisted extends CI_Controller {
public function __construct()
{
parent::__construct();


}

public function redirecting($nsss)
	{
	echo 	$nsss;
	/*$patient_id= $this->db->select('patient_id')->where('input_name',$nsss)->get('saveinput')->row('patient_id');	
		$patData= $this->db->select('centro, doctor')->where('id_patient',$patient_id)->get('rendez_vous')->row_array();
		$id_cm=$patData['centro'];
		$doc=$patData['doctor'];
		redirect("medico/patient_data/$patient_id/$id_cm/$doc");*/
	}
	
	




}