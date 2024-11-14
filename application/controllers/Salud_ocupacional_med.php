<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Salud_ocupacional_med extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
}

function getMedicamentoSalOcup()
{
$val= $this->uri->segment(3);
$id_user = $this->uri->segment(4);
$id_cm = $this->uri->segment(5);
$data['val']= $val;
$data['id_user'] = $id_user;
$data['id_cm'] = $id_cm;
$this->load->view('salud-ocupacional/medicamento/index', $data);
$this->load->view('salud-ocupacional/medicamento/footer', $data);
}


function load_modal_search_reporte(){
	
$data['id_user'] = $this->uri->segment(3);
$data['id_cm'] = $this->uri->segment(4);
$data['val']= 0;
$target = $this->uri->segment(5);
$data['target']=$target;
$data['table_name']="nota_med_salud_ocupacional";
$data['controller_report']="drugsReport";
$this->load->view('salud-ocupacional/medicamento/load-modal', $data);

}


function modal_search_report_fields(){
	
$data['id_user'] = $this->input->post('id_user');
$data['id_cm'] = $this->input->post('id_cm');
$data['val']= 0;
$target = $this->input->post('target');
$data['target']=$target;
if($target==1){
	$data['title']="DRUG MANAGEMENT";
}elseif($target==2){
	$data['title']="REPORTE DE MEDICAMENTOS";	
}elseif($target==3){
$data['title']="PRODCUTIVIDAD POR MEDICO";		
}else{
$data['title']="PRODCUTIVIDAD POR ENFERMERIA";
}
$data['table_name']=$this->input->post('table_name');

$data['controller_report']=$this->input->post('controller_report');
$this->load->view('salud-ocupacional/medicamento/header-drug-management', $data);
$this->load->view('salud-ocupacional/medicamento/footer', $data);	
}


function listDrugs()
{
$id_centro = $this->input->post('id_centro');

$sqlmed ="SELECT id, med, expired FROM salud_oc_med WHERE centro=$id_centro ORDER BY id DESC";
$data['querymed'] = $this->db->query($sqlmed);

$this->load->view('salud-ocupacional/medicamento/list-drugs', $data);

}




function updateDrug()
{
$id = $this->input->post('id');

$sqlmed ="SELECT * FROM salud_oc_med WHERE id =$id";
$result = $this->db->query($sqlmed);
foreach($result->result() as $rwmed)
 $fecha = date("d-m-Y", strtotime($rwmed->expired));
	$inserted_time = date("d-m-Y H:i:s", strtotime($rwmed->inserted_time));
	$updated_time = date("d-m-Y H:i:s", strtotime($rwmed->inserted_time));
	$created_by=$this->db->select('name')->where('id_user',$rwmed->inserted_by)->get('users')->row('name');
    $updated_by=$this->db->select('name')->where('id_user',$rwmed->updated_by)->get('users')->row('name');
	$info = "<em style='font-size:14px' class='alert-info'>Created by $created_by at $inserted_time -	Updated by $updated_by at $updated_time.</em>";
  $array = array(
    'id_drug'   =>$rwmed->id,
    'med_drug'   =>$rwmed->med,
	'med_present'   =>$rwmed->presentacion,
	'med_amount'   =>$rwmed->cant_comp,
	'med_expired'   =>$fecha,
	'is_expired'   =>$rwmed->expired,
	'info'   =>$info
  );


echo json_encode($array);

}


function passLeftMedicaments (){
$id_patient = $this->input->post('id_patient');
$id_user = $this->input->post('id_user');
$id_centro=$this->input->post('id_centro');

$dosis_med=intval($this->input->post('dosis_med'));
$amt_available= intval($this->input->post('amt_available'));
$amt_left = $amt_available - $dosis_med;

	$today =date("Y-m-d");
$is_expired=$this->input->post('is_expired');
if($today >= $is_expired){
$response['message'] = "this drug is expired.";
$response['status'] = 2;	
}
elseif($dosis_med > $amt_available){
	$response['message'] = "amount available : $amt_available.";
	$response['status'] = 2;
$response['assign'] = "";	
}

elseif($this->input->post('sintoma') ==""
 || $this->input->post('causa_med') ==""
 || $this->input->post('id_med') ==""  
  || $this->input->post('dosis_med') =="") {

$response['message'] = "Fields with * are required!"; 
$response['status'] = 1;
$response['assign'] = "";
}


else{

$save = array(
  'id_patient'  => $this->input->post('id_patient'),
    'id_user'  => $this->input->post('id_user'),
  'id_med' => $this->input->post('id_med'),
 'id_centro' => $this->input->post('id_centro'),
   'inserted_time' =>date("Y-m-d H:i:s"),
  'dosis_med'=> $this->input->post('dosis_med'),
 'causa_med'  => $this->input->post('causa_med'),
  'sintoma'  => $this->input->post('sintoma'),
   'is_left'  =>1
  );

$this->db->insert("medicamento_salud_ocupacional",$save);

$response['message'] = "Data transferred successfully!"; 
$response['status'] = 0;
$response['assign'] = $amt_left;
//update drug table

$update = array(

'cant_comp' => $amt_left,

);
	
$where= array(
  'id' =>$this->input->post('id_med')
);

$this->db->where($where);
$this->db->update("salud_oc_med",$update);


}	
echo json_encode($response);
}





function passLeftMedData(){
$id_p_a= $this->input->post('id_p_a');
$id_centro= $this->input->post('id_centro');
$sql = "select * from medicamento_salud_ocupacional WHERE id_patient=$id_p_a && id_centro=$id_centro && is_left=1 order by id DESC";
$result= $this->db->query($sql);
$i=1;

echo '<table class="table">
  <tr>
  <th>#</th><th>Med.</th><th>Dosis</th><th>Quitar</th>
  </tr>';
foreach($result->result() as $row)
{
$med=$this->db->select('med')->where('id',$row->id_med)->get('salud_oc_med')->row('med');
echo"
<tr >
<td>";echo $i;$i++; echo "</td>
<td>$med</td>
<td>$row->dosis_med</td>
<td><a  class='remove-med-pass-left' id='$row->id' ><i class='fa fa-remove' style='color:red'></i></a></td>
</tr>
";
}
echo '</table>';
$this->load->view('salud-ocupacional/medicamento/delete-footer');	

}

function listadoPatMedSaved(){
$id_p_a= $this->input->post('id_p_a');
$sql = "select  * from  nota_med_salud_ocupacional INNER JOIN patients_appointments ON
 nota_med_salud_ocupacional.id_patient = patients_appointments.id_p_a WHERE id_patient=$id_p_a  group by id_patient order by id DESC";

$data['result'] = $this->db->query($sql);
$this->load->view('getPatientAge');
$this->load->view('salud-ocupacional/medicamento/list-patient-med', $data);	
}




function saveListMed(){
$date=date("Y-m-d H:i:s");	

	
$save = array(
'nota'=> $this->input->post('nota_med'),
'inserted_by'=>$this->input->post('id_user'),
'inserted_time'=>$date,
'id_patient'=>$this->input->post('id_p_a'),
'id_centro'=>$this->input->post('id_centro')

);

$this->db->insert("nota_med_salud_ocupacional",$save);	
$id_last=$this->db->insert_id();


$update = array(
'is_left'=>0,
'inserted_time'=>$date,
'id_nota'=>$id_last,
);
	
$where= array(
  'id_patient' =>$this->input->post('id_p_a'),
  'id_centro' =>$this->input->post('id_centro'),
  'is_left' =>1
  
);

$this->db->where($where);
$this->db->update("medicamento_salud_ocupacional",$update);	
	
	
	
}





function listadoPatMedSavedRegistros(){
$data['id_p_a']= $this->input->post('id_p_a');
$data['id_centro']= $this->input->post('id_centro');	
$data['id_user']= $this->input->post('id_user');
$this->load->view('salud-ocupacional/medicamento/pagination-number', $data);	
}






 function removeMedPassLeft()
 {
$where = array(
'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('medicamento_salud_ocupacional');
 }


function paginationDataMedic()
	{
	$page= $this->input->get('page');
	$data['id_user']= $this->input->get('id_user');
	$data['id_centro']= $this->input->get('id_centro');
	$data['id']=$page;
	$sql = "select * from medicamento_salud_ocupacional WHERE id_nota=$page";
	$data['result_data']= $this->db->query($sql);
    $notaMed=$this->db->select('nota, inserted_by, inserted_time')->where('id',$page)->get('nota_med_salud_ocupacional')->row_array();
	$data['nota']=$notaMed['nota'];
	$data['inserted_time'] = date("d-m-Y H:i:s", strtotime($notaMed['inserted_time']));
	$inserted_by=$this->db->select('name')->where('id_user',$notaMed['inserted_by'])->get('users')->row('name');
	$data['inserted_by']=$inserted_by;
   $this->load->view('salud-ocupacional/medicamento/pagination-data', $data);
   $this->load->view('salud-ocupacional/medicamento/delete-footer');	
	}



function crudMedForm (){
$id_user = $this->input->post('id_user');
$id_centro=$this->input->post('id_centro');
$drug_id=$this->input->post('drug_id');
if($this->input->post('med_drug') ==""
 || $this->input->post('med_present') ==""
 || $this->input->post('med_amount') ==""  
  || $this->input->post('med_expired') =="") {

$response['message'] = "Fields with * are required!"; 
$response['status'] = 1;
}else{
if($drug_id==0){
$save = array(
  'presentacion'  => $this->input->post('med_present'),
    'med'  => $this->input->post('med_drug'),
  'cant_comp' => $this->input->post('med_amount'),
 'expired' => $this->input->post('med_expired'),
   'centro' => $this->input->post('id_centro'),
  'inserted_by'=> $id_user,
 'inserted_time'  => date("y-m-d H:i:s"),
  'updated_by'  => $id_user,
  'updated_time'  => date("Y-m-d H:i:s")
  );

$this->db->insert("salud_oc_med",$save);
$action ="saved";
}else{
	
$update = array(
'presentacion'  => $this->input->post('med_present'),
'med'  => $this->input->post('med_drug'),
'cant_comp' => $this->input->post('med_amount'),
'expired' => $this->input->post('med_expired'),
'updated_by'  => $id_user,
'updated_time'  => date("Y-m-d H:i:s")
);
	
$where= array(
  'id' =>$drug_id
);

$this->db->where($where);
$this->db->update("salud_oc_med",$update);	
$action ="updated";
}
$response['message'] = "Drug $action sucessfully!"; 
$response['status'] = 0;

}	
echo json_encode($response);
}




}
