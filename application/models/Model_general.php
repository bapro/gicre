<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_general extends CI_Model{
	 private $padron_database;
    function __construct() {
           $this->padron_database = $this->load->database('padron',TRUE);
	 }

   public function calculatePatientAge($birthday)
    {
		//$birthday='2023-02-03';
		
		if(strtotime($birthday)){
	$diff = date_diff(date_create(), date_create($birthday));
		
    $years = $diff->format("%y");
    $months = $diff->format("%m");
    $days = $diff->format("%d");

    if ($years) {
        $age_complete = ($years < 2) ? '1 año' : "$years años $months mese(s), $days día(s)";
    } else {
        $age_complete = '';
        if ($months) $age_complete .= ($months < 2) ? '1 mes ' : "$months mese(s), $days día(s)";
        if ($days) $age_complete .= ($days < 2) ? '1 día' : "$days día(s)";
    }
	
	$data = array(
	'birthday'=> $birthday,
	'age_complete'=> $age_complete
	);
		
	return $data;
		}else{
			$data = array(
	'birthday'=> '00-00-0000',
	'age_complete'=> 'error, vuelve a elegir la fecha.'
	);
		return $data;
		}
	
	
	}
	
	
function findPatientByNombreGicre($postData){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->like('nombre',$postData['nombres']);
 if($postData['apellidos'] !=""){
$this->db->like('nombre',$postData['apellidos']);
}

 if($postData['apellidos2'] !=""){
$this->db->like('nombre',$postData['apellidos2']);
}
 $this->db->order_by('nombre','ASC');
 $query = $this->db->get();
  return $query->result();
}


function findPatientByNombreGicreCount($postData){
$this->db->select("*");
  $this->db->from('patients_appointments');
 $this->db->like('nombre',$postData['nombres']);
 if($postData['apellidos'] !=""){
$this->db->like('nombre',$postData['apellidos']);
}

 if($postData['apellidos2'] !=""){
$this->db->like('nombre',$postData['apellidos2']);
};
 $query = $this->db->get();
  return $query->num_rows();
}

	
	
}