<?php
foreach($query_paginate->result() as $rowExF)

?>

<button type='button' id='crearNuevoSolInter' class="btn btn-xs btn-primary">Crear nuevo</button>

<div class="col-md-12 disable-all" style="overflow-x:auto;"  >
 <div   class="form-horizontal" id='hideSolInterCons' >  
<div class="form-group">
 <?php if($rowExF->asked_by==$user_id) {
	 $disabled1='';
 }else{
$disabled1='disabled';	 
 } 
 ?>
<label class="control-label" ><span style='color:red'>*</span> Descripcion de solicitud</label>
<textarea rows="6" cols="15" class="form-control " id="hosp_desc_sol_inter2" <?=$disabled1?>><?=$rowExF->descripcion?></textarea>
</div>
</div>

 <?php if($rowExF->asked_by==$user_id || $perfil=="Admin") {?>

<button type="button"  class="btn-sm btn-success" id='updateSolInterCon'><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>

 <hr id="hr_ad"/>
</div>
<div class="col-md-6"  >
<div id="registroSolInterDoc"  ></div> 
 </div>

<div class="col-md-12"  >
 <?php if($rowExF->asked_by==$user_id) {
	 $disabled2='disabled';
 }else{
$disabled2='';	 
 } 
	 ?>
<div class="form-group">
<label class="control-label" >Respuesta de Interconsulta</label>
<textarea rows="6" cols="15" class="form-control active-me" id="hosp_resp_sol2" <?=$disabled2?>> <?=$rowExF->respuesta?> </textarea>
</div>

 </div> 
 
 <div class="col-md-6"  >
<div id="registroRespInterDoc"  ></div> 
 </div>
<div class="col-md-10"  ></div><div class="col-md-2"  ><button id="saveImpSolInter" class="btn btn-md btn-primary" type="button">Guardar E Imprimir  </button></div>
 
<script>
$('#crearNuevoSolInter').on('click', function(event) {
paginateSolInterCons();
$("#resultSolInt").html("");
	$("#contentSolInterCons").hide();
	$("#hideSolInterCons").show();
	$("#hosp_desc_sol_inter").val("");
$('.select-n').val(null).trigger('change');

});

 
 registroSolInterDoc();
function registroSolInterDoc() {

$.ajax({
	type: "POST",
	url: '<?php echo site_url('hospitalizacion/registroSolInterDoc');?>',
	data:{id_user:<?=$rowExF->asked_by?>,patient_id:<?=$id_patient?>,resp:1},
	success: function(data){
	$("#registroSolInterDoc").html(data);

	},

	});
}

 registroRespInterDoc();
function registroRespInterDoc() {

$.ajax({
	type: "POST",
	url: '<?php echo site_url('hospitalizacion/registroSolInterDoc');?>',
	data:{id_user:<?=$rowExF->asked_to?>,patient_id:<?=$id_patient?>,resp:2},
	success: function(data){
	$("#registroRespInterDoc").html(data);

	},

	});
}


$('#updateSolInterCon').on('click', function(event) {
event.preventDefault();    
var hosp_desc_sol_inte = $("#hosp_desc_sol_inter2").val().trim();

if(hosp_desc_sol_inte !="" ){
 $.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/updateSolInter')?>",
data: {id:<?=$rowExF->id?>,hosp_desc_sol_inte:hosp_desc_sol_inte,who:1},
success:function(data){
$("#resultSolInt").html(data).css('color','green');
registroSolInterDoc();
	
},
});
}else{
$("#resultSolInt").html('falta info...').css('color','red');	
}
});


$('#saveImpSolInter').on('click', function(event) {
event.preventDefault();    
var hosp_resp_sol = $("#hosp_resp_sol2").val().trim();

if(hosp_resp_sol2 !="" ){
 $.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/updateSolInter')?>",
data: {id:<?=$rowExF->id?>,hosp_resp_sol:hosp_resp_sol,who:2},
success:function(data){
$("#resultSolInt").html(data).css('color','green');
registroRespInterDoc();
	
},
});
}else{
$("#resultSolInt").html('falta info...').css('color','red');	
}
});
</script>