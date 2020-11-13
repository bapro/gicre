<?php $name=($this->session->userdata['admin_name']);

 ?>
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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
     <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
   <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<style>
.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}
.pter {pointer-events:none;}
td,th{text-align:left;border:1px solid #38a7bb}
td.input{border:1px solid #38a7bb;background:white}
table{
    border:1px solid blue;
   
  }

.seguro{font-size:13px}






</style>
</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
		$medico="medico";
 ?>
<body >
 <hr id="hr_ad"/>
  <div class="container">
  <div  class="loadf"></div>
 <div class="row">
<div class="col-md-12" >
<div  id="result"></div>
<a class="btn btn-primary btn-xs" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
 <h1 class="h1" align="center" style="color:#38a7bb">MANTENIMIENTO DE SERVICOS POR ARS</h1>
  <hr id="hr_ad"/>
 </div>
   <div class="col-md-12">
<div class="col-lg-6" style="font-size:17px"><strong>Busqueda: Insumo/Servicio </strong></div> 
<div class="col-lg-6"> <a href="<?php echo site_url('admin/import_view');?>" id="import" ><i class="fa fa-upload" style="font-size:24px"></i> Importar tarifarios </a></div>
<br/><br/>
 </div>
 <div class="col-lg-12 searchb">
 <br/>
  <?php 

 foreach($tarif_by_area as $ro)
 
 ?>
<div class="col-lg-5">
<div class="input-group">
<span  class="input-group-btn">
<label class="control-label col-sm-2 remored">Categoria</label>

</span>
<select id="categoria" class="form-control select2" onChange="getCatName(this.value);">
<?php
foreach($especialidades as $row){
	
	if($ro->id_categoria == $row->id_ar) {
		echo "<option value=".$row->id_ar." selected>".$row->title_area."</option>";
	} else {
		echo "<option value=".$row->id_ar.">".$row->title_area."</option>";
	}
}
?>

</select>

</div>
</div>
<div class="col-lg-7" >
<div class="input-group stepback" >
<span  class="input-group-btn">
<label class="control-label col-sm-3"> Service</label>
</span>
<select  class="form-control select2 id_tarif" >
<?php
foreach($servicio as $row){
	
	if($ro->id_tarif == $row->id_tarif) {
		echo "<option value=".$row->id_tarif." selected>".$row->procedimiento."</option>";
	} else {
		echo "<option value=".$row->id_tarif.">".$row->procedimiento."</option>";
	}
}
?>
</select>

</div>
</div>

<br/><br/>
</div>
</div>
 <hr id="hr_ad"/>
<div id="hidef">
<!----><div class="row" id="background_">
<form   class="form-horizontal"  > 
<div class="col-md-12" id="abled-after-search">

<h4>Resultado de la busqueda </h4>

</div>

<div class="col-md-12" id="sec_camb">
<div id="results"></div><div id="result"></div>
<div id="hides1">
  <hr id="hr_ad"/>
<div class="col-md-7 table-responsive" style="border-right:1px solid #38a7bb">

<h4>Seguros Medicos</h4>

<table class="table table-striped  tab-seg-price" id="0">
<tr>
<th>#</th>
<th>Logo</th>
<th>Nombres</th>
<th>Codigo contratado</th>
<th class="inputh"> Monto</th>

</tr>

  <?php
$i = 2;
 foreach($tarifarios_by_seguros as $row)
{
$seguro=$this->db->select('title,logo')->where('id_sm',$row->id_seguro)->get('seguro_medico')->row_array();
?>
<tr id="find-privado4">
<td><?=$i;$i++;?></td>
<td><img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $seguro['logo']; ?>"  /></td>
<td>
<label style="font-size:12px"><?=$seguro['title']?></label> 
<input type="hidden" class="seguro" value="<?=$row->id_seguro?>"/>
</td>
<td>
<input type="text" class="codigo form-control clear-codigo" value="<?=$row->codigo?>" onkeypress='return validateQty(event);'>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="precio clear-price form-control" value="<?=number_format($row->monto,2)?>" onkeypress='return onlyfloat(event);'>
<span class="input-group-addon"><input title="Agregar igual mas abajo." class="priceigual" type="checkbox">

</div>
</td>

</tr>
<?php
}

?>

</table>
<button type="button" id="update_tarif"  class="btn btn-info">Cambiar</button>
</div>
<div class="col-md-5" >
<div class="form-group">
<div class="col-sm-10">
<label class="oblg">Seleccionar el medico</label>
<select class="form-control  select2 " multiple id="id_doc" style="height:10px">
<!--<select class="form-control  select2 " id="id_doc" >-->
<option value=""></option>
<?php 

foreach($DOCTORS as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->first_name.'</option>';
}
?>
</select>
<br/><br/>
<button type="button" id="add_doc" style="display:none"  class="btn btn-info">Agregar en tarifarios</button>
</div>
</div>
<div id="result"></div>
<?php  if(!empty($RESULT_DOCTOR )) {?>
<table class="table hide-doc-info" style="font-size:14px"  >

<tr style="background:#86B8C1">
<th >
<label>#</label>
</th>
<th >
<label>Medico</label>
</th>
<th >
<label>Exeq</label>
</th>
<th >
<label>Area</label>
</th>
<th >
Quitar
</th>
</tr>
<?php
$i = 1; 
foreach($RESULT_DOCTOR as $rd){
$area=$this->db->select('title_area')->where('id_ar',$rd->area )
->get('areas')->row_array();
?>
<tr>
<td><?=$i;$i++?></td>
<td style="text-transform:uppercase"><?=$rd->first_name?></td>
<td><?=$rd->exequatur?></td>
<td><?=$area['title_area']?></td>
<td>

<button type="button" title="Quitar <?=$rd->first_name?> de los tarifarios" id="<?=$rd->id_doct?>" style="color:red" class="btn btn-xs deletedoctor">
<i class="fa fa-trash-o" aria-hidden="true"></i>
</button>
</td>
</tr>
<?php 
}
?>
</table>
<?php
}
else {
echo '<div class="alert alert-info">
<strong>Info !</strong> No hay doctor por estos tarifarios.
</div>'; 
	
}
?>
</div>

</div>

</div>
</div>
</div>

</div>
<br/><br/>

 <?php
        $this->load->view('footer');
 
 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
$('#add_doc').on('click', function(event) {
var id_doc  = $("#id_doc").val();
var id_categoria = "<?=$ro->id_categoria?>";
var id_tarif = "<?=$ro->id_tarif?>";
var sect="#0";
$.ajax({
type: "POST",
url: "<?=base_url('admin/addDoctTarif')?>",
data: {id_categoria:id_categoria,id_doc:id_doc},
cache: true,
 success:function(data){ 
 alert("Datos se guarden con exito.");
 window.location.href="<?php echo base_url('admin/mssm_data'); ?>?id_tarif="+id_tarif;
//window.location.reload(true);
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

return false;
});

//=====================================================================
$('.select2').select2({ 
  placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});	

//=============================================================
function getCatName(val) {
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/get_category_name');?>',
	data:'cat='+val,
	success: function(data){
	$(".id_tarif").prop('disabled', false);
		$(".id_tarif").html(data);
		
		
	},
	});
}

//=============================================================
function get_tarifario(val) {
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/get_tarifario');?>',
	data:'id='+val,
	success: function(data){
	$("#tarifario").html(data);
	},
	});
}

//=============================================================

$('.id_tarif').on('change', function() {
var id_tarif= $(this).val();
//window.location.href="<?php echo base_url('admin/mssm_data'); ?>?area="+area;
window.location.href="<?php echo base_url('admin/mssm_data'); ?>?id_tarif="+id_tarif;

})



$("#id_doc").change(function(){
$("#add_doc").slideDown("fast");
});


//=================================================
$(".deletedoctor").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{
var count_doc = "<?=$count_doc?>";
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteDoctorTarif')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
if(count_doc==1){
$(this).prop('disabled', true);
}
}
});
}
})
</script>

</html>