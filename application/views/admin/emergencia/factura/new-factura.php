<style>
td,th{text-align:left}
.selected {
    color: red;
    background-color: yellow;
}
</style>
<div id='show-error'></div>

<div class="col-sm-12 showdown3 searchb" >
 <?php 
 if($id_seguro ==11){
	$display='none'	;
	}else{
	$display=''	;
	}
   ?>
<h2 class="h2" align="center">FACTURA DE EMERGENCIA</h2>
<h4 >MEDICAMENTOS</h4>
<table class="table table-striped table-bordered table-condensed" id="fact-med">
<thead>
<tr class="trback">


<th class="heading">
Medicamentos
</th>


<th class="heading">Cantidad</th>
<th class="heading">precio Unitario</th>
<th class="heading">sub-total</th>
<th class="heading">descuento</th>
<th class="heading">Total Pagar Paciente</th>

<td></td>
</tr>
</thead>
<tfoot >
<tr class="grand-total persist" style="background:#d5d370;font-size:18px">
<th  colspan="6">TOTALES</th>
<th style="background:white">

<button type="button" title="Agregar" id="agregar-nuevo-fac-med"  style="cursor:pointer;font-size:13px;color:blue;background:white;"><span  class="glyphicon glyphicon-plus-sign"></span></button>
</th>
</tr>
</tfoot>
<tbody>
<tr  class="change-red">

<td style="width:180px;display:block">
<select id='servicio-med' class="form-control change-red select2 select-option-tarif-med" onChange="getTarifMed(this);">
<option value="" ></option>
<?php
$sql_t_m ="SELECT id, name FROM  emergency_medicaments WHERE centro=$id_cm AND selected=0

AND id NOT IN (SELECT id_i_m from orden_medica_recetas)

";
$tarif_med = $this->db->query($sql_t_m);

 foreach($tarif_med->result() as $stm){
?>
<option  value="<?=$stm->id?>"><?=$stm->name?></option>
<?php
}
?>
</select>

</td>
<td>
<input type="text" id='cantidad-med' class="cantidad form-control clrs" value="1" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='precio-med' class="precio form-control float clrs" type="text"  tabindex="2"  readonly />
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='sub-total-med' type="text" class="row-total form-control clrs" value="0.00" readonly />
</div>
</td>

<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='descuento-med' style='color:red' type="text" class="descuento form-control float clrs"  tabindex="4" onkeypress='return onlyfloat(event);'/>
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" id='total-pag-pa-med' class="total-pag-pa form-control clrs" value="0.00" tabindex="5" readonly />
</div>
</td>
<td></td>
</tr>
</tbody>
</table>


<div id='factura-body-med'></div>

<!---------------------------ESTUDIO-------------------------------------->
<h4>ESTUDIOS</h4>
<table class="table table-striped table-bordered table-condensed" id="fact-est">
<thead>
<tr class="trback">


<th class="heading">
Estudios
</th>


<th class="heading">Cantidad</th>
<th class="heading">precio Unitario</th>
<th class="heading">sub-total</th>
<th class="heading" style='display:<?=$display?>'>Total Pagar Seguro</th>
<th class="heading">descuento</th>
<th class="heading">Total Pagar Paciente</th>

<td></td>
</tr>
</thead>
<tfoot >
<tr class="grand-total persist" style="background:#d5d370;font-size:18px">
<th  colspan="7">TOTALES</th>
<th style="background:white">

<button type="button" title="Agregar" id="agregar-nuevo-fac-est"  style="cursor:pointer;font-size:13px;color:blue;background:white;"><span  class="glyphicon glyphicon-plus-sign"></span></button>
</th>
</tr>
</tfoot>
<tbody>
<tr  class="change-red">

<td style="width:180px;display:block">
<select id='servicio-est' class="form-control change-red select2 select-option-tarif-est" onChange="getTarifEst(this);">
<option value="" ></option>
<?php
$sql_t_m ="SELECT id_c_taf, sub_groupo FROM centros_tarifarios WHERE groupo LIKE 'Estudios radiológicos' AND centro_id = $id_cm AND seguro_id=$id_seguro 

AND sub_groupo NOT IN (SELECT estudio from orden_medica_estudios WHERE idemes=$id_em)

";
$tarif_med = $this->db->query($sql_t_m);

 foreach($tarif_med->result() as $stm){
?>
<option  value="<?=$stm->id_c_taf?>"><?=$stm->sub_groupo?></option>
<?php
}
?>
</select>

</td>
<td>
<input type="text" id='cantidad-est' class="cantidad form-control clrs" value="1" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='precio-est' class="precio form-control float clrs" type="text"  tabindex="2"   />
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='sub-total-est' type="text" class="row-total form-control clrs" value="0.00" readonly />
</div>
</td>
<td class="total-pag-seg" style='display:<?=$display?>'>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" id='total-pag-seg-est' class="total-pag-seg-est form-control"  onkeypress='return onlyfloat(event);' readonly />
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='descuento-est' style='color:red' type="text" class="descuento form-control float clrs"  tabindex="4" onkeypress='return onlyfloat(event);'/>
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" id='total-pag-pa-est' class="total-pag-pa form-control clrs" value="0.00" tabindex="5" readonly />
</div>
</td>
<td></td>
</tr>
</tbody>
</table>

<div id='factura-body-est'>

</div>




<h4>LABORATORIOS</h4>
<table class="table table-striped table-bordered table-condensed" id="fact-lab">
<thead>
<tr class="trback">


<th class="heading">
Laboatorios
</th>


<th class="heading">Cantidad</th>
<th class="heading">precio Unitario</th>
<th class="heading">sub-total</th>
<th class="heading" style='display:<?=$display?>'>Total Pagar Seguro</th>
<th class="heading">descuento</th>
<th class="heading">Total Pagar Paciente</th>

<td></td>
</tr>
</thead>
<tfoot >
<tr class="grand-total persist" style="background:#d5d370;font-size:18px">
<th  colspan="7">TOTALES</th>
<th style="background:white">

<button type="button" title="Agregar" id="agregar-nuevo-fac-lab"  style="cursor:pointer;font-size:13px;color:blue;background:white;"><span  class="glyphicon glyphicon-plus-sign"></span></button>
</th>
</tr>
</tfoot>
<tbody>
<tr  class="change-red">

<td style="width:180px;display:block">
<select id='servicio-lab' class="form-control change-red select2 select-option-tarif-lab" onChange="getTarifLab(this);">
<option value="" ></option>
<?php
$sql_t_m ="SELECT id_c_taf, sub_groupo FROM centros_tarifarios WHERE groupo LIKE 'Laboratorio' AND centro_id = $id_cm AND seguro_id=$id_seguro 

AND sub_groupo NOT IN (SELECT laboratory from orden_medcia_lab WHERE idemlab=$id_em)

";
$tarif_med = $this->db->query($sql_t_m);

 foreach($tarif_med->result() as $stm){
?>
<option  value="<?=$stm->id_c_taf?>"><?=$stm->sub_groupo?></option>
<?php
}
?>
</select>

</td>
<td>
<input type="text" id='cantidad-lab' class="cantidad form-control clrs" value="1" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='precio-lab' class="precio form-control float clrs" type="text"  tabindex="2"   />
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='sub-total-lab' type="text" class="row-total form-control clrs" value="0.00" readonly />
</div>
</td>
<td class="total-pag-seg" style='display:<?=$display?>'>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" id='total-pag-seg-lab' class="total-pag-seg-lab form-control"  onkeypress='return onlyfloat(event);' readonly />
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='descuento-lab' style='color:red' type="text" class="descuento form-control float clrs"  tabindex="4" onkeypress='return onlyfloat(event);'/>
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" id='total-pag-pa-lab' class="total-pag-pa form-control clrs" value="0.00" tabindex="5" readonly />
</div>
</td>
<td></td>
</tr>
</tbody>
</table>

<div id='factura-body-lab'>

</div>

<!--MATERIAL GASTABLE---->
<h4>MATERIAL GASTABLE</h4>
<table class="table table-striped table-bordered table-condensed" id="fact-mat">
<thead>
<tr class="trback">


<th class="heading">
Material Gastable
</th>


<th class="heading">Cantidad</th>
<th class="heading">precio Unitario</th>
<th class="heading">sub-total</th>
<!--<th class="heading">Total Pagar Seguro</th>-->
<th class="heading">descuento</th>
<th class="heading">Total Pagar Paciente</th>

<td></td>
</tr>
</thead>
<tfoot >
<tr class="grand-total persist" style="background:#d5d370;font-size:18px">
<th  colspan="6">TOTALES</th>
<th style="background:white">

<button type="button" title="Agregar" id="agregar-nuevo-fac-mat"  style="cursor:pointer;font-size:13px;color:blue;background:white;"><span  class="glyphicon glyphicon-plus-sign"></span></button>
</th>
</tr>
</tfoot>
<tbody>
<tr  class="change-red">

<td style="width:180px;display:block">
<select id='servicio-mat' class="form-control change-red select2 select-option-tarif-mat" onChange="getTarifMat(this);">
<option value="" ></option>
<?php
$sql_t_m ="SELECT id, name FROM  emergency_medicaments WHERE centro=$id_cm  && sustenacia=''

AND name NOT IN (SELECT insumo from emergency_peticion WHERE idemp=$id_em  )

";
$tarif_med = $this->db->query($sql_t_m);

 foreach($tarif_med->result() as $stm){
?>
<option  value="<?=$stm->id?>"><?=$stm->name?></option>
<?php
}
?>
</select>

</td>
<td>
<input type="text" id='cantidad-mat' class="cantidad form-control clrs" value="1" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='precio-mat' class="precio-mat form-control float clrs" type="text"  tabindex="2"  readonly />
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='sub-total-mat' type="text" class="row-total form-control clrs" value="0.00" readonly />
</div>
</td>

<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='descuento-mat' style='color:red' type="text" class="descuento form-control float clrs"  tabindex="4" onkeypress='return onlyfloat(event);'/>
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" id='total-pag-pa-mat' class="total-pag-pa form-control clrs" value="0.00" tabindex="5" readonly />
</div>
</td>
<td></td>
</tr>
</tbody>
</table>

<div id='factura-body-mat'>

</div>
<h4>PROCEDIMIENTO</h4>
<table class="table table-striped table-bordered table-condensed" id="fact-proced">
<thead>
<tr class="trback">


<th class="heading">
Procedimiento
</th>


<th class="heading">Cantidad</th>
<th class="heading">precio Unitario</th>
<th class="heading">sub-total</th>
<th class="heading" style='display:<?=$display?>'>Total Pagar Seguro</th>
<th class="heading">descuento</th>
<th class="heading">Total Pagar Paciente</th>

<td></td>
</tr>
</thead>
<tfoot >
<tr class="grand-total persist" style="background:#d5d370;font-size:18px">
<th  colspan="7">TOTALES</th>
<th style="background:white">

<button type="button" title="Agregar" id="agregar-nuevo-fac-proced"  style="cursor:pointer;font-size:13px;color:blue;background:white;"><span  class="glyphicon glyphicon-plus-sign"></span></button>
</th>
</tr>
</tfoot>
<tbody>
<tr  class="change-red">

<td style="width:180px;display:block">
<select id='servicio-proced' class="form-control change-red select2 select-option-tarif-proced" onChange="getTarifProced(this);">
<option value="" ></option>
<?php
$sql_t_m ="SELECT id_c_taf, sub_groupo FROM centros_tarifarios WHERE groupo ='procedimiento' AND centro_id = $id_cm AND seguro_id=$id_seguro 

AND sub_groupo NOT IN (SELECT name from emergency_procedimiento WHERE idempro=$id_em)

";
$tarif_med = $this->db->query($sql_t_m);

 foreach($tarif_med->result() as $stm){
?>
<option  value="<?=$stm->id_c_taf?>"><?=$stm->sub_groupo?></option>
<?php
}
?>
</select>

</td>
<td>
<input type="text" id='cantidad-proced' class="cantidad form-control clrs" value="1" tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='precio-proced' class="precio form-control float clrs" type="text"  tabindex="2"   />
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='sub-total-proced' type="text" class="row-total form-control clrs" value="0.00" readonly />
</div>
</td>
<td class="total-pag-seg" style='display:<?=$display?>'>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" id='total-pag-seg-proced' class="total-pag-seg-proced form-control"  onkeypress='return onlyfloat(event);' readonly />
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input id='descuento-proced' style='color:red' type="text" class="descuento form-control float clrs"  tabindex="4" onkeypress='return onlyfloat(event);'/>
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" id='total-pag-pa-proced' class="total-pag-pa form-control clrs" value="0.00" tabindex="5" readonly />
</div>
</td>
<td></td>
</tr>
</tbody>
</table>

<div id='factura-body-proced'>

</div>
<div class="col-md-6" >
</div>
<div class="col-md-6" >

<table class='table'>
<thead>
<tr style='background:red;color:white'>
<td colspan='6'></td>
<td style='display:<?=$display?>' >Total Pagar Seguro</td>
<td style='display:<?=$display?>'>Total Pagar Diff</td>
<td>Total Pagar Desc</td>
<td>Total Pagar Paciente</td>
<td></td>
</tr>
</thead>
<tfoot>
<tr style='color:red'>
<th colspan='6'></th>
<th style='display:<?=$display?>' id='sum_cob'></th> 
<th  style='display:<?=$display?>' id='sum_dif'></th>
<th  id='sum_desc'></th>
<th id='grand-patient-tot'></th>
<th></th>
</tfoot>
</tr>
</table>

</div>
<input id='grand-patient-tot-proced' type='hidden'/>
<input id='grand-patient-tot-mat' type='hidden'/>
<input id='grand-patient-tot-med' type='hidden'/>
<input id='grand-patient-tot-lab' type='hidden'/>
<input id='grand-patient-tot-est' type='hidden'/>

<input id='tot_diff0' type='hidden'/>
<input id='total_cob0' type='hidden'/>
<input id='tot_discount0' type='hidden'/>



<input id='tot_diff2' type='hidden'/>
<input id='total_cob2' type='hidden'/>
<input id='tot_discount2' type='hidden'/>


<input id='tot_diff4' type='hidden'/>
<input id='total_cob4' type='hidden'/>
<input id='tot_discount4' type='hidden'/>

<input id='tot_diff3' type='hidden'/>
<input id='total_cob3' type='hidden'/>
<input id='tot_discount3' type='hidden'/>
  
  
  
  <input id='tot_diff5' type='hidden'/>
<input id='total_cob5' type='hidden'/>
<input id='tot_discount5' type='hidden'/>
</div>
<div class="col-sm-12 searchb" >

<br/>
 <div class="form-inline">
<?php
 $found=$this->db->select('fecha,num_auto,autor_por,id_mergencia,ncf')->where('id_mergencia',$id_em)->get('emergency_factura')->row_array(); 
 if($found){
	$ncf=$found['ncf'];
	$fecha=$found['fecha'];
	$num_auto=$found['num_auto'];
	$autor_por=$found['autor_por'];
	
 }else{
	$fecha=date("d-m-Y");
	$num_auto=0;
	$autor_por=0;
	$ncf='';
	
 }
 

?>

   <div class="form-group">
      <label>Fecha:</label>
      <input  class="form-control" id='fecha-fac' value="<?=$fecha?>" >
	 </div>
	 <span style='display:<?=$display?>'>
    <div class="form-group">
      <label>No Autorizacion:</label>
     <input  type="text" id="numauto" class="form-control change-red" value="<?=$num_auto?>"/>
    </div>
    <div class="form-group">
      <label>Autorizado por:</label>
     <input  type="text" id="autopor"  class="form-control change-red" value="<?=$autor_por?>"/>
    </div>
	
	    <div class="form-group">
      <label>NCF</label>
     <input  type="text" id="ncf"  class="form-control" value="<?=$ncf?>"/>
    </div>
	
	 <div class="form-group">
     <div  id="required_fac" style='color:red'></div>
    </div>
	</span>
	
  </div><br/>
 </div>
<div class="col-sm-12 showdown3 searchb" >
<div class="col-sm-9" >

</div>
<div class="col-sm-3">
<br/><br/>
<input id="grand-patient-tot-save" type='hidden'/>
<button id="save_factura_med" style="margin-left:14px" type="button" class="btn btn-success" ><i class="fa fa-save"></i> Guardar / <i class="fa fa-eye"></i> Ver</button>
<br/><br/>
</div>
<div class="loadf"></div> 

</div>
 
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
 <script>

$("#save_factura_med").on("click",function() {
if($('#autopor').val() == "" || $('#numauto').val() == "" )
{
 $('html, body').animate({
      scrollTop: $("#required_fac").offset().top
    });
	$(".change-red").css("border-color", "red");
$('#required_fac').html('Los campos con bordillos rojos son obligatorios !').fadeIn('slow').delay(4000).fadeOut('slow');	
}else{	
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/saveBill');?>',
data:{id_mergencia:<?=$id_em?>,id_user:<?=$id_user?>,centro:<?=$id_cm?>,seguro:<?=$id_seguro?>,patient:<?=$id_p_a?>,fecha:$('#fecha-fac').val(),
num_auto:$('#numauto').val(),autor_por:$('#autopor').val(),ncf:$('#ncf').val()
},
success: function(data){
window.location.href="<?php echo base_url(); ?>emergency/print_preview_fac";
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.loadf').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}	
});

//------------------------------------------------------------------------------------------------------------------------

function loadPatTotal(){
var sum =parseFloat($("#grand-patient-tot-proced").val()) + parseFloat($("#grand-patient-tot-mat").val()) + parseFloat($("#grand-patient-tot-med").val()) + parseFloat($("#grand-patient-tot-lab").val()) + parseFloat($("#grand-patient-tot-est").val()) ;
$("#grand-patient-tot").html('RD$' + parseFloat(sum, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());	
 
var sum_cob =parseFloat($("#total_cob0").val()) + parseFloat($("#total_cob2").val()) + parseFloat($("#total_cob4").val())  + parseFloat($("#total_cob5").val())  + parseFloat($("#total_cob3").val());
$("#sum_cob").html('RD$' + parseFloat(sum_cob, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());	
 

  var sum_dif =parseFloat($("#tot_diff0").val()) + parseFloat($("#tot_diff2").val()) + parseFloat($("#tot_diff4").val())  + parseFloat($("#tot_diff5").val())   + parseFloat($("#tot_diff3").val());
$("#sum_dif").html('RD$' + parseFloat(sum_dif, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());

  var sum_desc =parseFloat($("#tot_discount0").val()) + parseFloat($("#tot_discount2").val()) + parseFloat($("#tot_discount4").val())  + parseFloat($("#tot_discount5").val()) + parseFloat($("#tot_discount3").val());
$("#sum_desc").html('RD$' + parseFloat(sum_desc, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());

if($("#sum_cob").html()=='RD$0.00' && $("#sum_dif").html()=='RD$0.00' && $("#sum_desc").html()=='RD$0.00'  && $("#grand-patient-tot").html()=='RD$0.00'){
$("#save_factura_med").prop('disabled',true);	
}else{
$("#save_factura_med").prop('disabled',false);		
}
}


setInterval(function(){
loadPatTotal();
}, 2000);

//------------------------------------------------------------------------------------------------------------------------

$("#agregar-nuevo-fac-med").on("click",function() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/saveOrdenMedicaRecetas');?>',
data:{idem:<?=$id_em?>,operator:<?=$id_user?>,medicamento:$('#servicio-med').val(),
cantidad:$('#cantidad-med').val(),descuento:$('#descuento-med').val(),precio:$('#precio-med').val()
},
success: function(data){
facturaBodyMed();
$('#servicio-med').val('').trigger('change');
$('.clrs').val("");
},

});
	
});

facturaBodyMed();

function facturaBodyMed() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/facturaBodyMed');?>',
data:{id_em:<?=$id_em?>,id_seguro:<?=$id_seguro?>},
success: function(data){
$("#factura-body-med").html(data);
},


});

};

facturaBodyEst();

function facturaBodyEst() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/facturaBodyEst');?>',
data:{id_em:<?=$id_em?>,id_seguro:<?=$id_seguro?>,id_cm:<?=$id_cm?>},
success: function(data){
$("#factura-body-est").html(data);
},

});

};


facturaBodyLab();

function facturaBodyLab() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/facturaBodyLab');?>',
data:{id_em:<?=$id_em?>,id_seguro:<?=$id_seguro?>,id_cm:<?=$id_cm?>},
success: function(data){
$("#factura-body-lab").html(data);
},

});

};


facturaBodyMat();

function facturaBodyMat() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/facturaBodyMat');?>',
data:{id_em:<?=$id_em?>,id_seguro:<?=$id_seguro?>,id_cm:<?=$id_cm?>},
success: function(data){
$("#factura-body-mat").html(data);
},

});

};

facturaBodyProced();

function facturaBodyProced() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/facturaBodyProced');?>',
data:{id_em:<?=$id_em?>,id_seguro:<?=$id_seguro?>,id_cm:<?=$id_cm?>},
success: function(data){
$("#factura-body-proced").html(data);
},

});

};





 $("#fecha-fac").datepicker({
    dateFormat: 'dd-mm-yy',
	maxDate: "-1d"

  });
  
  



$('.select2').select2({ 
//tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});	




var numRows = 2, ti = 5;
function isNumber(n) {
return !isNaN(parseFloat(n)) && isFinite(n);
};



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

function onlyfloat(event) {
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.float').val().indexOf('.') != -1)) {
        return false;
    }
    return true;
    };
//---------------	TARIFARIOS MEDICAMENTOS-----------------------------
//-get precio
function getTarifMed(dropDown) {
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/getTarifMed');?>',
data:{id:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.precio').val(data);
recalcTm();
$(".loadf").hide();
}
});

}


$(function () {
$("#fact-med").not('#agregar-nuevo-fac-med').on("keyup blur", ".form-control", recalcTm);
});


function recalcTm() {
var lt = 0,
wt = 0,
tt = 0;
ss = 0;
dd = 0;
pp = 0;
$("#fact-med").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio').val();
var dateTotal = (c * p);
var d = $(this).find('input.descuento').val();
var result1 = dateTotal;
var resultfinal = result1 - d;
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
}); //END .each

}


//------ESTUDIOS-----------------------------------------------------
function getTarifEst(dropDown) {
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/getTarifEst');?>',
data:{id:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg-est').val(data);
recalcTest();
$(".loadf").hide();
}
});

}


$(function () {
$("#fact-est").not('#agregar-nuevo-fac-est').on("keyup blur", ".form-control", recalcTest);
});

function recalcTest() {
var lt = 0,
wt = 0,
tt = 0;
ss = 0;
dd = 0;
pp = 0;
$("#fact-est").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio').val();
var dateTotal = (c * p);
var tps= $(this).find('input.total-pag-seg-est').val();
var d = $(this).find('input.descuento').val();
var result1 = dateTotal - tps;
var resultfinal = result1 - d;
//var resultfinal = (result1 - descuentocalcul);
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
}); //END .each

}



$("#agregar-nuevo-fac-est").on("click",function() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/saveOrdenMedicaEst');?>',
data:{idem:<?=$id_em?>,operator:<?=$id_user?>,servicio:$('#servicio-est').val(),cantidad:$('#cantidad-est').val(),
cobertura:$('#total-pag-seg-est').val(),descuento:$('#descuento-est').val(),idem:<?=$id_em?>,precio:$('#precio-est').val()
},
success: function(data){
facturaBodyEst();
$('#servicio-est').val('').trigger('change');
$('.clrs').val("");
},

});
	
});


//------LABORATORIOS-----------------------------------------------------
function getTarifLab(dropDown) {
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/getTarifEst');?>',
data:{id:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg-lab').val(data);
recalcLab();
$(".loadf").hide();
}
});

}


$(function () {
$("#fact-lab").not('#agregar-nuevo-fac-lab').on("keyup blur", ".form-control", recalcLab);
});

function recalcLab() {
var lt = 0,
wt = 0,
tt = 0;
ss = 0;
dd = 0;
pp = 0;
$("#fact-lab").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio').val();
var dateTotal = (c * p);
var tps= $(this).find('input.total-pag-seg-lab').val();
var d = $(this).find('input.descuento').val();
var result1 = dateTotal - tps;
var resultfinal = result1 - d;
//var resultfinal = (result1 - descuentocalcul);
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
}); //END .each

}



$("#agregar-nuevo-fac-lab").on("click",function() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/saveOrdenMedicaLab');?>',
data:{idem:<?=$id_em?>,operator:<?=$id_user?>,servicio:$('#servicio-lab').val(),cantidad:$('#cantidad-lab').val(),
cobertura:$('#total-pag-seg-lab').val(),descuento:$('#descuento-lab').val(),idem:<?=$id_em?>,precio:$('#precio-lab').val()
},
success: function(data){
facturaBodyLab();
$('#servicio-lab').val('').trigger('change');
$('.clrs').val("");
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#show-error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});
	
});


//-----------MATERIAL GASTABLE------------------------------------------

//-get precio
function getTarifMat(dropDown) {
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/getTarifMed');?>',
data:{id:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.precio-mat').val(data);
recalcMat();
$(".loadf").hide();
}
});

}


$(function () {
$("#fact-mat").not('#agregar-nuevo-fac-mat').on("keyup blur", ".form-control", recalcMat);
});


function recalcMat() {
var lt = 0,
wt = 0,
tt = 0;
ss = 0;
dd = 0;
pp = 0;
$("#fact-mat").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio-mat').val();
var dateTotal = (c * p);
var d = $(this).find('input.descuento').val();
var result1 = dateTotal;
var resultfinal = result1 - d;
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
}); //END .each

}





$("#agregar-nuevo-fac-mat").on("click",function() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/saveOrdenMedicaMat');?>',
data:{idem:<?=$id_em?>,operator:<?=$id_user?>,value:$('#servicio-mat').val(),
cantidad:$('#cantidad-mat').val(),descuento:$('#descuento-mat').val(),precio:$('#precio-mat').val()
},
success: function(data){
facturaBodyMat();
$('#servicio-mat').val('').trigger('change');
$('.clrs').val("");
},

});
	
});

//-----------------------------PROCEDIMIENTO---------------------------------------------------------------
//-get precio
function getTarifProced(dropDown) {
$(".loadf").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/getTarifEst');?>',
data:{id:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.total-pag-seg-proced').val(data);
recalcProced();
$(".loadf").hide();
}
});

}


$(function () {
$("#fact-proced").not('#agregar-nuevo-fac-proced').on("keyup blur", ".form-control", recalcProced);
});

function recalcProced() {
var lt = 0,
wt = 0,
tt = 0;
ss = 0;
dd = 0;
pp = 0;
$("#fact-proced").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio').val();
var dateTotal = (c * p);
var tps= $(this).find('input.total-pag-seg-proced').val();
var d = $(this).find('input.descuento').val();
var result1 = dateTotal - tps;
var resultfinal = result1 - d;
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
}); //END .each

}



$("#agregar-nuevo-fac-proced").on("click",function() {
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/saveOrdenMedicaProced');?>',
data:{idem:<?=$id_em?>,operator:<?=$id_user?>,servicio:$('#servicio-proced').val(),cantidad:$('#cantidad-proced').val(),precio:$('#precio-proced').val(),
cobertura:$('#total-pag-seg-proced').val(),descuento:$('#descuento-proced').val(),idem:<?=$id_em?>,cobertura:$('#total-pag-seg-proced').val()
},
success: function(data){
facturaBodyProced();
$('#servicio-proced').val('').trigger('change');
$('.clrs').val("");
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#show-error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
	
});
</script>
