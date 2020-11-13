<?php

$name=($this->session->userdata['admin_name']);
$last_name=($this->session->userdata['admin_last_name']);
  ?>

<ul>
<form  id="formSigno" class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?> <?=$last_name?>"> 
<input type="hidden" id="historial_id" value="<?=$historial_id?>"> 

<button class="btn-sm btn-success historial_save"  type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 
 <p id="successAnt" ><i class="fa fa-check" aria-hidden="true"></i> Informaciones guardas con exitos</p>


 <br/>
 <div class="col-xs-12 move_left">
<p class="h4 his_med_title">Navegador</p>
<div id="show_data_select" ></div>
<div class="col-xs-5" id="hide_empty_select"  >

<?php if ($count_signos > 0)
{
	
	?>
<select class="form-control" id="id_sig" >
<option value="">Seleccionar total (<?=$count_signos?>)</option>
<?php 

 foreach($signos as $row)
{ 
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($row->inserted_time)));	
 
?>
<option value='<?=$row->id_sig;?>'>(<?=$row->id_sig;?>) Medico : <?=$row->inserted_by; ?> <br/><br/> Fecha : <?=$inserted_time; ?></option>

<?php
}
?>

</select>
<?php
}

?>

</div>
<div class="col-xs-5" style="display:none" id="resett">
<button style="background:gray;color:white" type="button"><span  class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo registro</button>
</div>
<br/><br/>
<p class="h4 his_med_title">Examenes</p>
<p id="flashh"></p>
<br/>
<div id="show_form_after_select1"></div>
<div id="hide_form_after_select1">

 <div  style="overflow-x:auto;">
<table class="table"  cellspacing="0">
  <tr>
  <th class="col-xs-4"></th><th></th><th>Aspecto General</th>
  </tr>
<tr>

<td class="ida" style="font-weight:bold">
<label  class="col-sm-2 control-label">Peso</label>
<div class="col-sm-5">
<div class="input-group">
	<input class="form-control"  id="peso"  type="text">
   <span class="input-group-addon">lb</span>
</div>
</div>
<div class="col-sm-5">
<div class="input-group">
	<input class="form-control" id="kg"  type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>
</div>
</td>
<td class="linkhover" style="font-weight:bold">
<span class="title">Tension arterial</span>
 <label for="new_discount" class="col-sm-1 control-label">Ta</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="ta"  type="text">
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">/</label>
                    <div class="col-sm-5 col-sm-offset-1">
                       <div class="input-group">
		   <input class="form-control " id="hg"  type="text">
			<span class="input-group-addon">mm/Hg</span>
			
		</div>
                    </div>
</td>
<td style="width:1px" >
<input type="radio" id="radio_signo" name="radio_signo" value="SANO" checked /> SANO	 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
 <label  class="col-sm-2 control-label">Talla</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input class="form-control" id="talla"  type="text" disabled>
                           
                        </div>
                    </div>

</td>
<td class="linkhover" style="width:5px;font-weight:bold">
<span class="titlef">Frecuencia respiratoria / Tempertura</span>
 <label for="new_discount" class="col-sm-1 control-label">Fr</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="fr"  type="text">
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Tempo.</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="tempo"  type="text">
                            <span class="input-group-addon"> &#8451 </span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<input type="radio" id="radio_signo" name="radio_signo" value="AGUDAMENTE ENFERMA"/> AGUDAMENTE ENFERMA 	 		
</td>
</tr>



<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-5">
	<div class="input-group">
		<input class="form-control" id="imc"  type="text">
	   
	</div>
</div>
 </td>
<td class="linkhover" style="width:5px;font-weight:bold">
<span class="titlec">Frecuencia cardiaca </span>
 <label  class="col-sm-1 control-label">Fc</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="fc"  type="text">
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Pulso</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="pulso"  type="text">
                            <span class="input-group-addon">Pm</span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<input type="radio" id="radio_signo" name="radio_signo"  value="CRONICAMENTE ENFERMA"/> CRONICAMENTE ENFERMA		 		
</td>
</tr>

	   
</table>
</div>
</div>
</form>
</ul>
</div>

<script>

//insertion one
$(function() {
	$('#formSigno').on('submit', function(event) {
var peso = $("#peso").val();
var kg = $("#kg").val();
var talla = $("#talla").val();
var imc = $("#imc").val();
var ta = $("#ta").val();
var fr = $("#fr").val();
var fc = $("#fc").val();
var hg = $("#hg").val();
var tempo = $("#tempo").val();
var pulso = $("#pulso").val();
var radio_signo = $('input[type="radio"]:checked').val();
 var inserted_by = $("#inserted_by").val();
var historial_id = $("#historial_id").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveSigno')?>",
data:{peso:peso, kg:kg, talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg, tempo:tempo, pulso:pulso,radio_signo:radio_signo,inserted_by:inserted_by,historial_id:historial_id},

cache: true,
success:function(data){ 
$('#successAnt').fadeIn('slow').delay(3000).fadeOut('slow');
$("#show_all1").html(data);
$("#hide_all1").hide();

}  
});

return false;
});
});

//navegador
$("#id_sig").on('change', function (e) {
e.preventDefault();
$("#flashh").fadeIn(400).html('<span class="load">Mostrando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
url: '<?php echo site_url('admin/show_signo_by_id');?>',
type: 'post',
data:'on_select_show='+$("#id_sig").val(),
success: function (data) {
	$(".historial_save").prop("disabled", true);
	$("#flashh").hide();
	$("#show_form_after_select1").html(data);
	$("#show_form_after_select1").show();
	$("#hide_form_after_select1").hide();
	 $("#resett").show();
	 
	
}

});
});


//refresh
$("#resett").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$historial_id?>';
$.ajax({
url: '<?php echo site_url('admin/signos');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#signoshow").html(data);
	$("#signoshow").show();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#examensisshow").hide();
	$("#home").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
}

});
});


$("#peso").keyup(function() {
  var peso = $(this).val();
  var talla =$("#talla").val();
if(peso==""){
$("#talla").prop("disabled", true);
$("#talla").val("");
}
else{
$("#talla").prop("disabled", false);
};
var ma = peso * 0.45;
$("#kg").val(ma);
//calcul imc

var imc_result = peso * talla * talla;
$("#imc").val(imc_result);
});

//------------------------

$("#talla").keyup(function() {
  var talla = $(this).val();
  var peso =$("#peso").val();

//calcul imc

var imc_result = peso * talla * talla;
$("#imc").val(imc_result);
});