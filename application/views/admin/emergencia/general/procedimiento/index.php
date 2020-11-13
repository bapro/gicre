<br/>
<?php
$seguro_namep=$this->db->select('title')->where('id_sm',$id_seguro)->get('seguro_medico')->row('title');
 $sqlp = "select id_c_taf, sub_groupo from  centros_tarifarios where groupo LIKE 'procedimiento' AND centro_id=$centro_id AND seguro_id=$id_seguro GROUP BY sub_groupo";
	$proc= $this->db->query($sqlp);
	$tpro=$proc->num_rows();
	$shto="<em style='font-size:11px'>($tpro registros)</em>";
if($proc->result() !=NULL){
$titlePro="Seleccionar Procedimientos Realizados $shto";
$disabledPro='';
}else{
$titlePro="No hay procedimientos en el tarifio por $seguro_namep";	
$disabledPro='disabled';
}
?>
<h4 class="h4 his_med_title">Procedimiento Realizados</h4>
<div  class="col-md-6">
<div class="input-group">
<select  class="form-control  select2" id="emer-proc" <?=$disabledPro?> >
<option value=''><?=$titlePro?></option>
<?php 
foreach($proc->result() as $row)
{ 
echo '<option value="'.$row->id_c_taf.'">'.$row->sub_groupo.'</option>';
}
?>
</select>
<span class="input-group-addon"><button type='button' id='save-pro'><i class="fa fa-arrow-right" aria-hidden="true"></i></button></span>

</div>

</div>
<div  class="col-md-6">
<div  style="top:20px;height:200px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">
	
<div id="load-procedimientos"></div>
</div>

</div>
<div  class="col-md-12">
<hr id="hr_ad"/>
<h4 class="h4 his_med_title">Conclusion de Alta</h4>
</div>
<div id='paginateProced'></div>
<div id="content-proced"></div>
<div  class="col-md-12 form-horizontal" id="hide-proced">
<hr id="hr_ad"/>
<div class="form-group">
<label class="control-label  col-md-2" ><strong style='color:red'>*</strong> Diagnostico(s) Presuntivo o Definitivo (CIE10):</label>
<div class="col-md-10">
<input type="text" id="on_input_cied" autocomplete="off" class="form-control on_input_cied" ><br/> 
<div id="show-selected-cie10" style='display:none'></div>
<div class="cied_result"></div>
</div>
</div>

<div class="form-group otros-diagnos" style="display:none">
<label class="control-label col-md-2" >Otros diagnosticos (opcional)</label>
<div class="col-md-6">
<textarea  class="form-control"  id="otros_diagnos"  ></textarea>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" ><strong style='color:red'>*</strong> Juicio Clinico</label>
<div class="col-md-10">
<textarea  class="form-control reset-est" id="juicio_clinico" rows='6' ></textarea>

</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" ><strong style='color:red'>*</strong> Estado de Alta</label>
<div class="col-md-6">
<textarea  class="form-control reset-est" id="estado_alta" rows='4' ></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Destino</label>
<div class="col-md-6">
<select  class="form-control select2"   id="destino"  >
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
<label class="control-label  col-md-2" ><strong style='color:red'>*</strong> Equipo Medico</label>
<div class="col-md-6">
<?php $medico1=$this->db->select('name')->where('id_user',$user_id)->get('users')->row('name');?>
<div class="input-group">
<span class="input-group-addon"><span style='float:left'>Doc(a) <?=$medico1?></span></span>
</div>
<textarea  class="form-control reset-est" id="equipo_medico" rows='6' >
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

//-----------paginate-------------------------
function paginateProced(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/paginatePocedimiento",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>,centro_id:<?=$centro_id?>},
method:"POST",
success:function(data){
$('#paginateProced').html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#paginateProced').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});
}

paginateProced();


//--------------------------------------------------------------------------------
var timer = null;
$('.on_input_cied').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff1, 1000)
});
doStuff1();
function doStuff1() {
    var str= $(".on_input_cied").val();
	var id_cdia="";
	var tab= "exam-1";
	var origine=1;
$(".cied_result").fadeIn().html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(str == "") {
$( ".cied_result" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_cied?value="+str+"&id_pat="+<?=$id_historial?>+"&tab="+tab+"&user_id="+<?=$user_id?>+"&centro_medico="+<?=$centro_id?>+"&id_cdia="+id_cdia+"&origine="+origine, function( data ){
$(".cied_result").html(data); 
			   
});
}
}
//---------------------------------------------------------------------------------------------------------
loadProcedimiento();
function loadProcedimiento(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/loadProcedimiento",
data: {user_id:<?=$user_id?>,id_historial:<?=$id_historial?>},
method:"POST",
success:function(data){
$("#load-procedimientos").html(data);
},
});
}

//---------------------------------------------------------------------------------------


$('#save-pro').on('click', function(event) {
event.preventDefault();
if($('#emer-proc').val() !=""){
$('#save-pro').prop('disabled',true);
$.ajax({
url:"<?php echo base_url(); ?>emergency/saveProced",
data: {name:$('#emer-proc').val(),user_id:<?=$user_id?>,id_historial:<?=$id_historial?>},
method:"POST",
success:function(data){
$("#emer-proc.select2").val('').trigger('change');
loadProcedimiento();
$('#save-pro').prop('disabled',false);	
}
});
}else{
	alert('Campo Vacio');
}
});

</script>