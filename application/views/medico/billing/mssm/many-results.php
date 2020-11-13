<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	 <title>ADMEDICALL</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
  <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet" id="theme-stylesheet">
 <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <style></style>
 </head>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-md">

<!-- Modal content-->
<div class="modal-content" >
<div class="modal-header">
<?php
foreach ($mssm_many as $dinf) 
$doctor=$this->db->select('id,first_name')->where('id',$dinf->doctorid)
->get('doctors')->row_array();
$doc_id=$doctor['id'];
?>
<h3 style="text-aling:center" >Resultado de la busqueda</h3>
</div>
<div class="modal-body">
<p style="text-aling:center" >Doctor (#<?=$doc_id?>) <span style="text-transform:uppercase"><strong><?=$doctor['first_name']?></strong></span> tiene datos en los servicios siguientes :</p>

<table class="table" style="width:70%;margin: 0px auto;">
<tr>
<th>Categoria</th>
<th>Servicio</th>
</tr>
<?php
foreach ($mssm_many as $ma) {
?>
<tr>
<td ><span style="float:left"><?=$ma->categoria?></span></td>
<td > 
<a style="float:left" href="<?= base_url("/admin/mssm_by_doctor_/$ma->id/$doc_id") ?>"><?=$ma->insumservicio?></a>
</td>
</tr>
<?php
}
?>
</table>

</div>
</div>
</div>
</div>
  <div class="container">
  <div  class="loadf"></div>
 <div class="row">
<div class="col-md-12" >
<div  id="result"></div>
<a class="btn btn-primary btn-xs" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
 <h2 class="h2" align="center">Mantenimiento de Servicios por Seguros Medicos</h2>
  <hr id="hr_ad"/>
 </div>
  <h4>Busqueda: Insumo/Servicio </h4>
 <div class="col-lg-12 searchb">
 <br/>
<div class="col-lg-4">
<div class="input-group">
<span  class="input-group-btn">
<label class="control-label col-sm-2 remored" style="color:red">Categoria</label>

</span>
<select id="categoria" class="form-control" onChange="getCatName(this.value);">
<option value="" hidden></option>

</select>

</div>
</div>
<div class="col-lg-6" >
<div class="input-group stepback" >
<span  class="input-group-btn">
<label class="control-label col-sm-3"> Nombre</label>
</span>
<select  class="form-control select2"  id="id_dropdown" disabled >

</select>

</div>
</div>

<div class="col-lg-2" >
<div class="input-group stepback" >
<span  class="input-group-btn">
<button id="nuevob" onClick="history.go(0)" style="display:none" class="btn btn-default" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Nuevo</button>
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

<div class="form-group">
<label class="control-label col-sm-3" ><h4>Crear nueva categoria</h4></label>
<div class="col-sm-7 alert alert-info">
  <strong>Info !</strong> Antes de crear una nueva categoria debe buscarlo en la parte indicada.
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2 oblg" >Categoria</label>
<div class="col-sm-3">
<input id="categ" type="text" class="form-control ">

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2 oblg" >Insumo/Servicio</label>
<div class="col-sm-6">
<input type="text"  class="form-control"  id="insumservicio"  >
<div id="insumInfo"></div>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" >Cod. Simon / Cups</label>
<div class="col-sm-2">
<input type="text" class="form-control" id="codcup"  >
</div>
</div>
</div>

<div class="col-md-12" >
 <hr id="hr_ad"/>
 <div class="col-md-7" style="border-right:1px solid #38a7bb">
 <h4>Seguros Medicos</h4>
<table class="table table-striped  tabinp hideal" id="tbbbl">
<tr>
<th>#</th>
<th>Nombres</th>
<th>Codigo contratado</th>
<th> Precio</th>
</tr>

<tr class="find-privado">
<td></td>
<td><label class="seguro"></label></td>
<td><input type="text" class="codigo form-control" onkeypress='return validateQty(event);'></td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="precio  form-control float master-price1" onkeypress='return onlyfloat(event);'>
<span class="input-group-addon"><input title="Agregar igual mas abajo." class="priceigual1" type="checkbox">
</div>
</td>

</tr>

</table>
<div id="showa"></div>
<button type="button" id="saveMss"  class="btn btn-primary btn-lg">Enviar</button>
<span style="color:red;" id="requiredmedico"></span>
<br/><br/>
</div>
<div class="col-md-5" >
<div class="form-group">
<div class="col-sm-10">
<label class="oblg">Seleccionar el medico</label>
<select class="form-control  select2 " id="id_doc" >

</select>
</div>
</div>
<div id="doc_info"></div>
</div>
</div>
</div>
</div>
<div id="showf"></div>
</div>
<script type="text/javascript">
$(window).on('load',function(){
$('#myModal').modal('show');
});
//prevent modal from closing on click
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})

</script>

