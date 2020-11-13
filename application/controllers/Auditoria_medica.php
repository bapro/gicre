<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auditoria_medica extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model('navigation/account_demand_model');
$this->load->model('user');
$this->load->model('model_admin');
$this->load->model('model_auditoria_medica');
$this->load->model("padron_model");



  /*session checks */ 

    if($this->session->userdata('auditoria_is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
}


 
public function index()
{
	$id_user=$this->session->userdata['auditoria_id'];
	$data['id_user']=$id_user;
	$data['model']="model_auditoria_medica";
	$data['name']=$this->session->userdata['auditoria_name'];
	$data['perfil']=$this->session->userdata['auditoria_perfil'];
	$id_seguro=$this->db->select('user_ars')->where('id_user',$id_user)->get('users')->row('user_ars');
	$data['id_seguro']=$id_seguro;
$data['codigo']=$this->model_auditoria_medica->ars_codigo_prestador($id_seguro); 
$data['medicos_facturar']=$this->model_auditoria_medica->ars_medicos_facturar($id_seguro); 
$data['exequatur_medico_factura']=$this->model_auditoria_medica->ars_exequatur_medico_factura($id_seguro);
$data['cedula_medico_factura']=$this->model_auditoria_medica->ars_cedula_medico_factura($id_seguro);  
$this->load->view('auditoria_medica/header',$data);
//$this->load->view('auditoria_medica/index',$data);
$this->load->view('admin/billing/medical_insurance_audit_profile/create',$data);
$this->load->view('footer');

}


public function get_numero_contrado()
{
$input_val=$this->input->get('num_cont');
$data['input_result']=$this->model_admin->get_numero_contrado($input_val); 
$data['input_val'] = "Resultado de la busqueda : $input_val";
$data['date_filter']=$this->model_admin->get_numero_contrado_date_filter($input_val);
$this->load->view('auditoria_medica/medical_insurance_audit_profile/input_result',$data);

}


public function get_nombre_medico()
{
$input_val=$this->input->get('medico');
$data['input_result']=$this->model_admin->get_nombre_medico($input_val);
$data['input_val'] = "Resultado de la busqueda : $input_val"; 
$data['date_filter']=$this->model_admin->get_nombre_medico_date_filter($input_val);
$this->load->view('auditoria_medica/medical_insurance_audit_profile/input_result',$data);

}


public function get_exequatur_medico()
{
$input_val=$this->input->get('exequatur');
$data['input_result']=$this->model_admin->get_exequatur_medico($input_val); 
$data['input_val'] = "Resultado de la busqueda : $input_val";
$data['date_filter']=$this->model_admin->get_exequatur_medico_date_filter($input_val);
$this->load->view('auditoria_medica/medical_insurance_audit_profile/input_result',$data);

}

public function get_cedula_medico()
{
$input_val=$this->input->get('cedula');
$data['input_result']=$this->model_admin->get_cedula_medico($input_val); 
$data['input_val'] = "Resultado de la busqueda : $input_val";
$data['date_filter']=$this->model_admin->get_cedula_medico_date_filter($input_val);
$this->load->view('auditoria_medica/medical_insurance_audit_profile/input_result',$data);

}








public function count_patient_num_contrato()
{
	$god_own = $this->input->get('god_own');
	$data['medico'] =$this->input->get('medico');
	$data = array(
   'desde' =>$this->input->get('desde'),
	'hasta' =>$this->input->get('hasta'),
	'medico' =>$this->input->get('medico')
	);
	$count = $this->model_admin->count_patient_num_contrato($data);
	$data['count']=count($count);
	$data['get_numero_contrado_patients']=$count;
	if($god_own=="no"){
	$this->load->view('auditoria_medica/medical_insurance_audit_profile/count_patient_num_contrato', $data);
	
	}
	else{
	$this->load->view('auditoria_medica/medical_insurance_audit_profile/go_down_patient_num_con',$data);
	
	}

}


public function patient_factura_data()
{
	$data = array(
   'desde' => $this->input->post('dess'),
	'hasta' => $this->input->post('hass'),
	'medico' => $this->input->post('medico')
	);
	$data['patient_factura_data'] = $this->model_admin->count_patient_num_contrato($data);
	$this->load->view('auditoria_medica/admin/patient-factura-data', $data);
}





public function get_patient_historial()
{
	$get_id_fac=$this->input->get('get_id_fac');
	$procedimiento = $this->input->get('procedimiento');
	$id_patient=$this->db->select('paciente')->where('idfacc',$get_id_fac)->get('factura2')->row('paciente');
	$data = array(
   'desde' => $this->input->get('dess'),
	'hasta' => $this->input->get('hass'),
	'medico' => $this->input->get('medico'),
	'id_patient' =>$id_patient
	);
$data['thump'] = $this->model_admin->patient_ars_tot($get_id_fac);
$data['id_patient']=$id_patient;
$data['show_diagno_pat'] = $this->model_admin->show_diagno_pat($id_patient);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($id_patient);
$data['get_patient_historial'] = $this->model_admin->get_patient_historial($id_patient);
$data['num_count']=$this->model_admin->hist_count($id_patient);
$data['num_count_lab']=$this->model_admin->hist_count_lab($id_patient);
$data['num_count_es']=$this->model_admin->hist_count_es($id_patient);
$data['patient_med_audit'] = $this->model_admin->patient_med_audit($id_patient);
$data['patient_lab_audit'] = $this->model_admin->patient_lab_audit($id_patient);
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($id_patient);


	$data1 = array(
   'id_patient' =>$id_patient,
	'med_name' =>$this->input->get('med_name')
	);
	$data['get_med_name'] = $this->model_admin->get_med_name($data1);


$data['procedimiento'] =  $procedimiento;
$this->load->view('auditoria_medica/medical_insurance_audit_profile/get_patient_historial', $data);
}


public function save_medical_insurance_audit_profile()
{
$save = array(
'patient' =>$this->input->post('id_patient'),
'desde' => $this->input->post('desde'),
'hasta' => $this->input->post('hasta'),
'num' => $this->input->post('numauto'),
'monto' => $this->input->post('totpagseg'),
'causa' => $this->input->post('causa'),
'medico' =>$this->input->post('medico'),
'validate' =>1
);
$this->model_admin->save_patient_arc_report($save);

//---------------validate table------------------------------------------

$idfacc =$this->input->post('idfacc');
$data = array(
'validate' => 1

);
$this->model_admin->row_validation_after_validate($idfacc,$data);
}




public function medical_insurance_audit_profile_print_view()
{
$data = array(
'desde' =>$this->input->get('desde'),
'hasta' =>$this->input->get('hasta'),
'medico' =>$this->input->get('medico'),
'id_patient' =>$this->input->get('id_patient')
);

$results=$this->model_admin->show_patient_arc_report($data);
$data['patient_rows']=$results;
$data['count']=count($results);
$this->load->view('auditoria_medica/medical_insurance_audit_profile/printing_view',$data);

}




public function medical_insurance_audit_profile_print()
{
$data = array(
'desde' =>$this->uri->segment(3),
'hasta' =>$this->uri->segment(4),
'medico' =>$this->uri->segment(5)
);
$data['last_id']=$this->db->select('id')->order_by('id','desc')->limit(1)->get('medical_insurance_audit_profile')->row('id');
$results=$this->model_admin->show_patient_arc_report($data);
$data['patient_rows']=$results;
$data['count']=count($results);
$this->load->view('admin/print/medical_insurance_audit_profile',$data);

}



}