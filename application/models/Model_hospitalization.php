<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_hospitalization extends CI_Model{

 function __construct() {
      	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency',TRUE);
		 $this->ID_CENTRO =$this->session->userdata('id_centro');
		     $this->ID_PATIENT =$this->session->userdata('id_patient');
	 }


public function count_total_each_table($id){
$query_drugs = $this->hospitalization_emgergency->query("SELECT * FROM hosp_orden_medica_recetas WHERE  historial_id=$this->ID_PATIENT AND id_register=$id AND  canceled=0");
    
$num_drugs =  ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query_drugs->num_rows().' registro(s)</span> ';

$query_est = $this->hospitalization_emgergency->query("SELECT * FROM hosp_orden_medica_estudios WHERE historial_id=$this->ID_PATIENT AND id_register=$id AND  canceled=0");
$num_est = ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query_est->num_rows().' registro(s)</span> ';

$query_lab = $this->hospitalization_emgergency->query("SELECT * FROM hosp_orden_medcia_lab WHERE historial_id=$this->ID_PATIENT AND id_register=$id AND  canceled=0");
$num_lab = ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query_lab->num_rows().' registro(s)</span> ';

$query_mg = $this->hospitalization_emgergency->query("SELECT * FROM hosp_ord_med_gen WHERE id_patient=$this->ID_PATIENT AND id_register=$id  AND  canceled=0");
$num_mg = ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query_mg->num_rows().' registro(s)</span> ';
return [$num_drugs, $num_est, $num_lab, $num_mg];


}














	
}