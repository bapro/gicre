<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SeguroMedicoController extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_general');
		$this->load->model('model_admin');
		
	}

 

public function getSeguroData() {
    $idpatient = $this->input->post('idpatient');
    $data['idpatient'] = $idpatient;
    $GET_NAMEF = $this->model_admin->GET_NAMEF($idpatient);
    $data['GET_NAMEF_C'] = count($GET_NAMEF);
     $data['plan'] = $this->input->post('plan');
    $data['operation'] = $this->input->post('operation');
    $seguro_medico_id = $this->input->post('seguro_medico');
    $data['seguro_medico_id'] = $seguro_medico_id;
    $sm = $this->db->select('title')->where('id_sm', $seguro_medico_id)->get('seguro_medico')->row('title');
    $data['seguro_medico_name'] = $sm;
    $GET_INPUT = $this->model_admin->get_input($seguro_medico_id);
    $credentials = $this->db->select('passwordDoc, passwordCentro, id_doctor, centro_type, id_user')->where('id_seguro', $seguro_medico_id)->get('doctor_web_services_credentials')->row_array();
    if($credentials !=NULL){
	$cedulaDoc = $this->db->select('cedula')->where('id_user', $credentials['id_user'])->get('users')->row('cedula');
    $ced1 = substr($cedulaDoc, 0, 3);
    $ced2 = substr($cedulaDoc, 3, 7);
    $ced3 = substr($cedulaDoc, -1);
    $data['cedulaFormat'] = $ced1.
    '-'.$ced2.
    '-'.$ced3;
    if ($credentials['centro_type'] == "privado") {
        $data['password'] = $credentials['passwordDoc'];
        $data['codContrato'] = $this->db->select('codigo')->where('id_doctor', $credentials['id_doctor'])->where('id_doctor >', 0)->where('id_seguro', $seguro_medico_id)->get('codigo_contrato')->row('codigo');
    } else {
        $data['password'] = $credentials['passwordCentro'];
        $data['codContrato'] = $this->db->select('codigo')->where('id_centro', $credentials['id_centro'])->where('id_seguro', $seguro_medico_id)->get('codigo_contrato')->row('codigo');
    }
	}else{
	$data['cedulaFormat']='';
	$data['password']='';	
	$data['codContrato'] ='';
	}
	//---show this query when it's patient data
	if($seguro_medico_id !=11){
	if(count($GET_NAMEF)  > 0 && $this->input->post('operation')==1 ){
		foreach($GET_NAMEF as $seguro_type)
		$data['seguro_camp_numero'] = $seguro_type->seguro_camp_numero;
		$data['seguro_campo'] = $seguro_type->seguro_campo;
		$data['inputname']="inputnameUpdate";
		$data['inputf']="inputfUpdate";
		$data['afiliado']="afiliadoUpdate";
		$data['plan_input']="planUpdate";
	}else{
		//--show this query when create new patient
		//foreach($GET_INPUT as $seguro_type)
		$data['seguro_camp_numero'] = '';
		$data['seguro_campo'] = '';
		
		$data['inputname']="inputnameNew";
		$data['inputf']="inputf";
		$data['afiliado']="afiliado";
		$data['plan_input']="plan";
	}
	$this->load->view('patient/seguro_medico/seguro_medico_data', $data);
	}
	 
}

}