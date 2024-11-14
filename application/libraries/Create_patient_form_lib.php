<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_patient_form_lib {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				
					    $this->NEC_PRO =$this->CI->session->userdata('NEC_PRO');
						$this->PERFIL =$this->CI->session->userdata('user_perfil');
						$this->ID_USER =$this->CI->session->userdata('user_id');
						
						$this->CI->load->model('model_admin');
						$this->CI->load->model('navigation/account_demand_model');
        }

public function user_header(){
$this->CI->load->view('header');
}

       
		
		
		  public function create_patient_form()
        {
		
		$data['provinces']=$this->CI->model_admin->getProvinces();	
			$data['seguro_medico'] = $this->CI->account_demand_model->getSeguroMedico();
		$data['countries'] = $this->CI->model_admin->getCountries();
		
		  $this->CI->load->view('patient/forms/create-patient-form', $data);
        }
		
		 public function patient_data($idpatient)
        {
			$data['countries'] = $this->CI->model_admin->getCountries();
			$data['provinces']=$this->CI->model_admin->getProvinces();	
			$data['seguro_medico'] = $this->CI->account_demand_model->getSeguroMedico();
		
			$this->user_header();
			$data['patient'] = $this->CI->model_admin->historial_medical($idpatient);
			$data['idpatient'] = $idpatient;
			$this->CI->load->view('patient/forms/patient-data-form', $data);
			 $this->CI->load->view('pagination-result');
		}
		
public function getCentroAndSeguroByPerfil($id){
if ($this->PERFIL == "Medico") {
$centro_medicos = $this->CI->model_admin->view_doctor_centro($this->ID_USER); 
$seguro_medicos = $this->CI->model_admin->view_doctor_seguro($this->ID_USER);

$query= $this->CI->db->query("SELECT id_user, name FROM users WHERE id_user =$this->ID_USER group by name");
$doctors = $query->result();

} elseif($this->PERFIL == "Asistente Medico") {
$centro_medicos = $this->CI->model_admin->view_as_doctor_centro($id_user);
$as_medico_centro = $this->CI->db->select('centro_medico')->where('id_doctor', $this->ID_USER)->get('doctor_centro_medico')->row('centro_medico');
$seguro_medicos = $this->CI->model_admin->view_doctor_seguro_as($as_medico_centro);

$query= $this->CI->db->query("SELECT id_user, name FROM centro_doc_as INNER JOIN users ON centro_doc_as.id_doctor=users.id_user WHERE id_asdoc =$id_user group by id_doctor ORDER BY name DESC");
$doctors = $query->result();


} else{
$data['countries'] = $this->CI->model_admin->getCountries();
$seguro_medicos = $this->CI->account_demand_model->getSeguroMedico();

$admin_position_centro=$this->CI->session->userdata['admin_position_centro'];

if($admin_position_centro){
$where_centro = "&& centro = $admin_position_centro";
$querycentro = $this->CI->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro");
}else{
$where_centro = "";
$querycentro = $this->CI->db->query('SELECT id_m_c, name FROM medical_centers');

}
$querycentro = $this->CI->db->query('SELECT id_m_c, name FROM medical_centers');
$centro_medicos = $querycentro->result();	   


$query= $this->CI->db->query("SELECT id_user, name FROM users  group by name ORDER BY name DESC");
$doctors = $query->result();


}	

//$result_centro_medicos = '<select id="centro_medico" name="centro_medico" class="form-select form-select2">';
$result_centro_medicos = '';
$result_centro_medicos.= "<option></option>";
foreach($centro_medicos as $row) {
	if($id== $row->id_m_c){
    $result_centro_medicos .= '<option value="' . $row->id_m_c .'" selected>' . $row->name . '</option>';
	}else{
	 $result_centro_medicos .= '<option value="' . $row->id_m_c .'" >' . $row->name . '</option>';	
	}
}
//$result_centro_medicos .= '</select>';

//$result_seguro_medicos = '<select id="seguro_medico_list" name="seguro_medico_list" class="form-select form-select2">';
$result_seguro_medicos='';
$result_seguro_medicos.= "<option></option>";
foreach($seguro_medicos as $row) {
    $result_seguro_medicos .= '<option value="' . $row->id_sm .'" >' . $row->title . '</option>';
}
//$result_seguro_medicos .= '</select>';




$result_seguro_medicos_no_select='';
foreach($seguro_medicos as $rows) {
	
	$codigo_contrado = $this->CI->db->select('codigo')->where('id_seguro', $rows->id_sm)->where('id_doctor', $this->ID_USER)->get('codigo_contrato')->row('codigo');
	if($codigo_contrado){
	$show ='<em><u>Codigo Contrato: <span class="badge bg-primary rounded-pill"> '.$codigo_contrado.'</span></u></em>';
	}else{
	$show='';	
	}
    $result_seguro_medicos_no_select .= '<li class="list-group-item" id="' . $rows->id_sm .'" >' . $rows->title . ' '.$show.' </li>';
}










$query_doc_by_center = $this->CI->db->query("SELECT id_user, name FROM users
	JOIN doctor_agenda_test on users.id_user=doctor_agenda_test.id_doctor
	WHERE id_centro=$id GROUP BY id_doctor");
$doc_by_centers = $query_doc_by_center->result();




$result_doc_by_centers = '';
foreach($doc_by_centers as $row) {
	if($id== $row->id_user){
    $result_doc_by_centers .= '<option value="' . $row->id_user .'" selected>' . $row->name . '</option>';
	}else{
	 $result_doc_by_centers .= '<option value="' . $row->id_user .'" >' . $row->name . '</option><option ></option>';	
	}
}



$result_doctors = '';
$result_doctors = '<option></option>';
foreach($doctors as $row) {
	
	 $result_doctors .= '<option value="' . $row->id_user .'" >' . $row->name . '</option>';	
	
}




return [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors, $result_seguro_medicos_no_select];








}


	

}
				
