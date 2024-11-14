<?php
	class Emerg_conEgreso extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('user_register_info_hospitalization'); 
	 $this->ID_CENTRO = $this->session->userdata('id_centro');
	  $this->ID_PATIENT= $this->session->userdata('id_patient');
	$this->ID_USER = $this->session->userdata('user_id');
	$this->ID_HOSP =$this->session->userdata('ID_HOSP');
	   $this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
    }
	
	
	public function form() {
		 $this->load->library("user_register_info");
            $page = $this->input->get('page');
			 $data['con_eg_data'] = $this->input->get('signo');
            $query_coneg = $this->hospitalization_emgergency->query("SELECT * FROM  emerg_conclusion_ingreso WHERE id=$page");
            $data['query_coneg'] = $query_coneg->result();
			$data['actionCe'] = $this->input->get('signo');
            $this->load->view('emergency/clinical-history/conc-egreso/form', $data);
			echo "<script>$('.spinner-border').hide()</script>";
    
		
	}
	
		
public function loadHospProced()
{
echo "<option value=''>Procedimiento(s) realizado(s)</option>";
//$centro_id=$this->input->post('centro_id');
//$id_seg=$this->input->post('id_seg');
$sql ="SELECT sub_groupo, id_c_taf  FROM centros_tarifarios  group by sub_groupo ORDER BY sub_groupo DESC";
$query = $this->db->query($sql);
 foreach ($query->result() as $row){
echo "<option  value='$row->id_c_taf'>$row->sub_groupo</option>";
 }
}
	
public function getHospProcedMonto()
{
$monto=$this->db->select('monto')->where('id_c_taf',$this->input->post('id'))->get('centros_tarifarios')->row('monto'); 
 echo "monto: $monto";

}	
	
	
	
		
	


 public function saveUpConEgreso(){
	 
if($this->input->post('resumen_hallasgos')=="" ||
 $this->input->post('condicion_alta')=='' ||
 $this->input->post('causa_egreso')=='' ||
 $this->input->post('destino_referimiento')=='' ||
 $this->input->post('diag_alta_diag1')==''
 )
{
	 $response['message'] = "Campo con <span style='color:red'>*</span> son obligatorios.";
        $response['status']  = 1;
}else{	
	 
$morta_post= $this->input->post('morta_post');
$morta_post1 = (isset($morta_post)) ? 1 : 0;
$morta_int= $this->input->post('morta_int');
$morta_int1 = (isset($morta_int)) ? 1 : 0;
$infeccion_herida= $this->input->post('infeccion_herida');
$infeccion_herida1 = (isset($infeccion_herida)) ? 1 : 0;
  $data= array(
'resumen_hallasgos'=> $this->input->post('resumen_hallasgos'),
'morta_post'=>$morta_post1,
'morta_int'=>$morta_int1,
'infeccion_herida'=>$infeccion_herida1,
'resumen_intervenciones'=> $this->input->post('resumen_intervenciones'),
'condicion_alta'=> $this->input->post('condicion_alta'),
'causa_egreso'=> $this->input->post('causa_egreso'),
'destino_referimiento'=> $this->input->post('destino_referimiento'),
'diagnostico_autopsia'=>$this->input->post('diagnostico_autopsia'),
'equipo_medico'=> $this->input->post('equipo_medico'),
'diag_alta_diag1'=> $this->input->post('diag_alta_diag1'),
'diag_alta_diag2'=> $this->input->post('diag_alta_diag2'),
'coneg_proced'=>$this->input->post('coneg_proced'),
'id_patient' => $this->ID_PATIENT,
'inserted_by' =>$this->input->post('inserted_by'),
'id_centro'=> $this->ID_CENTRO,
'inserted_time' => $this->input->post('inserted_time'),
'updated_time' =>$this->input->post('updated_time'),
'updated_by' => $this->input->post('updated_by'),
'id_hosp' => $this->ID_HOSP
);
if($this->input->post('id') > 0){
$where = array(
  'id' =>$this->input->post('id')
);

$this->hospitalization_emgergency->where($where);
$result=$this->hospitalization_emgergency->update('emerg_conclusion_ingreso',$data);
}else{
$result=$this->hospitalization_emgergency->insert('emerg_conclusion_ingreso',$data);	

$data = array(
  'alta'=>1,
  'fecha_alta' =>date("Y-m-d H:i:s")
);

$where= array(
  'id' =>$this->ID_HOSP
);

$this->hospitalization_emgergency->where($where);
$this->hospitalization_emgergency->update("emergency_data",$data);

}


if ($result)
{
	$response['message'] = '<strong>Datos han sido guadado con éxito</strong>';
  $response['status']  = 0;
  
}else{
$response['message'] = "error";
        $response['status']  = -1;	
}
 }
echo json_encode($response);
}



public function pagination() {
    $sql="SELECT * FROM emerg_conclusion_ingreso WHERE id_patient=$this->ID_PATIENT ORDER BY id DESC";
     $query= $this->hospitalization_emgergency->query($sql);
     
    $params = array('id_paginate' => 'paginate-conEgreso-li', 'rows'=>$query->result(), 'id'=>'id', 'total'=>$query->num_rows());
        echo $this->user_register_info_hospitalization->list_patients_registers_by_date($params);
    
}








	
	}