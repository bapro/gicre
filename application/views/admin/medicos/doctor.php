
<!-- owl carousel css -->
<style>
td,th{text-align:left}
</style>


<!-- *** welcome message modal box *** -->

<?php 

$cpt="";
?>

<div class="container" >

<div class="row" id="background_">
<table class="table table-striped table-bordered" >
<tr>
<th class="thh"><h2>DOCTOR</h2></th>
<td>
<?php
foreach($RESULT_DOCTOR as $result_doctor) 
 $cr=$this->db->select('inserted_by,insert_date')->where('id_user',$result_doctor->id_user)->get('users')->row_array();
$create=$cr['inserted_by'];

 $crn=$this->db->select('name')->where('id_user',$create)->get('users')->row('name');
 
 
 
 $up=$this->db->select('updated_by,update_date')->where('id_user',$result_doctor->id_user)->get('users')->row_array();

 $update=$up['updated_by'];
 
  $mdn=$this->db->select('name')->where('id_user',$update)->get('users')->row('name');
 
 
 $update=$up['updated_by'];
 
 
$inserted_time = date("d-m-Y H:i:s", strtotime($cr['insert_date']));
$updated_time = date("d-m-Y H:i:s", strtotime($up['update_date']));
echo "<span style='color:black'>Creado por  $crn ($inserted_time) <br/> Modificado por $mdn ($updated_time)</span>";
?>


</td>
</tr>
<tr>
<th class="thh">Nombres</th>
<td class="vtd" style="text-transform:uppercase"><?=$result_doctor->name;?></td>

</tr>
<tr>
<th class="thh">Cedula</th>

<td class="vtd"><?=$result_doctor->cedula;?></td>
</tr>
<tr>
<th class="thh">Area</th>
<td class="vtd">
<?php 
$area=$this->db->select('title_area')->where('id_ar',$result_doctor->area )
->get('areas')->row('title_area');
echo $area;
?> 
</td>
</tr>


<tr>
<th class="thh">Execuatur</th>
<td class="vtd">
<?=$result_doctor->exequatur;?>
</td>
</tr>
<tr>
<th class="thh">Coreo Electronico</th>
<td class="vtd" ><?=$result_doctor->correo;?></td>

</tr>

<tr>
<th class="thh">Telefono</th>
<td class="vtd"><?=$result_doctor->cell_phone;?></td>
</tr>

<tr>
<th class="thh">Extension</th>

<td class="vtd"><?=$result_doctor->extension;?></td>
</tr>



</table>
</div>
<hr id="hr_ad"/>

<section  >
<div class="col-md-12" >
<div class="heading text-left">
<h4 style="color:green">Datos Relaccionados por doctor <?=$result_doctor->name;?></h4>
</div>

<ul class="nav nav-pills nav-justified">
<li class="active"><a href="#solicitudes" data-toggle="tab">ASISTENTE MEDICO</a></li>
<li><a href="#seguroMedico" data-toggle="tab">SEGURO MEDICO</a></li>
</ul>
<div class="tab-content tab-content-inverse"  id="background_">

<div class="tab-pane" id="seguroMedico">
<?php if (empty($SEGURO_MEDICO_DOCTOR))
{
echo"<div class='alert alert-warning'>  No hay Seguro medico registradas para este centro medicos. </div>";
?>

<?php
}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered" style="margin:auto;" cellspacing="0" >

<tr style="background:#38a7bb;color:white">
<th ><strong>SEGURO MEDICO</strong></th>
</tr>

<?php foreach($SEGURO_MEDICO_DOCTOR as $c_m_s)
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

<td style="font-size:15px;width:5px"><?=$c_m_s->title;?></td>
</tr> 

<?php
}

?>

</table>
</div>
<?php
}
?>


</div><!--seguro_medico end-->



<div class="tab-pane active" id="solicitudes">
<?php if ($query->result()==NULL)
{
echo"<div class='alert alert-warning'> No hay asistente Medico. </div>";
?>

<?php
}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered" width="100%" style="font-size:15px" cellspacing="0">
<thead>
<tr style="background:#38a7bb;color:white" class="alternate">

<th>ASISTENTE MEDICO</th>

</tr>
</thead>
<tbody>
<?php 
foreach($query->result() as $asistm)
{
	
$centro_id=$this->db->select('centro_medico')->where('id_doctor',$asistm->id_asdoc)->get('doctor_centro_medico')->row('centro_medico');
$centro=$this->db->select('name')->where('id_m_c',$centro_id)->get('medical_centers')->row('name');

$asisnam=$this->db->select('name')->where('id_user',$asistm->id_asdoc)->get('users')->row('name');
?>
<tr>

<td  style="text-align:left;">
<a  title="Ver" href="<?php echo base_url("admin/update_user/$asistm->id_asdoc/2")?>" ><?=$asisnam?></a>
afectado a <a  title="Ver" href="<?php echo base_url("admin/centro_medico/$asistm->id_asdoc/2")?>" ><?=$centro?></a>
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


</div><!-- solicitudes ends-->
</div><!-- /.tabs content end -->

</div><!-- col m12 end -->


</section>

<div class="modal fade" id="verArea" tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
</div>
</div>
</div>
</div>
<div class="modal fade" id="editBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">

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
<?php $this->load->view('footer');?>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>

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
$( document ).ready(function() {
$('#verArea').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
});
//delete agenda for this doctor


//--edit agenda doctor


function submitForm(){
var id_doctor = $("#id_doctor").val();
var lang = [];

// Initializing array with Checkbox checked values
$("input[name='agenda_id']:checked").each(function(){
lang.push(this.value);
});


$.ajax({
type: "POST",
url: "<?=base_url('admin/UpdateAgendaDoctor')?>",
data: {id_doctor : id_doctor,agenda_id : lang},
cache: true,
success:function(data){ 
 $('#flash').html('Cambio hecho !').fadeIn('slow').delay(3000).fadeOut('slow');
}  
});

return false;
};
//prevent submit if not check
$('.checkins').change(function() {
if ($('.checkins:checked').length) {
$('#assing').removeAttr('disabled');
} else {
$('#assing').attr('disabled', 'disabled');
}
});

//delete doctor centro

$(".deletedoctorcentro").click(function(){
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
})
//delete doctor seguro

$(".deletedoctorseguro").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteDoctorSeguro')?>',
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
})
</script>

</html>