<?php
$admin_position_centro=$this->session->userdata['admin_position_centro'];
$query_area = $this->db->get('areas');
$query_lab = $this->db->get('laboratories');


if($admin_position_centro){
$query_doctor= $this->model_admin->get_doctor($admin_position_centro);
$count_med = count($query_doctor);	

$hide_menu="style='display:none'";

$sqlCentroPat ="SELECT id_apoint FROM rendez_vous WHERE centro =$admin_position_centro";
$queryCentroPat= $this->db->query($sqlCentroPat);
 $num_pats =$queryCentroPat->num_rows();

$num_centros='';

}else{
$hide_menu="";
$sqlAm ="SELECT id_user, name FROM users WHERE perfil ='Medico' ORDER BY  name ASC";
$query_doctor= $this->db->query($sqlAm);
 $count_med =$query_doctor->num_rows();
 
 $query_patient=$this->db->select('id_p_a')->get('patients_appointments');
 $num_pats=$query_patient->num_rows();
 
 $query_centro = $this->db->get('medical_centers');
 $num_centros=$query_centro->num_rows();
}




$query_seguro= $this->db->get('seguro_medico');
$query_hito= $this->db->get('h_c_sinopsis');
$medico="medico";


$iduser=$this->session->userdata['admin_id'];
$id_useri = encrypt_url($iduser);
?>
<style>
.glyphicon-triangle-right{font-size:7px}

</style>
<li class="dropdown" >
<li class="dropdown"  >
<a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
PACIENTES
<span class="caret"></span>
</a>
<ul class="dropdown-menu" >
<li><a href="<?php echo site_url("admin/create_cita");?>"><i class="glyphicon glyphicon-triangle-right"></i> Buscador de pacientes (<?=$num_pats;?>)</a></li>
<!--<li><a> Total de historial clinica (<?=$query_hito->num_rows();?>)</a></li>-->
<li><a href="<?php echo site_url('admin/appointments');?>"><i class="glyphicon glyphicon-triangle-right"></i> <span id='citas_hoy'></span> Citas Hoy</a></li>
<li><a href="<?php echo site_url('admin/patients_requests');?>"><i class="glyphicon glyphicon-triangle-right"></i> <span id='cola_de_solicitud'></span> Cola solicitud</a></li>
<li><a href="<?php echo site_url("admin/billing_medicos/$admin_position_centro");?>"  ><i class="glyphicon glyphicon-triangle-right"></i> Factura</a></li>
<li><a href="<?php echo site_url('admin/facturas_borradas');?>" style='color:red;font-size:10px' > Factura Borradas</a></li>

</ul>
</li>
<li class="dropdown"  >
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
<li class="dropdown"  >
<a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
MEDICOS
<span class="caret"></span>
</a>
<ul class="dropdown-menu" >

<li <?=$hide_menu?>><a href="<?php echo site_url('admin/areas');?>"><i class="glyphicon glyphicon-triangle-right"></i>  Areas</a></li>
<li><a href="<?php echo site_url('admin/lab');?>"><i class="glyphicon glyphicon-triangle-right"></i> Laboratorios</a></li>
<li title="Mantenimiento de Servicios por Seguros Medicos y Centros Medicos"><a href="<?php echo site_url("admin/mssm/$medico");?>" ><i class="glyphicon glyphicon-triangle-right"></i> MSSM & CM</a></li>
<li><a href="<?php echo site_url("admin/create_invoice_ars_claim");?>"  ><i class="glyphicon glyphicon-triangle-right"></i> CREACION DE FACTURA PARA RECLAMAR A LA ARS</a></li>
<li><a href="<?php echo site_url("admin/medical_insurance_audit_profile");?>"  ><i class="glyphicon glyphicon-triangle-right"></i> Perfil Seguro Medico y Auditoria</a></li>
</ul>
</li>

<li class="dropdown"  >
<a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
HOSPITALIZACION
<span class="caret"></span>
</a>
<ul class="dropdown-menu" >
<li><a href="<?php echo site_url("hospitalizacion/hospitalizacion_list/0/$id_useri");?>"><i class="glyphicon glyphicon-triangle-right"></i>Listado</a></li>
<li><a href="<?php echo site_url("hospitalizacion/factura/$iduser");?>"><i class="glyphicon glyphicon-triangle-right"></i>Factura</a></li>


</ul>
</li>

<li class="dropdown"  >
<a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
<i class="glyphicon glyphicon-plus"></i> Mas
<span class="caret"></span>
</a>

<ul class="dropdown-menu" >
<li <?=$hide_menu?>>
<a  href="<?php echo site_url("report/index/$iduser/104/3");?>
" > Productividad Por Médico/Enfermería</a>
</li>

<li <?=$hide_menu?>><a href="<?php echo site_url('admin/affiliated_codes');?>"><i class="glyphicon glyphicon-triangle-right"></i> Codigos Para Afiliados</a></li>
<li><a href="<?php echo site_url('admin/medical_centers');?>"><i class="glyphicon glyphicon-triangle-right"></i> <?=$num_centros;?> Centro Medicos</a></li>
<li <?=$hide_menu?>><a href="<?php echo site_url("admin/health_insurances");?>"><i class="glyphicon glyphicon-triangle-right"></i> <?=$query_seguro->num_rows();?> Seguro Medicos</a></li>
<li <?=$hide_menu?>><a href="<?php echo site_url("admin/health_insurance_fields");?>"><i class="glyphicon glyphicon-triangle-right"></i> Campos Seguro Medico </a></li>

<li <?=$hide_menu?>><a href="<?php echo site_url('admin/listOfEstudios');?>"><i class="glyphicon glyphicon-triangle-right"></i> Estudios</a></li>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" >
<li <?=$hide_menu?>><a href="<?php echo site_url('admin/drugstores');?>"><i class="glyphicon glyphicon-triangle-right"></i> Farmacias</a></li>
<li <?=$hide_menu?>><a href="<?php echo site_url('admin/internal_drugstores');?>"><i class="glyphicon glyphicon-triangle-right"></i> Farmacias Internas</a></li>
<li <?=$hide_menu?>><a href="<?php echo site_url('admin/pharmaceutical_laboratory');?>"><i class="glyphicon glyphicon-triangle-right"></i> Laboratorio Farmaceutico</a></li>
<li <?=$hide_menu?>><a href="<?php echo site_url('admin/lab_lentes');?>"><i class="glyphicon glyphicon-sunglasses" ></i> Laboratorio De Lentes</a></li>

</ul>

</ul>

</li>
</li>
<div class="modal fade" id="showDrugMa" role="dialog" >

<div class="modal-dialog modal-lg" style="width: 95%;" >
<div class="modal-content" ></div>
</div>
</div>
<script>
 setInterval(function(){
  $('#citas_hoy').load("<?php echo base_url('admin/citas_hoy')?>").fadeIn("slow");
  $('#cola_de_solicitud').load("<?php echo base_url('admin/cola_de_solicitud')?>").fadeIn("slow");
 }, 1000);
 </script>