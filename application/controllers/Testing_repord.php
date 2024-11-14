<?php
class Testing_repord extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
			$this->load->library('user_register_info');
			$this->load->library('user_register_info_hospitalization');
			$this->load->model('model_hospitalization');
			$this->ID_HOSP =$this->session->userdata('ID_HOSP');
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
	
 
}

public function repetirOrdenMedica()
{
$this->hospitalization_emgergency->trans_begin();
$id_register= $this->input->post('idsala');
$sql1 = "select * from hosp_orden_medica WHERE id=$id_register";
$datas= $this->hospitalization_emgergency->query($sql1);

$ordenData=$this->hospitalization_emgergency->select('*')->where('id',$id_register)->get('hosp_orden_medica')->row_array();



$save = array(
'id_historial'=> $ordenData['id_historial'],
'centro' => $ordenData['centro'],
'fecha_ingreso' => date("Y-m-d"),
'hour_ingreso' => date("H:i"),
'inserted_by' => $this->ID_USER,
'inserted_time' =>date("Y-m-d H:i:s"),
'updated_by' => $this->ID_USER,
'updated_time' =>date("Y-m-d H:i:s"),
'id_hosp' =>$ordenData['id_hosp']

);
$this->hospitalization_emgergency->insert("hosp_orden_medica",$save);
$new_id_ord_m=$this->hospitalization_emgergency->insert_id();
//-------------------------------------------------------------------------------------
$id_register_rec=$this->hospitalization_emgergency->select('id_register')->where('id_register',$id_register)->get('hosp_orden_medica_recetas')->row('id_register');
if($id_register_rec==$id_register){
$sql2 = "select * from hosp_orden_medica_recetas WHERE id_register=$id_register";
$datarec= $this->hospitalization_emgergency->query($sql2);
foreach ($datarec->result() as $row) {
	$save1 = array(
'medica' => $row->medica,
'presentacion' => $row->presentacion,
'dosis' => $row->presentacion,
'frecuencia'=> $row->presentacion,
'via'=> $row->presentacion,
'cantidad' => $row->presentacion,
'new_cant' => $row->presentacion,
'nota'=> $row->presentacion,
'id_register'=> $new_id_ord_m,
 'historial_id' => $row->historial_id,
'operator' => $this->ID_USER,
'updated_by' => $this->ID_USER,
'centro' =>$row->centro,
 'insert_date' => date("Y-m-d H:i:s"),
 'updated_time' => date("Y-m-d H:i:s"),

);



$this->hospitalization_emgergency->insert("hosp_orden_medica_recetas",$save1);
}
}

//---------------------------------------------------------------------------------------------------
$id_register_rec=$this->hospitalization_emgergency->select('id_register')->where('id_register',$id_register)->get('hosp_orden_medica_estudios')->row('id_register');
if($id_register_rec==$id_register){
$sql3 = "select * from hosp_orden_medica_estudios WHERE id_register=$id_register";
$dataes= $this->hospitalization_emgergency->query($sql3);
foreach ($dataes->result() as $row) {
$save2 = array(
'estudio' => $row->estudio,
'cuerpo' => $row->cuerpo,
'lateralidad'=>$row->lateralidad,
'observacion'=> $row->observacion,
'id_register'=>$new_id_ord_m,
'historial_id' => $row->historial_id,
'operator' => $this->ID_USER,
'updated_by' => $this->ID_USER,
'centro' =>$row->centro,
'insert_date' => date("Y-m-d H:i:s"),
'updated_time' => date("Y-m-d H:i:s"),
);
$this->hospitalization_emgergency->insert("hosp_orden_medica_estudios",$save2);
}
}



//---------------------------------------------------------------------------------------------------
$id_register_gnrl=$this->hospitalization_emgergency->select('id_register')->where('id_register',$id_register)->get('hosp_ord_med_gen')->row('id_register');
if($id_register_gnrl==$id_register){
$sql5 = "select * from hosp_ord_med_gen WHERE id_register=$id_register";
$datagen= $this->hospitalization_emgergency->query($sql5);
foreach ($datagen->result() as $row) {
$save = array(
'medidas_gen' => $row->medidas_gen,
'descripcion_mg' => $row->descripcion_mg,
'intervalo_de_real'=> $row->intervalo_de_real,
'id_register'=>$new_id_ord_m,
'id_patient' => $row->id_patient,
'inserted_by' => $this->ID_USER,
'id_user' => $this->ID_USER,
'updated_by' => $this->ID_USER,
'centro' => $row->centro,
'printing' => $row->printing,
'inserted_time' => date("Y-m-d H:i:s"),
'updated_time' => date("Y-m-d H:i:s"),
);

$this->hospitalization_emgergency->insert("hosp_ord_med_gen",$save);
}
}



//---------------------------------------------------------------------------------------------------
$id_register_lab=$this->hospitalization_emgergency->select('id_register')->where('id_register',$id_register)->get('hosp_orden_medcia_lab')->row('id_register');
if($id_register_lab==$id_register){
$sql4 = "select * from hosp_orden_medcia_lab WHERE id_register=$id_register";
$datalab= $this->hospitalization_emgergency->query($sql4);
foreach ($datalab->result() as $row) {

$save3 = array(
 'laboratory' =>$row->laboratory,
'operator' =>$this->ID_USER,
'historial_id' =>$row->historial_id, 
'centro' =>$row->centro,
'id_register'=>$new_id_ord_m,
'insert_time' => date("Y-m-d H:i:s"),
'updated_by' =>$this->ID_USER,
'updated_time' => date("Y-m-d H:i:s"),
'printing' => $row->printing,
'user_id' =>$this->ID_USER

  );
$this->hospitalization_emgergency->insert("hosp_orden_medcia_lab",$save3);
}
}

$this->hospitalization_emgergency->trans_complete();
if ($this->hospitalization_emgergency->trans_status() === FALSE)
			{
			$this->hospitalization_emgergency->trans_rollback();
			  echo '<i class="bi bi-x-square text-danger fs-4"></i>';
			}
			else
			{
			 echo "<i class='bi bi-check-lg text-success fs-4'>Orden Médica # $id_register fue repetido con éxito.</i>";
			}


}


}