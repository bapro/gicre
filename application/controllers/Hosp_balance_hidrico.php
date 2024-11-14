<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hosp_balance_hidrico extends CI_Controller {
public function __construct()
{
parent::__construct();

  $this->load->library('form_validation'); 
}


public function saveTurno72(){
	$total1=$this->input->post('turno72_23');
	$total2=$this->input->post('turno72_24');
	$total3=$this->input->post('turno72_25');
	$total4=$this->input->post('turno72_46');
	$total5=$this->input->post('turno72_47');
	if($total1 > 0 || $total2 > 0 || $total3 >0 || $total4 > 0 || $total5 > 0 ){
if($this->input->post('id_turno72') ==''){		
$save = array(
'turno72_1'=> $this->input->post('turno72_1'),
'turno72_2'=> $this->input->post('turno72_2'),
'turno72_3'=> $this->input->post('turno72_3'),
'turno72_4' => $this->input->post('turno72_4'),
'turno72_5' => $this->input->post('turno72_5'),
'turno72_6' => $this->input->post('turno72_6'),
'turno72_4_' =>$this->input->post('turno72_4_'),
'turno72_7' =>$this->input->post('turno72_7'),
'turno72_8' =>$this->input->post('turno72_8'),
'turno72_9' =>$this->input->post('turno72_9'),
'turno72_10'=> $this->input->post('turno72_10'),
'turno72_11'=> $this->input->post('turno72_11'),
'turno72_12'=> $this->input->post('turno72_12'),
'turno72_13' => $this->input->post('turno72_13'),
'turno72_14' => $this->input->post('turno72_14'),
'turno72_15' => $this->input->post('turno72_15'),
'turno72_16' =>$this->input->post('turno72_16'),
'turno72_17' =>$this->input->post('turno72_17'),
'turno72_18' =>$this->input->post('turno72_18'),
'turno72_19' =>$this->input->post('turno72_19'),
'turno72_19_'=> $this->input->post('turno72_19_'),
'turno72_20'=> $this->input->post('turno72_20'),
'turno72_21'=> $this->input->post('turno72_21'),
'turno72_22' => $this->input->post('turno72_22'),
'turno72_23' => $this->input->post('turno72_23'),
'turno72_24' => $this->input->post('turno72_24'),
'turno72_25' =>$this->input->post('turno72_25'),
'turno72_26' =>$this->input->post('turno72_26'),
'turno72_27' =>$this->input->post('turno72_27'),
'turno72_28' =>$this->input->post('turno72_28'),
'turno72_29'=> $this->input->post('turno72_29'),
'turno72_30'=> $this->input->post('turno72_30'),
'turno72_31'=> $this->input->post('turno72_31'),
'turno72_32' => $this->input->post('turno72_32'),
'turno72_33' => $this->input->post('turno72_33'),
'turno72_34' => $this->input->post('turno72_34'),
'turno72_35' =>$this->input->post('turno72_35'),
'turno72_36' =>$this->input->post('turno72_36'),
'turno72_37' =>$this->input->post('turno72_37'),
'turno72_38' =>$this->input->post('turno72_38'),
'turno72_39'=> $this->input->post('turno72_39'),
'turno72_40'=> $this->input->post('turno72_40'),
'turno72_41'=> $this->input->post('turno72_41'),
'turno72_42' => $this->input->post('turno72_42'),
'turno72_43' => $this->input->post('turno72_43'),
'turno72_44' => $this->input->post('turno72_44'),
'turno72_45' =>$this->input->post('turno72_45'),
'turno72_46' =>$this->input->post('turno72_46'),
'turno72_47' =>$this->input->post('turno72_47'),
'turno_72_egreso_t'=> $this->input->post('turno_72_egreso_t'),
'turno_72_ingreso_t'=> $this->input->post('turno_72_ingreso_t'),
'turno_72_balance'=> $this->input->post('turno_72_balance'),
'inserted_by' => $this->input->post('user_id'),
'updated_by' => $this->input->post('user_id'),
'inserted_time' =>date("Y-m-d H:i:s"),
'updated_time' =>date("Y-m-d H:i:s"),
'id_patient' => $this->input->post('id_patient'),
'centro_id' => $this->input->post('centro_id')
);
$this->db->insert("hosp_balance_hidrico_t72",$save);


if($this->db->affected_rows() > 0){
$response['message'] = 'guadado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  0;
 $response['message'] = 'lo siento, no se ha guadado!'; 
}
	}else{

$update = array(
'turno72_1'=> $this->input->post('turno72_1'),
'turno72_2'=> $this->input->post('turno72_2'),
'turno72_3'=> $this->input->post('turno72_3'),
'turno72_4' => $this->input->post('turno72_4'),
'turno72_5' => $this->input->post('turno72_5'),
'turno72_6' => $this->input->post('turno72_6'),
'turno72_4_' =>$this->input->post('turno72_4_'),
'turno72_7' =>$this->input->post('turno72_7'),
'turno72_8' =>$this->input->post('turno72_8'),
'turno72_9' =>$this->input->post('turno72_9'),
'turno72_10'=> $this->input->post('turno72_10'),
'turno72_11'=> $this->input->post('turno72_11'),
'turno72_12'=> $this->input->post('turno72_12'),
'turno72_13' => $this->input->post('turno72_13'),
'turno72_14' => $this->input->post('turno72_14'),
'turno72_15' => $this->input->post('turno72_15'),
'turno72_16' =>$this->input->post('turno72_16'),
'turno72_17' =>$this->input->post('turno72_17'),
'turno72_18' =>$this->input->post('turno72_18'),
'turno72_19' =>$this->input->post('turno72_19'),
'turno72_19_'=> $this->input->post('turno72_19_'),
'turno72_20'=> $this->input->post('turno72_20'),
'turno72_21'=> $this->input->post('turno72_21'),
'turno72_22' => $this->input->post('turno72_22'),
'turno72_23' => $this->input->post('turno72_23'),
'turno72_24' => $this->input->post('turno72_24'),
'turno72_25' =>$this->input->post('turno72_25'),
'turno72_26' =>$this->input->post('turno72_26'),
'turno72_27' =>$this->input->post('turno72_27'),
'turno72_28' =>$this->input->post('turno72_28'),
'turno72_29'=> $this->input->post('turno72_29'),
'turno72_30'=> $this->input->post('turno72_30'),
'turno72_31'=> $this->input->post('turno72_31'),
'turno72_32' => $this->input->post('turno72_32'),
'turno72_33' => $this->input->post('turno72_33'),
'turno72_34' => $this->input->post('turno72_34'),
'turno72_35' =>$this->input->post('turno72_35'),
'turno72_36' =>$this->input->post('turno72_36'),
'turno72_37' =>$this->input->post('turno72_37'),
'turno72_38' =>$this->input->post('turno72_38'),
'turno72_39'=> $this->input->post('turno72_39'),
'turno72_40'=> $this->input->post('turno72_40'),
'turno72_41'=> $this->input->post('turno72_41'),
'turno72_42' => $this->input->post('turno72_42'),
'turno72_43' => $this->input->post('turno72_43'),
'turno72_44' => $this->input->post('turno72_44'),
'turno72_45' =>$this->input->post('turno72_45'),
'turno72_46' =>$this->input->post('turno72_46'),
'turno72_47' =>$this->input->post('turno72_47'),
'turno_72_egreso_t'=> $this->input->post('turno_72_egreso_t'),
'turno_72_ingreso_t'=> $this->input->post('turno_72_ingreso_t'),
'turno_72_balance'=> $this->input->post('turno_72_balance'),
'updated_by' => $this->input->post('user_id'),
'updated_time' =>date("Y-m-d H:i:s"),

);

$where= array(
  'id' =>$this->input->post('id_turno72')
);

$this->db->where($where);
$this->db->update("hosp_balance_hidrico_t72",$update);

if($this->db->affected_rows() > 0){
$response['message'] = 'actualizado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  0;
 $response['message'] = 'lo siento, no se actualizo!'; 
}
}

}else{
	$response['status'] =  2;
	   $response['message'] = 'los campos son vacios!'; 
}

echo json_encode($response);
}




public function saveTurno29(){
	$total1=$this->input->post('turno29_23');
	$total2=$this->input->post('turno29_24');
	$total3=$this->input->post('turno29_25');
	$total4=$this->input->post('turno29_46');
	$total5=$this->input->post('turno29_47');
	if($total1 > 0 || $total2 > 0 || $total3 >0 || $total4 > 0 || $total5 > 0 ){	
	if($this->input->post('id_turno29') ==''){
$save = array(
'turno29_1'=> $this->input->post('turno29_1'),
'turno29_2'=> $this->input->post('turno29_2'),
'turno29_3'=> $this->input->post('turno29_3'),
'turno29_4' => $this->input->post('turno29_4'),
'turno29_5' => $this->input->post('turno29_5'),
'turno29_6' => $this->input->post('turno29_6'),
'turno29_4_' =>$this->input->post('turno29_4_'),
'turno29_7' =>$this->input->post('turno29_7'),
'turno29_8' =>$this->input->post('turno29_8'),
'turno29_9' =>$this->input->post('turno29_9'),
'turno29_10'=> $this->input->post('turno29_10'),
'turno29_11'=> $this->input->post('turno29_11'),
'turno29_12'=> $this->input->post('turno29_12'),
'turno29_13' => $this->input->post('turno29_13'),
'turno29_14' => $this->input->post('turno29_14'),
'turno29_15' => $this->input->post('turno29_15'),
'turno29_16' =>$this->input->post('turno29_16'),
'turno29_17' =>$this->input->post('turno29_17'),
'turno29_18' =>$this->input->post('turno29_18'),
'turno29_19' =>$this->input->post('turno29_19'),
'turno29_19_'=> $this->input->post('turno29_19_'),
'turno29_23' => $this->input->post('turno29_23'),
'turno29_24' => $this->input->post('turno29_24'),
'turno29_25' =>$this->input->post('turno29_25'),
'turno29_26' =>$this->input->post('turno29_26'),
'turno29_27' =>$this->input->post('turno29_27'),
'turno29_28' =>$this->input->post('turno29_28'),
'turno29_29'=> $this->input->post('turno29_29'),
'turno29_30'=> $this->input->post('turno29_30'),
'turno29_31'=> $this->input->post('turno29_31'),
'turno29_32' => $this->input->post('turno29_32'),
'turno29_33' => $this->input->post('turno29_33'),
'turno29_34' => $this->input->post('turno29_34'),
'turno29_35' =>$this->input->post('turno29_35'),
'turno29_36' =>$this->input->post('turno29_36'),
'turno29_37' =>$this->input->post('turno29_37'),
'turno29_38' =>$this->input->post('turno29_38'),
'turno29_39'=> $this->input->post('turno29_39'),
'turno29_40'=> $this->input->post('turno29_40'),
'turno29_41'=> $this->input->post('turno29_41'),
'turno29_42' => $this->input->post('turno29_42'),
'turno29_43' => $this->input->post('turno29_43'),
'turno29_46' =>$this->input->post('turno29_46'),
'turno29_47' =>$this->input->post('turno29_47'),
'turno_29_egreso_t'=> $this->input->post('turno_29_egreso_t'),
'turno_29_ingreso_t'=> $this->input->post('turno_29_ingreso_t'),
'turno_29_balance'=> $this->input->post('turno_29_balance'),
'inserted_by' => $this->input->post('user_id'),
'updated_by' => $this->input->post('user_id'),
'inserted_time' =>date("Y-m-d H:i:s"),
'updated_time' =>date("Y-m-d H:i:s"),
'id_patient' => $this->input->post('id_patient'),
'centro_id' => $this->input->post('centro_id')
);
$this->db->insert("hosp_balance_hidrico_t29",$save);
if($this->db->affected_rows() > 0){
$response['message'] = 'guadado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  0;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
}else{

$update = array(
'turno29_1'=> $this->input->post('turno29_1'),
'turno29_2'=> $this->input->post('turno29_2'),
'turno29_3'=> $this->input->post('turno29_3'),
'turno29_4' => $this->input->post('turno29_4'),
'turno29_5' => $this->input->post('turno29_5'),
'turno29_6' => $this->input->post('turno29_6'),
'turno29_4_' =>$this->input->post('turno29_4_'),
'turno29_7' =>$this->input->post('turno29_7'),
'turno29_8' =>$this->input->post('turno29_8'),
'turno29_9' =>$this->input->post('turno29_9'),
'turno29_10'=> $this->input->post('turno29_10'),
'turno29_11'=> $this->input->post('turno29_11'),
'turno29_12'=> $this->input->post('turno29_12'),
'turno29_13' => $this->input->post('turno29_13'),
'turno29_14' => $this->input->post('turno29_14'),
'turno29_15' => $this->input->post('turno29_15'),
'turno29_16' =>$this->input->post('turno29_16'),
'turno29_17' =>$this->input->post('turno29_17'),
'turno29_18' =>$this->input->post('turno29_18'),
'turno29_19' =>$this->input->post('turno29_19'),
'turno29_19_'=> $this->input->post('turno29_19_'),
'turno29_23' => $this->input->post('turno29_23'),
'turno29_24' => $this->input->post('turno29_24'),
'turno29_25' =>$this->input->post('turno29_25'),
'turno29_26' =>$this->input->post('turno29_26'),
'turno29_27' =>$this->input->post('turno29_27'),
'turno29_28' =>$this->input->post('turno29_28'),
'turno29_29'=> $this->input->post('turno29_29'),
'turno29_30'=> $this->input->post('turno29_30'),
'turno29_31'=> $this->input->post('turno29_31'),
'turno29_32' => $this->input->post('turno29_32'),
'turno29_33' => $this->input->post('turno29_33'),
'turno29_34' => $this->input->post('turno29_34'),
'turno29_35' =>$this->input->post('turno29_35'),
'turno29_36' =>$this->input->post('turno29_36'),
'turno29_37' =>$this->input->post('turno29_37'),
'turno29_38' =>$this->input->post('turno29_38'),
'turno29_39'=> $this->input->post('turno29_39'),
'turno29_40'=> $this->input->post('turno29_40'),
'turno29_41'=> $this->input->post('turno29_41'),
'turno29_42' => $this->input->post('turno29_42'),
'turno29_43' => $this->input->post('turno29_43'),
'turno29_46' =>$this->input->post('turno29_46'),
'turno29_47' =>$this->input->post('turno29_47'),
'turno_29_egreso_t'=> $this->input->post('turno_29_egreso_t'),
'turno_29_ingreso_t'=> $this->input->post('turno_29_ingreso_t'),
'turno_29_balance'=> $this->input->post('turno_29_balance'),
'updated_by' => $this->input->post('user_id'),
'updated_time' =>date("Y-m-d H:i:s"),

);

$where= array(
  'id' =>$this->input->post('id_turno29')
);

$this->db->where($where);
$this->db->update("hosp_balance_hidrico_t29",$update);

if($this->db->affected_rows() > 0){
$response['message'] = 'actualizado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  0;
 $response['message'] = 'lo siento, no se actualizo!'; 
}	
}


}else{
	$response['status'] =  2;
	   $response['message'] = 'los campos son vacios!'; 
}

echo json_encode($response);
}


public function saveTurno97(){
	

	$total1=$this->input->post('turno97_23');
	$total2=$this->input->post('turno97_24');
	$total3=$this->input->post('turno97_25');
	$total4=$this->input->post('turno97_46');
	$total5=$this->input->post('turno97_47');
	if($total1 > 0 || $total2 > 0 || $total3 >0 || $total4 > 0 || $total5 > 0 ){
	if($this->input->post('id_turno97') ==''){		
$save = array(
'turno97_1'=> $this->input->post('turno97_1'),
'turno97_2'=> $this->input->post('turno97_2'),
'turno97_3'=> $this->input->post('turno97_3'),
'turno97_4' => $this->input->post('turno97_4'),
'turno97_5' => $this->input->post('turno97_5'),
'turno97_6' => $this->input->post('turno97_6'),
'turno97_4_' =>$this->input->post('turno97_4_'),
'turno97_7' =>$this->input->post('turno97_7'),
'turno97_8' =>$this->input->post('turno97_8'),
'turno97_9' =>$this->input->post('turno97_9'),
'turno97_10'=> $this->input->post('turno97_10'),
'turno97_11'=> $this->input->post('turno97_11'),
'turno97_12'=> $this->input->post('turno97_12'),
'turno97_13' => $this->input->post('turno97_13'),
'turno97_14' => $this->input->post('turno97_14'),
'turno97_15' => $this->input->post('turno97_15'),
'turno97_16' =>$this->input->post('turno97_16'),
'turno97_17' =>$this->input->post('turno97_17'),
'turno97_18' =>$this->input->post('turno97_18'),
'turno97_19' =>$this->input->post('turno97_19'),
'turno97_19_'=> $this->input->post('turno97_19_'),
'turno97_20'=> $this->input->post('turno97_20'),
'turno97_21'=> $this->input->post('turno97_21'),
'turno97_22' => $this->input->post('turno97_22'),
'turno97_23_' => $this->input->post('turno97_23_'),
'turno97_24_' => $this->input->post('turno97_24_'),
'turno97_25_' => $this->input->post('turno97_25_'),
'turno97_23' => $this->input->post('turno97_23'),
'turno97_24' => $this->input->post('turno97_24'),
'turno97_25' =>$this->input->post('turno97_25'),
'turno97_26' =>$this->input->post('turno97_26'),
'turno97_27' =>$this->input->post('turno97_27'),
'turno97_28' =>$this->input->post('turno97_28'),
'turno97_97'=> $this->input->post('turno97_97'),
'turno97_30'=> $this->input->post('turno97_30'),
'turno97_31'=> $this->input->post('turno97_31'),
'turno97_32' => $this->input->post('turno97_32'),
'turno97_33' => $this->input->post('turno97_33'),
'turno97_34' => $this->input->post('turno97_34'),
'turno97_35' =>$this->input->post('turno97_35'),
'turno97_36' =>$this->input->post('turno97_36'),
'turno97_37' =>$this->input->post('turno97_37'),
'turno97_38' =>$this->input->post('turno97_38'),
'turno97_39'=> $this->input->post('turno97_39'),
'turno97_40'=> $this->input->post('turno97_40'),
'turno97_41'=> $this->input->post('turno97_41'),
'turno97_42' => $this->input->post('turno97_42'),
'turno97_43' => $this->input->post('turno97_43'),
'turno97_44' => $this->input->post('turno97_44'),
'turno97_45' =>$this->input->post('turno97_45'),
'turno97_46_' =>$this->input->post('turno97_46_'),
'turno97_47_' =>$this->input->post('turno97_47_'),
'turno97_46' =>$this->input->post('turno97_46'),
'turno97_47' =>$this->input->post('turno97_47'),
'turno_97_egreso_t'=> $this->input->post('turno_97_egreso_t'),
'turno_97_ingreso_t'=> $this->input->post('turno_97_ingreso_t'),
'turno_97_balance'=> $this->input->post('turno_97_balance'),
'inserted_by' => $this->input->post('user_id'),
'updated_by' => $this->input->post('user_id'),
'inserted_time' =>date("Y-m-d H:i:s"),
'updated_time' =>date("Y-m-d H:i:s"),
'id_patient' => $this->input->post('id_patient'),
'centro_id' => $this->input->post('centro_id')
);
$this->db->insert("hosp_balance_hidrico_t97",$save);
if($this->db->affected_rows() > 0){
$response['message'] = 'guadado con exito1!'; 
$response['status'] =  1;
}else{
   $response['status'] =  0;
   $response['message'] = 'lo siento, no se actualizo!'; 
}
	}else{
	$update = array(
'turno97_1'=> $this->input->post('turno97_1'),
'turno97_2'=> $this->input->post('turno97_2'),
'turno97_3'=> $this->input->post('turno97_3'),
'turno97_4' => $this->input->post('turno97_4'),
'turno97_5' => $this->input->post('turno97_5'),
'turno97_6' => $this->input->post('turno97_6'),
'turno97_4_' =>$this->input->post('turno97_4_'),
'turno97_7' =>$this->input->post('turno97_7'),
'turno97_8' =>$this->input->post('turno97_8'),
'turno97_9' =>$this->input->post('turno97_9'),
'turno97_10'=> $this->input->post('turno97_10'),
'turno97_11'=> $this->input->post('turno97_11'),
'turno97_12'=> $this->input->post('turno97_12'),
'turno97_13' => $this->input->post('turno97_13'),
'turno97_14' => $this->input->post('turno97_14'),
'turno97_15' => $this->input->post('turno97_15'),
'turno97_16' =>$this->input->post('turno97_16'),
'turno97_17' =>$this->input->post('turno97_17'),
'turno97_18' =>$this->input->post('turno97_18'),
'turno97_19' =>$this->input->post('turno97_19'),
'turno97_19_'=> $this->input->post('turno97_19_'),
'turno97_20'=> $this->input->post('turno97_20'),
'turno97_21'=> $this->input->post('turno97_21'),
'turno97_22' => $this->input->post('turno97_22'),
'turno97_23_' => $this->input->post('turno97_23_'),
'turno97_24_' => $this->input->post('turno97_24_'),
'turno97_25_' => $this->input->post('turno97_25_'),
'turno97_23' => $this->input->post('turno97_23'),
'turno97_24' => $this->input->post('turno97_24'),
'turno97_25' =>$this->input->post('turno97_25'),
'turno97_26' =>$this->input->post('turno97_26'),
'turno97_27' =>$this->input->post('turno97_27'),
'turno97_28' =>$this->input->post('turno97_28'),
'turno97_97'=> $this->input->post('turno97_97'),
'turno97_30'=> $this->input->post('turno97_30'),
'turno97_31'=> $this->input->post('turno97_31'),
'turno97_32' => $this->input->post('turno97_32'),
'turno97_33' => $this->input->post('turno97_33'),
'turno97_34' => $this->input->post('turno97_34'),
'turno97_35' =>$this->input->post('turno97_35'),
'turno97_36' =>$this->input->post('turno97_36'),
'turno97_37' =>$this->input->post('turno97_37'),
'turno97_38' =>$this->input->post('turno97_38'),
'turno97_39'=> $this->input->post('turno97_39'),
'turno97_40'=> $this->input->post('turno97_40'),
'turno97_41'=> $this->input->post('turno97_41'),
'turno97_42' => $this->input->post('turno97_42'),
'turno97_43' => $this->input->post('turno97_43'),
'turno97_44' => $this->input->post('turno97_44'),
'turno97_45' =>$this->input->post('turno97_45'),
'turno97_46_' =>$this->input->post('turno97_46_'),
'turno97_47_' =>$this->input->post('turno97_47_'),
'turno97_46' =>$this->input->post('turno97_46'),
'turno97_47' =>$this->input->post('turno97_47'),
'turno_97_egreso_t'=> $this->input->post('turno_97_egreso_t'),
'turno_97_ingreso_t'=> $this->input->post('turno_97_ingreso_t'),
'turno_97_balance'=> $this->input->post('turno_97_balance'),
'updated_by' => $this->input->post('user_id'),
'updated_time' =>date("Y-m-d H:i:s")
);

$where= array(
  'id' =>$this->input->post('id_turno97')
);

$this->db->where($where);
$this->db->update("hosp_balance_hidrico_t97",$update);

if($this->db->affected_rows() > 0){
$response['message'] = 'actualizado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  0;
 $response['message'] = 'lo siento, no se actualizo1!'; 
}

}
}else{
	$response['status'] =  2;
	   $response['message'] = 'los campos son vacios!'; 
}

echo json_encode($response);
}
public function turnoGrandTotal(){
	$id_patient=$this->input->post('id_patient');
	$sql1="SELECT
  sum(turno_72_ingreso_t) AS turno72in,
  sum(turno_72_egreso_t) AS turno72eg,
  sum(turno_72_balance)  AS turno72ba
  FROM hosp_balance_hidrico_t72 WHERE id_patient=$id_patient";
  $query1= $this->db->query($sql1);	
  foreach($query1->result() as $row1)
   $sql2="SELECT
   sum(turno_29_ingreso_t) AS turno29in,
  sum(turno_29_egreso_t) AS turno29eg,
  sum(turno_29_balance) AS turno29ba
  FROM hosp_balance_hidrico_t29 WHERE id_patient=$id_patient";
    $query2= $this->db->query($sql2);	
  foreach($query2->result() as $row2)
 $sql3="SELECT
 sum(turno_97_ingreso_t) AS turno97in,
  sum(turno_97_egreso_t) AS turno97eg,
  sum(turno_97_balance) AS turno97ba
  FROM hosp_balance_hidrico_t97  WHERE id_patient=$id_patient";
  $query3= $this->db->query($sql3);	
foreach($query3->result() as $row3)	
 if($query1->result() ==NULL && $query2->result() ==NULL  && $query3->result() ==NULL ){
 }else{	 
 $totin=$row1->turno72in + $row2->turno29in + $row3->turno97in;
 $toteg=$row1->turno72eg + $row2->turno29eg + $row3->turno97eg;
 $totba=($row1->turno72in + $row2->turno29in + $row3->turno97in) - ($row1->turno72eg + $row2->turno29eg + $row3->turno97eg);
 
 $content="
  <div class='form-group row'>
    <div class='col-sm-3'>
   <div class='input-group'>
       <span class='input-group-addon'>Ingreso General</span>
    <input type='text' class='form-control' value='$totin'/>
    </div>
    </div>
	
	<div class='col-sm-3'>
   <div class='input-group'>
       <span class='input-group-addon'>Egreso General</span>
    <input type='text' class='form-control' value='$toteg' />
    </div>
    </div>
	
		<div class='col-sm-3'>
   <div class='input-group'>
       <span class='input-group-addon'>Balance Hidrico</span>
    <input type='text' class='form-control' value='$totba' />
    </div>
    </div>
  </div>
 ";
 
 echo $content;
 
//$this->load->view('hospitalizacion/historial/balance-hidrico/turno-grand-total',$data);
 }
 }



  public function paginateTurno72()
{
$data['id_user']= $this->input->post('id_user');
$data['id_patient']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('hospitalizacion/historial/balance-hidrico/paginate-turno72/number', $data);
}


 
 
 

 
 
   public function paginateTurno29()
{
$data['id_user']= $this->input->post('id_user');
$data['id_patient']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('hospitalizacion/historial/balance-hidrico/paginate-turno29/number', $data);
}




   public function paginateTurno97()
{
$data['id_user']= $this->input->post('id_user');
$data['id_patient']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('hospitalizacion/historial/balance-hidrico/paginate-turno97/number', $data);
}


  public function pagination_data_turno29()
{
$page= $this->input->get('page');
$user_id= $this->input->get('user_id');
$id_patient= $this->input->get('id_patient');
$perfil= $this->input->get('perfil');
$data['perfil']=$perfil;
if($perfil=="Admin"){
$contition="";
}else{
$contition="inserted_by=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;

$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from hosp_balance_hidrico_t29 where $contition id_patient=$id_patient  ORDER BY id desc limit $start,$per_page";
$data['query_paginate']= $this->db->query($sql);
$this->load->view('hospitalizacion/historial/balance-hidrico/paginate-turno29/data',$data);
}


 public function pagination_data_turno72()
{
$page= $this->input->get('page');
$user_id= $this->input->get('user_id');
$id_patient= $this->input->get('id_patient');
$perfil= $this->input->get('perfil');
$data['perfil']=$perfil;
if($perfil=="Admin"){
$contition="";
}else{
$contition="inserted_by=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;

$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from hosp_balance_hidrico_t72 where $contition id_patient=$id_patient  ORDER BY id desc limit $start,$per_page";
$data['query_paginate']= $this->db->query($sql);
$this->load->view('hospitalizacion/historial/balance-hidrico/paginate-turno72/data',$data);
}
 




 
   public function pagination_data_turno97()
{
$page= $this->input->get('page');
$user_id= $this->input->get('user_id');
$id_patient= $this->input->get('id_patient');
$perfil= $this->input->get('perfil');
$data['perfil']=$perfil;
if($perfil=="Admin"){
$contition="";
}else{
$contition="inserted_by=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;

$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from hosp_balance_hidrico_t97 where $contition id_patient=$id_patient  ORDER BY id desc limit $start,$per_page";
$data['query_paginate']= $this->db->query($sql);
$this->load->view('hospitalizacion/historial/balance-hidrico/paginate-turno97/data',$data);
}

}