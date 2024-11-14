<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agenda_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_general');
		$this->load->model('model_admin');
	 $this->USER_CONTROLLER = $this->session->userdata('USER_CONTROLLER');
	 $this->USER_PERFIL = $this->session->userdata('user_perfil');
	 $this->load->library("get_table_data_by_id");
	  $this->USER_ID = $this->session->userdata('user_id');
		 $this->load->library("search_patient_photo");
		
	}




public function getDocAgendaCentro(){
 $iddoc= $this->input->post('iddoc');
 $data['iddoc']=$iddoc;
 $idcentro= $this->input->post('idcentro');
 $data['perfil']= $this->USER_PERFIL;
 $data['idcentro']=$idcentro;
$data['diaries']=$this->model_admin->getDiaries();
[$get_centro_info_by_id]=$this->get_table_data_by_id->getCentroInfo($idcentro);
 $data['centro_name']=$get_centro_info_by_id['name'];
$this->load->view('medico/agenda/agenda-form',$data);
}




public function disableCitaAgendaDoc()
{
$doc=$this->input->post('iddoc');
$centro= $this->input->post('idcentro');
$value=$this->input->post('value');
$where = array(
'id_doctor' =>$doc,
'id_centro' =>$centro
);
$updateData = array(
'active'  =>$value
);
$this->db->where($where);
$this->db->update("doctor_agenda_test",$updateData);

}



public function agend_result(){
$fechaInicio = date("Y-m-d", strtotime($this->input->post('fechaInicio')));
$fechaFinal = date("Y-m-d", strtotime($this->input->post('fechaFinal')));

$dia=$this->input->post('dia');
if($this->input->post('operation')==1){
$this->model_admin->deleteDocCentroAgenda($this->input->post('iduser'),$this->input->post('centro_medico'));
}
 foreach ($dia as $key=>$id_dia) {
   $save= array(
    'day' => $id_dia,
 'id_doctor'  => $this->input->post('iduser'),
 'fecha_inicio' => $fechaInicio,
 'fecha_final' => $fechaFinal,
 'hour_from' => $this->input->post('hourDesde'),
 'hour_to' => $this->input->post('hourHasta'),
  'id_centro' => $this->input->post('centro_medico'),
  'cita' => $this->input->post('amtCitas')

	);

	$this->model_admin->saveDoctorAgenda($save);
}

}



function loadCentroAgenda(){
	$medico_id=$this->input->post('medico_id');
		$sql = "SELECT id_centro FROM  doctor_agenda_test WHERE id_doctor=$medico_id group by id_centro ORDER BY id_d_ag DESC";
		$query = $this->db->query($sql);
		$agendas = $query->result();
		echo '<ul class="list-group list-group-horizontal-sm agenda-list" style="font-size:14px">'; 
		foreach($agendas as $agenda){
		$centro= $this->db->select('name, type')->where('id_m_c',$agenda->id_centro)->get('medical_centers')->row_array();
		$centroName=$centro['name'];

		echo '<li class="list-group-item select-centro" style="cursor:pointer" id='.$agenda->id_centro.'> '.$centroName.' </li>';

		} 
		echo '</ul>';
}





		
}



