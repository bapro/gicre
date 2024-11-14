<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emerg_eval_con extends CI_Controller {
public function __construct()
{
parent::__construct();
     $this->load->library('user_register_info_hospitalization'); 
	  $this->ID_PATIENT= $this->session->userdata('id_patient');
	$this->ID_USER = $this->session->userdata('user_id');
	  $this->ID_HOSP= $this->session->userdata('ID_HOSP');
	  	  $this->ID_CENTRO= $this->session->userdata('id_centro');
	   $this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
}

public function form() {
$page= $this->input->get('page');
$data['evcond_data'] = $page;

$query_evcond= $this->hospitalization_emgergency->query("SELECT * FROM emerg_eval_cond WHERE id=$page");
$data['query_evcond']=$query_evcond->result();

$this->load->view('emergency/clinical-history/evaluation-condition/form', $data);
echo "
<script>
$('.spinner-border').hide();
   $( '.form-select' ).select2( {
			theme: 'bootstrap-5',
			width: '100%',
			} );
</script>";
    
}


public function pagination() {
    $sql="SELECT * FROM emerg_eval_cond WHERE id_patient=$this->ID_PATIENT ORDER BY id DESC";
     $query= $this->hospitalization_emgergency->query($sql);
     
    $params = array('id_paginate' => 'paginate-evaCond-li', 'rows'=>$query->result(), 'id'=>'id', 'total'=>$query->num_rows());
        echo $this->user_register_info_hospitalization->list_patients_registers_by_date($params);
    
}



public function saveEvaluationCondition()
{
	if($this->input->post('condicion_general') =="" && $this->input->post('estado_conciencia')=="" ){
$response['status'] =  0;
 $response['message'] = 'Los campos con * son obligatorios!'; 
	}else{
$orient_tiempo= $this->input->post('orient_tiempo');
$orient_tiempo1 = (isset($orient_tiempo)) ? 1 : 0;

$orient_lugar= $this->input->post('orient_lugar');
$orient_lugar1 = (isset($orient_lugar)) ? 1 : 0;

$orient_pers= $this->input->post('orient_pers');
$orient_pers1 = (isset($orient_pers)) ? 1 : 0;	 
	 
	 
 $nauseas= $this->input->post('nauseas');
$nauseas1 = (isset($nauseas)) ? 1 : 0;	
 $vomitos= $this->input->post('vomitos');
$vomitos1 = (isset($vomitos)) ? 1 : 0;	
	 
 $saveeVon= array(
'condicion_general'=> $this->input->post('condicion_general'),
'estado_conciencia'=> $this->input->post('estado_conciencia'),
'orient_tiempo'=> $orient_tiempo1,
'orient_lugar'=> $orient_lugar1,
'orient_pers'=> $orient_pers1,
'comunicacion'=> $this->input->post('comunicacion'),
'val_neuro'=> $this->input->post('val_neuro'),
'estado_cardia'=> $this->input->post('estado_cardia'),
'est_respiratoria'=> $this->input->post('est_respiratoria'),
'oxinoterapia'=> $this->input->post('oxinoterapia'),
'terapia_resp'=> $this->input->post('terapia_resp'),
'sec_vias_resp'=> $this->input->post('sec_vias_resp'),
'sangrado'=> $this->input->post('sangrado'),
'tipo_sangrado'=> $this->input->post('tipo_sangrado'),
'presenta_dolor'=> $this->input->post('presenta_dolor'),
'canalizacion'=> $this->input->post('canalizacion'),
'drenajes'=> $this->input->post('drenaje'),
'eva_diuresis'=> $this->input->post('eva_diuresis'),
'nauseas'=> $nauseas1,
'vomitos'=> $vomitos1,
'vomitos_sel'=> $this->input->post('vomitos_sel'),
'drenaje_sonda_nas'=> $this->input->post('drenaje_sonda_nas'),
'drenaje_sonda_nas_sel'=> $this->input->post('drenaje_sonda_nas_sel'),
'evalucacion'=> $this->input->post('evalucacion'),
'evaluacion_sel'=> $this->input->post('evaluacion_sel'),
'diarrea'=> $this->input->post('diarrea'),
'val_abdomen'=> $this->input->post('val_abdomen'),
'peristalsis'=> $this->input->post('peristalsis'),
'alimentacion'=> $this->input->post('alimentacion'),
'alimentacion_sel'=> $this->input->post('alimentacion_sel'),
'coloracion'=> $this->input->post('coloracion'),
'eva_pulso'=> $this->input->post('eva_pulso'),
'eva_edema'=> $this->input->post('eva_edema'),
'val_piel'=> $this->input->post('val_piel'),
'cuidados_a'=> $this->input->post('cuidados_a'),
'movilizacion'=> $this->input->post('movilizacion'),
'notas'=> $this->input->post('eva_con_otros_notas'),
'id_centro'=>$this->ID_CENTRO,
'id_patient'=>$this->ID_PATIENT,
'updated_by'=> $this->input->post('updated_by'),
'inserted_by'=>$this->input->post('inserted_by'),
'inserted_time'=> $this->input->post('inserted_time'),
'updated_time'=>$this->input->post('updated_time'),
'notas'=> $this->input->post('notas'),
'id_hosp'=>$this->ID_HOSP


);

 
 if($this->input->post('id') > 0){
$where = array(
  'id' =>$this->input->post('id')
);

$this->hospitalization_emgergency->where($where);
$result=$this->hospitalization_emgergency->update('emerg_eval_cond',$saveeVon);
}else{
$result=$this->hospitalization_emgergency->insert('emerg_eval_cond',$saveeVon);	
}


if ($result)
{
	echo '<i class="bi bi-check-lg text-success fs-4"></i>';
  
}else{
 echo 'error';	
}
 
 
 
}
  
 
}






}