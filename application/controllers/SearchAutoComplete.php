<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SearchAutoComplete extends CI_Controller {
public function __construct()
{
parent::__construct();
 $this->load->model('model_admin');
$this->load->model('navigation/account_demand_model');
}



function filterDiagnosticos()
{
if(!empty($this->input->post('keyword'))) {
$keyword= $this->input->post('keyword');
$table= $this->input->post('table');
$field= $this->input->post('field');
$sql ="SELECT $field AS filed_name FROM $table WHERE  $field like '" . $keyword . "%'  GROUP BY $field ORDER BY $field DESC LIMIT 0,10 ";
$query= $this->db->query($sql);
$data['query'] = $query;
$data['origin'] = $this->input->post('origin');
$data['action'] = $this->input->post('action');
$data['onSelectedValue'] = $this->input->post('onSelectedValue');
$data['targetDiv'] = $this->input->post('targetDiv');
$this->load->view('ficha-empleado/suggest-clock', $data);
}
}

function filterClockData()
{
if(!empty($this->input->post('keyword'))) {
$clock= $this->input->post('keyword');
$centro= $this->input->post('centro');
$data['clock'] = $clock;
$sql ="SELECT id, clock, employee_name, national_id, status, centro FROM employees WHERE  centro=$centro && (clock like '" . $clock . "%' || employee_name  like '%" . $clock . "%')  ORDER BY clock DESC LIMIT 0,10 ";
$data['query']= $this->db->query($sql);
$data['origin'] = $this->input->post('origin');
$data['action'] = "";
$data['onSelectedValue'] = "notExisted";
$data['targetDiv'] = '';
$this->load->view('ficha-empleado/suggest-clock', $data);
}
}

public function autoCompleteDiagZonaFranca()
{

$data = [];
$search=$this->input->post('search');

$query = "
	SELECT diagnostico FROM  employees_lic_med 
		WHERE diagnostico LIKE '%".$search."%' 
		GROUP BY diagnostico
		ORDER BY id DESC 
		LIMIT 10
	";
$result = $this->db->query($query);

foreach ($result->result() as $row)
{ 
$data[] = $row->diagnostico;
 }
echo count($data)==0 ? "null" : json_encode($data) ;


}


public function autoComplete()
{

$data = [];
$search=$this->input->post('search');

$query = "
	SELECT title FROM  type_reasons 
		WHERE title LIKE '%".$search."%' 
		GROUP BY title
		ORDER BY id DESC 
		LIMIT 10
	";
$result = $this->db->query($query);

foreach ($result->result() as $row)
{ 
$data[] = $row->title;
 }
echo count($data)==0 ? "null" : json_encode($data) ;


}

public function searchNotaNombre()
{
$keyword=$this->input->post('keyword');
$data['signo_id']=$this->input->post('signo_id');
$query ="SELECT nombre FROM hosp_signo_vitales_nombre_nota WHERE nombre like '" . $keyword . "%' ORDER BY nombre LIMIT 0,6";
$data['result'] = $this->db->query($query);
$this->load->view('hospitalizacion/historial/search-data-result', $data );


 }
 



public function loadHospForm()
{
$perfil=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$data['isSeguroTitle']=$this->input->post('required');
$data['perfil']=$this->input->post('perfil');
$data['id_user']=$this->input->post('id_user');
$data['titleId']=$this->input->post('titleId');


if($perfil=="Medico"){
$data['centro_medico'] = $this->model_admin->view_doctor_centro($this->input->post('id_user'));
}else if($perfil=="Asistente Medico"){
$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($this->input->post('id_user'));
} else {
	
	$admin_position_centro=$this->session->userdata['admin_position_centro'];

if($admin_position_centro){
  $where_centro = "&& centro = $admin_position_centro";
  $querycentro = $this->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro");
}else{
  $where_centro = "";
  $querycentro = $this->db->query('SELECT id_m_c, name FROM medical_centers');

}
	
$data['centro_medico'] = $querycentro->result();
}

$this->load->view('hospitalizacion/new_hosp_form',$data);
$data['id_p_ai'] = encrypt_url(0);
$data['id_useri'] = encrypt_url($this->input->post('id_user'));
$this->load->view('hospitalizacion/create_new_hosp_footer', $data );

}












}