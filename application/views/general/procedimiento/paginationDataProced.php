<?php
foreach($query_paginate->result() as $row)
$user_a1=$this->db->select('name')->where('id_user',$row->user_id)->get('users')->row('name');
$user_a2=$this->db->select('name')->where('id_user',$row->user_id)->get('users')->row('name');

$dataProced=$this->db->select('*')->where('id',$row->con_id_link)->get('emergency_conclucion_alta')->row_array();
$inserted1 = date("d-m-Y H:i:s", strtotime($dataProced['inserted_time']));
$update1 = date("d-m-Y H:i:s", strtotime($dataProced['updated_time']));
?>
<br/>
<div  class="col-md-12">
 <hr id="hr_ad"/>
 <em style='font-size:12px'>creado por <?=$user_a1?>, <?=$inserted1?> -- cambiado por <?=$user_a2?>, <?=$update1?></em><br/>
 <button type='button' id='crear-proced' class="btn btn-xs btn-primary">Crear nuevo</button>
 <?php if($row->user_id==$user_id || $perfil=="Admin") {?>

<button type="button"  class="show_proc btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="save_proc_hide" class="btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id_linkd/0/0/examfis")?>"  style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>


</div>
<div  class="col-md-12 form-horizontal disable-all" >
 <hr id="hr_ad"/>
<div class="form-group">
<label class="control-label  col-md-2" > Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-10">
<!--<input type="text" id="on_input_cied2" autocomplete="off" class="form-control on_input_cied" ><br/> -->
<div id="patientCie10"></div>
<div id="show-selected-cie10" style='display:none'></div>
<div class="cied_result"></div>
</div>
</div>
<?php if($dataProced['otros_diagnos'] !="") {?>
<div class="form-group otros-diagnos">
<label class="control-label col-md-2" >Otros diagnosticos (opcional)</label>
<div class="col-md-6">
<textarea  class="form-control"  id="otros_diagnos2"  ><?=$dataProced['otros_diagnos']?></textarea>
</div>

</div>
<?php }?>
<div class="form-group">
<label class="control-label col-md-2" > Juicio Clinico</label>
<div class="col-md-10">
<textarea  class="form-control reset-est" id="juicio_clinico2" rows='6' ><?=$dataProced['juicio_clinico']?></textarea>

</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Estado de Alta</label>
<div class="col-md-6">
<textarea  class="form-control reset-est" id="estado_alta2" rows='4' ><?=$dataProced['estado_alta']?></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Destino</label>
<div class="col-md-6">
<select  class="form-control select2"   id="destino2"  >
<option><?=$dataProced['destino']?></option>
<option>casa</option>
<option>hopitalizacion</option>
<option>morgue</option>
<option>alta a peticion</option>
<option>referido</option>
<option>fuga</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label  col-md-2" >Equipo Medico</label>
<div class="col-md-6">
<?php $medico1=$this->db->select('name')->where('id_user',$dataProced['id_user'])->get('users')->row('name');?>
<div class="input-group">
<span class="input-group-addon"><span style='float:left'>Doc(a) <?=$medico1?></span></span>
</div>
<textarea  class="form-control reset-est" id="equipo_medico2" rows='6' >
<?=$dataProced['equipo_medico']?>
</textarea>
</div>
</div>
<input  type="hidden"   value="<?=$centro_id?>" id="centro" >
<br/>
<!--<button type="submit"  class="btn btn-primary btn-xs">
<i class="fa fa-plus" aria-hidden="true"> Indicar</i>
</button>-->

</div>



<script>
$(".disable-all :input").prop("disabled", true);


$(".show_proc").on('click', function (e) {
	$('.show_proc').hide();
	$("#save_proc_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
})


$("#save_proc_hide").on('click', function (e) {
var otros_diagnos = $("#otros_diagnos2").val();
var juicio_clinico = $("#juicio_clinico2").val();
var estado_alta = $("#estado_alta2").val();
var destino = $("#destino2").val();
var equipo_medico = $("#equipo_medico2").val();
$.ajax({
url:"<?php echo base_url(); ?>emergency/updateProced",
data: {id:<?=$row->con_id_link?>,otros_diagnos:otros_diagnos.trim(),juicio_clinico:juicio_clinico.trim(),estado_alta:estado_alta.trim(),destino:destino,equipo_medico:equipo_medico.trim()},
method:"POST",
success:function(data){
	$('.show_proc').slideDown();
	$("#save_proc_hide").hide();
	$(".disable-all :input").prop("disabled", true);
}
});
})




$('#crear-proced').on('click', function(event) {
	$("#content-proced").hide();
	$("#hide-proced").show();
});



patientCie10();
function patientCie10()
{
$("#patientCie10").fadeIn().html('<span class="load"> <img   src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/patientCie10",
data: {id_con_d:<?=$row->con_id_link?>,origine:1},
method:"POST",
success:function(data){
$('#patientCie10').html(data);
}
});
}
</script>