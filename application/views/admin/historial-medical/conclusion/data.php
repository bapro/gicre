<?php

foreach($show_con_by_id as $row)
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
//$updated_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_time)));	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));

?>


<div class="modal-header"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<div class="col-md-12 col-md-offset-2" >
<h3 class="modal-title"  >Conclusion Diagnostic # <?=$row->id_cdia?> <span style='color:green'>(<?=$centro_name?>)</span></h3>
<h6 class="modal-title"  >Creado por :<?=$row->inserted_by?> | fecha :<?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$row->updated_by?> | fecha :<?=$updated_time?></span> </h6>
<br/>
<button type="button" class="show_modif_con_diag btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<button type="button" id="save_con_diag_hide" class="save_con_diag_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 <a target="_blank" href="<?php echo base_url('printings/print_conc_d/'.$row->id_cdia)?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
 </div>
 </div>
<div class="modal-body" >
<div id="resulttg" ></div>
<form  class="form-horizontal disable-all" >
<input type="hidden" id="updated_by" value="<?=$user?>">
<input type="hidden" id="id_cdia" value="<?=$row->id_cdia;?>"> 
<input type="hidden" id="historial_id1" value="<?=$row->historial_id;?>"> 
<div class="form-group">
<label class="control-label col-md-3" >Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-6">
<div id="patientCie10"></div>
<input type="text" autocomplete="off" class="form-control on_input_cied on_input_cied_d" style="display:none"> 
<br/>
<div class="cied_result_d"></div> 
  
 
</div>

</div>
<div class="form-group">
<label class="control-label col-md-3" >Plan</label>
<div class="col-md-8">
<textarea class="form-control" id="plan1"  disabled><?=$row->plan?></textarea>
</div>

</div>
 <div class="form-group">
<label class="control-label col-md-3" > Procedimiento</label>
<div class="col-md-6">
<textarea class="form-control" id="proced2" disabled><?=$row->procedimiento?></textarea>
</div>

</div>
<!--
<div class="form-group">
<label class="control-label col-md-3" >Procedimiento (CIE-9):  </label>
<div class="col-md-6">
<?php 
$sql ="SELECT procedimiento FROM h_c_diagno_def_proc
 where cond_id_link=$row->id_cdia";
$query = $this->db->query($sql);
$i = 1;
foreach($query->result() as $dr){
	
$procedimiento=$this->db->select('name')
->where('id',$dr->procedimiento)
->get(' type_diagnostic_procedures')->row('name');	

echo $i;
$i++;
?>-<?=$procedimiento;?><br/>
<?php
}
?>


</div>

</div>-->
<div class="form-group">
<label class="control-label col-md-3">Evolucion (Paciente subsecuente):   </label>
<div class="col-md-6">
<textarea class="form-control" id="evolucion1"  disabled><?=$row->evolucion?></textarea>
</div>
<div class="col-md-2">
<?php
if($row->conclusion_radio =="Mejoria"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='Mejoria' $selected disabled/> <label>Mejoria</label>";
?>

</div>
<div class="col-md-2">
<?php
if($row->conclusion_radio =="Empeorando"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='Empeorando' $selected disabled/> <label>Empeorando</label>";
?>

</div>
<div class="col-md-2" >

<?php
if($row->conclusion_radio =="No mejoria"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='No mejoria' $selected disabled/> <label>No mejoria</label>";
?>
</div>
</div>

</form>
</div>

<script>



//-------------FETCH PATIENT CIE10------------------------------------------------------------------------------------------
patientCie10();
function patientCie10()
{
var id_con_d ="<?=$row->id_cdia;?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/patientCie10",
data: {id_con_d:id_con_d},
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
$(".cied_result_d").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');

if(str == "") {
$( ".cied_result_d" ).hide();

}else {
$.get( "<?php echo base_url();?>admin_medico/on_input_cied?value="+str+"&id_pat="+id_pat+"&tab="+tab+"&centro_medico="+centro_medico+"&user_id="+user_id+"&id_cdia="+id_cdia, function( data ){
$(".cied_result_d").html(data); 
			   
});
}
}






</script>