<?php
class Emerg_orden_medica extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
			$this->load->library('user_register_info');
			$this->load->library('user_register_info_hospitalization');
			$this->load->model('model_emergency');
			$this->ID_HOSP =$this->session->userdata('ID_HOSP');
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
	
 
}



public function create_orden_medica() {


    if($this->input->post('fecha') == "" || $this->input->post('hour') == "" ){
        $response['message'] = "Fecha y hora de inicio son obligatorios.";
        $response['status']  = 1;
		
       
        }else {
            
            
            if($this->input->post('id')==0){
              $data = array( 
                'centro' => $this->ID_CENTRO,
                 'fecha_ingreso' =>$this->input->post('fecha'),
				 'hour_ingreso' => $this->input->post('hour'),
                'id_historial' => $this->ID_PATIENT,
				'id_hosp'=>$this->ID_HOSP,
                'inserted_by' => $this->ID_USER,
				'inserted_time' => date("Y-m-d H:i:s"),
				'updated_by' => $this->ID_USER,
                   'updated_time' => date("Y-m-d H:i:s")
               
             );
            
           $this->hospitalization_emgergency->insert('emerg_orden_medica',$data);
           $last_id = $this->hospitalization_emgergency->insert_id();
           
            }else{
                $data = array( 
                    'fecha_ingreso' => $this->input->post('fecha'),
					'hour_ingreso' => $this->input->post('hour'),
                   'updated_by' => $this->ID_USER,
                   'updated_time' => date("Y-m-d H:i:s"),
                    
                 );
                $where= array(
                    'id' =>$this->input->post('id')
                  );
                  
                $this->hospitalization_emgergency->where($where);
               $this->hospitalization_emgergency->update('emerg_orden_medica',$data);
               $last_id = $this->input->post('id');
            }
            $response['message'] =  $last_id;
            $response['status']  = 0;
            
        }
         echo json_encode($response);
}


public function pagination() {
    $sql="SELECT * FROM emerg_orden_medica WHERE id_historial=$this->ID_PATIENT ORDER BY id  DESC";
     $query= $this->hospitalization_emgergency->query($sql);
    
	 $params = array('id_paginate' => 'paginate-orden-medica-li', 'rows'=>$query->result(), 'id'=>'id', 'total'=>$query->num_rows());
        echo $this->user_register_info->list_patients_registers_by_date($params);
    
	
    
}



public function form() {
    $data['id_patient']=$this->ID_PATIENT;
    $data['id_user']=$this->ID_USER;
    $page= $this->input->get('page');
    $data['orden_medica_data'] = $this->input->get('signo');
    $sql="SELECT * FROM emerg_orden_medica WHERE id=$page";
    $data['query_orden_med']= $this->hospitalization_emgergency->query($sql);
    [$num_drugs, $num_est, $num_lab, $num_mg]= $this->model_emergency->count_total_each_table($page);
    //echo $num_drugs;
    $data['num_drugs'] = $num_drugs;
    $data['num_est'] = $num_est;
    $data['num_lab'] = $num_lab;
    $data['num_mg'] = $num_mg;
   $this->load->view('emergency/clinical-history/medical-order/forms', $data);
         echo "<script> 
		 $('.spinner-border').hide();
	
		 </script>"; 
    
}





public function repetirOrdenMedica()
{
$this->hospitalization_emgergency->trans_begin();
$id_register= $this->input->post('idsala');

$ordenData=$this->hospitalization_emgergency->select('*')->where('id',$id_register)->get('emerg_orden_medica')->row_array();


$save1 = array(

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

$this->hospitalization_emgergency->insert("emerg_orden_medica",$save1);



$id_last=$this->hospitalization_emgergency->insert_id();
//-------------------------------------------------------------------------------------
$id_register_rec=$this->hospitalization_emgergency->select('id_register')->where('id_register',$id_register)->get('emerg_orden_medica_recetas')->row('id_register');
if($id_register_rec==$id_register){
$sql = "select * from emerg_orden_medica_recetas WHERE id_register=$id_register";
$datarec= $this->hospitalization_emgergency->query($sql);
foreach ($datarec->result() as $row) {
	$save2 = array(
'medica'=> $row->medica,
'presentacion'=> $row->presentacion,
'frecuencia'=> $row->frecuencia,
'dosis' => $row->dosis,
'via' => $row->via,
'oyo' => $row->oyo,
'operator' => $this->ID_USER,
'insert_date'=>date("Y-m-d H:i:s"),
'historial_id' =>$row->historial_id,
'updated_by' =>$this->ID_USER,
'updated_time'=>date("Y-m-d H:i:s"),
'nota' => $row->nota,
'printing'=>$row->printing,
'id_register'=>$id_last,
'centro'=>$row->centro
);

$this->hospitalization_emgergency->insert("emerg_orden_medica_recetas",$save2);
}
}

//---------------------------------------------------------------------------------------------------
$id_register_rec=$this->hospitalization_emgergency->select('id_register')->where('id_register',$id_register)->get('emerg_orden_medica_estudios')->row('id_register');
if($id_register_rec==$id_register){
$sql = "select * from emerg_orden_medica_estudios WHERE id_register=$id_register";
$datarec= $this->hospitalization_emgergency->query($sql);
foreach ($datarec->result() as $row) {
$save3 = array(
'estudio'=> $row->estudio,
'cuerpo'=> $row->cuerpo,
'lateralidad' => $row->lateralidad,
'observacion' => $row->observacion,
'historial_id' =>$row->historial_id,
'operator' => $this->ID_USER,
'updated_by' => $this->ID_USER,
'insert_date'=> date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'id_register'=>$id_last,
'centro'=>$row->centro
);



$this->hospitalization_emgergency->insert("emerg_orden_medica_estudios",$save3);
}
}


//---------------------------------------------------------------------------------------------------
$id_register_lab=$this->hospitalization_emgergency->select('id_register')->where('id_register',$id_register)->get('emerg_orden_medcia_lab')->row('id_register');
if($id_register_lab==$id_register){
$sql = "select * from emerg_orden_medcia_lab WHERE id_register=$id_register";
$datarec= $this->hospitalization_emgergency->query($sql);
foreach ($datarec->result() as $row) {

$save3 = array(
  'laboratory'  =>$row->laboratory,
  'operator'=> $this->ID_USER,
  'historial_id' =>$row->historial_id,
 'insert_time'=>date("Y-m-d H:i:s"),
 'updated_by'=> $this->ID_USER,
 'updated_time'=>date("Y-m-d H:i:s"),
  'printing'=>$row->printing,
  'user_id'=>$this->ID_USER,
 'id_register'=> $id_last,
 'centro'=> $row->centro


  );
  
 
  
$this->hospitalization_emgergency->insert("emerg_orden_medcia_lab",$save3);
}
}

//---------------------------------------------------------------------------------------------------
$id_register_gnrl=$this->hospitalization_emgergency->select('id_register')->where('id_register',$id_register)->get('emerg_ord_med_gen')->row('id_register');
if($id_register_gnrl==$id_register){
$sql = "select * from emerg_ord_med_gen WHERE id_register=$id_register";
$datarec= $this->hospitalization_emgergency->query($sql);
foreach ($datarec->result() as $row) {
$save = array(
'medidas_gen'=>$row->medidas_gen,
'descripcion_mg'=>$row->descripcion_mg,
'intervalo_de_real'=>$row->intervalo_de_real,
'id_user' => $this->ID_USER,
'id_patient' =>$row->id_patient,
'inserted_by' => $this->ID_USER,
'inserted_time' =>date("Y-m-d H:i:s"),
'printing' =>$row->printing,
'id_register' =>$id_last,
'centro' =>$row->centro
);
$this->hospitalization_emgergency->insert("emerg_ord_med_gen",$save);
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