<h4 class="h4 his_med_title">conclucion diagnostica (<b><?=$count_conc?> regitros (s)</b>)

</h4>
<?php if ($count_conc > 0)
{


 foreach($concluciones as $row)
{

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');
?>
<div class="pagination">
<a class="con-pop-cl" title="<?=$centro?> &#013 Creado por :<?=$row->inserted_by?> , fecha : <?=$inserted_time?>&#013 Cambiado por :<?=$row->updated_by?>, fecha :<?=$updated_time?>" data-toggle="modal" data-target="#ver_con_d" href="<?php echo base_url("admin_medico/show_con_by_id/$row->id_cdia/$id_historial/$user_id/$row->centro_medico")?>">
#<?=$row->id_cdia;?>
</a></div>
<?php
}
?>

<div class="con-pop-load"></div>

<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>

<div class="col-md-12 move_left" id="reload-cond" >
<br/>

<hr class="prenatal-separator"/>

<div  id="flashe" class="col-md-12 form-horizontal">
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-6">
<input type="text" id="on_input_cied" autocomplete="off" class="form-control on_input_cied" ><br/> 
<div class="cied_result"></div>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Plan</label>
<div class="col-md-6">
<textarea class="form-control required-patient-inputs" id="plan" ></textarea>
</div>

</div>

 <div class="form-group">
<label class="control-label col-md-2" > Procedimiento</label>
<div class="col-md-6">
<textarea class="form-control" id="proced" ></textarea>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Evolucion (Paciente subsecuente):</label>
<div class="col-md-6">
<textarea class="form-control required-patient-inputs" id="evolucion"  ></textarea>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="Mejoria" checked> <label>Mejoria</label>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="Empeorando"> <label>Empeorando </label>
</div>
<div class="col-md-3">
<input type="radio" id="conclusion_radio" name="conclusion_radio" value="No mejoria" > <label>No mejoria  </label>

</div>
</div>
</div>
</div>
<script>
var timer = null;
$('.on_input_cied').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff1, 1000)
});

function doStuff1() {
	var id_pat="<?=$id_historial?>";
	var user_id="<?=$user_id?>";
	var centro_medico="<?=$centro_medico?>";
    var str= $(".on_input_cied").val();
	var id_cdia="";
	var tab= "exam-1";
$(".cied_result").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');

if(str == "") {
$( ".cied_result" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_cied?value="+str+"&id_pat="+id_pat+"&tab="+tab+"&user_id="+user_id+"&centro_medico="+centro_medico+"&id_cdia="+id_cdia, function( data ){
$(".cied_result").html(data); 
			   
});
}
}
</script>