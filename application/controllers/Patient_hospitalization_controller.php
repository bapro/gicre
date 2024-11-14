<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_hospitalization_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('navigation/account_demand_model');
		$this->load->model('model_general');
		$this->load->model('model_admin');
		 $this->load->library('form_validation');
         $this->load->library('hospitalization_lib'); 		 
		 $this->load->library("create_forms");
		 $this->load->library("get_table_data_by_id");
		  $this->load->model('hospitalization_patients_data_model');
		 $this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
		 $this->ID_USER=$this->session->userdata['user_id'];
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		 $this->ID_CENTRO =$this->session->userdata('id_centro');
		 $this->ID_PATIENT = $this->session->userdata('ID_PATIENT');
		    if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login/backTologin');
}
	
		
	}



 function showForm()
{
$id=$this->input->post('id_cita');
if($id==0){
 [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]= $this->create_forms->getCentroAndSeguroByPerfil(0);
    $data['result_centro_medicos'] = $result_centro_medicos;
 

$this->load->view('patient/hospitalization/create-hospitalization-form', $data);
}else{
$this->edit_hospitalization($id); 	
}

}


 function edit_hospitalization($id_hosp)  
{  
 
   $data['id_hosp']=$id_hosp;
$sql ="SELECT * FROM hospitalization_data WHERE id =$id_hosp";
$query= $this->hospitalization_emgergency->query($sql);
foreach($query->result() as $rowId)
 [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]= $this->create_forms->getCentroAndSeguroByPerfil($rowId->centro);
    $data['result_centro_medicos'] = $result_centro_medicos;
$data['isSeguroTitle']=$this->db->select('seguro_medico')->where('id_p_a',$rowId->id_patient)->get('patients_appointments')->row('seguro_medico');
$data['query']=$query;
$data['doctors'] = $this->model_admin->display_all_doctors();
$sqls ="SELECT sala, id FROM  mapa_de_cama WHERE centro=$rowId->centro GROUP BY sala";
$data['querySala'] = $this->hospitalization_emgergency->query($sqls);

$sqlServ ="SELECT id, servicio FROM  mapa_de_cama WHERE centro=$rowId->centro AND id='$rowId->sala' GROUP BY servicio";
$data['queryServ']  = $this->hospitalization_emgergency->query($sqlServ);

$sqlCama ="SELECT id, num_cama FROM  mapa_de_cama WHERE centro=$rowId->centro  AND id='$rowId->sala' GROUP BY num_cama";
$data['queryCama'] = $this->hospitalization_emgergency->query($sqlCama);

$createdBy=$this->db->select('name')->where('id_user',$rowId->inserted)->get('users')->row('name');
$updateddBy=$this->db->select('name')->where('id_user',$rowId->updated)->get('users')->row('name');
$dateChange=date("d-m-Y H:i:s", strtotime($rowId->timeupdated));
$timeinserted=date("d-m-Y H:i:s", strtotime($rowId->timeinserted));
	$updateInfo=" | cambiado por $updateddBy, $dateChange";

$patHeader="

<div class='col-md-12 alert alert-info'>Este paciente has sido hospitalizado desde $timeinserted por $createdBy $updateInfo</div>

";


$data['result_doc_by_centers']= $result_doc_by_centers;


$data['patHeader']=$patHeader;
 $data['result_qry']=$query->result();
//echo $this->create_forms->showPatientInfo($rowId->id_patient);
$this->load->view('patient/hospitalization/form-edit',$data);	 
}
 
 
 
 public function getPatHospValues()
{
	$values=$this->hospitalization_emgergency->select('centro, id_patient')->where('id',$this->input->post('id'))->get('hospitalization_data')->row_array();
	

$result=array(
 "id_patient_hist"=>$values['id_patient'],
   "id_centro_to_save"=>$values['centro']
);
echo json_encode($result);
	
	
}
 
 
 
  public function largeModalKardex()
{
	$values=$this->hospitalization_emgergency->select('centro, id_patient')->where('id',$this->input->post('id'))->get('hospitalization_data')->row_array();

$id_patient_hist=$values['id_patient'];
$id_centro_to_save=$values['centro'];


 $query_k_ordm= $this->hospitalization_emgergency->query("SELECT * from hosp_orden_medica_recetas WHERE historial_id=$id_patient_hist && kardex=0 && canceled=0");
  $data['query_k_ordm'] =$query_k_ordm;
 	$this->load->view('hospitalization/clinical-history/kardex/index',  $data); 
	
	
}
 
 
 
 
 
 
 
 
 
 
 
 
public function add_new_hosp()
{
 $fecha_alta=$this->hospitalization_emgergency->select('fecha_alta')->where('id_patient',$this->ID_PATIENT)->get('hospitalization_data')->row('fecha_alta');
 

 
 if($fecha_alta=='0000-00-00 00:00:00' && $this->input->post('id')==0){
 $response['status'] =3;
$response['message'] = 'Paciente esta hospitalizado, todavia no le dieron alta!'; 	
}
elseif($this->input->post('hosp_centro') =='' || 
$this->input->post('hosp_doctor') =='' || $this->input->post('hosp_causa') ==''||
$this->input->post('hosp_ingreso') =='' || $this->input->post('hosp_sala') =='' ||
$this->input->post('hosp_servicio') =='' || $this->input->post('hosp_cama') =='' ){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
} 
elseif(($this->session->userdata('ID_SEGURO_MEDICO') !=11) && ($this->input->post('hosp_auto') =='' || $this->input->post('hosp_auto_por') =='')){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
}

else{ 
 $savedas = array(
'centro'=> $this->input->post('hosp_centro'),
//'esp'  => $this->input->post('hosp_esp'),
'doc'=> $this->input->post('hosp_doctor'),
'causa' =>$this->input->post('hosp_causa'),
'via' =>$this->input->post('hosp_ingreso'),
'id_patient' =>$this->session->userdata('ID_PATIENT'),
'sala' => $this->input->post('hosp_sala'),
'servicio' => $this->input->post('hosp_servicio'),
'cama' => $this->input->post('hosp_cama'),
'hosp_auto' => $this->input->post('hosp_auto'),
'hosp_auto_por' => $this->input->post('hosp_auto_por'),
'inserted' => $this->input->post('inserted_by'),
'updated' => $this->input->post('updated_by'),
'cancelar' => 0,
'seen' =>0,
'alta' => 0,
'timeinserted' =>$this->input->post('inserted_time'),
'timeupdated' =>$this->input->post('updated_time'),
'canceled' =>0
   );
   if($this->input->post('id')==0){
$this->hospitalization_emgergency->insert("hospitalization_data",$savedas);
   }else{
	$this->hospitalization_emgergency->where('id', $this->input->post('id'));
	$this->hospitalization_emgergency->update('hospitalization_data',$savedas); 
   }
if($this->hospitalization_emgergency->affected_rows() > 0){
$response['message'] = 'Realizado con exito!'; 
$response['status'] =  1;
}else{
   $response['status'] =  2;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
}
echo json_encode($response);
}

 
 public function hospitalizationTable(){
     $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
	$id_patient = $this->input->get("id");
$query = $this->hospitalization_emgergency->query("SELECT * FROM hospitalization_data WHERE alta =0 && inserted=$this->ID_USER && id_patient = $id_patient && canceled = 0 ORDER BY id DESC");

    $data = [];
    foreach ($query->result() as $row) {
		 $cama=$this->hospitalization_emgergency->select('num_cama')->where('id',$row->cama)->get('mapa_de_cama')->row('num_cama');
	 $patient=$this->db->select('nombre,photo,id_p_a,edad,nec1,seguro_medico,plan,afiliado')->where('id_p_a',$row->id_patient)
     ->get('patients_appointments')->row_array();
     $afiliado = $patient['afiliado'];
		if($patient['photo']){
		$img= '<img  class="img-fluid mb-3" src="'.base_url().'/assets/img/patients-pictures/'.$patient['photo'].'"  />';
		
		}
		$seguro_med=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])->get('seguro_medico')->row('title');
		
		 if($patient['seguro_medico'] !=''){
			$afiliado = $patient['afiliado'];
			$nss=$this->db->select('input_name,inputf')->where('patient_id',$row->id_patient)->get('saveinput')->row_array();
		$inputf=$nss['inputf'];
		$input_name=$nss['input_name'];
		$seguro_info = "Tipo de afiliado: $afiliado , $inputf: $input_name";
		}else{
			$seguro_info ="";
		}
	$seguro_datao = "<div><ul class='nav navbar-nav  show-btn-print-current ' style='position:absolute'>
	<li class='dropdown list-data-available '>
  <button type='button' class='btn btn-default dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>
  $seguro_med</span>
  </button>
		<ul class='dropdown-menu '>
		<li class'data-li'><a class='dropdown-item'>$seguro_info</a></li>
	   
		
		</ul>
		</li>
		</ul>
		</div>";
		
		
		$doctor=$this->db->select('name')->where('id_user',$row->inserted)->get('users')->row('name');
		$go_to_hist ='<a   href="'.$row->id_patient.'" title="Historia clinica">H.C.</a>';
		$go_to_orden ='<a class="dropdown-item"  href="'.$row->id_patient.'" title="Orden Medica">Orden Medica</a>';
		$go_to_notas ='<a  class="dropdown-item" href="'.$row->id_patient.'" title="Notas de Evolución">Notas de Evolución</a>';
		$go_to_des_qui ='<a  class="dropdown-item" href="'.$row->id_patient.'" title="Descripción Quirúrgica">Descripción Quirúrgica</a>';
		$go_to_kardex ='<a  class="dropdown-item" href="'.$row->id_patient.'" title="KARDEX">Kardex</a>';
		$go_to_insumo ='<a  class="dropdown-item" href="'.$row->id_patient.'" title="INSUMO">Insumo</a>';
		$actions = "<div class='btn-group' style='position:absolute' >
		<ul class='nav navbar-nav' >
	<li class='dropdown list-data-available '>
  <button type='button' class='btn btn-default dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>
  $go_to_hist</span>
  </button>
		<ul class='dropdown-menu z-index-20'>
		<li class'data-li'>$go_to_orden</li>
	   <li class'data-li'>$go_to_notas</li>
		<li class'data-li'>$go_to_des_qui</li>
		<li class'data-li'>$go_to_kardex</li>
		<li class'data-li'>$go_to_insumo</li>
		</ul>
		</li>
		</ul>
		</div>";
		
		
		
	 $sub_array = array();
	  $sub_array[] = $row->timeinserted;
	  $sub_array[] = $img;
      $sub_array[] = $patient['nombre'];
	  $sub_array[] = $patient['edad'];
	  $sub_array[] =$patient['nec1'];
	  $sub_array[] = $seguro_datao;
      $sub_array[] = $doctor;
	  $sub_array[] = $row->causa;
	  $sub_array[] = $row->via;
	  $sub_array[] = $row->sala;
      $sub_array[] =$row->servicio;
	  $sub_array[] = $cama;
	  $sub_array[] = $actions ;
      $data[] = $sub_array;
    }

    $rowesult = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    echo json_encode($rowesult);
    exit();
}
 
 public function loadPatientTable(){
	$this->load->view('patient/hospitalization/load-patient-hospitalization'); 
 }
 
  public function hospitalizationPatientTable(){
     $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
$query = $this->hospitalization_emgergency->query("SELECT * FROM hospitalization_data WHERE id_patient = $this->ID_PATIENT && canceled = 0 ORDER BY id DESC");

    $data = [];
    foreach ($query->result() as $row) {
	if($row->fecha_alta ==NULL){
		$fecha_egreso = "<em class='text-danger' >pendiente</em>";
	}else{
		$fecha_alta=date("d-m-Y H:i:s", strtotime($row->fecha_alta));
		$fecha_egreso = "<em class='text-success' >$fecha_alta</em>";	
	}
		 $mapa_de_cama=$this->hospitalization_emgergency->select('num_cama, sala, servicio')->where('id',$row->cama)->get('mapa_de_cama')->row_array();
	 	//$doctor=$this->db->select('name')->where('id_user',$row->inserted)->get('users')->row('name');
		$centro=$this->db->select('name')->where('id_m_c',$row->centro)->get('medical_centers')->row('name');
		
		
		//$button_update ='<button  type="button"    data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editPatientHosp"  class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></button>';
			$button_update ='<button type="button"   id="'.$row->id.'" class="btn btn-sm btn-primary update-this-hospitalization"><i class="bi bi-pencil"></i></button>';
			
			if($row->inserted==$this->ID_USER){
			$button_delete ='<button type="button"   id="'.$row->id.'" class="btn btn-danger btn-sm "><i class="bi bi-x-square "></i></button>';
			}else{
			$button_delete='';
			}
		
	 $sub_array = array();
	  $sub_array[] = date("d-m-Y H:i:s", strtotime($row->timeinserted));
	  $sub_array[] = $fecha_egreso;
	  $sub_array[] = $centro;
      //$sub_array[] = $doctor;
	  $sub_array[] = substr($row->causa, 0, 80).'...';
	  $sub_array[] = $row->via;
	  $sub_array[] = $mapa_de_cama['sala'];
      $sub_array[] =$mapa_de_cama['servicio'];
	  $sub_array[] = $mapa_de_cama['num_cama'];
	  $sub_array[] = $button_update ." ". $button_delete;
      $data[] = $sub_array;
    }

    $rowesult = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    echo json_encode($rowesult);
    exit();
}
 
 
 //----------LIST HOSPITALIZATION---------------
 
 
 function fetch_patient_data()
 {
  $id_patient = $this->input->post('id_patient');
  
  $output = array(

   'patient_data'   => $this->hospitalization_patients_data_model->fetch_patient_data($id_patient)
  );
  echo json_encode($output);
 }
 
 function fetch_patients()
 {
	  $id_centro = $this->input->post('centro');
	  $origine = $this->input->post('origine');
	   $desde = $this->input->post('desde');
	    $hasta = $this->input->post('hasta');
	    if($desde==0){
	    	$condition ='';
	    } else {
	     $condition = "DATE(timeinserted) BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "'"." AND ";
	  }
	  $sql ="SELECT  id_patient FROM  hospitalization_data WHERE $condition centro=$id_centro AND alta=$origine GROUP BY id_patient";
$query= $this->hospitalization_emgergency->query($sql);
	  
	  
	 $results = '';
$results = '<option value=""></option>';
foreach($query->result() as $row) {
	$nombre=$this->db->select('nombre')->where('id_p_a',$row->id_patient)->get('patients_appointments')->row('nombre');
	 $results .= '<option value="' . $row->id_patient .'" >' . $nombre . '</option>';	
	
} 
$output = array(

   'patient_list'   => $results
  );
  echo json_encode($output);
 }
   
  function fetch_patients_hoptalization_data()
 {
  sleep(1);
  $centro = $this->input->post('centro');
   $patient = $this->input->post('patient');
   $origine = $this->input->post('origine');
$desde = $this->input->post('desde');
	    $hasta = $this->input->post('hasta');
	    if($desde==0){
	    	$condition ='';
	    } else {
	     $condition = "DATE(timeinserted) BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "'"." AND ";
	  }
   
  $this->load->library('pagination');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->hospitalization_patients_data_model->count_all($centro, $origine, $patient,$condition);
  $config['per_page'] = 10;
  $config['uri_segment'] = 3;
  $config['use_page_numbers'] = TRUE;
  $config['full_tag_open'] = '<ul class="pagination">';        
    $config['full_tag_close'] = '</ul>';        
    $config['first_link'] = 'Primero';        
    $config['last_link'] = 'Ultimo';        
    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['first_tag_close'] = '</span></li>';        
    $config['prev_link'] = '&laquo';        
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['prev_tag_close'] = '</span></li>';        
    $config['next_link'] = '&raquo';        
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['next_tag_close'] = '</span></li>';        
    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['last_tag_close'] = '</span></li>';        
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
    $config['cur_tag_close'] = '</a></li>';        
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['num_tag_close'] = '</span></li>';
  $config['num_links'] = 3;
  $this->pagination->initialize($config);
  $page = $this->uri->segment(3);
  $start = ($page - 1) * $config['per_page'];
  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'product_list'   => $this->hospitalization_patients_data_model->fetch_data($config["per_page"], $start, $centro, $origine, $patient,$condition)
  );
  echo json_encode($output);
 }
 
 
 
 public function getHospServ()
{
$id_centro=$this->input->post('id_centro');
$id_mapa=$this->input->post('id_mapa');
$sala=$this->hospitalization_emgergency->select('sala')->where('id',$id_mapa)->get('mapa_de_cama')->row('sala');
$sql ="SELECT  id, servicio FROM  mapa_de_cama WHERE centro=$id_centro AND sala='$sala' GROUP BY servicio";
$querysig = $this->hospitalization_emgergency->query($sql);
foreach ($querysig->result() as $rf){
echo '<option value="" hidden></option>';
echo '<option value="'.$rf->id.'">'.$rf->servicio.'</option>';

}
}
 
 
    public function getHospCama()
    {
        $id_centro = $this
            ->input
            ->post('id_centro');
			
			  $id_mapa = $this->input->post('id_mapa');
			$sala=$this->hospitalization_emgergency->select('sala')->where('id',$id_mapa)->get('mapa_de_cama')->row('sala');
			
        $sql = "SELECT id, num_cama  
FROM mapa_de_cama
WHERE id NOT IN
(SELECT hospitalization_data.cama 
   FROM  hospitalization_data WHERE alta = 0
   ) AND centro = $id_centro AND sala='$sala'";
        $querysig = $this
            ->hospitalization_emgergency
            ->query($sql);
			if(!$querysig->result()){
			 echo '<option value="" >no hay cama disponible</option>';
			}else{
        foreach ($querysig->result() as $rf)
        {
            echo '<option value="" hidden></option>';
            echo '<option value="' . $rf->id . '">' . $rf->num_cama . '</option>';
        }
			}
    }
 
 
public function getHospSala()
{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT id, sala FROM  mapa_de_cama WHERE centro=$id_centro GROUP BY sala";
$querysig = $this->hospitalization_emgergency->query($sql);
foreach ($querysig->result() as $rf){
echo '<option value="" hidden></option>';
echo '<option value="'.$rf->id.'">'.$rf->sala.'</option>';

}
}
 
 
 
 function autoCompleteInputHospMed()
{
$input_name=$this->input->post('input_name');
$keyword=$this->input->post('keyword');
if(!empty($keyword)) {
$data['field_name_in_table']= 'sub_groupo';
$data['input_name']=  $input_name;
$data['div_result']=  $this->input->post('div_result');
if($input_name=='hospOrdenMedicaMed'){
	$search='medica';
}elseif($input_name=='hospOrdenMedicaEstEst'){
	$search='estudio';
}else{
$search='laboratorio';	
}
$sql ="SELECT sub_groupo FROM  centros_tarifarios_test WHERE groupo LIKE '" . $search . "%' AND sub_groupo LIKE '" . $keyword . "%' AND centro_id=$this->ID_CENTRO GROUP BY sub_groupo LIMIT 0,20";
$data['query']=$this->db->query($sql); 
if($input_name=='searchLabOrdMedByName'){
 $this->load->view('clinical-history/indications/laboratory/search-lab-by-name', $data); 
}else{
$this->load->view('clinical-history/auto-complete-field-results', $data);
}


    }


}
 
 
 
  function autoCompleteForms()
{
$keyword=$this->input->post('keyword');
$field_name_in_table=$this->input->post('field_name_in_table');
$table=$this->input->post('table');
if(!empty($keyword)) {
$data['field_name_in_table']= $field_name_in_table;
$data['input_name']=  $this->input->post('input_name');
$data['div_result']=  $this->input->post('div_result');

$sql ="SELECT $field_name_in_table FROM $table WHERE $field_name_in_table LIKE '" . $keyword . "%' GROUP BY $field_name_in_table LIMIT 0,30";
$data['query']=$this->hospitalization_emgergency->query($sql); 

$this->load->view('clinical-history/auto-complete-field-results', $data);



    }


}
 
 
 
}