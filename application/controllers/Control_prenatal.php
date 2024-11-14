<?php
    class Control_prenatal extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->ID_USER = $this->session->userdata('user_id');
			$this->load->library("user_register_info");
			$this->ID_PATIENT = $this->session->userdata('id_patient');
		   $this->load->model('model_control_prenatal');
			$this->clinical_history = $this->load->database('clinical_history',TRUE);
        }


        public function form()
        {
            
            $page = $this->input->get('page');
            $data['con_pren_data'] = $this->input->get('signo');
            $query_con_pren_data = $this->clinical_history->query("SELECT * FROM  h_c_control_prenatal WHERE id_registro=$page ORDER BY id ASC");
            $data['query_con_pren_data'] = $query_con_pren_data->result();
		//--IN THE CASE A PREGNANCY HAS BEEN ENDED DON'T DISABLE END PREGNANCY BUTTON
		
		$query_is_pregnant_end = $this->clinical_history->select('end_pregnancy')->where('id_registro',$page)->where('end_pregnancy',1)->get('h_c_control_prenatal_end_pregnancy')->row('end_pregnancy');
		  if($query_is_pregnant_end==1){
			  $data['end_preg_btn'] = 'disabled';
			  $data['end_preg_btn_text']='Embarazo esta finalizado';
		  }else{
			   $data['end_preg_btn'] = '';
			  $data['end_preg_btn_text']='Finalizar Embarazo'; 
		  }
		  
		  //----DISABLED NEW PREGANANCY BUTTON WHEN THERE IS ONE UNTERMINATED PREGNANCY
		  $query_to_diabled_show_btn = $this->clinical_history->select('end_pregnancy')->where('id_patient',$this->ID_PATIENT)->get('h_c_control_prenatal_end_pregnancy')->row('end_pregnancy');
		   $data['query_to_diabled_show_btn'] = $query_to_diabled_show_btn;
		   if($query_to_diabled_show_btn==1){
			  $data['disabled_new_preg'] = 'disabled';
			 
		  }else{
			   $data['disabled_new_preg'] = '';
			   
		  }
		  
		  $data['showCpBtnA'] = '';
		  $data['is_pregnant_end_'] = $query_is_pregnant_end;
		  
		  //--SELECT LAS SEMANA AMOREA TO INCREMENT BY ONE
		  
		  $semana_amorea = $this->clinical_history->select('semana')->where('historial_id',$this->ID_PATIENT)->order_by('id', 'desc')->limit(1)->get('h_c_control_prenatal')->row('semana');
		   $data['semana_amorea'] =floatval($semana_amorea) + 1;
			
			$this->load->view('clinical-history/ginecology/control-prenatal/form-data', $data);
             echo "<script> $('.spinner-border').hide()</script>";
        }

public function showBtnNewControlP(){
	
	echo '<button type="button" class="btn btn-primary"  id="newContPrenaForm">Nuevo Embarazo</button>'; 
}

   public function endPregnancy()
        {
            $id_registro=$this->input->get('id_registro');
			 $is_id_registro_found = $this->clinical_history->select('id_registro')->where('id_registro',$id_registro)->get('h_c_control_prenatal_end_pregnancy')->row('id_registro');
		  if($is_id_registro_found){
			$update = array(
					  'end_pregnancy' => 1,
					  'end_by'=>$this->ID_USER
						);
						
				      $where = array(
                    'id_registro' => $id_registro
                );

                $this->clinical_history->where($where);
                $this->clinical_history->update('h_c_control_prenatal_end_pregnancy', $update);
		  }else{
			$datap     = array(
			'id_patient' => $this->ID_PATIENT,
			'id_registro' =>$id_registro,
			'end_pregnancy' => 1,
			'start_by' => $this->ID_USER,
			'end_by' => $this->ID_USER,
			'end_time' => date('Y-m-d H:i:s')
			);

			$this->clinical_history->insert("h_c_control_prenatal_end_pregnancy", $datap);  
			}
		 $this->newForm();
        }



   public function newPregnancy()
        {
        $this->newForm();
        }

private function newForm(){
	 $data['showCpBtnA'] = "style='display:none'";
		  $data['is_pregnant_end'] = 1;
		  $data['con_pren_totals']=0;
		   $data['con_pren_data'] = 0;
		   $data['semana_amorea'] = '';
            $this->load->view('clinical-history/ginecology/control-prenatal/form', $data);
             echo "<script> $('.spinner-border').hide()</script>";
}


       
	   function reloadControlPrenatal(){
		   	$query_con_pren = $this->clinical_history->query("SELECT * FROM  h_c_control_prenatal WHERE historial_id=$this->ID_PATIENT GROUP BY id_registro ORDER BY inserted_time DESC");
		$query_con_pren_rows = $query_con_pren->result();
		$con_pren_totals = $query_con_pren->num_rows();
	       $params = array('id_paginate' => 'paginate-control-prenatal-li', 'rows' => $query_con_pren_rows, 'id' => 'id_registro', 'total' => $con_pren_totals);
    echo $this->user_register_info->control_prenatal_list_patients_registers_by_date($params);
	   }


public function controlPrenatalSave(){
	$fecha = $this->input->post('fecha');
             $semana = $this->input->post('semana');
                $peso = $this->input->post('peso');
                $tension_art_max = $this->input->post('tension_art_max');
                $tension_art_min = $this->input->post('tension_art_min');
                $alt_ult = $this->input->post('alt_ult');
                $pubis_f = $this->input->post('pubis_f');
                $pelv_tr = $this->input->post('pelv_tr');
                $lat_min = $this->input->post('lat_min');
                $mov_fet = $this->input->post('mov_fet');
                $edema = $this->input->post('edema');
                $varices = $this->input->post('varices');
                $otro = $this->input->post('otro');
                $evolution = $this->input->post('evolution');
               
              
                    $data     = array(
					 
                        'fecha' => $fecha,
                        'semana' => $semana,
                        'peso' => $peso,
                        'tension_art_max' => $tension_art_max,
                        'tension_art_min' => $tension_art_min,
                        'alt_ult' => $alt_ult,
                        'pubis_f' => $pubis_f,
                        'pelv_tr' => $pelv_tr,
                        'lat_min' => $lat_min,
                        'mov_fet' => $mov_fet,
                        'edema' => $edema,
                        'varices' => $varices,
                        'otro' => $otro,
                        'evolution' => $evolution,
						 'historial_id ' =>$this->ID_PATIENT, 
                        'inserted_by' => $this->ID_USER,
                        'inserted_time' => date('Y-m-d H:i:s'),
                        'updated_by' => $this->ID_USER,
                        'updated_time' => date('Y-m-d H:i:s')
                    );


                   $this->clinical_history->insert("h_c_control_prenatal", $data);
}




public function saveNewContPrena()
        {
			 if ($this->input->post('has_value') == 1) {
			
				 $this->controlPrenatalSave();
			   
				   $insert_id = $this->clinical_history->insert_id();
				   
				$update = array(
					  'id_registro' => $insert_id
						);
						
					  $where = array(
					'id' => $insert_id
				);

                $this->clinical_history->where($where);
                $this->clinical_history->update('h_c_control_prenatal', $update);
	
        $this->savePregnancyState($insert_id);
       echo '<i class="bi bi-check-lg text-success fs-4"></i>';
		  
		  
				
			 }
			
           
        }

public function saveNewContPrenaAgain()
        {
			 if ($this->input->post('has_value') == 1) {
			
				 $this->controlPrenatalSave();
			   
				   $insert_id = $this->clinical_history->insert_id();
				   
				$update = array(
					  'id_registro' => $this->input->post('id_registro')
						);
						
					  $where = array(
					'id' => $insert_id
				);

                $this->clinical_history->where($where);
                $this->clinical_history->update('h_c_control_prenatal', $update);
	
        $this->savePregnancyState($id_registro);
       echo '<i class="bi bi-check-lg text-success fs-4"></i>';
		  
		  
				
			 }
			
           
        }

private function savePregnancyState($id_registro){
			   
				 //----------SAVE IS PREGNANCY DONE CONDITIONNALLY-----
		$query_is_pregnant_end = $this->clinical_history->query("SELECT  id_registro FROM  h_c_control_prenatal_end_pregnancy WHERE id_registro=$id_registro");

if($query_is_pregnant_end->num_rows() == 0)
{
$datap     = array(
'id_patient' => $this->ID_PATIENT,
'id_registro' =>$id_registro,
'end_pregnancy' => 0,
'start_by' => $this->ID_USER,
'end_by' => $this->ID_USER,
'end_time' => date('Y-m-d H:i:s')
);

$this->clinical_history->insert("h_c_control_prenatal_end_pregnancy", $datap);
}	
}

 public function saveControlUpCprenatal()
        {
			  $fecha = $this->input->post('fecha');
                //echo $fecha;
                $semana = $this->input->post('semana');
                $peso = $this->input->post('peso');
                $tension_art_max = $this->input->post('tension_art_max');
                $tension_art_min = $this->input->post('tension_art_min');
                $alt_ult = $this->input->post('alt_ult');
                $pubis_f = $this->input->post('pubis_f');
                $pelv_tr = $this->input->post('pelv_tr');
                $lat_min = $this->input->post('lat_min');
                $mov_fet = $this->input->post('mov_fet');
                $edema = $this->input->post('edema');
                $varices = $this->input->post('varices');
                $otro = $this->input->post('otro');
                $evolution = $this->input->post('evolution');
                $position = $this->input->post('position');
				$id_cont_prena = $this->input->post('id_cont_prena');
				$updateArray = array();
                for ($i = 0; $i < count($fecha); ++$i) {
					$id_cont_prena1 = $id_cont_prena[$i];
                    $fecha1 = $fecha[$i];
                    $semana1 = $semana[$i];
                    $peso1 = $peso[$i];
                    $tension_art_max1 = $tension_art_max[$i];
                    $tension_art_min1 = $tension_art_min[$i];
                    $alt_ult1 = $alt_ult[$i];
                    $pubis_f1 = $pubis_f[$i];
                    $pelv_tr1 = $pelv_tr[$i];
                    $lat_min1 = $lat_min[$i];
                    $mov_fet1 = $mov_fet[$i];
                    $edema1 = $edema[$i];
                    $varices1 = $varices[$i];
                    $otro1 = $otro[$i];
                    $evolution1 = $evolution[$i];
                    $updateArray[]     = array(
					   'id' => $id_cont_prena1,
                        'fecha' => $fecha1,
                        'semana' => $semana1,
                        'peso' => $peso1,
                        'tension_art_max' => $tension_art_max1,
                        'tension_art_min' => $tension_art_min1,
                        'alt_ult' => $alt_ult1,
                        'pubis_f' => $pubis_f1,
                        'pelv_tr' => $pelv_tr1,
                        'lat_min' => $lat_min1,
                        'mov_fet' => $mov_fet1,
                        'edema' => $edema1,
                        'varices' => $varices1,
                        'otro' => $otro1,
                        'evolution' => $evolution1,
                        
                        'updated_by' => $this->ID_USER,
                        'updated_time' => date('Y-m-d H:i:s'),

                    );


                   // $this->clinical_history->insert("h_c_control_prenatal", $data);
                }

             $this->clinical_history->update_batch('h_c_control_prenatal',$updateArray, 'id'); 

                echo '<i class="bi bi-check-lg text-success fs-4"></i>';
				
				
			
           
        }









	   
		
	}


  
