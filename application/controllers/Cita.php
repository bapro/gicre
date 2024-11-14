<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cita extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('model_medico');
$this->load->model("padron_model");
$this->load->model('navigation/account_demand_model');
$this->load->library('email');
$this->load->helper('email');
$this->load->helper('string');
$this->load->library("pagination");
$this->load->library('form_validation'); 
}



public function daySelected()
{
$fecha_propuesta = date("Y-m-d", strtotime($this->input->post('fecha_propuesta1')));
$data['fecha_propuesta']=$fecha_propuesta;
$current_date=date('Y-m-d');
$data['current_date']=$current_date;
$id_doct=$this->input->post('doc');
$data['id_doct']=$id_doct;
$id_centro=$this->input->post('centro_medico');
$idpatient=$this->input->post('id_patient');
$sql_con ="SELECT id_patient FROM rendez_vous where id_patient=$idpatient && centro=$id_centro && doctor=$id_doct && filter_date='$fecha_propuesta'";
$atendido_con = $this->db->query($sql_con);
if($atendido_con->num_rows() > 0){
echo "<div class='alert alert-warning' ><i class='fa fa-warning' style='font-size:28px;color:red'></i> Este paciente ya tiene una cita en este centro medico por hoy.</div>";
echo '<script>
$(".send_cit").css("display","none");
</script>';
} else {

$data['id_centro']=$id_centro;
$centro=$this->db->select('name')->where('id_m_c',$id_centro)
->get('medical_centers')->row('name');

$data['centro']=$centro;
$dayLetter=$this->input->post('day');
$dayNumber=$this->db->select('id')->where('title',$dayLetter)->get('diaries')->row('id');

$data['dayNumber']=$dayNumber;
$agenda=$this->db->select('fecha_inicio,fecha_final,hour_from,hour_to,cita')->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
where('day',$dayNumber)->
get('doctor_agenda_test')->row_array();
$hour_from = substr($agenda['hour_from'], 0, -3);
$hour_to = substr($agenda['hour_to'], 0, -3);
$minutes = 15;
if($hour_from !=NULL && $hour_to !=NULL){
 $startDate = DateTime::createFromFormat("H:i", $hour_from);
$endDate = DateTime::createFromFormat("H:i", $hour_to);
$interval = new DateInterval("PT".$minutes."M");
$dateRange = new DatePeriod($startDate, $interval, $endDate);
}
$fecha_inicio =$agenda['fecha_inicio'];
$fecha_final = $agenda['fecha_final'];
$countCitaAgenda =$agenda['cita'];

$current_day= date('l');
$hour=date('H');

$nextDate1=date("Y-m-d", strtotime(' +1 day'));
$nextDate2=date("Y-m-d", strtotime(' +2 day'));
$nextDate3=date("Y-m-d", strtotime(' +3 day'));
$nextDate4=date("Y-m-d", strtotime(' +4 day'));
$nextDate5=date("Y-m-d", strtotime(' +5 day'));
$nextDate6=date("Y-m-d", strtotime(' +6 day'));
$nextDate7=date("Y-m-d", strtotime(' +7 day'));


if($fecha_propuesta < $current_date){
		echo "<strong> No puede crear cita por día atras de hoy .</strong>";
	echo '<script>
	$(".send_cit").css("display","none");
	</script>';
} else 	{

//-------------------------------------------------------------------------------------------------------------


if($current_day=="Monday"){
$nextDay1=2;$nextDay2=3;$nextDay3=4;$nextDay4=5;$nextDay5=6;$nextDay6=7;$nextDay7=1;

}



if($current_day=="Tuesday"){
$nextDay1=3;$nextDay2=4;$nextDay3=5;$nextDay4=6;$nextDay5=7;$nextDay6=1;$nextDay7=2;

}



if($current_day=="Wednesday"){
$nextDay1=4;$nextDay2=5;$nextDay3=6;$nextDay4=7;$nextDay5=1;$nextDay6=2;$nextDay7=3;
}


if($current_day=="Thursday"){
$nextDay1=5;$nextDay2=6;$nextDay3=7;$nextDay4=1;$nextDay5=2;$nextDay6=1;$nextDay7=4;
}


if($current_day=="Friday"){
$nextDay1=6;$nextDay2=7;$nextDay3=1;$nextDay4=2;$nextDay5=3;$nextDay6=4;$nextDay7=5;
}



if($current_day=="Saturday"){
$nextDay1=7;$nextDay2=1;$nextDay3=2;$nextDay4=3;$nextDay5=4;$nextDay6=5;$nextDay7=6;
}

if($current_day=="Sunday"){
$nextDay1=1;$nextDay2=2;$nextDay3=3;$nextDay4=4;$nextDay5=5;$nextDay6=6;$nextDay7=7;
}

//-----------------------------------------------------------------------------------------------------

$queryRdvLunes=$this->db->select('id_apoint')->
where('weekday',$nextDay5)->
where('filter_date',$nextDate5)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvLunes']=$queryRdvLunes->num_rows();

$queryAgendaLunes=$this->db->select('cita,day')->
where('day',$nextDay5)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['lunesAgendaCita']=$queryAgendaLunes['cita'];
$data['lunesAgenda']=$this->db->select('title')->where('id',$queryAgendaLunes['day'])->get('diaries')->row('title');


//-----------------------------------------------------------------------------------------------------

$queryRdvMartes=$this->db->select('id_apoint')->
where('weekday',$nextDay6)->
where('filter_date',$nextDate6)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvMartes']=$queryRdvMartes->num_rows();

$queryAgendaMartes=$this->db->select('cita,day')->
where('day',$nextDay6)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['martesAgendaCita']=$queryAgendaMartes['cita'];
$data['martesAgenda']=$this->db->select('title')->where('id',$queryAgendaMartes['day'])->get('diaries')->row('title');

//-----------------------------------------------------------------------------------------------------



$queryRdvMiercoles=$this->db->select('id_apoint')->
where('weekday',$nextDay7)->
where('filter_date',$nextDate7)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvMiercoles']=$queryRdvMiercoles->num_rows();

$queryAgendaMiercoles=$this->db->select('cita,day')->
where('day',$nextDay7)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['miercolesAgendaCita']=$queryAgendaMiercoles['cita'];
$data['miercolesAgenda']=$this->db->select('title')->where('id',$queryAgendaMiercoles['day'])->get('diaries')->row('title');


//-----------------------------------------------------------------------------------------------------

$queryRdvThursday=$this->db->select('id_apoint')->
where('weekday',$nextDay1)->
where('filter_date',$nextDate1)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvThursday']=$queryRdvThursday->num_rows();

$queryAgendaThursday=$this->db->select('cita,day')->
where('day',$nextDay1)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['thursdayAgendaCita']=$queryAgendaThursday['cita'];
$data['thursdayAgenda']=$this->db->select('title')->where('id',$queryAgendaThursday['day'])->get('diaries')->row('title');

//----------------------------------------------------------------------------------------------------------
$queryRdvFriday=$this->db->select('id_apoint')->
where('weekday',$nextDay2)->
where('filter_date',$nextDate2)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvFriday']=$queryRdvFriday->num_rows();

$queryAgendaFriday=$this->db->select('cita,day')->
where('day',$nextDay2)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['fridayAgendaCita']=$queryAgendaFriday['cita'];
$data['fridayAgenda']=$this->db->select('title')->where('id',$queryAgendaFriday['day'])->get('diaries')->row('title');

//-----------------------------------------------------------------------------------------------------------


$queryRdvSabado=$this->db->select('id_apoint')->
where('weekday',$nextDay3)->
where('filter_date',$nextDate3)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvSabado']=$queryRdvSabado->num_rows();

$queryAgendaSabado=$this->db->select('cita,day')->
where('day',$nextDay3)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['sabadoAgendaCita']=$queryAgendaSabado['cita'];
$data['sabadoAgenda']=$this->db->select('title')->where('id',$queryAgendaSabado['day'])->get('diaries')->row('title');

//--------------------------------------------------------------------------------------------------

$queryRdvDomingo=$this->db->select('id_apoint')->
where('weekday',$nextDay4)->
where('filter_date',$nextDate4)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvDomingo']=$queryRdvDomingo->num_rows();

$queryAgendaDomingo=$this->db->select('cita,day')->
where('day',$nextDay4)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['domingoAgendaCita']=$queryAgendaDomingo['cita'];
$data['domingoAgenda']=$this->db->select('title')->where('id',$queryAgendaDomingo['day'])->get('diaries')->row('title');


if($current_date >= $fecha_inicio && $current_date <= $fecha_final){
$QuerycountRdv=$this->
db->select('id_apoint')->
where('weekday',$dayNumber)->
where('filter_date',$fecha_propuesta)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$countRdv=$QuerycountRdv->num_rows();


if($countRdv != $countCitaAgenda){

echo "<span style='color:green'>El día <strong>$dayLetter</strong>  puede crear hasta <strong>$countCitaAgenda</strong> citas para <strong>$centro</strong>.<br/>
Total creadas : <strong>$countRdv.</strong></span>";

echo "<br/><span style='color:red;font-size:24px'>*</span> <select name='hora_de_cita' class='required' id='hora_de_cita' style='color:#38a7bb'>";
echo "<option value=''>Elegir hora de la cita $hora_cita</option>";

foreach ($dateRange as $date) {
$hora_cita=$this->db->select('hora_de_cita')->where('doctor',$id_doct)->where('filter_date',$fecha_propuesta)->where('hora_de_cita',$date->format("H:i"))->get('rendez_vous')->row('hora_de_cita');

if($hora_cita==$date->format("H:i")){
	$disabled='disabled';
$info="hay cita en esa hora";
}else{
$disabled='';
$info="";
}

echo '<option '.$date->format("H:i").' '.$disabled.'>'.$date->format("H:i").' '.$info.' </option>';
} 
echo "</select>";

echo '<script>
$(".send_cit").css("display","block");
$("#hora_de_cita").change(function(e) {
	if($("#hora_de_cita").val()==""){
	$(".btnSendCita").prop("disabled", true);
	}else{
	$(".btnSendCita").prop("disabled", false);
	}
		
})	
</script>';
} else{
	echo "Ha llegado a su limite por $dayLetter. ($countRdv citas)<br/>";
	$this->load->view('admin/pacientes-citas/agenda_condition',$data);

echo '<script>
$(".send_cit").css("display","none");
</script>';
}

} else{
	echo "Los <strong>$dayLetter</strong> No tiene agenda programada.<br/>";

	echo '<script>
$(".send_cit").css("display","none");
</script>';
//----------------------------------------------------------------

$this->load->view('admin/pacientes-citas/agenda_condition',$data);

//----------------------------------------------------------------
}
}

}
}


 public function add_new_cita()
{
//var_dump($this->input->post());
$dayNumber=$this->db->select('id')->where('title',$this->input->post('fecha_filter'))->get('diaries')->row('id');
$nec=$this->input->post('nec');
$idpatient=$this->input->post('id_patient');
$iddoc=$this->input->post('doctor');
$seguro_id=$this->input->post('seguro_id');
$id_cm=$this->input->post('centro_medico');
$filter_date = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
$this->session->set_userdata('sessionIdPatient', $idpatient);
$this->session->set_userdata('sessionIdDocNewCita', $iddoc);
$this->session->set_userdata('sessionIdCentNewCita', $id_cm);
$this->session->set_userdata('sessionIdSegNewCita', $seguro_id);
$centro_type=$this->db->select('type')->where('id_m_c',$id_cm)->get('medical_centers')->row('type');
$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain', $centro_type);
$insert_date=date("Y-m-d H:i:s");
$save2 = array(
'nec'=> $this->input->post('nec'),
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'),
'id_patient' =>$idpatient,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' => $dayNumber,
'created_time' => $insert_date,
'update_time' => $insert_date,
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'filter_date' =>$filter_date,
'confirmada' =>0,
'cancelar' =>0,
'hora_de_cita' =>$this->input->post('hora_de_cita')
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);
$this->session->set_userdata('id_user', $this->input->post('id_user'));

$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('causa')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('causa'),
	   'inserted_by' => $this->input->post('creadted_by'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('creadted_by'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}


$search = $this->db->get_where('employee_birthdate',array('id_p_a'=>$idpatient));
		if($search->num_rows() == 1)
	{

	$update= array(
	'id_apoint' =>$id_rdv 
	);	

	$where = array(
	'id_p_a'=> $this->input->post('id_patient')
	);


	$this->db->where($where);
	$this->db->update("employee_birthdate",$update);
	}

//redirect("admin_medico/redirect_after_save_cita");

}






public function saveUpdateCita()
{
$filter = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
$idpatient=$this->input->post('id_patient');
$data['idpatient'] = $idpatient;
$id=$this->input->post('id_cita');
$nec=$this->input->post('nec');
$save = array(
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'doctor'=> $this->input->post('doctor'),
'area'=> $this->input->post('especialidad'),
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'filter_date' =>$filter,
'update_time' =>date("Y-m-d H:i:s"),
'update_by' => $this->input->post('update_by'),
'cancelar' => $this->input->post('cancelar')
   );
$this->model_admin->saveUpdateCita($id,$save);
$msg = "<div  style='text-align:center;font-size:20px;color:green' >La cita ha sido modificada con exito.</div>";
$this->session->set_flashdata('save_patient_success', $msg);

redirect($_SERVER['HTTP_REFERER']);
}

public function UpdateCita()
{
	$id_cita= $this->uri->segment(3);
    $id_user= $this->uri->segment(4);
	$data['cancelar']= $this->uri->segment(5);
	$user=$this->db->select('perfil,name')->where('id_user',$id_user)->get('users')->row_array();
	$data['id_user']=$id_user;
	$data['perfil']=$user['perfil'];
	$data['name']=$id_user;

	$data['FindCita'] = $this->model_admin->FindCita($id_cita);
	$data['causa']=$this->model_admin->getCausa();
	if($user['perfil']=="Medico"){
	$data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
	}
	else if($user['perfil']=="Asistente Medico"){
	$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
	}
	else {
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
	$data['especialidades'] = $this->model_admin->getEspecialidades();
	$data['doctors'] = $this->model_admin->display_all_doctors();
	$data['especialidades_doc']= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
    $this->load->view('admin/pacientes-citas/UpdateCita', $data);
}


function create_cita_again()
{
$id_p_a= $this->uri->segment(3);
$data['id_p_a']=$id_p_a;
$id_user= $this->uri->segment(4);
$data['id_user']=$id_user;
$data['nec']=$this->db->select('nec1')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('nec1');
$this->load->view('admin/pacientes-citas/create_cita_again',$data);
}


function cancelCita(){
		
$update = array(
  'cancelar' =>1,
  'update_by' =>$this->input->post('iduser')
);

$where = array(
  'id_apoint'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->update("rendez_vous",$update);	

}




function patientCita(){
	
$data['controller']= $this->input->post('controller');
$data['id_user']=$this->input->post('id_user');
$data['idpatient']=$this->input->post('idpatient');
$data['controller']=$this->input->post('controller');
$data['perfil']=$this->input->post('perfil');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->model_admin->display_all_medical_centers();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['causa']=$this->model_admin->getCausa();
$sqlc = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=1";
$data['queryc']= $this->db->query($sqlc);
$data['seguro_id'] = $this->input->post('seguro_id');
$data['plan'] = $this->input->post('plan');

$sqlrp = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=2";
$data['queryrp']= $this->db->query($sqlrp);

$sqlml = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=3";
$data['queryml']= $this->db->query($sqlml);


$sqlep = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=4";
$data['queryep']= $this->db->query($sqlep);	
$this->load->view('medico/pacientes-citas/patient-cita',$data);	
$this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
}



public function refresh_form_cita(){
$id_user=$this->input->post('id_user');
$id_p_a=$this->input->post('id_p_a');
$user=$this->db->select('perfil,name')->where('id_user',$id_user)->get('users')->row_array();
$data['id_user']=$id_user;
$perfil=$user['perfil'];
$data['perfil']=$perfil;
$data['name']=$id_user;
$patientData=$this->db->select('nec1, seguro_medico')->where('id_p_a',$id_p_a)->get('patients_appointments')->row_array();
$data['nec']=$patientData['nec1'];
$data['id_patient']=$id_p_a;
$data['causa']=$this->model_admin->getCausa();
$data['seguro_id']=$this->db->select('seguro_medico')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('seguro_medico');
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['especialidades_doc']= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');

if($perfil=="Medico"){
$data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
}else if($perfil=="Asistente Medico"){
$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
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
$this->load->view('admin/pacientes-citas/create_cita_again_form',$data);
}





 function searchPatientPorHoy()
{
$data['iduser']= $this->input->post('iduser');
$data['perfil']=$this->input->post('perfil');
$data['area_id']=$this->input->post('area_id');
$data['controller']=$this->input->post('controller');
$id_pat=$this->input->post('id_pat');
$hoy=date("d-m-Y");

$sql = "select * FROM rendez_vous WHERE id_patient=$id_pat && fecha_propuesta='$hoy' && cancelar=0";
 $query= $this->db->query($sql);
$data['appointments'] =$query->result();

$this->load->view('medico/refreshCitaHoy',$data);
}


 function changeAfiliadoStatus()
{
	
$values = $this->input->post('values');
$decoded = json_decode($values, true);

$inputname=$decoded['inputname'];
$inputf=$decoded['inputf'];
$id_patient=$decoded['id_patient'];
$segVal=$decoded['segVal'];
$afiliado=$decoded['afiliado'];
$plan=$decoded['plan'];
if($id_patient){
   $saveDat= array(
 'seguro_medico'  => $segVal,
  'afiliado'  => $afiliado,
 'plan'  => $plan,	
);	
$this->model_admin->saveUpdatePatient($id_patient,$saveDat);

$this->db->where('patient_id', $id_patient);
$this->db->delete('saveinput');
if($segVal !=11){
 $saveInputs= array(
	'patient_id' =>$id_patient,
	'input_name' => $inputname,
	'inputf' => $inputf,
	'seguro_id' => $segVal
	);
  $this->db->insert("saveinput",$saveInputs);
}else{
	$this->db->where('patient_id', $id_patient);
$this->db->delete('saveinput');
}
}

}


 function checkIfNumSegExist()
{
$count =  strlen($this->input->post('numero'));
if($count){
$query = $this->db->get_where('saveinput',array('input_name'=>$this->input->post('numero')));
if($query->num_rows() > 0 )
{
$msg= 1;
} else{
$msg= 0;	
}
echo json_encode($msg);
	}
}


function get_doc()
	{
	$id_esp=$this->input->post('id_esp');
	$id_centro=$this->input->post('id_centro');
	$id_user=$this->input->post('id_user');
	$perfil= $this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
	if($perfil=="Admin"){
	$data['doc'] = $this->model_admin->get_doc_esp($id_esp,$id_centro);
	$this->load->view('admin/get_doc', $data);
	}else{
     $sql ="SELECT id_doctor FROM centro_doc_as WHERE id_asdoc =$id_user group by id_doctor";
	$query= $this->db->query($sql);
	foreach ($query->result() as $row){
	$docArea= $this->db->select('area, name, id_user')->where('id_user',$row->id_doctor)->where('area',$id_esp)->get('users')->row_array();	
		$this_id=$docArea['id_user'];
		$this_name=$docArea['name'];
	 echo "<option value='' hidden></option>";		

	echo "<option value='$this_id'>$this_name</option>";
	}
    }
	
	}
















}