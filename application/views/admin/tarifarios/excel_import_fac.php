<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
	
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

$created_by=($this->session->userdata['admin_name']);

	
$area_id=$this->db->select('area')->where('first_name',$id_doc)->get('doctors')->row('area');
$area=$this->db->select('title_area')->where('id_ar',$area_id)->get('areas')->row('title_area');
$medico=$this->db->select('name')->where('id_user',$id_doc)->get('users')->row('name');



$seguro_title=$this->db->select('title')->where('id_sm',$id_seg)->get('seguro_medico')->row('title');

$if_empty=$this->db->select('codigo')->where('id_doctor',$id_doc)->where('id_seguro',$id_seg)->get('tarifarios')->row('codigo');
if($if_empty=="")
{
	$hide="";
	$show="style='display:none'";
}
else {
	$hide="style='display:none'";
    $show="";	
}
	
	
	?>


<br/>

<header>
<div <?=$hide?>>
<div class="col-md-8 col-md-offset-3">
<h2 class="h2">Importar Tarifario</h2>

</div>
<div id="background_">

<form method="post" class="form-horizontal" id="import_form" enctype="multipart/form-data">
<input class="form-control" type="hidden" value="<?=$created_by?>" name="creaded_by" />
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-8">
<div class="alert alert-info">El archivo excel debe tener los siguientes columnas : <br/>codigo, simon,procedimiento,monto</div>

<input type="file" name="file" class="file"  id="file"  accept=".xls, .xlsx" onchange="disableSend();"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Codigo Prestador</label>
<div class="col-sm-2">
<input class="form-control" name="codigo_medico" id="codigo" />

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
<hr/>
<div class="form-group"  >
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
alert("Todos son obligatorios!");
}
else{

$.ajax({
url:"<?php echo base_url(); ?>admin/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
alert("Los tarifarios importados con éxito.");
//alert("Los tarifarios importados con éxito." + '\n' + "Ve a la pestaña de ventanas anterior para continuar con la facturación.");
location.reload();
}
});
};
});





function goBack() {
    window.history.back();
}





</script>
