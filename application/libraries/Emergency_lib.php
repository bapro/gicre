<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emergency_lib {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				$this->CI->load->model('model_admin');
				$this->CI->load->library('header_user');
				$this->CI->load->library('get_table_data_by_id');
				$this->CI->load->library('create_forms');
				$this->ID_USER =$this->CI->session->userdata('user_id');
		  }



  public function patients_admitted_page($value){
	  $data['desde']=$value['desde'];
 $data['hasta']=  $value['hasta'];
  $data['centro']= $value['centro'];
 $data['table_title']= $value['table_title'];
  $data['origine']= $value['origine'];
[$result_centro_medicos_cita]= $this->CI->create_forms->getCentroMedicoForCitaS(0);
$data['filter_by_centro']= $result_centro_medicos_cita;
  	$this->CI->load->view('emergency/patient-list', $data);  
		  
	  }
	



  public function menu_mas_admitted_patients($id, $id_patient, $centro, $doc, $origine){
	   $go_to_hist ='<a class="dropdown-item"   href="'.site_url()."emergency/clinic_history/".encrypt_url($id).'/'.encrypt_url($id_patient).'/'.encrypt_url($centro).'/'.encrypt_url($doc).'/'.encrypt_url($origine).'" title="Historia clinica">Historia Clinica</a>';
	    $go_to_orden ='<button class="dropdown-item"  data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#largeModalOrdenMedica" title="Orden Medica">Orden Medica</button>';
	  $go_to_notas ='<a  class="dropdown-item" href="'.$id_patient.'" title="Notas de Evolución">Notas de Evolución</a>';
		$go_to_des_qui ='<a  class="dropdown-item" href="'.$id_patient.'" title="Descripción Quirúrgica">Descripción Quirúrgica</a>';
		$go_to_kardex ='<button  class="dropdown-item"  data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#largeModalKardex"  title="KARDEX">Kardex</button>';
		 $go_to_insumo ='<button class="dropdown-item"  data-id="'.$id.'" data-bs-toggle="modal" data-bs-target="#largeModalInsumo" title="INSUMO">Insumo</button>';
	
		
		
		$actions = "
		<li>$go_to_hist</li>
	
		
		";
		
		return $actions;
		  
	  }	  
	  
	  


}
				
