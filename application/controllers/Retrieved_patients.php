<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Retrieved_patients extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('excel_import_model');
$this->load->library('excel');
$this->load->model('model_admin');
}


public function header_user(){

$data['name']=$this->session->userdata['medico_name'];
$id_user=$this->session->userdata['medico_id'];
$data['user_name']=$id_user;
$perfil=$this->session->userdata['medico_perfil'];
$data['perfil']=$perfil;

$this->load->view('medico/header',$data);	
}




public function index(){
$this->header_user();

$sql="SELECT * FROM rendez_vous WHERE rendez_vous.id_patient NOT IN (SELECT id_p_a FROM patients_appointments) GROUP BY doctor";

$data['patients'] = $this->db->query($sql);
$this->load->view('retrieve-patient/index',$data);


}

 function getPatient(){
$id_doc = $this->input->post('id_doc');
$sql="SELECT * FROM rendez_vous  WHERE rendez_vous.id_patient NOT IN (SELECT id_p_a FROM patients_appointments) AND  doctor =$id_doc GROUP BY id_patient";
$query = $this->db->query($sql);
$data['id_doc'] = $id_doc;
 $totalRecords = $query->num_rows();
$data['totalPages'] = ceil($totalRecords/5);
$data['perPage']=5;
$data['totalRecords']=$totalRecords;
$this->load->view('retrieve-patient/patient-data',$data);
}


 function getData(){
	$id_doc = $this->input->post('id_doc');
$perPage = 5;
if (isset($_GET["page"])) { 
    $page  = $_GET["page"]; 
} else { 
    $page=1; 
};  
$startFrom = ($page-1) * $perPage;  
$sqlQuery = "SELECT * FROM rendez_vous  WHERE rendez_vous.id_patient
 NOT IN (SELECT id_p_a FROM patients_appointments)
 AND  doctor =$id_doc  GROUP BY id_patient
 ORDER BY id_apoint ASC LIMIT $startFrom, $perPage";  
 $patients = $this->db->query($sqlQuery);
$paginationHtml = '';
foreach ($patients->result() as $row){
$h_c_sinopsis=$this->db->select('enf_motivo, signopsis')->where('historial_id',$row->id_patient)->get('h_c_sinopsis')->row_array();
$id_seguro=$this->db->select('seguro_medico')->where('paciente',$row->id_patient)->get('factura2')->row('seguro_medico');
$seguro_name=$this->db->select('title')->where('id_sm',$id_seguro)->get('seguro_medico')->row('title');
$doctor=$this->db->select('name')->where('id_user',$row->doctor)->get('users')->row('name');
$created_by=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
    $paginationHtml.='<tr>';  
    $paginationHtml.='<td>'.$row->id_patient.'</td>';
    $paginationHtml.='<td>'.$row->fecha_propuesta.'</td>';
	$paginationHtml.='<td>'.$row->causa.'</td>';
    $paginationHtml.='<td>'.$h_c_sinopsis['enf_motivo'].'</td>'; 
    $paginationHtml.='<td>'.$h_c_sinopsis['signopsis'].'</td>';
    $paginationHtml.='<td>'.$seguro_name.'</td>';
    $paginationHtml.='<td>'.$doctor.'</td>'; 
	$paginationHtml.='<td>'.$created_by.'</td>'; 
    $paginationHtml.='</tr>';  
} 
$jsonData = array(
    "html"  => $paginationHtml,  
);
echo json_encode($jsonData); 
}




}
?>