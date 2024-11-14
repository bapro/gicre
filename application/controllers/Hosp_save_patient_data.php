<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hosp_save_patient_data extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('navigation/account_demand_model');
$this->load->library('email');
 $this->load->helper('email');
  $this->load->library('form_validation'); 
  $this->padron_database = $this->load->database('padron',TRUE);
}

public function saveHospDischargePat(){
	$savefields;
	 $id_patient =$this->input->post('id_patient');
   $id_user= $this->input->post('id_user');
   $id_centro= $this->input->post('id_centro');
   $id_hosp=$this->input->post('id_hosp');
  $inserted_by=$this->input->post('id_user');
  $updated_by=$this->input->post('id_user');
  $inserted_time=date("Y-m-d H:i:s");
	$hallazgo= $this->input->post('hallazgo');
	/*Conclusión Del Egreso*/
	$resumen_hallasgos= $this->input->post('resumen_hallasgos');
	$resumen_intervenciones= $this->input->post('resumen_intervenciones');
	$condicion_alta= $this->input->post('condicion_alta');
	$causa_egreso= $this->input->post('causa_egreso');
	$destino_referimiento= $this->input->post('destino_referimiento');
	$diag_alta_diag1= $this->input->post('diag_alta_diag1');
	$diag_alta_diag2= $this->input->post('diag_alta_diag2');
	
	$infeccion_herida1= $this->input->post('infeccion_herida');
$infeccion_herida = (isset($infeccion_herida1)) ? 1 : 0;

$morta_post1= $this->input->post('morta_post');
$morta_post = (isset($morta_post1)) ? 1 : 0;

$morta_int1= $this->input->post('morta_int');
$morta_int = (isset($morta_int1)) ? 1 : 0;
	
	 $response['page'] =  'guardarConAlta';
 if($resumen_hallasgos==""){
$response['status'] =  2;
$response['message'] = 'Campo <strong>Resumen de los hallasgos</strong> de la Conclusión Del Egreso es obligatorio!';
$savefields=0;
}

else if($resumen_intervenciones==""){
$response['status'] =  3;
$response['message'] = 'Campo <strong>Resumen de intervenciones</strong> de la Conclusión Del Egreso es obligatorio!';	
$savefields=0;
} 

else if($condicion_alta==""){
$response['status'] =  4;
$response['message'] = 'Campo <strong>Condición De Alta</strong>  de la Conclusión Del Egreso es obligatorio!';	
$savefields=0;
}

else if($causa_egreso==""){
$response['status'] =  5;
$response['message'] = 'Campo <strong>Causa De Egresos</strong> de la Conclusión Del Egreso es obligatorio!';
$savefields=0;
}

else if($destino_referimiento==""){
$response['status'] =  6;
$response['message'] = 'Campo <strong>Destino/Referimiento</strong>  de la Conclusión Del Egreso es obligatorio!';	
$savefields=0;
}

else if($diag_alta_diag1==""){
$response['status'] =  7;
$response['message'] = 'Campo <strong>DIAGNOSTICO(1)</strong> de la Conclusión Del Egreso es obligatorio!';	
$savefields=0;
}

else{

$conEg = array(
  'resumen_hallasgos'=> $this->input->post('resumen_hallasgos'),
  'resumen_intervenciones'=> $this->input->post('resumen_intervenciones'),
  'condicion_alta'=> $this->input->post('condicion_alta'),
  'causa_egreso'=> $this->input->post('causa_egreso'),
  'destino_referimiento'=> $this->input->post('destino_referimiento'),
  'diagnostico_autopsia'=> $this->input->post('diagnostico_autopsia'),
  'equipo_medico'=> $this->input->post('equipo_medico'),
  'diag_alta_diag1'=> $this->input->post('diag_alta_diag1'),
   'diag_alta_diag2'=> $this->input->post('diag_alta_diag2'),
  'infeccion_herida'=> $infeccion_herida,
  'morta_post'=> $morta_post,
  'morta_int'=> $morta_int,
   'diag_alta_diag3'=> $this->input->post('diag_alta_diag3'),
   'diag_alta_diag4'=> $this->input->post('diag_alta_diag4'),
   'id_patient' =>$id_patient,
   'id_user'=> $id_user,
   'id_centro'=> $id_centro,
   'id_hosp'=> $id_hosp,
  'inserted_by'=> $id_user,
  'updated_by'=> $id_user,
  'inserted_time'=> $inserted_time,
  'updated_time'=> $inserted_time
);

$this->db->insert("hosp_conclusion_ingreso",$conEg);	

$data = array(
  'alta'=>1,
  'fecha_alta' =>$inserted_time
);

$where= array(
  'id' =>$id_hosp
);

$this->db->where($where);
$this->db->update("hospitalization_data",$data);
	
}
echo json_encode($response);	

}

 

 

		
	
}