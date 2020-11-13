<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
	<style>td{text-align:left}</style>
    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <!-- owl carousel css -->

</head>
<!-- *** welcome message modal box *** -->
 
<?php


$area_id=$this->db->select('area')->where('id_user',$id_doc)->get('users')->row('area');
$area=$this->db->select('title_area')->where('id_ar',$area_id)->get('areas')->row('title_area');
$medico=$this->db->select('name')->where('id_user',$id_doc)->get('users')->row('name');



$seguro_title=$this->db->select('title')->where('id_sm',$id_seg)->get('seguro_medico')->row('title');

$if_empty=$this->db->select('codigo')->where('id_doctor',$id_doc)->where('id_seguro',$id_seg)->where('plan',$id_plan)->get('tarifarios')->row('codigo');
if($if_empty=="")
{
	$hide="";
	$show="style='display:none'";
}
else {
	$hide="style='display:none'";
    $show="";	
}
	if($id_doc==''){
		$display_btn='none';
	}else{
	$display_btn='';	
	}
	
	?>


<br/>

<header>
<div <?=$hide?>>
<div class="col-md-8 col-md-offset-3">
<h2 class="h2">Importar Tarifario</h2>
<div id="result"></div>
</div>
<div id="background_">

<form method="post" class="form-horizontal" id="import_form" enctype="multipart/form-data">
<input class="form-control" type="hidden" value="<?=$created_by?>" name="creaded_by" />
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-8">
<div class="alert alert-info">EL ARCHIVO EXCEL DEBE TENER LOS SIGUIENTES COLUMNAS :<br/> (Ejemplo)</div> 
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered"  >
<tr>
<th>codigo</th><th>simon</th><th>procedimiento</th><th>monto</th>
</tr>
<tr>
<td>334</td><td>3455</td><td>EXTRACION</td><td>234.566.00</td>
</tr>
</table>
</div>

<input type="file" name="file" class="file required" required id="file"  accept=".xls, .xlsx" onchange="disableSend();"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Codigo Prestador</label>
<div class="col-sm-2">
<input class="form-control  required" name="codigo_medico" id="codigo" />

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Especialidad</label>
<div class="col-sm-4">
<input name="categoria" value="<?=$area_id?>" type="hidden"> 
<?=$area?>
</div>
</div>

 <div class="form-group">
<label class="control-label col-sm-3">Medico</label>
<div class="col-sm-4">
<input name="doctor_dropdown" value="<?=$id_doc?>" type="hidden">
<?=$medico?>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >ARS</label>
<div class="col-sm-4">
<input name="seguro" value="<?=$id_seg?>" type="hidden">
<?=$seguro_title?>

</div>
</div>
<?php if($id_seg !=11) {?>
<div class="form-group">
<label class="control-label col-sm-3" >Plan</label>
<div class="col-sm-4">
<input name="plan" value="<?=$id_plan?>" type="hidden">
<?php 

$plan=$this->db->select('name')->where('id',$id_plan)->get('seguro_plan')->row('name');

echo $plan;
?>

</div>
</div>
<?php } else{
?>
<div class="form-group">
<label class="control-label col-sm-3" >Centro</label>
<div class="col-sm-4">
<input name="plan" value="<?=$id_plan?>" type="hidden">
<?php 

$plan=$this->db->select('name')->where('id_m_c',$id_plan)->get('medical_centers')->row('name');

echo $plan;
?>

</div>
</div>	
<?php
} ?>
<hr/>
<div class="form-group" style="display:<?=$display_btn?>" >
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import" id="import" value="Import" class="btn btn-info"  />
<br/><br/>
</div>
</div>
</form>

</div>
</div>
<div class="form-group"  >
<div class="col-md-4 col-md-offset-3">
 <button type="button"  onclick="goBack()" <?=$show?> class="btn btn-primary btn-sm back" ><i class="fa fa-arrow-left" aria-hidden="true" ></i> volver a la facturación </button>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>

$('#import_form').on('submit', function(event){
event.preventDefault();

	if($("#codigo").val()=="" ||  $("#file").val()==""){
alert("El codigo es obligatorio");
}
else{
$('#import').prop("disabled",true);
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
alert("Los tarifarios importados con éxito.");
//alert("Los tarifarios importados con éxito." + '\n' + "Ve a la pestaña de ventanas anterior para continuar con la facturación.");
//location.reload(true);
window.history.back();
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
};
});



//--------------------------------------------------------------------------------------------------





function goBack() {
    window.history.back();
}





</script>
