<?php

foreach($show_con_by_id as $row)

$user_c38=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c39=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');



$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));

?>

<style>
@media (min-width: 768px) {
  .modal-inc-width {
    width: 900;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}
</style>
<div class="modal-header"  id="background_">
<div id="testsdfs"></div>
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<h5 class="modal-title"  >Conclusion Diagnostic # <?=$row->id_cdia?></h5>
 <span style='color:green'><?=$centro_name?></span><br/>
<span>Creado por <?=$user_c38?>, <?=$inserted_time?></span> <br/> 
<span style="color:red"> Cambiado por <?=$user_c39?>, <?=$updated_time?></span> 

 </div>
<div class="modal-body" >
<?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>
<button type="button" class="show_modif_con_diag btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php } ?>
<button type="button" id="save_con_diag_hide" class="save_con_diag_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 <a target="_blank" href="<?php echo base_url("printings/print_if_foto_/$row->id_cdia/0/0/diag")?>"  style="cursor:pointer" title="Imprimir Conclusion Diagnostico" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
<hr id="hr_ad"/>
<form  class="form-horizontal disable-all" >
<input type="hidden" id="updated_by" value="<?=$user_id?>">
<input type="hidden" id="id_cdia" value="<?=$row->id_cdia;?>"> 
<input type="hidden" id="historial_id1" value="<?=$row->historial_id;?>"> 
<div class="form-group">
<label class="control-label col-md-2" >Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-10">
<div id="patientCie10"></div>
<input type="text" autocomplete="off" class="form-control on_input_cied on_input_cied_d" style="display:none"> 
<br/>
<div class="cied_result_d"></div> 
  
 
</div>

</div>
<?php if($row->otros_diagnos !="") {?>
<div class="form-group otros-diagnos1">
<label class="control-label col-md-2" >Otros diagnosticos</label>
<div class="col-md-10">
<textarea  class="form-control" rows="8"  id="otros_diagnos1" disabled><?=$row->otros_diagnos?></textarea>
</div>
</div>
<?php } ?>
<div class="form-group">
<label class="control-label col-md-2" >Plan</label>
<div class="col-md-10">
<textarea rows="8" class="form-control" id="plan1"  disabled><?=$row->plan?></textarea>
</div>

</div>
 <div class="form-group">
  <?php
 $id_segd=$this->db->select('seguro_medico')->where('id_p_a',$row->historial_id)->get('patients_appointments')->row('seguro_medico');
 $seg_nd=$this->db->select('title')->where('id_sm',$id_segd)->get('seguro_medico')->row('title');
 
 ?>
<label class="control-label col-md-2" > Procedimiento</label>
<div class="col-md-10">
<textarea rows="6" class="form-control" id="proced2" disabled><?=$row->procedimiento?></textarea>
<h4><?=$seg_nd?></h4>
  <select class="form-control select-con"   id="tarif-proced2" >
  <option value=''>Seleccionar</option>
  <?php 
  $sqlptd = "select id_tarif, procedimiento,monto FROM tarifarios WHERE id_seguro=$id_segd AND id_doctor=$user_id GROUP BY procedimiento";
	$proctd= $this->db->query($sqlptd);
foreach($proctd->result() as $rowdpf)
{ 
echo '<option value="'.$rowdpf->id_tarif.'">'.$rowdpf->procedimiento.' (RD$'.$rowdpf->monto.')</option>';
}
?>
  </select>

<div id="loadProcedimientoFacData">

</div>


</div>

</div>

<div class="form-group">
<label class="control-label col-md-2">Evolucion (Paciente subsecuente):   </label>
<div class="col-md-10">
<textarea rows="8" class="form-control" id="evolucion1"  disabled><?=$row->evolucion?></textarea>

</div>

</div>

<div class="form-group">
<label class="control-label col-md-2"> </label>
<div class="col-md-6">
<?php
if($row->conclusion_radio =="Mejoria"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='Mejoria' $selected disabled/> <label>Mejoria</label>&nbsp;";

if($row->conclusion_radio =="Empeorando"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='Empeorando' $selected disabled/> <label>Empeorando</label>&nbsp;";

if($row->conclusion_radio =="No mejoria"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='No mejoria' $selected disabled/> <label>No mejoria</label>&nbsp;";
?>
</div>

</div>

</form>
</div>




<script>
$('#tarif-proced2').on('change', function(event) {
event.preventDefault();
if($(this).val() !=''){
$('#loadProcedimientoFacData').html('Agregando...');
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/save_hist_tarif_pro",
data: {id_tarif:$(this).val(),id_cd:<?=$row->id_cdia?>,id_historial:<?=$row->historial_id?>, user_id:<?=$user_id?>},
method:"POST",
success:function(data){
$('#loadProcedimientoFacData').html(data);
},

});
}
});
//----------------------------------------------------------------------------------------------------------
loadProcedimientoFacData();
function loadProcedimientoFacData(){
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/loadProcedimientoFacData",
data: {id_cd:<?=$row->id_cdia?>,patient:<?=$row->historial_id?>, user_id:<?=$user_id?>},
method:"POST",
success:function(data){
$("#loadProcedimientoFacData").html(data);
},

});
}



//-------------FETCH PATIENT CIE10------------------------------------------------------------------------------------------
patientCie10();
function patientCie10()
{
$("#patientCie10").fadeIn().html('<span class="load"> <img  width="70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var id_con_d ="<?=$row->id_cdia;?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/patientCie10",
data: {id_con_d:id_con_d,origine:<?=$origine?>},
method:"POST",
success:function(data){
$('#patientCie10').html(data);
}
});
}


//-------------FETCH PATIENT CIE10------------------------------------------------------------------------------------------


var timer1 = null;
$('.on_input_cied').keydown(function(){
       clearTimeout(timer1); 
       timer1 = setTimeout(doStuff11, 1000)
});

function doStuff11() {
	var id_pat="<?=$historial_id?>";
    var str= $(".on_input_cied_d").val();
	var centro_medico="<?=$centro_medico?>";
	var user_id="<?=$user_id?>";
	var id_cdia="<?=$row->id_cdia?>";
var tab="exam-2";
$(".cied_result_d").fadeIn().html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(str == "") {
$( ".cied_result_d" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_cied?value="+str+"&id_pat="+id_pat+"&tab="+tab+"&centro_medico="+centro_medico+"&user_id="+user_id+"&id_cdia="+id_cdia, function( data ){
$(".cied_result_d").html(data); 
			   
});
}
}






</script>