<?php
$lastFecha=$this->db->select('filter_date,weekday')->where('doctor',$id_doct)->where('centro',$id_centro)->order_by('filter_date','desc')->limit(1)->get('rendez_vous')->row_array();
$lastFe=$lastFecha['filter_date'];
$lastFechaDay=$lastFecha['weekday'];
$d = new DateTime("$lastFe  +1day");
$searchNext = $d->format('d-m-Y');

 if($thursdayAgendaCita !=$countRdvThursday){
echo "<span style='color:green'>El día <strong>$thursdayAgenda siguiente</strong>  puede crear hasta <strong>$thursdayAgendaCita</strong> citas para <strong>$centro</strong>.<br/> 
Total creadas : <strong>$countRdvThursday.</strong></span>";	
}

 else if($fridayAgendaCita !=$countRdvFriday){
echo "<span style='color:green'>El día <strong>$fridayAgenda siguiente</strong>  puede crear hasta <strong>$fridayAgendaCita</strong> citas para <strong>$centro</strong>.<br/> 
Total creadas : <strong>$countRdvFriday.</strong></span>";	
}

 else if($sabadoAgendaCita !=$countRdvSabado){
echo "<span style='color:green'>El día <strong>$sabadoAgenda siguiente</strong>  puede crear hasta <strong>$sabadoAgendaCita</strong> citas para <strong>$centro</strong>.<br/> 
Total creadas : <strong>$countRdvSabado.</strong></span>";	
}



 else if($domingoAgendaCita !=$countRdvDomingo){
echo "<span style='color:green'>El día <strong>$domingoAgenda siguiente</strong>  puede crear hasta <strong>$domingoAgendaCita</strong> citas para <strong>$centro</strong>.<br/> 
Total creadas : <strong>$countRdvDomingo.</strong></span>";	
}


 else if($lunesAgendaCita !=$countRdvLunes){
echo "<span style='color:green'>El día <strong>$lunesAgenda siguiente</strong>  puede crear hasta <strong>$lunesAgendaCita</strong> citas para <strong>$centro</strong>.<br/> 
Total creadas : <strong>$countRdvLunes.</strong></span>";	
} 

 else if($martesAgendaCita !=$countRdvMartes){
echo "<span style='color:green'>El día <strong>$martesAgenda siguiente</strong>  puede crear hasta <strong>$martesAgendaCita</strong> citas para <strong>$centro</strong>.<br/> 
Total creadas : <strong>$countRdvMartes.</strong></span>";	
} 

 else if($miercolesAgendaCita !=$countRdvMiercoles){
echo "<span style='color:green'>El día <strong>$miercolesAgenda siguiente</strong>  puede crear hasta <strong>$miercolesAgendaCita</strong> citas para <strong>$centro</strong>.<br/> 
Total creadas : <strong>$countRdvMiercoles.</strong></span>";	
} 


else {
$QuerySearchCita=$this->
db->select('id_apoint')->
where('filter_date',$lastFe)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');	
$countSearch=$QuerySearchCita->num_rows();	

$countAgendaSch=$this->db->select('cita')->
where('day',$lastFechaDay)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row('cita');
if($countSearch !=$countAgendaSch){
	$lastFe = date("d-m-Y", strtotime($lastFe));
echo "<span style='color:green'>Puede crear cita a partir de la fecha <strong>$lastFe</strong></span>";
} else{
	echo "<span style='color:green'>Puede crear cita a partir de la fecha <strong>$searchNext</strong></span>";
}




} 