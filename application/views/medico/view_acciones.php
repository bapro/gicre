<?php
$query_area = $this->db->get('areas');

$iduser=$this->session->userdata['medico_id'];
$query_citas=$this->db->select('confirmada')->where('confirmada',0)
->get('rendez_vous');

$query_centro = $this->db->get('medical_centers');
$query_np=$this->db->select('id_apoint')->where('confirmada',0)->where('doctor',$iduser)->group_by('id_patient')->get('rendez_vous');
$query_seguro= $this->db->get('seguro_medico');
$query_diseases= $this->db->get('type_reasons');
if($this->session->userdata['medico_perfil']=="Medico"){

$centro_num=$this->db->select('id_m_c')->join('doctor_agenda_test', 'doctor_agenda_test.id_centro = medical_centers.id_m_c')->where('id_doctor',$iduser)->group_by('id_centro')->get('medical_centers');
} else{
$centro_num=$this->db->select('id_m_c')->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c')->where('id_doctor',$iduser)->group_by('centro_medico')->get('medical_centers');

}
$seguro_num=$this->db->select('id_sm')->join('doctor_seguro', 'doctor_seguro.seguro_medico = seguro_medico.id_sm')->where('id_doctor',$iduser)->get('seguro_medico');

if($this->session->userdata['medico_perfil']=="Medico"){
$show="style='display:none'";	
$today_app_ct=$this->db->select('id_apoint')->where('confirmada',0)->where('cancelar',0)->where('doctor',$iduser)->where('fecha_propuesta',date("d-m-Y"))->where('seen_hoy',1)->get('rendez_vous');
$today_app=$today_app_ct->num_rows();
} else{
$show="";
$today_app="";	
}
$area_id= $this->db->select('area')->where('id_user',$iduser)->get('users')->row('area');
if($area_id==87){
$opto_med='display:none';
}else{
$opto_med='';	
}
?>
<li class="dropdown">
<li><a href="<?php echo site_url('medico/index');?>"><?=$today_app?> Citas por hoy <span id='citas_hoy'></span></a></li>
<li><a href="<?php echo site_url('medico/patients_requests');?>"><span id='cola_de_solicitud'></span> Cola solicitud</a></li>
<li class="dropdown"  >

<a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
Pacientes 
<span class="caret"></span>
</a>
<ul class="dropdown-menu" >
<li><a href="<?php echo site_url('medico/create_cita');?>"> Crear Paciente</a></li>

</ul>
</li>

<li class="dropdown" style="<?=$opto_med?>"  >
<a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
FACTURACION
<span class="caret"></span>
</a>
<ul class="dropdown-menu" >
<!--<li <?=$show?> title="Mantenimiento de Servicios por Seguros Medicos y Centros Medicos"><a href="<?php echo site_url("medico/mssm/medico");?>" > MSSM & CM</a></li>-->
<li   title="Mantenimiento de Servicios por Seguros Medicos y Centros Medicos"><a href="<?php echo site_url("medico/mssm/medico");?>" > MSSM & CM</a></li>
<li><a href="<?php echo site_url('medico/billing_medicos');?>"  > Factura</a></li>
<li><a href="<?php echo site_url('medico/facturas_borradas');?>" style='color:red;font-size:10px' > Factura Borradas</a></li>
<li><a href="<?php echo site_url('medico/create_invoice_ars_claim');?>"  > CREACION DE FACTURA PARA RECLAMAR A LA ARS</a></li>

</ul>
</li>
<li class="dropdown" style="<?=$opto_med?>"  >
<a href="#" class="dropdown-toggle" data-toggle="dropdown">EMERGENCIA <b class="caret"></b></a>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
<li><a href="<?php echo site_url("admin/almacen_general");?>"><i class="glyphicon glyphicon-triangle-right"></i> almacen general</a></li>
<li class="dropdown-submenu">
<a>Pacientes Admitas <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" >
<?php
$sql = "SELECT  enviado_a from emergency_patients WHERE worked =2 OR worked=0 GROUP BY enviado_a";
$query= $this->db->query($sql);
if($query->result() !=NULL){
foreach($query->result() as $row){
	if($row->enviado_a==1){
		$enviado="Triaje";
	} elseif($row->enviado_a==2){
		$enviado="Emergencia General";
	}
	elseif($row->enviado_a==3){
		$enviado="Emergencia Pediatría";
	}
	elseif($row->enviado_a==4){
	$enviado="Quirofano";	
	}
	elseif($row->enviado_a==5){
	$enviado="Emergencia Obstétrica Y Ginecología";	
	}
	elseif($row->enviado_a==6){
	$enviado="Reanimación";	
	}
$link=' <a   href="'.site_url().'emergency/emergency_patients/'.$row->enviado_a.'/'.$iduser.'"  ><i class="glyphicon glyphicon-triangle-right"></i> '.$enviado.'</a>';
echo "<li title= '$enviado' style='font-style:italic'>$link</li>";

}
}
?>
<li><a href="<?php echo site_url("emergency/list_of_saved_emergency/$iduser");?>">Patientes Atendidos En Emergencia</a></li>
</ul>
</li>
<li><a href="<?php echo site_url("emergency/factura/$iduser");?>"><i class="glyphicon glyphicon-triangle-right"></i> FACTURA</a></li>
</ul>
</li>
<li class="dropdown" style="<?=$opto_med?>"  >

<a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
<i class="glyphicon glyphicon-plus"></i> Mas
<span class="caret"></span>
</a>
<ul class="dropdown-menu" >
<li><a href="<?php echo site_url('medico/medical_centers');?>"><?=$centro_num->num_rows();?> Centro Medicos</a></li>
<li><a href="<?php echo site_url('medico/health_insurances');?>"><?=$seguro_num->num_rows();?> Seguro Medicos</a></li>
</ul>
</li>
</li>
<script>
 setInterval(function(){
  $('#citas_hoy').load("<?php echo base_url("medico/newEntry")?>").fadeIn("slow");
  $('#cola_de_solicitud').load("<?php echo base_url("admin_medico/cola_de_solicitud_medico/$iduser")?>").fadeIn("slow");
 }, 5000);
 
 
 
</script>