<?php $query_area = $this
    ->db
    ->get('areas');
$iduser = $this
    ->session
    ->userdata['medico_id'];
$query_citas = $this
    ->db
    ->select('confirmada')
    ->where('confirmada', 0)
    ->get('rendez_vous');
$query_centro = $this
    ->db
    ->get('medical_centers');
$query_np = $this
    ->db
    ->select('id_apoint')
    ->where('confirmada', 0)
    ->where('doctor', $iduser)->group_by('id_patient')
    ->get('rendez_vous');
$query_seguro = $this
    ->db
    ->get('seguro_medico');
$query_diseases = $this
    ->db
    ->get('type_reasons');
if ($this
    ->session
    ->userdata['medico_perfil'] == "Medico")
{
    $centro_num = $this
        ->db
        ->select('id_m_c,type')
        ->join('doctor_agenda_test', 'doctor_agenda_test.id_centro = medical_centers.id_m_c')
        ->where('id_doctor', $iduser)->group_by('id_centro')
        ->get('medical_centers');
}
else
{
    $centro_num = $this
        ->db
        ->select('id_m_c,type')
        ->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c')
        ->where('id_doctor', $iduser)->group_by('centro_medico')
        ->get('medical_centers');
}
$rowType = $centro_num->row();
$seguro_num = $this
    ->db
    ->select('id_sm')
    ->join('doctor_seguro', 'doctor_seguro.seguro_medico = seguro_medico.id_sm')
    ->where('id_doctor', $iduser)->get('seguro_medico');
if ($this
    ->session
    ->userdata['medico_perfil'] == "Medico")
{
    $show = "style='display:none'";
    $today_app_ct = $this
        ->db
        ->select('id_apoint')
        ->where('confirmada', 0)
        ->where('cancelar', 0)
        ->where('doctor', $iduser)->where('fecha_propuesta', date("d-m-Y"))
        ->where('seen_hoy', 1)
        ->get('rendez_vous');
    $today_app = $today_app_ct->num_rows();
}
else
{
    $show = "";
    $today_app = "";
}
$area_id = $this
    ->db
    ->select('area')
    ->where('id_user', $iduser)->get('users')
    ->row('area');
if ($area_id == 87)
{
    $opto_med = 'display:none';
}
else
{
    $opto_med = '';
} 

if($rowType->type =='Salud ocupacional'){
	$zona_franca="style='display:none'";
	
	$id_center=encrypt_url($rowType->id_m_c);


$query = $this->db->query("SELECT * FROM employee_birthdate");
$rest=$query->num_rows();
$birtd= "<span style='width: 3px;
    height: 3px;
    padding: 3px;
	border-radius:50%;
     background: white;
    border: 1px solid red;
	color: red;
	text-align: center;
	font: 13px Arial, sans-serif;' > $rest</span>";
	
	
	
}else{
$zona_franca="";	
$id_center="";
$rest="";
$birtd="";
}

?>


<li class="dropdown">
<li>
<a href="<?php echo site_url('medico/index'); ?>">
<?=$today_app?> Citas por hoy <span id="citas_hoy"></span> </a>
</li>
<li>
<a href="<?php echo site_url('medico/patients_requests'); ?>">
<span id="cola_de_solicitud"></span> Solicitudes</a>
</li>
<li>
<a href="<?php echo site_url('medico/create_cita');?>">
Paciente</a>
</li>
<?php if($rowType->type =='Salud ocupacional' && $perfil=='Medico') {
?>
<li>
<a title="Evaluación De Cumpleaños: <?=$rest?> empleados cumplirán años dentro de 2 días." href="<?php echo site_url("zona_franca/birthdates/$id_center");?>"><?=$birtd?> E. C.</a>

</li>
<?php
} elseif($rowType->type =='Salud ocupacional' && $perfil=='Asistente Medico'){?>
<li>
<a href="<?php echo site_url("medico/upload_employees");?>" >
EMPLEADO</a>
</li>

<?php }?>
</li>
<li class="dropdown" <?=$zona_franca?> >
<a class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">FACTURACION<span class="caret"></span></a>
<ul class="dropdown-menu" >
<li title="Mantenimiento de Servicios por Seguros Medicos y Centros Medicos">
<a href="<?php echo site_url("medico/mssm/medico");?>" >
MSSM & CM</a>
</li>
<li>
<a href="<?php echo site_url('medico/billing_medicos');?>" >
Factura</a>
</li>
<li>
<a href="<?php echo site_url('medico/facturas_borradas');?>" style='color:red;font-size:10px' >
Factura Borradas</a>
</li>
<li>
<a href="<?php echo site_url('medico/create_invoice_ars_claim'); ?>">
CREACION DE FACTURA PARA RECLAMAR A LA ARS
<?=$rowType->type?> <?=$perfil?></a>
</li>
</ul>
</li>

<li class="dropdown"style="<?=$opto_med?>
"><a style="cursor:pointer"class="dropdown-toggle"data-hover="dropdown"data-toggle="dropdown"><i class="glyphicon glyphicon-plus"></i> <span class="caret"></span></a>
<ul class="dropdown-menu">
<?php
 if($rowType->type =='Salud ocupacional') {
 ?>
 <li  oncontextmenu="return false;">
 <a data-target="#showDrugMReporte"  data-toggle="modal" href="<?php echo site_url("salud_ocupacional_med/load_modal_search_reporte/$iduser/$rowType->id_m_c/2");?>
" > Reporte De Medicamentos</a>
</li>
	
 <?php
 }
 if($rowType->type =='Salud ocupacional' && $iduser==633) { ?>
 <!--<li>
<a href="<?php echo site_url("medico/upload_employees_files/$rowType->id_m_c");?>" >
Update Employees</a>
</li>-->
<li oncontextmenu="return false;">
<a data-target="#showDrugMa"   data-toggle="modal" href="<?php echo site_url("salud_ocupacional_med/load_modal_search_reporte/$iduser/$rowType->id_m_c/1");?>
" > Drug Management</a>
</li>
<!--<li >
<a data-target="#showDrugMa"   data-toggle="modal" href="<?php echo site_url("salud_ocupacional_med/load_modal_search_reporte/$iduser/$rowType->id_m_c/3");?>
" > Productividad Por Médico</a>
</li>
<li >
<a data-target="#showDrugMa"   data-toggle="modal" href="<?php echo site_url("salud_ocupacional_med/load_modal_search_reporte/$iduser/$rowType->id_m_c/4");?>
" > Productividad Por Enfermería</a>
</li>-->
<li >
<a  href="<?php echo site_url("report/index/$iduser/$rowType->id_m_c");?>
" > Productividad Por Médico/Enfermería</a>
</li>


<?php } 
if($rowType->type =='Salud ocupacional' && $perfil=="Medico"){?>

<li>
<a data-target="#showMedMLicRep"   data-toggle="modal"  href="<?php echo site_url("zona_franca/medical_license/$rowType->id_m_c");?>
" > Reporte De Licencia Médica</a>
</li>	
<?php
}

?>

<li>
<a href="<?php echo site_url('medico/medical_centers'); ?>">
<?=$centro_num->num_rows()?> Centro Medicos</a>
</li>
<li>
<a href="<?php echo site_url('medico/health_insurances'); ?>">
<?=$seguro_num->num_rows()?> Seguro Medicos</a>
</li>
</ul>
</li>
<div class="modal fade" id="showDrugMa" role="dialog" >

<div class="modal-dialog modal-lg" style="width: 95%;" >
<div class="modal-content" ></div>
</div>
</div>


<div class="modal fade" id="showDrugMReporte" role="dialog" >
<div class="modal-dialog modal-lg" style="width: 95%;" >
<div class="modal-content" ></div>
</div>
</div>

<div class="modal fade" id="showMedMLicRep" role="dialog" >
<div class="modal-dialog modal-lg" style="width: 95%;" >
<div class="modal-content" ></div>
</div>
</div>

<script>
setInterval(function(){
	$("#citas_hoy").load("<?php echo base_url("medico/newEntry") ?>").fadeIn("slow");
	$("#cola_de_solicitud").load("<?php echo base_url("admin_medico/cola_de_solicitud_medico/$iduser") ?>").fadeIn("slow");
	
	},5000);
	function loadBirthDay(){
	$("#birth_dates").load("<?php echo base_url("zona_franca/check_if_birth_dates/$rowType->id_m_c") ?>").fadeIn("slow");
	}
	
	$('#showDrugMa').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})	
</script>