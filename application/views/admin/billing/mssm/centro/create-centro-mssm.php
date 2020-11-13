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
		$centro="centro";
 ?>
<body >
 <hr id="hr_ad"/>
  <div class="container">
  <div  class="loadf"></div>
 <div class="row">
<div class="col-md-12" >
<div  id="result"></div>
<a class="btn btn-primary btn-xs" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
 <h2 class="h2" align="center">Mantenimiento de Servicios por Seguros Medicos by service</h2>
  <hr id="hr_ad"/>
 </div>
  <h4>Busqueda: Insumo/Servicio </h4>
 <div class="col-lg-12 searchb">
 <br/>
<div class="col-lg-4">
<div class="input-group">
<span  class="input-group-btn">
<label class="control-label col-sm-2 remored">Categoria</label>

</span>
<select id="categoria" class="form-control select2" onChange="getCatName(this.value);">
<option value="" hidden></option>
<?php 

foreach($search as $row)
{ 
?>
<option title="Si no encuentra la categoria que quiere crear una nueva !"><?=$row->categoria?></option>
<?php
}
?>
</select>

</div>
</div>
<div class="col-lg-6" >
<div class="input-group stepback" >
<span  class="input-group-btn">
<label class="control-label col-sm-3"> Nombre</label>
</span>
<select  class="form-control select2"  id="id_service_mssn1" disabled >

</select>

</div>
</div>

<div class="col-lg-2" >
<div class="input-group stepback" >
<span  class="input-group-btn">
<button id="nuevob" onclick="window.location.href='<?php echo site_url("admin/mssm/".$centro);?>'"  class="btn btn-default" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Nuevo</button>
</span>
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
 <?php 

 foreach($mssm1 as $ro)
 
 ?>
 <div class="form-group">
<label class="control-label col-sm-3" ><h4>Resultado de la busqueda (# <?=$ro->id?>) </h4></label>
<div class="col-sm-7">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2 oblg" >Categoria</label>
<div class="col-sm-3">
<input id="categ" type="text" class="form-control" value="<?=$ro->categoria?>" >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2 oblg" >Insumo/Servicio</label>
<div class="col-sm-6">
<input type="text"  class="form-control"  id="insumservicio" value="<?=$ro->insumservicio?>" >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" >Cod. Simon / Cups</label>
<div class="col-sm-2">
<input type="text" class="form-control" id="codcup" value="<?=$ro->codcup?>" >
<br/>
<button type="button" id="cambiar_cat" class="btn btn-primary btn-sm">Cambiar</button>
<button  type="button" id="save_cat" style="display:none" class="btn btn-primary btn-sm">Guardar</button>
<span id="success_cat"></span>

</div>
</div>
</div>

<div class="col-md-12" id="sec_camb">
<div id="results"></div><div id="result"></div>
<div id="hides1">
  <hr id="hr_ad"/>
<div class="col-md-7" style="border-right:1px solid #38a7bb">

<h4>Seguros Medicos</h4>

<table class="table table-striped  tab-seg-price">
<tr>
<th>#</th>
<th>Logo</th>
<th>Nombres</th>
<th>Codigo contratado</th>
<th class="inputh"> Precio</th>

</tr>

  <?php
$i = 2;
 foreach($all_seguro_medico as $row)
{
?>
<tr id="find-privado4">
<td><?=$i;$i++;?></td>
<td><img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $row->logo; ?>"  /></td>
<td>
<label style="font-size:12px"><?=$row->title?></label> 
<input type="hidden" class="seguro" value="<?=$row->id_sm?>"/>
</td>
<td>
<input type="text" class="codigo form-control clear-codigo" onkeypress='return validateQty(event);'>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="precio clear-price form-control"  onkeypress='return onlyfloat(event);'>
<span class="input-group-addon"><input title="Agregar igual mas abajo." class="priceigual" type="checkbox">

</div>
</td>

</tr>
<?php
}

?>

</table>
 <?php foreach($mssm2 as $id_mssm1) ?>
<button type="button" id="saveMss"  class="btn btn-primary btn-lg">Guardar</button>
<span style="color:red;" id="requiredmedico"></span>
<br/><br/>
</div>
<div class="col-md-5" >
<div class="form-group">
<div class="col-sm-10">
<label class="oblg">Seleccionar El Centro Medico</label>

<select class="form-control  select2"  id="id_centro" >
<option hidden value=""></option>
<?php 
foreach($all_medical_centers as $row)
{
echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}
?>
</select>

<?php $this->load->view('admin/billing/mssm/centro/get_centro_on_select'); ?>
</div>
</div>
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

<div class="modal fade" id="myModal" role="dialog" >
<div class="modal-dialog modal-md">

<!-- Modal content-->
<div class="modal-content " style="text-align:center">
<h5 class="alert alert-info">No hay centro medico que tiene contratos con los seguros.</h5>

</div>
</div>
</div>
        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>

$('.select2').select2({ 
  placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});	

$("#id_centro").change(function(){
 var id_mssm1 ="<?=$ro->id?>";
var id_centro_on_change= $(this).val();
var insumservicio= $('#insumservicio').val();
var section= "#sec_camb";
//console.log(id_doc_on_change);
//window.location.href="<?php echo base_url('admin/page2'); ?>#section"+id_doc;
window.location.href="<?php echo base_url('admin/mssm_by_centro_medico'); ?>?id_centro_on_change="+id_centro_on_change+"&id_mssm1="+id_mssm1+"&insumservicio="+insumservicio+section;

 })
 
 //=======================================================================
$(document).on('click','#saveMss',function (e) {
var identificar ="centro";
var id_centro  = $("#centro_id").text();
var inserted_by  = "<?=$name?>";
var categoria  = $("#categ").val();
var insumservicio  = $("#insumservicio").val();
var codcup  = $("#codcup").val();
var seguro = [];
var codigo = [];
var precio = [];
$('.seguro').each(function(){
seguro.push($(this).val());
});
$('.codigo').each(function(){
codigo.push($(this).val());
});
$('.precio').each(function(){
precio.push($(this).val());
});

$.ajax({
type: "POST",
url: "<?=base_url('admin/save_mss2')?>",
data:{seguro:seguro,codigo:codigo,precio:precio,inserted_by:inserted_by,
codcup:codcup,categoria:categoria,id_centro:id_centro,insumservicio:insumservicio},
cache: true,
 success:function(data){ 
 alert("Datos se guarden con exito.");
//window.location.href="<?php echo base_url('admin/mssm'); ?>?identificar="+identificar;
window.location.reload(true);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#results').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
return false;

})



//==============================================
$(".priceigual").on("click",function () {
	//var oneseguro= $(".master-price1").val();
	var precio = $($(this).parents()[1]).find(".precio").val();
	if($(this).is(":checked")){
	$($(this).parents()[3]).nextAll().find(".precio").each(function() {
	$(this).val(precio);
	});
       }
	else
	{
	$($(this).parents()[3]).nextAll().find(".precio").each(function() {
	$(this).val("");
	});
	}
})



//====================================================================
function validateQty(event) {
    var key = window.event ? event.keyCode : event.which;

if (event.keyCode == 8 || event.keyCode == 46
 || event.keyCode == 37 || event.keyCode == 39) {
    return true;
}
else if ( key < 48 || key > 57 ) {
    return false;
}
else return true;
};

//========================================================		
function onlyfloat(event) {
event = (event) ? event : window.event;
var charCode = (event.which) ? event.which : event.keyCode;
if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.float').val().indexOf('.') != -1)) {
return false;
}
return true;

};

//===================================
$("#abled-after-search :input").not("#cambiar_cat").prop("disabled", true);

$("#cambiar_cat").on("click",function () {
$(this).hide();	
$('#save_cat').slideDown();	
$("#abled-after-search :input").not("#cambiar_cat").prop("disabled", false);
})

//==================================================================
$('#save_cat').click(function() {
var  categ = ("#categ").val();
var  insumservicio = ("#insumservicio").val();
var  codcup = ("#codcup").val();
var  update_by = "<?=$name?>";
var  idmssm1 = "<?=$ro->id?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/updateCat')?>",
data: {categ:categ,codcup:codcup,insumservicio:insumservicio,
idmssm1:idmssm1,update_by:update_by},
cache: true,
 success:function(data){ 
("#success_cat").html("Hecho ! ");
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
return false;
});

$('#categoria').on('click', function() {
$(".remored").css("color", "");
$("#abled-after-search :input").prop("disabled", false);
}
);
//==========================================================
$('#find-privado4 td:eq(3)').find("input").css("visibility", "hidden");
$('#find-privado4 td:eq(3)').find("input").val('0');


function getCatName(val) {
$.ajax({
type: "POST",
url: '<?php echo site_url('admin/get_category_name');?>',
data:'cat='+val,
success: function(data){
$("#id_service_mssn1").prop('disabled', false);
	$("#id_service_mssn1").html(data);
},
});
}


//==============================================
$('#id_service_mssn1').on('change', function() {
var section= "#sec_camb";
var id_service_mssn1= $(this).val();
window.location.href="<?php echo base_url('admin/mssm_data'); ?>?id_service_mssn1="+id_service_mssn1;
});



//=============================================
$(window).on('load',function(){

$('#myModal').modal('show');
});
setTimeout(function() {$('#myModal').modal('hide');}, 5000);

</script>

</html>