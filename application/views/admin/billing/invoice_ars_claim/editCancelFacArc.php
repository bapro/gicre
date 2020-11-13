<div class="modal-header"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h2 class="modal-title"  >Esas factuaras han sido anuladas usted puede volver a crearlas</h2>
</div>
<div class="modal-body" >
 <div class="container">
 <div class="col-md-9">
  <div style="overflow-x: auto;">
<table class="table table-striped  paginated" id="facturaedit" >
<thead>
<tr style="background:#C9F7FF">
<td><strong>Fecha</strong></td>
<td colspan="2"><strong>Paciente</strong></td>
<!--<td><strong>Cedula</strong></td>-->
<td><strong>NSS</strong></td>
<td><strong>No Autorizacion</strong></td>
<td><strong>Total Reclamdo</strong></td>
<td><strong>Aseguradora Pagara</strong></td>
<td><strong>Paciente Pagara</strong></td>
<td><strong>RNC</strong></td>
<td><input type="checkbox" id="copy-alledit" /></td>
</tr>
</thead>
<tbody id="copy-alledit-rows">
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$sql ="SELECT * FROM invoice_ars_claims
WHERE ncf_id=$ncf_id";
$query = $this->db->query($sql);
foreach ($query->result() as $fac) {
$paciente=$this->db->select('nombre,cedula,photo,ced1,ced2,ced3')->where('id_p_a',$fac->paciente)
->get('patients_appointments')->row_array();
$fecha1 = date("d-m-Y",strtotime($fac->fecha));

?>
<tr>
<td><?=$fecha1;?></td>
<td>
<?php

if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($paciente['photo']==""){
	
}
else{
	?>
<img  width="50" height="50" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $paciente['photo']; ?>"  />
<?php

}
?>
</td>
<td class="fecha1"  style="display:none"><?=$fac->fecha;?></td>
<td class="paciente" style="display:none"><?=$fac->paciente;?></td>
<td ><?=$paciente['nombre'];?></td>
<!--<td ><?=$paciente['cedula'];?></td>-->
<td class="num_af"><?=$fac->num_af;?></td>
<td class="numauto"><?=$fac->numauto;?></td>
<td class="tcentro"  style="display:none"><?=$fac->center_id;?></td>
<td class="tarea"  style="display:none"><?=$fac->area_id;?></td>
<td class="tsubtotal"><?=$fac->tsubtotal;?></td>
<td class="totpagseg"><?=$fac->totpagseg;?></td>
<td class="totpagpa"><?=$fac->totpagpa;?></td>
<td class="medico" style="display:none"><?=$fac->medico;?></td>
<td class="servicio" style="display:none"><?=$fac->servicio;?></td>
<td class="codigoprestado" style="display:none"><?=$fac->codigoprestado;?></td>
<td class="rnc" ><?=$fac->rnc;?></td>
<td class="seguro_medico" style="display:none"><?=$fac->seguro_medico;?></td>
<td class="idfacc" style="display:none"><?=$fac->id_fac2;?></td>
<td><input type="checkbox"  class="copy-one"  /></td>
</tr>  

<?php
}

?>
</tbody>
</table>
  <hr id="hr_ad"/>
<table class="table table-striped"  id="second-tableedit" >
<thead>
<tr style="background:#DDFAFF">
	<td><strong>Fecha</strong></td>
	<td colspan="2"><strong>Paciente</strong></td>
	<td><strong>NSS</strong></td>
	<td><strong>No Autorizacion</strong></td>
	<td><strong>Total Reclamado</strong></td>
	<td><strong>Aseguradora Pagara</strong></td>
	<td><strong>Paciente Pagara</strong></td>
	<td><strong>RNC</strong></td>
<td></td>
</tr>
</thead>
<tbody>

</tbody>
</table>
</div>
  <div class="disabled-all">
   <hr id="hr_ad"/>
    <div class="col-md-6 form-group">
        <label>NCF Asignar <span style='color:red'>*</span></label>
        <input id="ncf2" class="form-control ncf" type="text" disabled />
		<span class="ncf_result2"></span>
    </div>
    <div class="col-md-3 form-group">
<button type="button" id="saveTransfer2" class="btn btn-primary btn-xs" disabled><i class="fa fa-save"></i>Guardar</button>
    </div>
    <div class="col-md-11 form-group">
        <label>Nota</label>
        <input id="nota2" class="form-control" type="text"/>
    </div>
	 <div id="show-er"> </div>
</div>

 </div>
  </div>
  </div>
<script>

  var timer = null;
$('.ncf').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff1, 1000);
	   $("#saveTransfer2").prop("disabled",true);
});

function doStuff1() {
	 var str= $(".ncf").val();
$(".ncf_result2").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$("#saveTransfer2").prop("disabled",false);
if(str == "") {
$( ".ncf_result2" ).hide();
$("#saveTransfer2").prop("disabled",false);
}else {
$.get( "<?php echo base_url();?>admin_medico/ncf?value="+str, function( data ){
$(".ncf_result2").html(data); 
			   
});
}
}




	//-----------------------------------------------------------------------------------------
jQuery('#copy-alledit').on('click', function(e) {

if($(this).is(':checked',true)) {

}
else{
$(".copy-one").prop('checked', false);
}
})




$('#facturaedit').on('click','#copy-alledit',function(e){
	 $("#ncf2").prop("disabled",false);
	if($(this).is(':checked',true)) {
	$("#copy-alledit-rows").fadeOut(800, function(){ 
	$(this).remove();
	});
	$("#copy-alledit-rows").clone().appendTo('#second-tableedit');
	

	$(".disabled-all :input").prop("disabled", false);
	$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
	//search_result();
	}
	})
	

	//CLICKING BY ROW
		
	$('#facturaedit').on('click','.copy-one',function(e){
	if($(this).is(':checked',true)) {
	 $("#ncf2").prop("disabled",false);	
	$(this).closest('tr').fadeOut(800, function(){ 
	$(this).remove();
	});
	$(this).closest('tr').clone().appendTo('#second-tableedit>tbody');
	$(".disabled-all :input").prop("disabled", false);
	$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
	}
	//search_result();
	})
		


$('#second-tableedit').on('click','.copy-one',function(e){
 e.preventDefault();
$(this).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
var id =$(this).val();
$(this).closest('tr').clone().appendTo('#facturaedit>tbody');
})

//---------------------------------------------------------------------------

$('#saveTransfer2').on('click', function(event) {
var is_admin="<?=$is_admin?>";
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var ncf = $("#ncf2").val();
var nota = $("#nota2").val();
var fecha = [];
var paciente = [];
var num_af = [];
var numauto = [];
var tsubtotal = [];
var totpagseg = [];
var totpagpa = [];
var medico = [];
var servicio = [];
var codigoprestado = [];
var rnc = [];
var seguro_medico = [];
var centro = [];
var area = [];
var idfacc = [];
$("#second-tableedit").find('td.fecha1').each(function(){
fecha.push($(this).text());
});

$("#second-tableedit").find('td.tarea').each(function(){
area.push($(this).text());
});

 
$("#second-tableedit").find('td.tcentro').each(function(){
centro.push($(this).text());
});
$("#second-tableedit").find('td.paciente').each(function(){
paciente.push($(this).text());
});

$("#second-tableedit").find('td.num_af').each(function(){
num_af.push($(this).text());
});
$("#second-tableedit").find('td.numauto').each(function(){
numauto.push($(this).text());
});
$("#second-tableedit").find('td.tsubtotal').each(function(){
tsubtotal.push($(this).text());
});
$("#second-tableedit").find('td.totpagseg').each(function(){
totpagseg.push($(this).text());
});
$("#second-tableedit").find('td.totpagpa').each(function(){
totpagpa.push($(this).text());
});
$("#second-tableedit").find('td.medico').each(function(){
medico.push($(this).text());
});
$("#second-tableedit").find('td.servicio').each(function(){
servicio.push($(this).text());
});

$("#second-tableedit").find('td.codigoprestado').each(function(){
codigoprestado.push($(this).text());
});
$("#second-tableedit").find('td.rnc').each(function(){
rnc.push($(this).text());
});
$("#second-tableedit").find('td.seguro_medico').each(function(){
seguro_medico.push($(this).text());  
});

$("#second-tableedit").find('td.idfacc').each(function(){
idfacc.push($(this).text());  
});

var created_by=<?=$id_user?>;
var id_patient=<?=$id_patient?>;
if(ncf==""){
$("#ncf2").css("border","1px solid");
$("#ncf2").css("color","red");
	//alert("NCF Asignar es obligatorio !");
} else {
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/saveInvoiceArsClaim')?>",
data:{fecha:fecha,paciente:paciente,num_af:num_af,numauto:numauto,ncf:ncf,seguro_medico:seguro_medico,desde:desde,
tsubtotal:tsubtotal,totpagseg:totpagseg,totpagpa:totpagpa,nota:nota,created_by:created_by,area:area,centro:centro,
medico:medico,servicio:servicio,codigoprestado:codigoprestado,rnc:rnc,idfacc:idfacc,is_admin:is_admin,hasta:hasta,id_patient:id_patient},
cache: true,
 success:function(data){ 
 alert("Datos se guarden con exito.");
window.location.href="<?php echo base_url();?>admin_medico/invoice_ars_p_v";
//$("#ncf1").val("");
}, error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#show-er').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
}
})	
</script>