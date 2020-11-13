<?php

if($period="mañana"){
	//--check in tarde
$nex_citat=$this->db->select('day, citas, agenda')->where('id_doctor',$this->input->post('doc'))->where('id_centro',$this->input->post('centro_medico'))->where('day',$day1)->where('agenda','tarde')->get('doctor_agenda')->row_array();
$ncitast=$nex_citat['citas'];
$query_citast=$this->db->select('id_apoint')->where('confirmada',0)->where('doctor',$this->input->post('doc'))->where('weekday',$vay)->where('fecha_propuesta',$this->input->post('fecha_propuesta1'))->where('periode','tarde')->where('centro',$this->input->post('centro_medico'))->get('rendez_vous');
$numt=$query_citast->num_rows();
//---check in noche------------

$nex_citan=$this->db->select('day, citas, agenda')->where('id_doctor',$this->input->post('doc'))->where('id_centro',$this->input->post('centro_medico'))->where('day',$day1)->where('agenda','noche')->get('doctor_agenda')->row_array();
$ncitasn=$nex_citan['citas'];
$query_citasn=$this->db->select('id_apoint')->where('confirmada',0)->where('doctor',$this->input->post('doc'))->where('weekday',$vay)->where('fecha_propuesta',$this->input->post('fecha_propuesta1'))->where('periode','noche')->where('centro',$this->input->post('centro_medico'))->get('rendez_vous');
$numn=$query_citasn->num_rows();


if(($ncitast==$numt) || ($ncitasn==$numn){
	 echo "<br/>No hay otros agenda disponible, seleccionne día siguiente.";
		  echo'<script>$(".send_cit").css("display","none")</script>';

} else{
	//if($ncitast=="" && $numt==0)
echo $ncitast;echo $numt;
}
}