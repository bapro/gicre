<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tarifarios extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
		$this->load->model('excel_import_model');
		$this->USER_PERFIL =$this->session->userdata('user_perfil');
		$this->ID_USER =$this->session->userdata('user_id');
		$this->load->library("get_table_data_by_id");
		$this->load->library("create_forms");
	 if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
		
	}


    public function show_invoice_tariff_by_insurance() {
      // $this->tariffs();
		 $doct_tarif = $this->input->post('id_doctor');
		  [$get_doctor_info_by_id, $doctor_area]= $this->get_table_data_by_id->getDoctorInfo($doct_tarif);
             $data['doctor_name']=$get_doctor_info_by_id['name'];
        $data['id_doctor'] = $doct_tarif;
        $results = $this->model_admin->display_tarif_doc($doct_tarif);
        $data['results'] = $results;
        $count = count($results);
        $id_seguro_medico = $this->db->select('seguro_medico')->where('id_doctor', $doct_tarif)->get('doctor_seguro')->row('seguro_medico');
        $data['id_seguro_medico'] = $id_seguro_medico;
        if ($count > 0) {
           $this->load->view('tarifario/doc-tariff-result', $data);
        } else {
           
     	$this->create_forms->upload_tariff_form($doct_tarif,"","",0);	
		 }
    } 











//($doctor_ct, $seguro_ct, $tarif_plan_ct, $centro_med)

public function seguro_plan_sin_tarifarios()
{

$this->create_forms->upload_tariff_form(
$this->input->post('id_doctor'), 
$this->input->post('id_seguro'),
 $this->input->post('idPlan'),
 $this->input->post('centro')
 );	
 $data['id_doctor']= $this->input->post('id_doctor');
 $data['id_seguro_medico']= $this->input->post('id_seguro');
  $data['show_select']= 0;
    $data['get_seg_plan']=$this->input->post('idPlan');
 $this->load->view('tarifario/footer-upload-tariff', $data);

}





public function search_plan_or_center(){
$label=$this->input->post('label');
$id_doctor=$this->input->post('id_doctor');
$seguro_id=$this->input->post('seguro_id');
//$id_centro=$this->input->post('id_centro');
if ($seguro_id==11){
if($this->USER_PERFIL=='Admin'){
$where='';
}else{
$where="&& where id_centro=$id_centro";
}
//echo'<select class="form-control select2" name="plan" id="plan">';
$sqlpl ="SELECT id_centro from doctor_agenda_test where id_doctor=$id_doctor $where group by id_centro";

$queryp = $this->db->query($sqlpl);


}else{
$sqlpl ="SELECT id, name from seguro_plan";
$queryp = $this->db->query($sqlpl);

}

$data['query']=$queryp;
$data['seguro_id']=$seguro_id;
$this->load->view('tarifario/search-result-plan-or-centro', $data);



}






 function upload_tariff($doctor_ct, $seguro_ct, $tarif_plan_ct, $centro_med)
{
//$this->load->view('header');
$data['doctor_ct'] = decrypt_url($doctor_ct);	
$data['seguro_ct']= decrypt_url($seguro_ct);	
$data['tarif_plan_ct']= decrypt_url($tarif_plan_ct);
$seguro_name=$this->db->select('title')->where('id_sm',decrypt_url($seguro_ct))->get('seguro_medico')->row('title');


[$get_doctor_info_by_id, $doctor_area]=$this->get_table_data_by_id->getDoctorInfo(decrypt_url($doctor_ct));

$data['doctor_name'] =$get_doctor_info_by_id['name'];
 $data['area_id'] =$get_doctor_info_by_id['area'];
 $data['area'] =$doctor_area;
 $data['seguro_name'] =$seguro_name;
 if(decrypt_url($seguro_ct) ==11){
	 
	 //$plan=$this->db->select('name')->where('id_m_c',decrypt_url($centro_med))->get('medical_centers')->row('name');	
	 
	 [$get_centro_info_by_id, $centro_adress]=$this->get_table_data_by_id->getCentroInfo(decrypt_url($centro_med));
	 
	 $plan=$get_centro_info_by_id['name'];
       $label = "Centro Medico";
	   $plan_id=decrypt_url($centro_med);
 }else{
  $plan=$this->db->select('name')->where('id',decrypt_url($tarif_plan_ct))->get('seguro_plan')->row('name');
   $label = "Plan";
    $plan_id=decrypt_url($tarif_plan_ct);
 }
  $data['label'] =$label;
  $data['plan_name'] =$plan;
    $data['plan_id'] =$plan_id;
$this->load->view('tarifario/upload',$data);
}


 function upload($doctor_ct, $seguro_ct, $tarif_plan_ct, $centro_med){
	 
 }



public function import_exel()
{
$this->load->library('excel');
$categoria=$this->input->post('area_id');
$seguro=$this->input->post('seguro_id');
$plan=$this->input->post('plan_id');
$id_doc=$this->input->post('medico_id');

if(isset($_FILES["file"]["name"]))
{

$path = $_FILES["file"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=1; $row<=$highestRow; $row++)
{
$cod = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
$sim = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$proced = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$mont = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
$data[] = array(
'codigo'=>$cod,
'simon'=>$sim,
'procedimiento'=>$proced,
'monto'=>$mont,
'id_categoria'=>$categoria,
'id_seguro'=>$seguro,
'plan'=>$plan,
'id_doctor'=>$id_doc,
'inserted_by'=>$this->ID_USER,
'updated_by'=>$this->ID_USER,
'inserted_date'=>date("Y-m-d H:i:s"),
'updated_date'=>date("Y-m-d H:i:s")
);
}

}
//$this->excel_import_model->insert($data);
$this->db->insert_batch('tarifarios_test', $data);
if($this->db->affected_rows() > 0){
$response['message'] = 'Cambiado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  2;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
echo json_encode($response);
}

$data = array(
'codigo'=>$this->input->post('codigo_medico'),
'id_seguro'=>$seguro,
'plan'=>$plan,
'id_doctor'=>$id_doc,
'inserted_by'=>$this->ID_USER,
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_by'=>$this->ID_USER,
'updated_time'=>date("Y-m-d H:i:s")

);
$is_insert = $this->model_admin->save_codigo_contrato($data);
if($is_insert){
redirect($_SERVER['HTTP_REFERER']);	
}else{
	echo "FAILED";
}
}




public function load_doc_seguro_with_tariff()
{

$doct_tarif=$this->input->post('id_doctor');
$data['doct_tarif']=$doct_tarif;
$id_seguro=$this->input->post('id_seguro');
$data['USER_PERFIL']=$this->USER_PERFIL;
$data['user_name']=$this->ID_USER;

//if($this->USER_PERFIL=="Medico"){
//$data['seguro_doc_tarif_grouped']=$this->model_admin->seguro_doc_tarif_grouped_med($doct_tarif,$id_seguro);
//}else{
$data['seguro_doc_tarif_grouped']=$this->model_admin->seguro_doc_tarif_grouped($doct_tarif);
//}
$this->load->view('tarifario/aside-seguro-medicos',$data);
}



public function loadSeguroDocTarif()
{
	
$array = explode('-', $this->input->post('id'));

$val = array(
  'id_seguro'=>$array[1],
  'id_doctor'=>$this->input->post('id_doctor'),
   'id_plan'=>$array[0]
);

$id_doctor=$this->input->post('id_doctor');
$id_seguro=$array[1];
$id_plan=$array[0];
$data['id_doctor']=$this->input->post('id_doctor');
$data['id_seguro']=$array[1];
$data['id_plan']=$array[0];
//$data['results']= $this->model_admin->other_seguro_tarif($val);



$query= $this->db->query("SELECT * FROM tarifarios_test WHERE id_doctor =$id_doctor && id_seguro =$id_seguro && plan=$id_plan  LIMIT 10");	
$data['results']=$query->result();

$codigo_contrato_values=$this->db->select('*')->where('id_seguro',$array[1])
->where('id_doctor',$this->input->post('id_doctor'))
->where('plan',$array[0])
->get('codigo_contrato')->row_array();
$data['codigo_contrato']=$codigo_contrato_values;
$this->load->view('tarifario/table-tarifarios-medico', $data);
}



 public function tarifariosTableData(){
	$id_doctor= $this->input->post('id_doctor');
	$id_seguro= $this->input->post('id_seguro');
	 $id_plan=$this->input->post('id_plan');
	 $keyword=$this->input->post('keyword');
	 if($keyword==""){
		 $like = "";
	 }else{
		 $like = "procedimiento LIKE '%$keyword%' && "; 
	 }
	$query= $this->db->query("SELECT * FROM tarifarios_test WHERE $like id_doctor =$id_doctor && id_seguro =$id_seguro && plan=$id_plan ORDER BY id_tarif DESC LIMIT 10");	
$data['results']=$query->result();
$this->load->view('tarifario/tarifarios-data', $data); 
 }





public function delete_tarifarios(){
	$id  = $this->input->post('id');
	$query = $this->model_admin->delete_tarifarios($id);
	}







public function saveDocTasa()
{

$tasa_dolar=$this->input->post('tasa_dolar');
$tasa_euro=$this->input->post('tasa_euro');
$money_dolar=$this->input->post('money_dolar');
$money_euro=$this->input->post('money_euro');
$doctor=$this->input->post('doctor');

if($doctor=="" || ($tasa_dolar=="" && $tasa_euro==""))
{
$response['message'] = 'El medico y la tasa de cambio son obligatorios'; 
$response['status'] =  0;
}else{
if($this->input->post('action')==0){
$data = array(
'tasa_dolar'=>$tasa_dolar,
'tasa_euro'=>$tasa_euro,
'money_dolar'=>$money_dolar,
'money_euro'=>$money_euro,
'id_doctor'=>$doctor,
'inserted_by'=>$this->ID_USER,
'updated_by'=>$this->ID_USER,
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s")
);
$this->db->insert("tasa_de_cambio",$data);
}else{
$data = array(
'tasa_dolar'=>$tasa_dolar,
'tasa_euro'=>$tasa_euro,
'money_dolar'=>$money_dolar,
'money_euro'=>$money_euro,
'updated_by'=>$this->ID_USER,
'updated_time'=>date("Y-m-d H:i:s")
);
$where = array(
'id_doctor'=>$doctor
);
$this->db->where($where);
$this->db->update("tasa_de_cambio",$data);	
}

if($this->db->affected_rows() > 0){
$response['message'] = 'Creado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  2;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
}
echo json_encode($response);
}

function getDocTasa(){
	$doctor=$this->input->post('doctor');
	$devise=$this->db->select('*')->where('id_doctor',$doctor)->get('tasa_de_cambio')->row_array();
   if($devise){ 
   $created_by=$this->db->select('name')->where('id_user',$devise['inserted_by'])->get('users')->row('name');
   $updated_by=$this->db->select('name')->where('id_user',$devise['updated_by'])->get('users')->row('name');
  $insed_time = date("d-m-Y H:i:s", strtotime($devise['inserted_time']));
 $upda_time = date("d-m-Y H:i:s", strtotime($devise['updated_time']));			
   $response = array(
'tasa_dolar'   =>$devise['tasa_dolar'],
'tasa_euro' => $devise['tasa_euro'],
'creation_info' => "<div class='alert alert-primary p-1' style='font-size:13px' role='alert'>
			creado por $created_by $insed_time cambiado por $updated_by $upda_time 
			</div>",  

'action'=> 1

);
	}else{
	$response = array(
	'amount'   =>"",
	'money' => "",
	'creation_info' => "",
	'action'=> 0
	); 
}
echo json_encode($response);
}
 

 
 
 
   function get_service_precio() {
        $id = $this->input->post('id_mssm1');
        $doctorid = $this->input->post('doctorid');
        $precio= $this->db->select('monto')->where('id_tarif', $id)->get('tarifarios_test')->row('monto');
        echo  $precio;
    }
    function get_service_precio_centro() {
        $id = $this->input->post('id_mssm1');
        $precio = $this->db->select('monto')->where('id_c_taf', $id)->get('centros_tarifarios_test')->row('monto');
        echo $precio;
    }
 
 
 
public function convertDeviceToPeso()
{
$moneda=$this->input->post('moneda');
 $tasa=$this->input->post('tasa');
 $patientPlan=$this->input->post('patientPlan');
  $seguro_medico=$this->input->post('seguro_medico');
   $medico=$this->input->post('medico');
   $centro_medico=$this->input->post('centro_medico');
   
   $centro_type=$this->db->select('type')->where('id_m_c', $centro_medico)->get('medical_centers')->row('type');
   if($seguro_medico==11){
	   $plan = $centro_medico;
   }else{
	  $plan = $patientPlan; 
   }
   
   if($centro_type=='privado'){
$query= $this->db->query("SELECT id_tarif AS id,  monto FROM tarifarios_test WHERE id_doctor =$medico && id_seguro =$seguro_medico && plan=$plan");	
   }else{
$query= $this->db->query("SELECT id_c_taf AS id,  monto FROM centros_tarifarios_test WHERE centro_id =$centro_medico && seguro_id =$seguro_medico");	   
   }
$arrayBatch = array(); 
foreach ($query->result() as $row) {  
	if($moneda=="RD$"){
	$monto = $row->monto;
	
	}else{
		$monto = number_format($row->monto / $tasa,2);
	}
  
    $arrayBatch[] = array(   
    'id_tarif'=>$row->id,    
    'monto'=>$monto    
    ); 
} 
$result = $this->db->update_batch('tarifarios_temporal', $arrayBatch, 'id_tarif'); 
echo $result;


}

 

public function saveNewTarifMedico(){
$data = array(
	'codigo'=>$this->input->post('cups'),
	'simon'=>$this->input->post('simons'),
	'procedimiento'=>$this->input->post('procedimiento'),
	'id_categoria'=>$this->input->post('categoria'),
	'monto'=>$this->input->post('monto'),
	'id_doctor'=>$this->input->post('id_doctor'),
	'id_seguro'=>$this->input->post('id_seguro'),
	'plan'=>$this->input->post('plan'),
	'inserted_by'=>$this->ID_USER,
	'inserted_date'=>date("Y-m-d H:i:s"),
	'updated_by'=>$this->ID_USER,
	'updated_date'=>date("Y-m-d H:i:s")
	);
$this->model_admin->saveNewTarifMedico($data);
$this->show_invoice_tariff_by_insurance();
}
 
 
 	 public function save_edit_tarif(){
$id  = $this->input->post('id_tarif');

$updated_date=date("Y-m-d H:i:s");
//$codigo_prestador=$this->input->post('codigo_prestador');
$data = array(
  'codigo'=>$this->input->post('codigo'),
  'simon'=>$this->input->post('simon'),
  'procedimiento'=>$this->input->post('procedimiento'),
   'monto'=>$this->input->post('monto'),
   'updated_by'=>$this->ID_USER,
   'updated_date'=>$updated_date
);
$this->model_admin->save_edit_tarif($id,$data);


}
 
 
public function show_plan_seg(){
$id=$this->input->post('id');
$id_doctor=$this->input->post('id_doctor');
$id_centro=$this->input->post('id_centro');
if ($id==11){
if($id_centro==0){
$where='';
}else{
$where="&& where id_centro=$id_centro";
}
echo'<select class="form-control select2" name="plan" id="plan">';
$sqlpl ="SELECT id_centro from doctor_agenda_test where id_doctor=$id_doctor $where group by id_centro";
$queryp = $this->db->query($sqlpl);
foreach($queryp->result() as $rowpi)
{
$centro_name=$this->db->select('name')->where('id_m_c',$rowpi->id_centro)->get('medical_centers')->row('name');
echo "<option value='$rowpi->id_centro'>$centro_name</option>";
}


}else{


$sqlpl ="SELECT id, name from seguro_plan";
$queryp = $this->db->query($sqlpl);
foreach($queryp->result() as $rowpi)
{
echo "<option value='$rowpi->id'>$rowpi->name</option>";
}


}

} 
 
 
 
 public function load_doc_seguro(){
$id_doctor=$this->input->post('id_doctor');
$sql ="SELECT seguro_medico  FROM  doctor_seguro WHERE id_doctor=$id_doctor";
$query= $this->db->query($sql);
echo "<option selected=''>Seleccione</option>";
foreach ($query->result() as $mes){
$seguro=$this->db->select('title')->where('id_sm',$mes->seguro_medico)->get('seguro_medico')->row('title');
$id_seguro=$this->db->select('id_seguro')->where('id_doctor',$id_doctor)->where('id_seguro',$mes->seguro_medico)->get('tarifarios_test')->row('id_seguro');
if($id_seguro==$mes->seguro_medico){
	$disabled='disabled';
}else{
$disabled='';

}

echo "<option $disabled value='$mes->seguro_medico'>$seguro</option>";

}

}
 
 
  public function save_edit_c_c(){

$codigo_id=$this->input->post('codigo_id');
$data2 = array(
  'codigo'=>$this->input->post('codigo'),
  'updated_by'=>$this->ID_USER,
  'updated_time'=>date("Y-m-d H:i:s")
);
$this->model_admin->save_edit_codigo_prestador($codigo_id,$data2);

}
 
 
 public function getSeguro()
{
$id_centro=$this->input->post('id');
$sql ="SELECT id_sm, title  FROM  seguro_medico
INNER JOIN codigo_contrato ON seguro_medico.id_sm = codigo_contrato.id_seguro
WHERE id_centro=$id_centro";
$query= $this->db->query($sql);
foreach($query->result() as $row) {
echo "<option></option>";
echo "<option value='$row->id_sm'>$row->title</option>";
}

}
 
 public function showTariffTable()
{
	$table=$this->input->post('table');
	 $data['tipo_tarifario']=$this->session->userdata('TIPO_TARIFF');
	     $cent=$this->session->userdata('centro');
		   $seg=$this->session->userdata('seguroId');
	 $select_servicios = $this->db->query("SELECT id_c_taf, groupo FROM  centros_tarifarios_test WHERE centro_id=$cent  && seguro_id=$seg GROUP BY groupo");
	 
	$data['select_servicios']=$select_servicios;
	if($table==1){
$this->load->view('patient/factura/table/factura-centro-publico-seguro-privado', $data); 
	}else{
		$this->load->view('patient/factura/table/factura-centro-publico-seguro-publico', $data); 
	}
} 
 
 
 public function deleteAllTarif()
{

$delete = array(
  'id_seguro'=>$this->input->post('id_seguro'),
  'id_doctor'=>$this->input->post('id_doctor'),
   'plan'=>$this->input->post('id_plan')
);

$this->db->where($delete);
$this->db->delete('tarifarios_test');
//----------------------------------------------------------
$delete2 = array(
  'id_seguro'=>$this->input->post('id_seguro'),
  'id_doctor'=>$this->input->post('id_doctor'),
   'plan'=>$this->input->post('id_plan')
);

$this->db->where($delete2);
$this->db->delete('codigo_contrato');
}
 
 
}