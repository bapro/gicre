<style>
.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width8 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>

<?php
foreach($queryexneu->result() as $row)
$user_c11=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c12=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<div class="modal-header text-center"  id="background_">
<?php $this->load->view('hospitalizacion/historial/header-patient-data');?>
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<div  class="modal-title"  ><h3>Conclucion Egreso # <?=$row->id?></h3>
<span style='font-size:13px'>
Creado por :<?=$user_c11?>, <?=$inserted_time?><br/>
 <span style="color:red"> Cambiado por :<?=$user_c12?> | fecha :<?=$update_time?></span> 

</span>
 </div>


<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button"  class="btn btn-primary btn-success updateConEg"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>

<?php }?>

<a target="_blank"   href="<?php echo base_url("printings/print_if_foto_/$row->id/con_eg")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
<div class="_resultwrwre" ></div>
</div>

<div class="modal-body text-left" style="max-height: calc(150vh - 210px); overflow-y: auto;">

<div class="col-md-5" id='_clear-cd' >
 <div class="form-group row">
    <label  class="col-form-label">Resumen de los hallazgos <i class="fa fa-asterisk" style='color:#F3A2A2' aria-hidden="true"></i></label>
    
	 <textarea rows="6"   class="form-control" id='_resumen_hallasgos'><?=$row->resumen_hallasgos?></textarea>
   
 
  </div>
  <div class="form-group row">
    <label  class="col-form-label">Resumen de la intervenciones <i class="fa fa-asterisk" style='color:#F3A2A2' aria-hidden="true"></i></label>
  <textarea rows="6"   class="form-control" id='_resumen_intervenciones'><?=$row->resumen_intervenciones?></textarea>
   
  </div>
  
    <div class="form-group row">
    <label  class="col-form-label">Condición De Alta <i class="fa fa-asterisk" style='color:#F3A2A2' aria-hidden="true"></i></label>
     <textarea rows="6"   class="form-control" id='_condicion_alta'><?=$row->condicion_alta?></textarea>
   
  </div>
  
     <div class="form-group row">
    <label  class="col-form-label">Causa De Egreso <i class="fa fa-asterisk" style='color:#F3A2A2' aria-hidden="true"></i></label>
<select  class="form-control select11"   id="_causa_egreso"  >
<option value='<?=$row->causa_egreso?>'><?=$row->causa_egreso?></option><option value='1'>1</option>
</select>

 
  </div>

 <div class="form-group row">
    <label  class="col-form-label">Destino/Referimiento <i class="fa fa-asterisk" style='color:#F3A2A2' aria-hidden="true"></i></label>
	<select  class="form-control select11"   id="_destino_referimiento"  >
<option value='<?=$row->destino_referimiento?>'><?=$row->destino_referimiento?></option><?=$row->destino_referimiento?><option value='1'>1</option>
</select>

	 </div>

 <div class="form-group row">
 <label><input type="checkbox" name="autopsia" value="Autopsia"> autopsia</label><br/>
    <label  class="col-form-label">Diagnostico De Autopsia</label>
     <textarea rows="6"   class="form-control" id='_diagnostico_autopsia'><?=$row->diagnostico_autopsia?></textarea>
  </div>
  
   <div class="form-group row">
    <label  class="col-form-label">Equipo Medico</label>
	<textarea rows="6"   class="form-control" id='_equipo_medico'><?=$row->equipo_medico?></textarea>
  </div>
  
  
   </div>
   <div class="col-md-6 col-md-offset-1"  >
<h4 class="h4 his_med_title">Diagnostico(s) De Alta Medica</h4>

 <div class="form-group row">
    <label  class="col-form-label">DIAGNOSTICO(S)  <i class="fa fa-asterisk" style='color:#F3A2A2' aria-hidden="true"></i></label>
	 
<div class="input-group">
    <span class="input-group-addon">1-</span>
<select  class="form-control select11"   id="_diag_alta_diag1"  >
<option value='<?=$row->diag_alta_diag1?>'><?=$row->diag_alta_diag1?></option><option value='1'>1</option>
</select>
</div>

<div class="input-group">
    <span class="input-group-addon">2-</span>
<select  class="form-control select11"   id="_diag_alta_diag2"  >
<option value='<?=$row->diag_alta_diag2?>'></option><?=$row->diag_alta_diag2?><option value='1'>1</option>
</select>
</div>
  </div>
<hr/>

 <div class="form-group row">
     <label  class="col-form-label">PROCEDIMIENTO(S) REALIZADO(S)</label><br/>
	  <label class="checkbox-inline">
<?php
   if ($row->infeccion_herida ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input type="checkbox" name='_infeccion_herida' <?=$selected?>> Infección Herida
    </label>
    <label class="checkbox-inline">
	<?php
   if ($row->morta_post ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input type="checkbox" name='_morta_post' <?=$selected?>> Mortalidad Postoperatoria (10 D)
    </label>
    <label class="checkbox-inline" >
		<?php
   if ($row->morta_int ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input type="checkbox" name='_morta_int' <?=$selected?>> Mortalidad Intraoperatoria (6 hr)
    </label>
	<hr/>
 <div class="input-group">
    <span class="input-group-addon">1-</span>
<select  class="form-control select11"   id="_diag_alta_diag3"  >
<option value='<?=$row->diag_alta_diag3?>'><?=$row->diag_alta_diag3?></option><option value='1'>1</option>
</select>
</div>

<div class="input-group">
    <span class="input-group-addon">2-</span>
<select  class="form-control select11"   id="_diag_alta_diag4"  >
<option value='<?=$row->diag_alta_diag4?>'></option><?=$row->diag_alta_diag4?><option value='1'>1</option>
</select>
</div>
  </div>
   </div>
   
    </div>



<div class="modal-header text-center"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="btn btn-primary btn-success updateConEg"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>

<?php }?>

<a target="_blank"   href="<?php echo base_url("printings/print_if_foto_/$row->id/exam_neuro")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
<div class="_resultwrwre"  ></div>
</div>
	
<script type="text/javascript">
$(".select11").select2({

});
$('.updateConEg').on('click',function(e){
	e.preventDefault(); 

let resumen_hallasgos = $("#_resumen_hallasgos").val();
let resumen_intervenciones = $("#_resumen_intervenciones").val();
let condicion_alta = $("#_condicion_alta").val();
let causa_egreso = $("#_causa_egreso").val();
let destino_referimiento = $("#_destino_referimiento").val();
let diagnostico_autopsia = $("#_diagnostico_autopsia").val();
let equipo_medico = $("#_equipo_medico").val();
let diag_alta_diag1 = $("#_diag_alta_diag1").val();
let diag_alta_diag2 = $("#_diag_alta_diag2").val();
let diag_alta_diag3 = $("#_diag_alta_diag3").val();
let diag_alta_diag4 = $("#_diag_alta_diag4").val();

let infeccion_herida = [];
$("input[name='_infeccion_herida']:checked").each(function(){
infeccion_herida.push(this.value);
});
let morta_post = [];
$("input[name='_morta_post']:checked").each(function(){
morta_post.push(this.value);
});

let morta_int = [];
$("input[name='_morta_int']:checked").each(function(){
morta_int.push(this.value);
});
//$('.updateConEg').prop('disabled',true);
$.ajax({
url:'<?php echo base_url();?>hospitalizacion/updateConEg',
data: {
resumen_hallasgos:resumen_hallasgos,user_id:<?=$id_user?>,id:<?=$row->id?>,
resumen_intervenciones:resumen_intervenciones,condicion_alta:condicion_alta,
causa_egreso:causa_egreso,destino_referimiento:destino_referimiento,equipo_medico:equipo_medico,
diag_alta_diag1:diag_alta_diag1,diag_alta_diag2:diag_alta_diag2,diagnostico_autopsia:diagnostico_autopsia,
infeccion_herida:infeccion_herida,morta_post:morta_post,morta_int:morta_int,diag_alta_diag3:diag_alta_diag3,diag_alta_diag4:diag_alta_diag4
},
method:"POST",
dataType:'json',
success: function(response){
if(response.status == 2){
$('._resultwrwre').html('<p class="alert alert-danger ">'+response.message+'</p>');
} else if(response.status ==3){
$('._resultwrwre').html('<p class="alert alert-danger ">'+response.message+'</p>');

}else if(response.status ==4){
	
$('._resultwrwre').html('<p class="alert alert-danger ">'+response.message+'</p>');

}
else if(response.status ==5){
	
$('._resultwrwre').html('<p class="alert alert-danger ">'+response.message+'</p>');

}

else if(response.status ==6){
	
$('._resultwrwre').html('<p class="alert alert-danger ">'+response.message+'</p>');

}
else if(response.status ==7){
	
$('._resultwrwre').html('<p class="alert alert-danger ">'+response.message+'</p>');

}
else if(response.status ==8){
	
$('._resultwrwre').html('<p class="alert alert-danger ">'+response.message+'</p>');

}
else{
$('._resultwrwre').html('<p class="alert alert-success ">'+response.message+'</p>');
$('.updateConEg').prop('disabled',false);
}


},
  error: function(jqXHR, textStatus, errorThrown) {
	  
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('._resultwrwre').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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