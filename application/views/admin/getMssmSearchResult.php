<?php $name=($this->session->userdata['admin_name']); ?>
<style>
#mssmingo{background:#F4FA58;color:#8A4B08;padding:5px;text-align:center}
.seguro{font-size:13px}
</style>
<div class="row" id="background_">
<div  id="result"></div>
<span   class="form-horizontal"  method="post"   > 
<div class="col-md-12" >
 
 <?php 

 foreach($mssm1 as $ro)
 
 ?>
 <div class="form-group">
<label class="control-label col-sm-3" ><h4>Resultado de la busqueda (# <?=$ro->id?>)</h4></label>
<div class="col-sm-7">
</div>
</div>
  <br/>
<div class="form-group">
<label class="control-label col-sm-2" >Categoria</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="categ1" value="<?=$ro->categoria?>"  >
</div>  
</div>
<div class="form-group">
<label class="control-label col-sm-2" >Insumo/Servicio</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="insumservicio1" value="<?=$ro->insumservicio?>" >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" >Cod. Simon / Cups</label>
<div class="col-sm-2">
<input type="text" class="form-control" id="codcup1" value="<?=$ro->codcup?>" >
</div>
</div>
</div>
<div id="hides">

<div class="col-md-12" >
  <hr id="hr_ad"/>
<div class="col-md-7" style="border-right:1px solid #38a7bb">

<table class="table table-striped  tabinp hideal">
<tr><th>#</th>
<th>SIN SEGURO getMssm</th>
<th>Codigo contratado</th>
<th class="inputh"> Precio</th>
</tr>
 
<?php
 foreach($mssm2 as $d)
 ?>
  <input type="hidden" id="doc_id" value="<?=$d->doc_id?>">
<?php
$i = 1;
foreach($mssm2 as $row)
{

?>
<tr class="find-privado2">
<td><?=$i;$i++;?></td>
<td><label class="seguro"><?=$row->seguro?></label> </td>
<td>
<input type="text" class="codigo form-control clear-codigo" value="<?=$row->codigo?>" onkeypress='return validateQty(event);'>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="precio clear-price form-control" value="<?=$row->precio?>" onkeypress='return onlyfloat(event);'>
<span class="input-group-addon"><input title="Agregar igual mas abajo." class="priceigual" type="checkbox">

</div>
</td>

</tr>
<?php
}
?>

</table>
<button type="button" id="cambiarMss"  class="btn btn-primary btn-lg">Cambiar</button>
<span id="cambiodone"></span>
<br/><br/>
</div>
<div class="col-md-5" >
<div class="form-group">
<div class="col-sm-10">
<label>Cambiar el medico</label>

<select class="form-control  select2 "  id="id_doc1" >
<?php 
foreach($DOCTORS as $row)
{
echo '<option hidden></option>';	
echo '<option value="'.$row->id.'">'.$row->first_name.'</option>';
}
?>
</select>
<hr/>
<table class="table" style="font-size:14px" id="hidedocinfo" >
<?php 
$i = 1;
foreach($RESULT_DOCTOR as $row)
$area=$this->db->select('title_area')->where('id_ar',$row->area )
->get('areas')->row_array();
?>
<tr>
<th><label>Medico</label></th><td><input class="form-control pter"  type="text"  value="<?=$row->first_name?>  <?=$row->last_name?>" class="pter"/></td>
</tr>
<tr>
<th><label>Exequatur</label></th><td><input class="form-control pter"  type="text" value="<?=$row->exequatur?>" class="pter"/></td>
</tr>
<tr>
<th><label>Area</label></th><td><input class="form-control pter"  type="text" class="pter" value="<?=$area['title_area']?>"/></td>
</tr>
<tr>
<th><label>Centro Medico</label> Total (<?=$count?>)</th>
<td>
<ol style="background:white;border:1px solid #38a7bb;font-size:13px">
<?php foreach($CENTRO_MEDICO_DOCTOR as $c_m_s)

{
	
?>
<li style="line-height:1em;font-size:12px"><?=$c_m_s->name;?></li>
<?php
}
?>
</ol>
</td>
</tr>
</table>
</div>
</div>
<div id="doc_info1"></div>
</div>

</div>

</div>
<div id="shows"></div>
</div>
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


$("td").keyup(function(){
$("#mssmingo").fadeOut();
}
);


$("#id_doc1").change(function(){
 var id_doc_always_data ="<?=$ro->id?>";

var section= "#sec_camb";
var id_doc_on_change= $(this).val();
window.location.href="<?php echo base_url('admin/mssm_result'); ?>?id_doc_on_change="+id_doc_on_change+"&id_doc_always_data="+id_doc_always_data+section;

/*
$("#hidedocinfo").hide();
$("#doc_info1").fadeIn().html('<span class="load"><img style="width:90px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "POST",
//url: "<?=base_url('admin/docInfo')?>",
url: "<?=base_url('admin/getMssmSearchResult1')?>",
//data: {id:str},
data: {id_dropdown:str,first_categ:first_categ,first_insum1:first_insum1,first_codcup1:first_codcup1},
cache: true,
 success:function(data){
	 $("#doc_info1").hide();
	 $("#hides").hide();
	 $("#shows").show();
	$("#shows").html(data); 
 },
 
});*/
});



$('#cambiarMss').on('click', function(event) {
var id_doc_always_data ="<?=$ro->id?>";
var categoria = $("#categ1").val();
var codcup  = $("#codcup1").val();
var insumservicio = $("#insumservicio1").val();
var doctorid  = "<?=$ro->doctorid?>";
var inserted_by  = "<?=$name?>";
var seguro = [];
var codigo = [];
var precio = [];

$('.seguro').each(function(){
seguro.push($(this).text());
});
$('.codigo').each(function(){
codigo.push($(this).val());
});
$('.precio').each(function(){
precio.push($(this).val());
});


$.ajax({
type: "POST",
url: "<?=base_url('admin/saveUpdateMss')?>",
data: {seguro:seguro,codigo:codigo,precio:precio,inserted_by:inserted_by,id_doc_always_data:id_doc_always_data,
categoria:categoria,codcup:codcup,insumservicio:insumservicio,doctorid:doctorid},
cache: true,
 success:function(data){ 
 $('#cambiodone').html('Cambio ha hecho con exito!.').fadeIn('slow').delay(4000).fadeOut('slow');
 //alert("Datos se guardan con exito.");
//window.location.href="<?php echo base_url('admin/mssm'); ?>?patient_nombres="+patient_nombres;
//window.location.href="<?php echo base_url('admin/mssm'); ?>";

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
if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.precio').val().indexOf('.') != -1)) {
return false;
}
return true;

};
//=====================================================================================


$('.find-privado1 td:eq(1)').find("input").css("visibility", "hidden");
$('.find-privado1 td:eq(1)').find("input").val('0');



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


//==============================================================
//$($( "#tbbbl find-privado tr :second" ).parents()[1]).find(".codigo").val();
$('.find-privado2 td:eq(2)').css("visibility", "hidden");
$('.find-privado2 td:eq(2)').find("input").val('0');
</script>