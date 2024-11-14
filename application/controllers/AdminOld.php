<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminOld extends CI_Controller {
public function __construct()
{
parent::__construct();
 $this->load->library('email');
 $this->load->helper('email');
$this->load->model('navigation/account_demand_model');
$this->load->model('user');
$this->load->model('model_admin');
$this->load->model("model_emergencia");
$this->load->library("create_patient_form_lib");
$this->load->model("product");

//$this->load->library('Ajax_pagination');
$this->perPage = 3;
$this->load->model('excel_import_model');

$this->load->library('user_agent');
   $this->load->model('login_model');
    $this->load->library("pagination");
	 $this->load->library('form_validation'); 
	 $this->USER_CONTROLLER = $this->session->set_userdata('USER_CONTROLLER','admin');
$this->ID_USER =$this->session->userdata('user_id');
  /*session checks */

    if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
}

public function patient()
{
$data['name']=$this->session->userdata['admin_name'];
$data['id_user']=$this->session->userdata['admin_id'];
$data['perfil']=$this->session->userdata['admin_perfil'];
$data['area']=0;
$idpatient= $this->uri->segment(3);
$data['id_cm'] =$this->uri->segment(4);
$data['doc'] =$this->uri->segment(5);
$data['nec'] = $this->model_admin->getNec();
$data['idpatient']=$idpatient;
$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['municipios'] = $this->model_admin->getTownships();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['doctors'] = $this->model_admin->display_all_doctors();
$data['patient'] = $this->model_admin->historial_medical($idpatient);


  //if($this->uri->segment(4)=='s'){
	$query = $this->model_admin->RendezVousBySearch($idpatient);
 // } else {
	//$query = $this->model_admin->RendezVousByCentro($idpatient,$this->uri->segment(4));
  //}

$data['patid']=$idpatient;
$ctutor=$this->model_admin->CountTutor($idpatient);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($idpatient);
$data['rendez_vous']=$query;
$data['number_cita']=count($query);
$data['nueva_cita']="";
$data['is_admin']="yes";
//---EMERGENCIA------------------------
$patient_admitas= $this->model_emergencia->emergency_patient($idpatient);
$data['patient_admitas']=$patient_admitas;
$data['number_patient_admitas']=count($patient_admitas);
$this->load->view('admin/header_admin',$data);
$data['is_historial']=$this->model_admin->countAnte1($idpatient);
$this->load->view('admin/pacientes-citas/patient', $data);
 $this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
}

}