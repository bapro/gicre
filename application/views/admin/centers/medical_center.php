
<style>
/*.modal-dialog {
    margin: -1vh auto 0px auto
}*/
td,th{text-align:left}
.img {
    width: 15%;
    height: auto;
	border:1px solid #38a7bb
}
</style>

 <!-- *** welcome message modal box *** -->
 
 <?php 

 $i = 1;
$cpt="";
 ?>
 


<div class="container"  >

 <?php echo $this->session->flashdata('success_msg'); ?>
  <?php foreach($CENTRO_MEDICO as $centro_medico)?>
 <div class="row" id="background_">
 <div class="col-md-7">
 <h2>CENTRO MEDICO</h2>
 
  <?php $user_c18=$this->db->select('name')->where('id_user',$centro_medico->created_by)->get('users')->row('name');
$user_c19=$this->db->select('name')->where('id_user',$centro_medico->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($centro_medico->insert_date));
$updated_time = date("d-m-Y H:i:s", strtotime($centro_medico->modify_date));
echo "<span style='color:black'>Creado por : $user_c18 ($inserted_time) <br/> Modificado por $user_c19 ($updated_time)</span>";?>
 </div>
 <div class="col-md-3" >
  <img class="img "  style="width:200px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_medico->logo; ?>"  />

 </div>
 <?php if($hide==0){?>
 <div class="col-md-2 text-right acionesright">
 <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle atras" type="button" data-toggle="dropdown" data-hover="dropdown">
   Editor <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <li><a  href="<?php echo base_url('admin/update_centro_medico/'.$centro_medico->id_m_c)?>">Editar Centro Medico</a></li>
  <li><a href="#">Inhabilitar Centro Medico</a></li>
  <li><a href="<?php echo base_url('admin/new_centro_medico/')?>">Nuevo Centro Medico</a></li>
  </ul>
</div>
 </div>
 <?php } ?>
 </div><br/>
  <div class="row" id="background_">
 <table class="table table-striped ">

<tr>
<th class="thh">Nombre</th>
<td class="vtd"><?=$centro_medico->name;?></td>

</tr>

<tr>
<th class="thh">Tipo</th>
<td class="vtd"><?=$centro_medico->type;?></td>

</tr>

<tr>
<th class="thh">RNC</th>
<td class="vtd"><?=$centro_medico->rnc;?></td>

</tr>
<tr>
<th class="thh">Tel Residencial</th>
<td class="vtd"><?=$centro_medico->primer_tel;?></td>
</tr>

<tr>
<th class="thh">Tel Celular</th>
<td class="vtd"><?=$centro_medico->segundo_tel;?></td>
</tr>
<tr>
<th class="thh">Email</th>
<td class="vtd" ><?=$centro_medico->email;?></td>

</tr>

<tr>
<th class="thh">Fax</th>
<td class="vtd"><?=$centro_medico->fax;?></td>
</tr>

<tr>
<th class="thh">Página web</th>

<td class="vtd"><?=$centro_medico->pagina_web;?></td>
</tr>
<tr>
<th class="thh">Direccion</th>

<td class="vtd"><?=$centro_medico->barrio;?></td>
</tr>
<tr>
<th class="thh">Provincia</th>

<td class="vtd"><?=$CENTRO_PROVINCE;?></td>
</tr>
<tr>
<th class="thh">Municipio</th>

<td class="vtd"><?=$CENTRO_MUNICIPIO;?></td>
</tr>

</table>
</div>

<br/>
<br/>
<section  style="border-top:1px solid #38a7bb;"  >
<div class="col-md-12" >
<div class="heading text-left">
<h3>Datos Relacionados a <?=$centro_medico->name;?></h3>
</div>

<ul class="nav nav-pills nav-justified">
<li class="active"><a href="#doctores" data-toggle="tab">Medico</a></li>
<li><a href="#area" data-toggle="tab">Areas</a></li>
<li><a href="#asistentemedico" data-toggle="tab">Asistente Medico</a></li>
<li><a href="#seguroMedico" data-toggle="tab">Seguros Medicos</a></li>
</ul>
<div class="tab-content tab-content-inverse" id="">
<div class="tab-pane active" id="doctores">
<?php if (empty($RESULT_DOCTOR))
{
echo"<div class='alert alert-warning'> No hay doctores para este centro medicos. </div>";

}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped  example" width="100%" style="font-size:15px" cellspacing="0">
<thead>
<tr style="background:#38a7bb;color:white">
<th>Nombres</th>
<th>Area</th>
<th>Correo Elect.</th>
<th>Celular</th>
<th>Extension</th>
<th>Exequatur</th>
<th>Acciones</th>

</tr>
</thead>
<tbody>
<?php 
$var="Medico";
foreach($RESULT_DOCTOR as $result_doctor)

{

$area=$this->db->select('title_area')->where('id_ar',$result_doctor->area)
->get('areas')->row('title_area');
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>

<tr bgcolor="<?=$colorBg ;?>">
<td  style="text-align:left;text-transform:uppercase"><?=$result_doctor->name;?></td>
<td  style="text-align:left"><?=$area;?></td>
<td  style="text-align:left"><?=$result_doctor->correo;?></td>
<td  style="text-align:left"><?=$result_doctor->cell_phone;?></td>
<td  style="text-align:left"><?=$result_doctor->extension;?></td>
<td  style="text-align:left"><?=$result_doctor->exequatur;?></td>
<td  style="text-align:left">
<?php if($hide==0){?>
<a href="<?php echo base_url("admin/update_user/$result_doctor->id_user/1")?>"  title="Ver" ><i class="fa fa-eye" aria-hidden="true"></i></a>
<?php } ?> </td>
</tr>

<?php
}
?>
</tbody>
</table>
</div>
<?php
}

?>

</div>

<div class="tab-pane" id="area">
<?php if (empty($CENTRO_MEDICO_ESPECIALIDADED))
{
echo"<div class='alert alert-warning'> No hay area para este centro medicos. </div>";

}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped  example" width="100%" style="font-size:15px" cellspacing="0">
<thead>
<tr style="background:#38a7bb;color:white">
<th style="text-align:center">Area</th>
</tr>
</thead>
<tbody>
<?php 
$var="Medico";
foreach($CENTRO_MEDICO_ESPECIALIDADED as $row)

{

$area=$this->db->select('title_area')->where('id_ar',$row->especialidad)
->get('areas')->row('title_area');
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>

<tr bgcolor="<?=$colorBg ;?>">
<td  style="text-align:center"><?=$area;?></td>
</tr>

<?php
}
?>
</tbody>
</table>
</div>
<?php
}

?>

</div>

<div class="tab-pane" id="asistentemedico">
<?php if (empty($RESULT_ASDOCTOR))
{
echo"<div class='alert alert-warning'> No hay asistente medicos para este centro medicos. </div>";

}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped  example" width="100%" style="font-size:15px" cellspacing="0">
<thead>
<tr style="background:#38a7bb;color:white">
<th>Nombre</th>
<th>Correo Elect.</th>

</tr>
</thead>
<tbody>
<?php 
$var="Medico";
foreach($RESULT_ASDOCTOR as $ram)

{

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>

<tr bgcolor="<?=$colorBg ;?>">
<td  style="text-align:left;text-transform:uppercase"><?=$ram->name;?></td>
<td  style="text-align:left"><?=$ram->correo;?></td>
</tr>

<?php
}
?>
</tbody>
</table>
</div>
<?php
}

?>


</div>

<div class="tab-pane" id="seguroMedico">
<?php if (empty($CENTRO_MEDICO_SEGURO))
{
echo"<div class='alert alert-warning'>  No hay Seguro medico registradas para este centro medicos. </div>";
?>
<a class="btn btn-primary btn-xs" href="<?=$centro_medico->id_m_c;?>">Seguro medico</a>
<?php
}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped  example" style="margin:auto;font-size:15px;" cellspacing="0" >
<thead>
<tr  style="background:#38a7bb;color:white">
<th>Logo</th>
<th>Seguro medico</th>
<th style="width:1px">Acciones</th>
</tr>

</thead>
<tbody>		
<?php foreach($CENTRO_MEDICO_SEGURO as $c_m_s)
{
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>

<tr bgcolor="<?=$colorBg ;?>">
<td style="width:10px">
<img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $c_m_s->logo; ?>"  /></td>
<td class="seguro_medico" style="font-size:15px;width:5px"><?=$c_m_s->title;?></td>

<td style="width:10px">
<?php if($hide==0){?>
<a data-toggle="modal" data-target="#EditSeguroMedico" class="st" title="Editar" href="<?php echo base_url('admin/EditSeguroMedico/'.$c_m_s->id_sm)?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<a data-toggle="modal" data-target="#relatedCentroMedico" class="st" href="<?php echo base_url("admin/RelatedCentro/$c_m_s->id_sm/$c_m_s->id_medical_center")?>" title="Centros medicos conectados "><i class="fa fa-link" aria-hidden="true"></i></a>
<?php } ?>
</td>
</tr> 
<?php
}

?>
</tbody>
</table>
</div>
<?php
}
?>


</div><!--seguro_medico end-->

</div><!-- /.tabs content end -->

</div><!-- col m12 end -->


</section>
<div class="modal fade" id="relatedDoctor" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditSeguroMedico"  tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
<div class="modal fade" id="relatedCentroMedico" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
</div><!-- container end -->
</div>
 <?php 
 
 
        $this->load->view('footer');
 $this->load->view('admin/modal');

 ?>


 </body>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>-->
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script>
 $( document ).ready(function() {
    $('#relatedDoctor').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});

$( document ).ready(function() {
    $('#relatedCentroMedico').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});
$( document ).ready(function() {
    $('#EditSeguroMedico').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});


$(".deletedoctor").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/delete_doctor_centro2')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
});
$(".centroseguro").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/delete_seguro_centro')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
});

</script>
</html>