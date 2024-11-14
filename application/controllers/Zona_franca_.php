<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Zona_franca_ extends CI_Controller {
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



public function birthdates($id_center){
$this->header_user();
$id_centro = decrypt_url($id_center);
$data['id_centro'] = $id_centro;
if($id_centro){
$four_days_more_from_today_title= date('d-m-Y', strtotime('+2 day', time()));

$four_days_more_from_today= date('m-d', strtotime('+2 day', time()));

$sql ="SELECT * FROM employees WHERE   birth_date like '%" . $four_days_more_from_today . "%'  ORDER BY employee_name DESC ";

$query = $this->db->query($sql);
foreach ($query->result() as $row){
$search = $this->db->get_where('employee_birthdate',array('id_employee'=>$row->id));
		if($search->num_rows() == 0)
	{
		$data = array(
        'id_employee' => $row->id,
        'birth_date' => $row->birth_date,
		'id_centro' => $row->centro,
		'id_apoint' => 0
);

$this->db->insert('employee_birthdate', $data);
	}		
}

$this->db->where('id_apoint >', 0);
$this->db->delete('employee_birthdate');

$sql_birthdates ="SELECT * FROM employee_birthdate

INNER JOIN employees ON employee_birthdate.id_employee=employees.id

";

$data['query_birthdates'] = $this->db->query($sql_birthdates);
$data['title']= "Lista de empleados que cumplirán años dentro de 2 días: $four_days_more_from_today_title";
$data['centro_name']=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
$this->load->view('ficha-empleado/birthdates/index',$data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
}else{
	redirect('/page404');
}
}


}