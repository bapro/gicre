<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hosp_kardex extends CI_Controller {
public function __construct()
{
parent::__construct();
 $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
}


public function returnKardex()
{
$cantidad=$this->hospitalization_emgergency->select('new_cant')->where('id_i_m',$this->input->post('id'))->get('hosp_orden_medica_recetas')->row('new_cant'); 
echo $cantidad;	

}
function savePrintKardex(){
 $id_print = $this->input->post('id_print');
  $action_time = date("Y-m-d H:i:s");
 $this->session->set_userdata('CURRENT_PRINT_KARDEX_TIME', $action_time);
 
	     foreach ($id_print as $key => $val) {
            $arrayData[] = array(
               'id' => $id_print[$key],
                'print_session' => $action_time,
             'id_user'=>$this->ID_USER               
            );
         }         
        $this->hospitalization_emgergency->insert_batch('hosp_kardex_print', $arrayData);
 
 
}



function quitarNewCardex(){
$update = array(
'kardex_turno'=>'',
'kardex_fecha'=>'',
'kardex_user'=> $this->input->post('kardex_user'),
'kardex'=>0
);

$where= array(
  'id' =>$this->input->post('id')
);
$this->hospitalization_emgergency->where($where);
$this->hospitalization_emgergency->update("hosp_orden_medica_recetas",$update);

}

public function listadoMedKardex(){
$data['id_historial']=$this->ID_PATIENT;
$data['user_id']=$this->input->post('user_id');
$sql ="SELECT *  FROM  hosp_orden_medica_recetas WHERE historial_id=$this->ID_PATIENT && kardex=0 && centro=$this->ID_CENTRO order by id desc";
$query=$this->hospitalization_emgergency->query($sql);
$data['query_list_k'] =$query;
$data['nb_ex_neu'] =$query->num_rows();
$this->load->view('hospitalization/clinical-history/kardex/listado-med-kardex', $data);
}



public function kardex_undone_notification(){

$query=$this->hospitalization_emgergency->select('kardex')->where('kardex',0)->where('historial_id',$this->ID_PATIENT)->where('centro', $this->ID_CENTRO)->get('hosp_orden_medica_recetas');

$result= $query->num_rows();


echo "<span class='badge bg-danger rounded-pill' style='font-size:11px' >$result</span>";



}





 function devolucionMedicamentos()
{
$id=$this->input->post('id');
$where=$this->input->post('where');
if($where==1){
$column="id_i_m=$id";
}
else{
$column="id_patient=$this->ID_PATIENT";	
}
$sql ="SELECT *  FROM  devolucion_almacen_lab
LEFT JOIN  hosp_orden_medica_recetas ON  devolucion_almacen_lab.id_i_m = hosp_orden_medica_recetas.id
WHERE $column order by devolucion_almacen_lab.id DESC";
$query=$this->hospitalization_emgergency->query($sql);
$data['nb_kardex_return'] =$query->num_rows();
$data['devo'] =$query;
$this->load->view('hospitalization/clinical-history/kardex/devolucion', $data);
}


 function devolucionAlmacenMed()
{
$id_i_m=$this->input->post('id_i_m');
//$cantidad_comp=$this->db->select('cantidad_comp')->where('id',$id_med_al)->get('emergency_medicaments')->row('cantidad_comp');
$devoluction=floatval($this->input->post('cantInit')) - floatval($this->input->post('dev'));

//----UPDATE CANTIDAD EN MED ALMACEN------------------
$update = array(
'new_cant'=>$this->input->post('dev')

);

$where= array(
  'id_i_m' =>$id_i_m
);

$this->hospitalization_emgergency->where($where);
$this->hospitalization_emgergency->update("hosp_orden_medica_recetas",$update);

//--INSERT TO DEVOLUCION TABLE------------

$save = array(
'id_user'=>$this->ID_USER,
'dev'=> $this->input->post('dev'),
'cant'=> $this->input->post('cantInit'),
'resta'=> $devoluction,
'date_time'=>date("Y-m-d H:i:s"),
'id_i_m'=>$this->input->post('id_i_m'),
'id_patient'=>$this->ID_PATIENT
);
$this->hospitalization_emgergency->insert("devolucion_almacen_lab",$save);


}


 function addNewKardex(){	
$update = array(
'dosis'=> $this->input->post('dosis'),
'kardex_turno'=> $this->input->post('turno'),
'kardex_fecha'=>$this->input->post('fecha'),
'kardex_user'=>$this->ID_USER,
'kardex'=>1,
'new_cant'=>$this->input->post('new_cant')
);

$where= array(
  'id' =>$this->input->post('id')
);

$this->hospitalization_emgergency->where($where);
$this->hospitalization_emgergency->update("hosp_orden_medica_recetas",$update);
if($this->hospitalization_emgergency->affected_rows() > 0){

}else{
   echo 'error';
}

}

function kardex_list(){
	$sqlkx ="SELECT *  FROM  hosp_orden_medica_recetas WHERE historial_id=$this->ID_PATIENT && kardex=1 && centro=$this->ID_CENTRO order by insert_date DESC";
$querykx=$this->hospitalization_emgergency->query($sqlkx);
$data['querykardex'] =$querykx;
$data['nb_kardex'] =$querykx->num_rows();
$this->load->view('hospitalization/clinical-history/kardex/new-kardex', $data);
}


















}