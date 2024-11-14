<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{
	
	function  __construct(){
		parent::__construct();
		$this->load->model('report_model');

	}
	
	
	
	
	
function index(){
$perfil=$this->db->select('perfil')->where('id_user',$this->uri->segment(3))->get('users')->row('perfil');	
$data['id_user'] = $this->uri->segment(3);
$data['id_cm'] = $this->uri->segment(4);
$data['centro_name']=$this->db->select('name')->where('id_m_c',$this->uri->segment(4))->get('medical_centers')->row('name');
$target = $this->uri->segment(5);
$data['target']=$target;
$data['table_name']="nota_med_salud_ocupacional";
$data['controller_report']="drugsReport";
$data['perfil']=$perfil;
if($perfil=='Admin'){
 $this->load->view('admin/header_admin', $data);
	
}else{
	
 $this->load->view('medico/header', $data);
 
}
$this->load->view('report/index', $data);

}


function fetch_date_report(){
$table = $this->input->post('table');
$centro_colmn = $this->input->post('centro_colmn');
 $centro_id = $this->input->post('centro_id');
$sql ="SELECT inserted_time FROM $table WHERE $centro_colmn =$centro_id GROUP BY DATE(inserted_time) ORDER BY inserted_time DESC";
$querydate = $this->db->query($sql);
foreach ($querydate->result() as $row){
echo '<option value="" hidden></option>';
echo '<option value="'.$row->inserted_time.'">'.date("d-m-Y",strtotime($row->inserted_time)).'</option>';
}	
}

	
 public function report_result(){
	 
$to=$this->input->post('to');
$from=$this->input->post('from');
$from_query = substr($from, 0, 10);
$to_query = substr($to, 0, 10);	 
$id_centro=$this->input->post('id_centro');	 
$report_type = $this->input->post('report_type'); 
	
$action= substr($report_type,0,1);
if($action==1){
	//query for doc name
$sql="SELECT count(historial_id) as tot_patients, user_id as idMed FROM h_c_sinopsis
JOIN users ON users.id_user = h_c_sinopsis.user_id
 WHERE h_c_sinopsis.filter_date >= '$from_query' AND h_c_sinopsis.filter_date <= '$to_query'
 AND centro_medico=$id_centro AND h_c_sinopsis.inserted_by !=348 AND signopsis !='' AND enf_motivo !='' GROUP BY h_c_sinopsis.inserted_by";
}elseif($action==2){
	//query for area
$sql="SELECT count(historial_id) as tot_patients, user_id as idMed FROM h_c_sinopsis
JOIN users ON users.id_user = h_c_sinopsis.user_id
 WHERE h_c_sinopsis.filter_date >= '$from_query' AND h_c_sinopsis.filter_date <= '$to_query'
 AND centro_medico=$id_centro AND h_c_sinopsis.inserted_by !=348 AND signopsis !='' AND enf_motivo !='' GROUP BY area";
}elseif($action==3){
	//query for shift
$sql="SELECT count(historial_id) as tot_patients, gbl_shift, user_id as idMed FROM h_c_sinopsis
JOIN employees ON employees.id_p_a = h_c_sinopsis.historial_id
 WHERE h_c_sinopsis.filter_date >= '$from_query' AND h_c_sinopsis.filter_date <= '$to_query'
 AND centro_medico=$id_centro AND h_c_sinopsis.inserted_by !=348 AND signopsis !='' AND enf_motivo !='' GROUP BY gbl_shift";	
}elseif($action==4){
	//query for nurse name
$sql="SELECT count(id_patient) as tot_patients, name AS idMed FROM medicamento_salud_ocupacional
JOIN users ON users.id_user = medicamento_salud_ocupacional.id_user
 WHERE DATE(medicamento_salud_ocupacional.inserted_time) >= '$from_query' AND DATE(medicamento_salud_ocupacional.inserted_time) <= '$to_query'
 AND perfil='Asistente Medico' AND id_centro=$id_centro  GROUP BY medicamento_salud_ocupacional.id_user";
}elseif($action==5){

$sql="SELECT count(id) as tot_patients, name AS idMed  FROM  nota_med_salud_ocupacional JOIN users ON users.id_user =  nota_med_salud_ocupacional.inserted_by WHERE DATE(nota_med_salud_ocupacional.inserted_time) >= '$from_query' AND DATE( nota_med_salud_ocupacional.inserted_time) <= '$to_query' AND perfil='Asistente Medico' AND id_centro=$id_centro GROUP BY  nota_med_salud_ocupacional.inserted_by ";
}

 

$data['centro_name']=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
$data['from']=$from_query;
$data['to']=$to_query;
$data['action']=$action;
$data['id_centro']=$id_centro;
$query = $this->db->query($sql);
$data['reports_medicos']=$query->result();
$this->load->view('report/report-by-name-area-turno',$data);
//$this->load->view('report/report-by-shift',$data);
}


 
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------
}