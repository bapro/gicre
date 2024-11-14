<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emerg_exam_fisico extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
  $this->load->library('user_register_info_hospitalization'); 
  $this->ID_CENTRO = $this->session->userdata('id_centro');
 $this->ID_PATIENT= $this->session->userdata('id_patient');
	$this->ID_USER = $this->session->userdata('user_id');
    $this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
}


 function saveExamenFisico()
        {

             $rowSigNota= array(
			     'motivo_emergencia' => $this->input->post('motivo_emergencia'),
                    'hallazgo' => $this->input->post('hallazgo'),
                     'updated_by' => $this->input->post('updated_by'),
                    'inserted_by' => $this->input->post('inserted_by'),
                    'inserted_time' =>$this->input->post('inserted_time'),
                    'updated_time' => $this->input->post('updated_time'),
                    'id_patient' => $this->ID_PATIENT,
					'centro'=> $this->ID_CENTRO
					);
	

                if ($this->input->post('idExF') == 0) {
                 //INSERT NOTA
                   $this->hospitalization_emgergency->insert('emerg_exam_fisico', $rowSigNota);
                   $id_exam_fisico = $this->hospitalization_emgergency->insert_id();

                   //INSERT SIGNO VITALES
				   
				        $rowSigVit = array(
                    'peso' => $this->input->post('signo_v_peso_lb'),
                    'kg' => $this->input->post('signo_v_peso_kg'),
                    'talla' => $this->input->post('signo_v_talla'),
                    'imc' => $this->input->post('signo_v_talla_imc'),
                    'talla_imc' => $this->input->post('signo_v_talla_m'),
                    'ta' => $this->input->post('signo_v_ta_mm'),
					'signo_sat'=>$this->input->post('signo_sat'),
					'signo_fcf'=>$this->input->post('signo_fcf'),
                    'fr' => $this->input->post('signo_v_fr'),
                    'fc' => $this->input->post('signo_v_fc'),
                    'hg' => $this->input->post('signo_v_ta_hg'),
                    'tempo' => $this->input->post('signo_v_temp'),
                    'pulso' => $this->input->post('signo_v_pulso'),
                    'signo_v_per_cef' => $this->input->post('signo_v_per_cef'),
                    'signo_v_sat_ox' => $this->input->post('signo_v_sat_ox'),
					'id_exam_fisico' => $id_exam_fisico,
					'presion_media' =>$this->input->post('presion_media')

                );

				    $this->hospitalization_emgergency->insert('emerg_signo_vitales', $rowSigVit);
                    
                    $rowSigVitRslt = array(
                        'fr' => $this->input->post('signo_fr_result'),
                        'fc' => $this->input->post('signo_fc_result'),
                        'ft' => $this->input->post('signo_temp_result'),
                        'sist' => $this->input->post('tens_art_sis_result'),
                        'diast' => $this->input->post('tens_art_dias_result'),
                         'id_sig' => $id_exam_fisico
                    );
                    $this->hospitalization_emgergency->insert('emerg_signos_vitales_results', $rowSigVitRslt);
                } else {
					 $this->hospitalization_emgergency->where('id', $this->input->post('idExF'));
                    $this->hospitalization_emgergency->update('emerg_exam_fisico', $rowSigNota);
					
					    $rowSigVit = array(
                    'peso' => $this->input->post('signo_v_peso_lb'),
                    'kg' => $this->input->post('signo_v_peso_kg'),
                    'talla' => $this->input->post('signo_v_talla'),
                    'imc' => $this->input->post('signo_v_talla_imc'),
                    'talla_imc' => $this->input->post('signo_v_talla_m'),
                    'ta' => $this->input->post('signo_v_ta_mm'),
					'signo_sat'=>$this->input->post('signo_sat'),
					'signo_fcf'=>$this->input->post('signo_fcf'),
                    'fr' => $this->input->post('signo_v_fr'),
                    'fc' => $this->input->post('signo_v_fc'),
                    'hg' => $this->input->post('signo_v_ta_hg'),
                    'tempo' => $this->input->post('signo_v_temp'),
                    'pulso' => $this->input->post('signo_v_pulso'),
                    'signo_v_per_cef' => $this->input->post('signo_v_per_cef'),
                    'signo_v_sat_ox' => $this->input->post('signo_v_sat_ox'),
					'presion_media' =>$this->input->post('presion_media')
				 );
                    $this->hospitalization_emgergency->where('id_exam_fisico', $this->input->post('idExF'));
                    $this->hospitalization_emgergency->update('emerg_signo_vitales', $rowSigVit);
                    $row = array(
                        'fr' => $this->input->post('signo_fr_result'),
                        'fc' => $this->input->post('signo_fc_result'),
                        'ft' => $this->input->post('signo_temp_result'),
                        'sist' => $this->input->post('tens_art_sis_result'),
                        'diast' => $this->input->post('tens_art_dias_result'),
                       
                    );
                    $this->hospitalization_emgergency->where('id_sig', $this->input->post('idExF'));
                    $this->hospitalization_emgergency->update('emerg_signos_vitales_results', $row);
                   
                }
				echo '<i class="bi bi-check  text-green" ></i>';
           
        }



public function form() {
$data['id_user']=$this->ID_USER;
$page= $this->input->get('page');
$data['ex_fis_data'] = $page;

$sql="SELECT *, emerg_exam_fisico.id AS idSearch FROM emerg_exam_fisico INNER JOIN  emerg_signo_vitales ON emerg_exam_fisico.id = emerg_signo_vitales.id_exam_fisico WHERE emerg_exam_fisico.id=$page";
$query_ex_fis= $this->hospitalization_emgergency->query($sql);
$data['query_ex_fis']=$query_ex_fis->result();


$sqlSr="SELECT * FROM emerg_signos_vitales_results WHERE id_sig=$page";
$signos_vitales_by_id_result= $this->hospitalization_emgergency->query($sqlSr);
$data['signos_vitales_by_id_result']=$signos_vitales_by_id_result->result();
$data['isOut']= $this->hospitalization_emgergency->select('id_hosp')->where('id_hosp', $this->session->userdata('ID_HOSP'))->get('emerg_conclusion_ingreso')->row('id_hosp');
$this->load->view('emergency/clinical-history/examen-fisico/form', $data);
echo "<script>$('.spinner-border').hide()</script>";
    
}


public function pagination() {
    $sql="SELECT * FROM emerg_exam_fisico WHERE id_patient=$this->ID_PATIENT AND centro=$this->ID_CENTRO ORDER BY id DESC";
     $query= $this->hospitalization_emgergency->query($sql);
     
    $params = array('id_paginate' => 'paginate-examfisico-li', 'rows'=>$query->result(), 'id'=>'id', 'total'=>$query->num_rows());
        echo $this->user_register_info_hospitalization->list_patients_registers_by_date($params);
    
}




}