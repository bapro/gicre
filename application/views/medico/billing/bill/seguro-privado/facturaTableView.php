 <style>
.selected {
      background-color: #abc;
}
 </style>
 <?php
 if($identificar=="privado") { 
 	$sel="Doctor Tarfarios";
 } else {
	$sel="Centro Medico Tarfarios"; 
 }
 ?>
<i> <?=$count;?> facturas</i>
<div style="overflow-x:auto">
<table class="table table-striped table-bordered" id="turf">
<tr style="background:#38a7bb;color:white" class='hide-tr-th'>
<th class="heading"><?=$sel?></th>
<th class="heading">Cantidad</th>
<th class="heading">Precio Unitario</th>
<th class="heading">Sub-Total</th>
<!--<th class="heading">Total Pagar Seguro</th>-->
<th class="heading">Descuento</th>
<th class="heading">Total Pagar Paciente</th>
<th colspan="3" style='text-align:center'>Acciones</th>
</tr>

<tr id='addr1' class="calculation visible hide-tr-th">
<td style="width:310px;display:block;border:none">
<?php if($identificar=="privado") { ?>
<select  class="service form-control  select2" onChange="getSegNamePrivado(this);">
<option value="" hidden></option>
<?php foreach($serv as $s){?>
<option  value="<?=$s->id_tarif?>"><?=$s->procedimiento?></option>
<?php
}
?>
</select>
<?php } else {?>
<select class="service form-control  select2" onChange="getSegName(this);">
<option value="" hidden></option>
<?php foreach($serv_centro as $s){?>
<option  value="<?=$s->id_c_taf?>"><?=$s->sub_groupo?></option>
<?php
}
?>
</select>

<?php } ?>
</td>
<td class="cantidad">
<input type="text" class="cantidad form-control "  tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td class="precio">
<input class="precio form-control float " type="text"  tabindex="2" onkeypress='return onlyfloat(event);' />

</td>
<td class="row-total">
<input type="text" class="row-total form-control " value="0.00" readonly />

</td>
<!--<td class="total-pag-seg">
<input type="text" class="total-pag-seg form-control "  tabindex="3" readonly />

</td>-->
<td class="descuento">
<input style='color:red' type="text" class="descuento form-control float"  tabindex="4" onkeypress='return onlyfloat(event);'/>

</td>
<td class="total-pag-pa">
<input type="text" class="total-pag-pa form-control " value="0.00" tabindex="5" readonly />

</td>
<td colspan='3' style='text-align:center'>
<button class="btn btn-sm btn-success" type="button" id="agregar_new_fac" disabled ><i class="fa fa-plus"></i>Agregar</button>
</td>
</tr>

<tr id='addr2' class="calculation visible">


<?php
$i=1;
 foreach($billings as $rf){
	 
$crt1=$this->db->select('name')->where('id_user',$rf->created_by)->get('users')->row('name');
$updt1=$this->db->select('name')->where('id_user',$rf->updated_by)->get('users')->row('name');


 $inserted_time = date("d-m-Y H:i:s", strtotime($rf->inserted_time));
 $updated_time = date("d-m-Y H:i:s", strtotime($rf->updated_time));	 
	 
	 
	 
if($identificar=="privado") {
	
$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios')->row('procedimiento');
	
} else {	 
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rf->service)->get('centros_tarifarios')->row('sub_groupo');
}
 ?>
<tr>

<td style="width:330px;font-size:14px">
<?php
echo $service;
?>

</td>
<td>
<?=$rf->cantidad?>
</td>
<td>
RD$ <?=$rf->preciouni?>
</div>
</td>
<td>
RD$ <?=$rf->subtotal?>

</td>
<!--<td>
RD$ <?=$rf->totalpaseg?>

</td>-->
<td>
RD$ <?=$rf->descuento?>

</td>
<td>
RD$ <?=$rf->totpapat?>

</td>
<td><button class="btn btn-sm button_edit_tarifarios" type="button" id="<?=$rf->idfac?>" ><i class="fa fa-pencil"></i> </button></td>
<td>
<!--<button class="btn btn-sm button_delete_tarifarios"  type="button" style='color:red' ><i class="fa fa-trash"></i> <span style='display:none'><?=$rf->idfac?></span></button>
-->
<a style='background:red' href="<?php echo base_url("admin_medico/deleted_fac/$rf->idfac/$user/$identificar/$count")?>" data-toggle="modal" data-target="#button_delete_tarifarios" class="btn btn-primary btn-xs"><i class="fa fa-trash"></i></a>

</td>
<td><i class="fa fa-info-circle" title="Creado por <?=$crt1?> (<?=$inserted_time?>) &#013 Modificado por <?=$updt1?> (<?=$updated_time?>) "></i> </td>

</tr>
<?php
 }
 
 $this->db->select("SUM(cantidad) as cant");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$cant=$this->db->get()->row()->cant;
//----------------------------------------------
  $this->db->select("SUM(preciouni) as pu");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$pu=$this->db->get()->row()->pu;
$pun=number_format($pu,2);

//-----------------------------------------------

$this->db->select("SUM(subtotal) as sbt");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$sbt=$this->db->get()->row()->sbt;
$sbt=number_format($sbt,2);


//-----------------------------------------------

$this->db->select("SUM(totalpaseg) as tps");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$tps=$this->db->get()->row()->tps;
$tps=number_format($tps,2);

//-----------------------------------------------

$this->db->select("SUM(descuento) as descu");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$descu=$this->db->get()->row()->descu;
$descu=number_format($descu,2);


//-----------------------------------------------

$this->db->select("SUM(totpapat) as tpat");
$this->db->where("id2",$idfacc);
$this->db->from('factura');
$tpat=$this->db->get()->row()->tpat;
$tpat=number_format($tpat,2);
 ?>
<tr style="background:#d5d370;font-size:14px">
<th style="text-align:right">TOTAL</th>
<th><?=$cant?></th><th>RD$ <?=$pun?></th><th>RD$ <?=$sbt?></th><!--<th>RD$ <?=$tps?></th>--><th>RD$ <?=$descu?></th><th>RD$ <?=$tpat?></th><th colspan="3"></th>
</tr>
</table>
</div>


<i>

<?php  foreach($billings2 as $row)

$crt=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$updt=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');


 $insert_date = date("d-m-Y H:i:s", strtotime($row->inserted_time));
 $update_date = date("d-m-Y H:i:s", strtotime($row->update_date));



?>
<div class="col-md-10" >
Creado por <?=$crt?> - Modificado por <?=$updt?><br/>
fecha de creacion  <?=$insert_date?> - fecha de modificacion <?=$update_date?>
</i>
</div>
<div class="col-md-2" >
<a class="btn btn-sm btn-primary"  href="<?php echo base_url("printings/print_billing_seguro_privado/$idfacc/$identificar")?>" ><i class="fa fa-print"></i>Imprimir</a>
</div>
<br/><br/><br/><br/>
<div class="modal fade" id="button_delete_tarifarios"  role="dialog" >
<div class="modal-dialog" style="width: 80%;margin: auto;" >
<div class="modal-content" >

</div>
</div>
</div>
<!-- *************************************************************************-->

<script>


$('#button_delete_tarifarios').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})
	
	
$(".service").change(function(){
if($("input.precio").val()=="" || $(".service").val()=="" || $("input.cantidad").val()==""){
$('#agregar_new_fac').prop("disabled",true);
} else {
$('#agregar_new_fac').prop("disabled",false);	
}
})



$("input.precio").keyup(function(){
if($("input.precio").val()=="" || $(".service").val()=="" || $("input.cantidad").val()==""/* || $("input.total-pag-seg").val()==""*/){
$('#agregar_new_fac').prop("disabled",true);
} else {
$('#agregar_new_fac').prop("disabled",false);	
}
})



$("input.cantidad").keyup(function(){
if($("input.precio").val()=="" || $(".service").val()=="" || $("input.cantidad").val()=="" /*|| $("input.total-pag-seg").val()==""*/ ){
$('#agregar_new_fac').prop("disabled",true);
} else {
$('#agregar_new_fac').prop("disabled",false);	
}
})
//-----------------------------------------------------------------

if(<?=$count;?>==1){
$(".button_delete_tarifarios").hide();	
}

$('.select2').select2({ 
//tags: true,  
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	



$('.button_edit_tarifarios').on('click', function(event) {
 event.preventDefault();
 $(".hide-this-fac").hide();
 $(".hide-tr-th").hide();
//$(this).closest('tr').addClass("highlighted").siblings().closest('tr').removeClass("highlighted"); 
 
 $("#load_factura_table_view").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
 var id_fact = $(this).attr('id');
 var id_facc = "<?=$idfacc?>";
  var is_admin = "<?=$is_admin?>";
   var user = "<?=$user?>";
   var identificar = "<?=$identificar?>";
   
 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateBillTable')?>",
data: {id_fact:id_fact,id_facc:id_facc,is_admin:is_admin,user:user,identificar:identificar},
cache: true,
success:function(data){
$("#load_factura_table_view").hide();	
$("#edit_this_tarif").html(data);

}  
});
})






 Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

function getSegName(dropDown) {
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/get_service_precio_centro');?>',
data:{id_mssm1:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.precio').val(data);
recalc();
}
});

}

function getSegNamePrivado(dropDown) {

$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/get_service_precio');?>',
data:{id_mssm1:dropDown.value},
success: function(data){
$($(dropDown).parents('tr')[0]).find('input.precio').val(data);
recalc();
}
});

}
//=====================================================================

function isNumber(n) {
return !isNaN(parseFloat(n)) && isFinite(n);
}

function recalc() {
var lt = 0,
wt = 0,
tt = 0;
ss = 0;
dd = 0;
pp = 0;
$("#turf").find('tr').each(function () {
var c= $(this).find('input.cantidad').val();
var p = $(this).find('input.precio').val();
var dateTotal = (c * p);
//var tps= $(this).find('input.total-pag-seg').val();
var d = $(this).find('input.descuento').val();
var result1 = dateTotal;
var resultfinal = result1 - d;
//var resultfinal = (result1 - descuentocalcul);
$(this).find('input.total-pag-pa').val(resultfinal.toFixed(2) ? resultfinal.toFixed(2) : "");
$(this).find('input.row-total').val(dateTotal.toFixed(2) ? dateTotal.toFixed(2) : "");
//wt += isNumber(p) ? parseInt(p, 10) : 0;
//lt += isNumber(c) ? parseInt(c, 10) : 0;
tt += isNumber(dateTotal) ? dateTotal : 0;
//ss += isNumber(tps) ? parseInt(tps, 10) : 0;
dd += isNumber(d) ? parseInt(d, 10) : 0;
pp += isNumber(resultfinal) ? resultfinal : 0;
});  
}






$(function () {
$("#turf").on("click", ".calculation", recalc);
$("#turf").on("keyup blur", ".form-control", recalc);
});

//========================================================================
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
	




	
//************************************************************************************************
//===============save_factura==============================
$('#agregar_new_fac').on('click', function(event) {

var cantidad =$('input.cantidad').val();

var precio =$('input.precio').val();
var service =$('.service').val();
if(service =="" || cantidad == "" || precio == "" )
{
alert("Servicio, cantidad, precio unitario son requeridos !")

}
else
{

var updated_by = "<?=$user?>";

 var id_patient = "<?=$id_patient?>";
var total =$('input.row-total').val();

var totalpaseg = "";

var descuento =$('input.descuento').val();

var totpapat =$('input.total-pag-pa').val();
var medico="<?=$medico?>";
var seguro="<?=$seguro?>";
var idfacc="<?=$idfacc?>";
var idfac="<?=$rf->idfac?>";
var is_admin="<?=$is_admin?>";
var area_id = "<?=$area_id?>";
 var centro = "<?=$centro_in_fac?>";
var action=1;
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/updateBill1')?>",
data: {service:service,cantidad:cantidad,preciouni:precio,id_patient:id_patient,area_id:area_id,
subtotal:total,totalpaseg:totalpaseg,descuento:descuento,totpapat:totpapat,idfacc:idfacc,
idfac:idfac,updated_by:updated_by,action:action,medico:medico,seguro:seguro,centro:centro},
cache: true,
success:function(data){ 
 $('.hide-up-f').hide();
factura_table_view(); 

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#my-errros').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},   
});
}
return false;
});	



//********************************************************************************************************



$(".button_delete_tarifarios").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id =  $(this).text();
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/delete_factura')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
factura_table_view(); 
}
});
}
})
</script>