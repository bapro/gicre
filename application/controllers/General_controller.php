<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class General_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_general');
		$this->load->model('model_admin');
	 $this->USER_CONTROLLER = $this->session->userdata('USER_CONTROLLER');
	 $this->USER_PERFIL = $this->session->userdata('user_perfil');
	 $this->load->library("get_table_data_by_id");
	  $this->USER_ID = $this->session->userdata('user_id');
	   $this->IS_ADMINISTRATIVO=$this->session->userdata('admin_position_centro');
		 $this->load->library("search_patient_photo");
		
	}


 public function setIdCentroSession()
{
	
$this->session->set_userdata('id_centro', $this->input->post('id_centro'));
}

 public function calcul_age()
{
	
	$patient_info = $this->model_general->calculatePatientAge($this->input->post('date_nacer'));
	echo $patient_info['age_complete'];
}
 

public function getDocsFromCenterMed() {
	
	if($this->USER_PERFIL=='Medico'){
		$where="&& id_doctor=$this->USER_ID";
	}else{
		$where="";
	}
	
	$centro_medico=$this->input->post('centro_medico');
	$sql = "SELECT id_user, name FROM users
	JOIN doctor_agenda_test on users.id_user=doctor_agenda_test.id_doctor
	WHERE id_centro=$centro_medico $where GROUP BY id_doctor";

	$query = $this->db->query($sql);
	
	echo '<option></option>';
	foreach ($query->result() as $row) {
	echo "<option value='$row->id_user'>$row->name</option>";
	}
	

}
	


	

public function getcentEsp()
{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT especialidad FROM  medial_center_esp WHERE id_medical_center=$id_centro";
$querysig = $this->db->query($sql);
echo '<option value=""></option>';
foreach ($querysig->result() as $rf){
$esp= $this->db->select('title_area')->where('id_ar',$rf->especialidad)->get('areas')->row('title_area');
echo '<option value="'.$rf->especialidad.'">'.$esp.'</option>';

}
}


public function search_patientf()
{
$patient_entry=$this->input->post('patient-entry');

if(is_numeric($patient_entry)){
	echo "has numero";
} else{
	echo "don't have numero";
}
}


 function get_this_cedula()
{
$this->padron_database = $this->load->database('padron',TRUE);

$databasePadron=$this->padron_database->select('Cedula, Imagen')->where('Cedula','40239291624')->get('photo3_')->row_array();
$photoPat= '<img class="img-fluid img-thumbnail"   width="270" src="data:image/gif;base64,'. base64_encode(pack("H*", $databasePadron['Imagen'])) .'" />';
echo $photoPat;
}




public function check_if_entry_exist()
{
	$keyword = $this->input->post('keyword');
	$field=$this->input->post('field');
	$table=$this->input->post('table');
   
  switch ($table) {
  case "users":
    $clear="userEmail";
    break;
	 case "areas":
    $clear="area";
    break;
	case "medical_centers":
    $clear="centro-medico-name";
    break;
	case "patients_appointments":
    $clear="cedula";
    break;
  default:
    $clear="";
}
     
$query = $this->db->get_where($table,array($field=>$keyword));
	if($query->num_rows() > 0 )
	{
		if($field=='nombre' && $table=='patients_appointments'){
		$data['results']=$query->row_array();
		$this->load->view('patient/forms/patient-duplicated',$data);
		} else{
		echo "<span class='text-danger'><em>$keyword</em> existe ya  !</span>";
		echo "<script>$('#$clear').val('');</script>";
		}
		
	} else {

	}

}


 function search_patient_by_nec()
{
	$nec = $this->uri->segment(3);
	$id_p_a=$this->db->select('id_p_a')->where('id_p_a',$nec)->get('patients_appointments')->row('id_p_a');
// IF CEDULA FOUND IN GICRE REDIRECT	
if($id_p_a){
	$id_p_a=encrypt_url($id_p_a);
	redirect($this->USER_CONTROLLER."/patient/".$id_p_a."/0/0");
}else{
	redirect($this->USER_CONTROLLER."/create_patient");
}
}


public function patient_nombres_result_data_(){
	   $postData = $this->input->post();

     // Get data
     $data = $this->model_general->searchPatientByNames($postData);

     echo json_encode($data);
}

public function patient_nombres_result_data(){
	$this->padron_database = $this->load->database('padron',TRUE);
	
    $draw=intval($this->input->get("draw"));
    $start=intval($this->input->get("start"));
    $length=intval($this->input->get("length"));
	
$nombres =strtoupper($this->input->get('nombres'));
$apellidos = strtoupper($this->input->get('apellidos'));	
$apellidos2 = strtoupper($this->input->get('apellidos2'));

 $query=$this->model_general->searchPatientByNames($nombres, $apellidos, $apellidos2);	
$query_total=$this->model_general->searchPatientByNamesTotal($nombres, $apellidos, $apellidos2);
//$query= $this->padron_database->query("SELECT Cedula, nombres, apellido1, apellido2 FROM padron WHERE nombres LIKE  '$nombres' $apellidos_search");
    $data= [];
	
    foreach($query as $r) {
 $link ='<a class="btn btn-success"  href="'.base_url().'general_controller/search_patient_by_cedula/'.$r->Cedula.'" > ver </a>';

	  $photo=$this->padron_database->select('Imagen')->where('Cedula',$r->Cedula)->get('padron_photos')->row('Imagen');
	  if($photo){
	  $photoPat= '<img loading="lazy" class="img-fluid img-thumbnail"   width="70" src="data:image/gif;base64,'. base64_encode(pack("H*",$photo)) .'" />';
	  }else{
		 $photoPat= '<img  class="img-fluid img-thumbnail" width="70" src="'.base_url().'/assets_new/img/user-d.jpg"  />';  
	  }

	 

    $sub_array = array();  
		$sub_array[] = $photoPat; 
		$sub_array[] = $r->nombres;
		$sub_array[] = $r->apellido1;
		$sub_array[] = $r->apellido2;		  
		$sub_array[] = $r->Cedula;
		$sub_array[] = $link;
		$data[] = $sub_array; 
}

    $result=array(
             "draw"=>$draw,
               "recordsTotal"=>$query_total,
               "recordsFiltered"=>30,
               "data"=>$data
          );
    echo json_encode($result);
    exit();


 }




 function test()
{
$this->padron_database = $this->load->database('padron2',TRUE);
	$cedula=$this->padron_database->select('Cedula')->where('Cedula',00100000017)->get('fotos_APD_APD')->row_array();
	
	echo $cedula['Cedula'];
	
	
	//$cedula=$this->padron_database->select('NOMBRE')->where('NEC',12)->get('ANTECEDENTES')->row('NOMBRE');
	
	//echo $cedula;
}


  public function newEntry() {
        $message = $this->db->select('id_apoint')->where('confirmada', 0)->where('cancelar', 0)->where('doctor', $this->USER_ID)->where('filter_date', date("Y-m-d"))->where('seen_hoy', 0)->get('rendez_vous');
        $data['result'] = $message->num_rows();
        $this->load->view('optica/tecnico-de-lentes/newEntry', $data);
    }



public function citas_hoy(){
if($this->USER_PERFIL=='Admin'){	
if($this->IS_ADMINISTRATIVO){
$query_citas=$this->db->select('confirmada')->where('confirmada',0)->where('cancelar',0)->where('centro',$this->IS_ADMINISTRATIVO)->where('filter_date',date("Y-m-d"))->where('seen_hoy', 0)->get('rendez_vous');

}else{
$query_citas=$this->db->select('confirmada')->where('confirmada',0)->where('cancelar',0)->where('filter_date',date("Y-m-d"))->where('seen_hoy', 0)->get('rendez_vous');
	
}
}
else{
$query_citas=$this->db->select('confirmada')->where('confirmada',0)->where('cancelar',0)->where('doctor', $this->USER_ID)->where('filter_date',date("Y-m-d"))->where('seen_hoy', 0)->get('rendez_vous');
}
$result= $query_citas->num_rows();
if($result > 0){
echo "<span class='badge bg-danger rounded-pill fs-6' >$result</span>";
}
}


public function cola_de_solicitud(){
if($this->USER_PERFIL=='Admin'){
$admin_centro=$this->session->userdata['admin_position_centro'];
if($admin_centro){
$query_sol=$this->db->select('id_apoint AS id')->where('centro',$admin_centro)->where('confirmada',1 )->get('rendez_vous');	
}else{
$query_sol=$this->db->select('id_apoint AS id')->where('confirmada',1 )->get('rendez_vous');
}
}elseif($this->USER_PERFIL=="Medico"){
$query_sol=$this->db->select('id_apoint AS id')->where('confirmada',1 )->where('doctor',$this->USER_ID)->get('rendez_vous');	
}else{
$query_sol=$this->db->select('id_apoint AS id')->where('confirmada',1 )->where('doctor',111111111111)->get('rendez_vous');		
}
$result= $query_sol->num_rows();
if($result > 0){
echo "<span class='badge bg-danger rounded-pill fs-6' >$result</span>";
}
}






		
}



