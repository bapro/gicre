<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SearchDocScheldureAppController extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->ID_USER =$this->session->userdata('user_id');
}


public function daySelected()
{
$id_doct=$this->input->post('doctor');	
$fecha_propuesta = $this->input->post('fecha_propuesta');
	$dayNumber=$this->input->post('dayNumber');
	$dayLetter=$this->db->select('title')->where('id',$dayNumber)->get('diaries')->row('title');
	$id_centro=$this->input->post('centro_medico');	
	$current_date=date('Y-m-d');
	$current_year=date("Y", strtotime($fecha_propuesta));
	$agenda=$this->db->select('fecha_inicio,fecha_final,hour_from,hour_to,cita')->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
where('day',$dayNumber)->
where('active',0)->
get('doctor_agenda_test')->row_array();
	if($agenda){
	$fecha_inicio =$agenda['fecha_inicio'];
$fecha_final = $agenda['fecha_final'];
	
$hour_from = substr($agenda['hour_from'], 0, -3);
$hour_to = substr($agenda['hour_to'], 0, -3);
	
	if($current_date >= $fecha_inicio && $current_date <= $fecha_final){
	
	$centro=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');

$countCitaAgenda =$agenda['cita'];

$QuerycountRdv=$this->
db->select('id_apoint')->
where('weekday',$dayNumber)->
where('filter_date',$fecha_propuesta)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$countRdv=$QuerycountRdv->num_rows();
if($countRdv < $countCitaAgenda){
echo "<span style='color:green'>El día <strong>$dayLetter</strong>  puede crear hasta <strong>$countCitaAgenda</strong> citas para <strong>$centro</strong>.<br/>
Total creadas : <strong>$countRdv.</strong></span>";
echo '<script>
$("#hora_de_cita").change(function(e) {
	if($("#hora_de_cita").val()==""){
	$(".btn-save-cita").prop("disabled", true);
	}else{
	$(".btn-save-cita").prop("disabled", false);
	}
		
})	
</script>';
$this->selectAppointmentHour($id_doct,$fecha_propuesta, $hour_from, $hour_to);
	}else{
		echo "<span style='color:red'>Ha llegado a su limite por $dayLetter. ($countRdv / $countCitaAgenda citas)<br/>";
		
		echo '<script> $(".btn-save-cita").prop("disabled","true");	</script>';
	}
	}else{
		echo "<span style='color:red'>No tiene agenda programada.</span>";
		echo '<script> $(".btn-save-cita").prop("disabled","true");	</script>';
	}
	
	}
	else{
		echo "<span style='color:red'>No tiene agenda programada.</span>";
		echo '<script> $(".btn-save-cita").prop("disabled","true");	</script>';
	}
	
}

private function selectAppointmentHour($id_doct,$fecha_propuesta, $hour_from, $hour_to){
	$minutes = 15;
 $startDate = DateTime::createFromFormat("H:i", $hour_from);
$endDate = DateTime::createFromFormat("H:i", $hour_to);
$interval = new DateInterval("PT".$minutes."M");
$dateRange = new DatePeriod($startDate, $interval, $endDate);

echo "<div class='col-md-6'> 
<label class='form-label'>Elegir hora de la cita</label>
<select name='hora_de_cita' class='form-select form-select3' id='hora_de_cita' >";
echo "<option value=''></option>";

foreach ($dateRange as $date) {
$hora_cita=$this->db->select('hora_de_cita')->where('doctor',$id_doct)->where('filter_date',$fecha_propuesta)->where('hora_de_cita',$date->format("H:i"))->get('rendez_vous')->row('hora_de_cita');

if($hora_cita==$date->format("H:i")){
	$disabled='disabled';
$info="hay cita en esa hora";
}else{
$disabled='';
$info="";
}
echo '<option '.$date->format("H:i a").' '.$disabled.'>'.$date->format("H:i a").' '.$info.' </option>';

} 
echo "</select></div>";	
}

}







