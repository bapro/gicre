
<style>

td,th{text-align:left}

</style>

<!-- *** welcome message modal box *** -->

<?php

$this->padron_database = $this->load->database('padron',TRUE);
//$this->load->view('medico/header');

$area_id= $this->db->select('area')->where('first_name',$iduser)->get('doctors')->row('area');




?>


<div class="col-md-12">
<div class="row">
<a href="<?php echo site_url("medico/create_cita");?>" class="btn btn-primary btn-xs">Nueva Paciente</a>
<hr id="hr_ad"/>
</div>
<h3>Citas Confirmadas</h3><br/>

<div class="row">
  <div class="col-md-3" > 
<select id="centro_medico" name="centro_medico"  class="form-control" style="background:#E0E5E6;">
 <option value="Todos los centros médicos">Los centros médicos <?=$countc?></option>
 <?php 
foreach($centro_medico as $row)
 { 
  echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>
</select>
<a href="#" id="ver_todo" style="display:none" onclick="window.location.reload()"   class="btn btn-primary btn-xs" >Todos los centros médicos </a>

</div>


<div class="col-md-9" style="background:#E0E5E6;border:1px solid #38a7bb;"> 
 <form class="form-inline" method="post" >
<div class="form-group">
<label for="desde">Desde</label><input type="text" id="date_from" name="date_from" placeholder="la fecha" class="form-control">
</div>
<div class="form-group">
<label for="hasta">Hasta</label><input type="text"id="date_to" placeholder="la fecha" name="date_to" class="form-control">
</div>
<button type="submit" id="click_button" class="btn btn-default">Ver</button>
</form>
</div>
<span id="flash1"></span>
</div>


<hr id="hr_ad"/>
<div  id="results"></div>
<div  id="results_datepicker"></div>

<div class="row"  id="dis" >
<div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" style="margin:auto"  cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th><strong>Foto</strong></th>
<th><strong>NEC</strong></th>
<th><strong>Patiente</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro Medico</strong></th>
<th><strong>Historial Medico</strong></th>
</tr>
</thead>
<tbody>
<?php foreach($appointments as $ver)

{
	$patient=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();
	
	$sql ="SELECT p_id FROM h_c_diagno_def_link where p_id='$ver->id_patient' && user_id='$ver->doctor'  && centro_medico='$ver->centro'";
$atendido = $this->db->query($sql);
$atendido->num_rows();
if($atendido->num_rows() > 0){
$atend="<i style='color:green' class='fa fa-check' aria-hidden='true'></i>";
} else {$atend="";}
?>
<tr>

<td>
<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="75" height="75"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
	
}
else{
	?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>
</td>
<td><?=$ver->nec;?></td>
 <?php 
	 $patient=$this->db->select('nombre,sexo')->where('id_p_a',$ver->id_patient )
   ->get('patients_appointments')->row_array();
   
   ?>
   <td style="text-transform: uppercase;"><a href="<?php echo site_url("medico/patient/$ver->id_patient/$ver->centro"); ?>"><?=$patient['nombre'];?>  </a> </td>

<td ><?=$ver->fecha_propuesta;?></td>
<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();?>
<a href="<?php echo site_url("medico/centro_medico/".$ver->centro); ?>"><?=$centro['name'];?></a>
</td>
<?php 
	$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
   ->get('users')->row('name');?>

<td style="text-transform: uppercase">
<?php if($perfil=="Medico") {?>
<a target="_blank" href="<?php echo site_url("admin_medico/historial_medical/$ver->id_patient/$iduser/$area_id"); ?>"><i class="fa fa-history" aria-hidden="true"></i> <?=$atend?></a>
<?php } else {echo "<span style='color:red;font-size:15px'>No tiene acceso a la historia clinica</span>";}?>
</td>
</tr>

<?php
}
?>
</tbody>    
</table>
</div>
</div>

<br/>
</div>
</div>

 </body>
<?php 


$this->load->view('footer');


?>




<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript">
/*
$( '#centro_medico' ).on('change', function(){
$("#flash1").fadeIn(400).html('<span class="load"><img style="width:80px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

var id_centro = $(this).val();
$.ajax({
type:"POST",
url:'<?php echo base_url("medico/get_centro_medico") ?>',
cache: false,    
data:{centro_medico:id_centro},
success:function(data){
$("#flash1").hide();
$("#results_datepicker").hide();
$("#results").html(data);
if (id_centro != 'Todos los centros médicos')
{
$("#dis").hide();
$("#results").show();

}
else
{
$("#dis").show();
$("#results").hide();

}
}

});


});
*/

//display by datepicker
$("#click_button").on('click', function (e) {
e.preventDefault();
if($("#date_from").val()=="" || $("#date_to").val()==""){
	alert("Ninguna fecha debe ser vacio !");
} else {
$("#flash1").fadeIn(400).html('<span class="load"> <img style="width:80px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
url: '<?php echo site_url('medico/get_centro_medico_datepicker');?>',
type: 'post',
data: {centro:$("#centro_medico").val(),date_from:$("#date_from").val(),date_to:$("#date_to").val()},
success: function (data) {
$("#flash1").hide();
$("#results_datepicker").show();
$("#results_datepicker").html(data);
}

});

$("#ver_todo").hide();
$("#results").hide();
}
});


$(function() {
$("#date_from").datepicker({ dateFormat: "dd-mm-yy" }).val()


$("#date_from").click(function() {

date = new Date();
date.setDate(date.getDate()-1);
$( "#date_from" ).datepicker( "setDate" , date);

}); 

});

$(function() {
$("#date_to").datepicker({ dateFormat: "dd-mm-yy" }).val()


$("#date_to").click(function() {

date = new Date();
date.setDate(date.getDate()-1);
$( "#date_to" ).datepicker( "setDate" , date);

});
});
</script>

</html>