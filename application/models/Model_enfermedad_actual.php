<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_enfermedad_actual extends CI_Model{

function __construct() {
      	$this->clinical_history = $this->load->database('clinical_history',TRUE);
	 }


public function show_enfermedad($id)  {
  $this->clinical_history->select('*');
  $this->clinical_history->from('h_c_enfermedad_actual');
  $this->clinical_history->where('id',$id);
   $query = $this->clinical_history->get();
  return $query->result();
}
 

function enfermedad($historial_id)
    {
$this->clinical_history->select('*');
$this->clinical_history->from('h_c_enfermedad_actual');
$this->clinical_history->where('historial_id',$historial_id);
//$this->clinical_history->group_by('filter_date');
$this->clinical_history->order_by('id', 'DESC');
$query = $this->clinical_history->get();
 return $query->result();
   }


	
}