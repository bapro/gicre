<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_clinical_hist extends CI_Model{
function __construct() {
      	$this->clinical_history = $this->load->database('clinical_history',TRUE);
	 }
public function count_total_each_table($id_sala){
$query_drugs = $this->clinical_history->query("SELECT * FROM orden_medica_recetas WHERE id_sala=$id_sala");
    
$num_drugs =  ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query_drugs->num_rows().' registro(s)</span> ';

$query_est = $this->clinical_history->query("SELECT * FROM orden_medica_estudios WHERE id_sala=$id_sala");
$num_est = ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query_est->num_rows().' registro(s)</span> ';

$query_lab = $this->clinical_history->query("SELECT * FROM orden_medcia_lab WHERE id_sala=$id_sala");
$num_lab = ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query_lab->num_rows().' registro(s)</span> ';

$query_mg = $this->clinical_history->query("SELECT * FROM ord_med_med_gen WHERE id_sala=$id_sala");
$num_mg = ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query_mg->num_rows().' registro(s)</span> ';
return [$num_drugs, $num_est, $num_lab, $num_mg];


}


	
}