
<span id="refresh-cond">
<h4 class="h4 his_med_title">conclucion diagnostica (<b><?=$count_conc?> regitros (s)</b>)


</h4>
<?php if ($count_conc > 0)
{


 foreach($concluciones as $row)
{

//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
?>
<div class="pagination">
<a class="con-pop-cl" title="Creado por :<?=$row->inserted_by?> , fecha : <?=$inserted_time?>" data-toggle="modal" data-target="#ver_con_d" href="<?php echo base_url("admin_medico/show_con_by_id/$row->id_cdia/$historial_id/$user_id")?>">
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
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Plan</label>
<div class="col-md-6">
<textarea class="form-control required-patient-inputs" id="plan" ></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-6">
<input type="text" id="on_input_cied" class="form-control on_input_cied" > 
<div class="cied_result"></div>
</div>

</div>
 
<div class="form-group">
<label class="control-label col-md-2" >Procedimiento (CIE-9):</label>
<div class="col-md-6">
<input type="text" id="on_input_pro" class="form-control on_input_pro" > 
<div class="pro_result"></div>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2" ><span style="color:red"><strong>*</strong></span> Evolucion (Paciente subsecuente):</label>
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
</span>
<div class="modal fade" id="ver_con_d"  role="dialog" tabindex="-1"  >
<div class="modal-dialog" >
<div class="modal-content" >

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
    var str= $(".on_input_cied").val();
$(".cied_result").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');

if(str == "") {
$( ".cied_result" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_cied?value="+str+"&id_pat="+id_pat, function( data ){
$(".cied_result").html(data); 
			   
});
}
}



$('.on_input_pro').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff2, 1000)
});


//--------------------------------------------------------------------------------
function doStuff2() {
	var id_pat="<?=$id_historial?>";
var str= $('.on_input_pro').val();
$(".pro_result").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');

if(str == "") {
$( ".pro_result" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_pro?value="+str+"&id_pat="+id_pat, function( data ){
$(".pro_result").html(data); 
			   
});
}
}

</script>