<?php $name=($this->session->userdata['admin_name']);

 ?>
<div class="col-md-12" >
<div id="results"></div>
<div id="hides1">
  <hr id="hr_ad"/>
<div class="col-md-7" style="border-right:1px solid #38a7bb">
<h4>Seguros Medicos</h4>
<table class="table table-striped  tab-seg-price">
<tr>
<th>#</th>
<th>Nombres</th>
<th>Codigo contratado</th>
<th class="inputh"> Precio</th>
<tr>
<td>1</td>
<td><label id="privado">PRIVADO</label></td>
<td></td>
<td>
<div class="input-group">
<?php foreach($mssm1 as $r) ?>

<span class="input-group-addon">RD$</span>
<input type="text" class="form-control float" value="<?=$r->precio_privado?>" id="precio_privado2" onkeypress='return onlyfloat(event);'>
</div>
</td>
</tr>
</tr>

<?php
 foreach($mssm2 as $d)
 ?>
  <input class="doc_id" value="<?=$d->doc_id?>">
  <?php
$i = 2;
 foreach($mssm2 as $row)

{

?>
<tr>
<td><?=$i;$i++;?></td>
<td><label class="seguro2"><?=$row->seguro?></label> 
</td>
<td>
<input type="text" class="codigo2 form-control clear-codigo" value="<?=$row->codigo?>" onkeypress='return validateQty(event);'>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="precio2 clear-price form-control" value="<?=$row->precio?>" onkeypress='return onlyfloat(event);'>
<span class="input-group-addon"><input title="Agregar igual mas abajo." class="priceigual2" type="checkbox">

</div>
</td>

</tr>
<?php
}

?>

</table>
<button type="button" id="cambiarMss2"  class="btn btn-primary btn-lg">Cambiar</button>
<span class="cambiod2"></span>
<br/><br/>
</div>
<div class="col-md-5" >
<div class="form-group">
<div class="col-sm-10">
<label>Cambiar el medico1</label>

<select class="form-control  select2 id_doc2"  id="id_doc2" >
<?php 
foreach($DOCTORS as $row)
{
echo '<option hidden></option>';	
echo '<option value="'.$row->id.'">'.$row->first_name.'</option>';
}
?>
</select>
<hr/>
<span class="load-doc"></span>
<table class="table hide-doc-info" style="font-size:14px"  >
<?php 
foreach($RESULT_DOCTOR as $rd)
$area=$this->db->select('title_area')->where('id_ar',$rd->area )
->get('areas')->row_array();
?>
<tr>
<th><label>Numero</label></th><td class="numdoc"> <?=$rd->id?></td>
</tr>
<tr>
<th><label>Medico</label></th><td><input class="form-control pter"  type="text"  value="<?=$rd->first_name?>  <?=$rd->last_name?>" class="pter"/></td>
</tr>
<tr>
<th><label>Exequatur</label></th><td><input class="form-control pter"  type="text" value="<?=$rd->exequatur?>" class="pter"/></td>
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

</div>

</div>

<div id="shows1"></div>
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


	$(".id_doc2").change(function(){

	var id_doc= $(this).val();
	 window.location.href="<?php echo base_url('admin/getMssmSearchResult1'); ?>?id_doc="+id_doc;
		
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
if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.float').val().indexOf('.') != -1)) {
return false;
}
return true;

};

//===============================================================

$(".priceigual2").on("click",function () {
	//var oneseguro= $(".master-price1").val();
	var precio = $($(this).parents()[1]).find(".precio2").val();
	if($(this).is(":checked")){
	$($(this).parents()[3]).nextAll().find(".precio2").each(function() {
	$(this).val(precio);
	});
       }
	else
	{
	$($(this).parents()[3]).nextAll().find(".precio2").each(function() {
	$(this).val("");
	});
	}
})



//=====================================================================

//=======================================================================
$(document).on('click','#cambiarMss2',function (e) {
//$('#cambiarMss2').on('click', function() {

var doctorid  = $(".doc_id").val();
alert(doctorid);

//alert(doctorid);
 /* var cat  = "<?=$first_categ?>";  
var insumm= "<?=$first_insum1?>";
var cod  = "<?=$first_codcup1?>";
var precio_privado  = $("#precio_privado2").val();
var inserted_by  = "<?=$name?>";
var seguro2 = [];
var codigo2 = [];
var precio2 = [];
$('.seguro2').each(function(){
seguro2.push($(this).text());
});
$('.codigo2').each(function(){
codigo2.push($(this).val());
});
$('.precio2').each(function(){
precio2.push($(this).val());
});

$.ajax({
type: "POST",
url: "<?=base_url('admin/saveUpdateMss')?>",
data: {seguro1:seguro2,codigo1:codigo2,precio1:precio2,inserted_by:inserted_by,insumservicio:insumm,
doctorid:doctorid,precio_privado:precio_privado,categoria:cat,codcup:cod},
cache: true,
 success:function(data){ 
//alert("Datos se guarden con exito.");
 $('.cambiod2').html('Cambio ha hecho con exito!.').fadeIn('slow').delay(4000).fadeOut('slow');
//$(".tab-seg-price :input").prop("disabled", true); 
//window.location.href="<?php echo base_url('admin/mssm'); ?>";
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

return false;*/

})
</script>