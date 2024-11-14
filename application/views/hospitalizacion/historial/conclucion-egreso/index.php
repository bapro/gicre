<div class="col-md-12"  >
<h4 class="h4 his_med_title">Conclusión Del Egresos</h4>
<em><?=$nb_ce?> registros (s)</em>

<?php if ($nb_ce > 0)
{

?>
<div id="paginationh">

<ul class="paginationh">
<?php 
 foreach($queryce->result() as $row)
{

$user_c9=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c10=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');;

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<li class="paninate-li" title='Creado por <?=$user_c9?>, Actualizado por <?=$user_c10?>' ><a  data-toggle="modal" data-target="#verConEg" href="<?php echo base_url("hospitalizacion/getDataConEg/$row->id/$id_historial/$user_id/$id_hosp")?>">
<?php echo $inserted_time ?> 
</a>
</li >
<?php }?>

</div>


<?php

echo "<hr class='prenatal-separator'/>";
}

?>

</div>
<span id="con-eg-fields" style="display:none"></span>
<div id="con-eg">
<div class="col-md-5" id='clear-cd' >
 <div class="form-group row">
    <label  class="col-form-label">Resumen de los hallazgos <i class="fa fa-asterisk" style='color:red' aria-hidden="true"></i></label>
    
	 <textarea rows="6"   class="form-control" id='resumen_hallasgos'></textarea>
   
 
  </div>
  <div class="form-group row">
    <label  class="col-form-label">Resumen de la intervenciones <i class="fa fa-asterisk" style='color:red' aria-hidden="true"></i></label>
  <textarea rows="6"   class="form-control" id='resumen_intervenciones'></textarea>
   
  </div>
  
    <div class="form-group row">
    <label  class="col-form-label">Condición De Alta <i class="fa fa-asterisk" style='color:red' aria-hidden="true"></i></label>
     <textarea rows="6"   class="form-control" id='condicion_alta'></textarea>
   
  </div>
  
     <div class="form-group row">
    <label  class="col-form-label">Causa De Egreso <i class="fa fa-asterisk" style='color:red' aria-hidden="true"></i></label>
<select  class="form-control select2"   id="causa_egreso"data-select2-tags="true"  >
<option value=''></option><option value='1'>1</option>
</select>

 
  </div>

 <div class="form-group row">
    <label  class="col-form-label">Destino/Referimiento <i class="fa fa-asterisk" style='color:red' aria-hidden="true"></i></label>
	<select  class="form-control select2"   id="destino_referimiento" data-select2-tags="true" >
<option value=''></option><option value='1'>1</option>
</select>

	 </div>

 <div class="form-group row">
 <label><input type="checkbox" name="autopsia" value="Autopsia"> autopsia</label><br/>
    <label  class="col-form-label">Diagnostico De Autopsia</label>
     <textarea rows="6"   class="form-control" id='diagnostico_autopsia'></textarea>
  </div>
  
   <div class="form-group row">
    <label  class="col-form-label">Equipo Medico</label>
	<br/>
	Doc (a) <?=$user_medico_name?>
	<textarea rows="6"   class="form-control" id='equipo_medico'></textarea>
  </div>
  
  
   </div>
   <div class="col-md-6 col-md-offset-1"  >
<h4 class="h4 his_med_title">Diagnostico(s) De Alta Medica</h4>

 <div class="form-group row">
    <label  class="col-form-label">DIAGNOSTICO(S)  </label>
	 
<div class="input-group">
    <span class="input-group-addon">1- <i class="fa fa-asterisk" style='color:red' aria-hidden="true"></i></span>
<select  class="form-control select2"   id="diag_alta_diag1" data-select2-tags="true" >
<option value=''></option><option value='1'>1</option>
</select>
</div>

<div class="input-group">
  <span class="input-group-addon">2-</span>
<input  class="form-control" type='text' id="diag_alta_diag2"/>
</div>
  </div>
<hr/>

 <div class="form-group row">
  
	  <label class="checkbox-inline">
      <input type="checkbox" name='infeccion_herida' > Infección Herida
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name='morta_post' > Mortalidad Postoperatoria (10 D)
    </label>
    <label class="checkbox-inline" >
      <input type="checkbox" name='morta_int' > Mortalidad Intraoperatoria (6 hr)
    </label>
	<hr/>
	    <label>PROCEDIMIENTO(S) REALIZADO(S)</label><br/>
 <div class="input-group">

    <span class="input-group-addon">1-</span>
<select  class="form-control select2"   id="diag_alta_diag3"  >

</select>
 <span class="input-group-addon"><em id='proced-monto'>monto: </em></span>
</div>

<div class="input-group">
<input  class="form-control" type='hidden' id="diag_alta_diag4"/>
 <div id="list-proced-realizados"></div>
</div>
  </div>
   </div>
   
   </div>

   
<div class="modal fade" id="verConEg" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-inc-width8" role="document">
<div class="modal-content" >

</div>
</div>
</div>
 <script>

$('#guardarConAlta').on('click', function(event) {
let action =this.id;
//-----------conclusion del ingreso-----------------------------------
let resumen_hallasgos = $("#resumen_hallasgos").val();
let resumen_intervenciones = $("#resumen_intervenciones").val();
let condicion_alta = $("#condicion_alta").val();
let causa_egreso = $("#causa_egreso").val();
let destino_referimiento = $("#destino_referimiento").val();
let diagnostico_autopsia = $("#diagnostico_autopsia").val();
let equipo_medico = $("#equipo_medico").val();
let diag_alta_diag1 = $("#diag_alta_diag1").val();
let diag_alta_diag2 = $("#diag_alta_diag2").val();
let diag_alta_diag3 = $("#diag_alta_diag3").val();
let diag_alta_diag4 = $("#diag_alta_diag4").val();

let infeccion_herida = [];
$("input[name='infeccion_herida']:checked").each(function(){
infeccion_herida.push(this.value);
});
let morta_post = [];
$("input[name='morta_post']:checked").each(function(){
morta_post.push(this.value);
});

let morta_int = [];
$("input[name='morta_int']:checked").each(function(){
morta_int.push(this.value);
});



 
let id_hosp=<?=$id_hosp?>;
let user_id=<?=$user_id?>;
let d_centro=<?=$centro_id?>;
let id_patient=<?=$patient_id?>;
let id_useri = "<?=encrypt_url($user_id)?>";
let zero = 0;
$.ajax({
url:"<?php echo base_url(); ?>hosp_save_patient_data/saveHospDischargePat",
data: {id_patient:id_patient,id_user:user_id,id_hosp:id_hosp,id_centro:d_centro,action:action,
//---conculsion de egreso
resumen_hallasgos:resumen_hallasgos,resumen_intervenciones:resumen_intervenciones,condicion_alta:condicion_alta,
causa_egreso:causa_egreso,destino_referimiento:destino_referimiento,equipo_medico:equipo_medico,
diag_alta_diag1:diag_alta_diag1,diag_alta_diag2:diag_alta_diag2,diagnostico_autopsia:diagnostico_autopsia,
infeccion_herida:infeccion_herida,morta_post:morta_post,morta_int:morta_int,diag_alta_diag3:diag_alta_diag3,diag_alta_diag4:diag_alta_diag4,

},
method:"POST",
 dataType: 'json',
success:function(response){
if(response.status > 1){
$('.required-menu').html('<p class="alert alert-danger ">'+response.message+'</p>');
$('.tab-conc-eg').addClass("fa fa-asterisk").css('color','red').css('font-size','20px');
} else{
//$('.successfull_saving').addClass('alert alert-success').html('Guardado con alta exitosamente');

 window.location.href = "<?php echo site_url('hospitalizacion/hospitalizacion_list')?>/" + zero + "/" + id_useri

}


},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('.required-menu').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
})









$('#con-eg .form-control').change(function() {
var els = $('#con-eg .form-control').filter(function() {
    return this.value !== "" && this.value !== "0";
}); 

if (els.length > 0) {
	  $('#con-eg-fields').text(1);
}else{
  $('#con-eg-fields').text(0);	
}
});

$("#loadHospProced").on("click",function() {
	loadHospProced();
	});
	
	
	
function loadHospProced(){
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/loadHospProced",
data: {centro_id:<?=$centro_id?>,id_seg:<?=$id_seguro?>},
method:"POST",
success:function(data){
$("#diag_alta_diag3").html(data);

},

});
}


$("#diag_alta_diag3").on("change",function() {
	var id = $(this).val();
	$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/getHospProcedMonto",
data: {id:id},
method:"POST",
success:function(data){
$("#proced-monto").html(data);

},
});

	$.ajax({
url:"<?php echo base_url(); ?>conclusion_egreso_proced/saveProcedRealizados",
data: {id:id,centro_id:<?=$centro_id?>,id_seg:<?=$id_seguro?>, id_pat:<?=$id_patient?>, id_user: <?=$user_id?>},
method:"POST",
success:function(data){
listarProcedRealizados();

},


});

});

listarProcedRealizados();
function listarProcedRealizados(){

	$.ajax({
url:"<?php echo base_url(); ?>conclusion_egreso_proced/listProcedRealizados",
data: {id:<?=$id_patient?>},
method:"POST",
success:function(data){
$("#list-proced-realizados").html(data);

},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#list-proced-realizados").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});	
}


 </script>