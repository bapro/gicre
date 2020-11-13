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


$centro=$this->db->select('name')->where('id_m_c',$id_c)->get('medical_centers')->row('name');



$if_empty=$this->db->select('centro_id')->where('centro_id',$id_c)->get('centros_tarifarios')->row('centro_id');
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

<form method="post" class="form-horizontal" id="import_form_centro" enctype="multipart/form-data">
<input class="form-control" type="hidden" value="<?=$created_by?>" name="creaded_by" />
<div class="form-group">
<label class="control-label col-sm-3" >Seleccione un archivo Excel</label>
<div class="col-sm-8">
<div class="alert alert-info">El archivo excel debe tener los siguientes columnas : <br/>codigo, simon,categoria, procedimiento,monto</div>

<input type="file" name="file" class="file "  id="file2"  accept=".xls, .xlsx" onchange="disableSend();"/>

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Codigo Prestador</label>
<div class="col-sm-2">
<input class="form-control  " name="codigo_centro" id="codigo_centro" />

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Centro Medico</label>
<div class="col-sm-4">
<input name="centro_id" value="<?=$id_c?>" type="hidden"> 
<?=$centro?>
</div>
</div>


<div class="form-group"  >
<div class="col-md-4 col-md-offset-3">
<input  type="submit" name="import2" id="import2" value="Import" class="btn btn-info"  />
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



//--------------------------------------------------------------------------------------------------


$('#import_form_centro').on('submit', function(event){
event.preventDefault();
	if($("#codigo_centro").val()==""  ||  $("#file2").val()==""){
alert("Todos son obligatorios!");
}
else{

$.ajax({
url:"<?php echo base_url(); ?>admin_medico/import_exel_centro",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
alert('Los tarifarios importados con éxito');
location.reload();
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
})
}
});




function goBack() {
    window.history.back();
}





</script>
