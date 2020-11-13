<?php
foreach($query_paginate->result() as $rowExF){
$user_c22=$this->db->select('name')->where('id_user',$rowExF->inserted_by)->get('users')->row('name');
$user_c23=$this->db->select('name')->where('id_user',$rowExF->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($rowExF->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($rowExF->updated_time));
?>
<em style='font-size:12px'>creado por <?=$user_c22?>, <?=$inserted_time?> -- cambiado por <?=$user_c23?>, <?=$update_time?></em>
<br/><br/>
<button type='button' id='crear-nuevo-signo-n' class="btn btn-xs btn-primary">Crear nuevo</button>
<button type='button' id='cancel-this-nota' class="btn btn-xs btn-default" title="Eliminar nota <?=$inserted_time?>" >Eliminar</button>
<div  class="form-horizontal" >
<div class="col-md-12" >
<div id='reload-table-signo'></div>
</div>
<div class="col-md-12 disable-all" style="overflow-x:auto;"  >

<table class="table"  cellspacing="0" >
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td class="ida" ><br/><br/>
<label  class="col-sm-3 control-label">Peso</label>
<div class="input-group">
	<input class="form-control"  id="pesoex" value="<?=$rowExF->peso?>" type="text" >
   <span class="input-group-addon">lb</span>
   <input class="form-control" id="kgex" value="<?=$rowExF->kg?>" type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>

</td>
<td title="Tension Arterial" style=""><br/><br/>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (mm)</span>

<input class="form-control"  id="taex" value="<?=$rowExF->ta?>" type="text"> 
</div>
</div>

<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (hg)</span>

<input class="form-control " id="hgex" value="<?=$rowExF->hg?>"  type="text">
</div>
</div>
</td>
<td style="width:1px" >
<br/>
<br/>
<?php
if($rowExF->radio =="Sano"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='Sano' $selected /> Sano";
?>
 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;">

<label  class="col-sm-2 control-label">Talla</label>
<div class="col-sm-8">
<div class="input-group">
<input class="form-control" title="talla en metro" id="tallaex"  type="text" value="<?=$rowExF->talla?>"  type="text">
   <span class="input-group-addon">m</span>
</div>
</div>


</td>
<td style="width:5px;">
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-3" title="Frecuencia respiratoria">
<div class="input-group">
<input class="form-control" id="frex" value="<?=$rowExF->fr?>" type="text" >

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-4 col-sm-offset-1">
<div class="input-group" title="Temperatura">
<input class="form-control " id="tempoex" value="<?=$rowExF->tempo?>" type="text" >
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<?php
if($rowExF->radio =="Agudamente enferma"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='Agudamente enferma' $selected /> Agudamente enferma";
?></td>
</tr>



<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-7">
	<div class="input-group">
		<input class="form-control formatnum" id="imcex" value="<?=$rowExF->imc?>" type="text" >
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label">Fc</label>
<div class="col-sm-3">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="fcex" value="<?=$rowExF->fc?>" type="text" >

</div>
</div>
<label  class="col-sm-2 control-label">Pulso</label>
<div class="col-sm-4 col-sm-offset-1">
<div class="input-group">
<input class="form-control " id="pulsoex" type="text" value="<?=$rowExF->pulso?>" >
<span class="input-group-addon">Pm</span>

</div>
</div>
</td>
<td style="width:1px" >
<?php
if($rowExF->radio =="Cronicamente enferma"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='Cronicamente enferma' $selected /> Cronicamente enferma";
?></td>
</tr>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="col-sm-3 control-label">Glicemia</label> 
<div class="col-sm-4">
	<div class="input-group">
<input class="form-control" id="glicemiae" value="<?=$rowExF->glicemia?>"  type="text">

<i class="fa fa-warning glicemiae" style='color:red;display:none'>Glicemia anormal !</i>
	   
	</div>
</div>
 </td>
<td style="width:5px;font-weight:bold">
<label  class="col-sm-1 control-label"> Sat O2(%)</label>
<div class="col-sm-3">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="satoee" value="<?=$rowExF->satoe?>" type="text">

</div>
</div>
<label  class="col-sm-2 control-label">FCF</label>
<div class="col-sm-3">
<div class="input-group">
<input class="form-control " id="fcfe" value="<?=$rowExF->fcf?>" type="text">

</div>
</div>
</td>
<td style="width:1px" >
</td>
</tr>

</table>
 <div class="form-horizontal">
  <div class="form-group">
      <label class="control-label" >Nombre de la nota:</label>
	  	<input type="text" class="form-control" id="searchNombreNotaEd" value="<?=$rowExF->nombre_nota?>"/>
     
		<div id="suggesstion-nombre"></div>
		
    </div>
	
<div class="form-group">
<label class="control-label" >Description De Nota</label>
<textarea rows="6" cols="15" class="form-control active-me" id="hallazgoe" ><?=$rowExF->hallazgo?></textarea>
</div>
</div>
</div>
 <hr id="hr_ad"/>
 <?php if($rowExF->inserted_by==$user_id || $perfil=="Admin") {?>

<button type="button"  class="show_modif_exam_fis btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="update-signo-n" class="btn-sm btn-success save_exam_fis_hide" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$rowExF->id/0/0/examfis")?>"  style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

<?php } ?>

<script>


$("#searchNombreNotaEd").keyup(function(){
		$.ajax({
		type: "POST",
	url:"<?php echo base_url(); ?>hospitalizacion/getNotaName",
		data:{keyword:$(this).val(),edit:2},
    beforeSend: function(){
			$("#searchNombreNotaEd").css("background","#DCDCDC");
		},
	success: function(data){
			$("#suggesstion-nombre").show();
			$("#suggesstion-nombre").html(data);
      $("#searchNombreNotaEd").css("background","");
		},
  		});
	});

//To select country name
function selectNotaName2(val) {
$("#searchNombreNotaEd").val(val);
$("#suggesstion-nombre").hide();
}




$('#crear-nuevo-signo-n').on('click', function(event) {
	$(".hide-signo-vitales-n").show();
	$("#content-signo-vitales-n").hide();
	paginateSignosVitalesN();

});

$('#cancel-this-nota').on('click', function(event) {
event.preventDefault();
if (confirm("Quires eliminar nota <?=$inserted_time?>")) {
 $.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/eliminarHospNota')?>",
data: {id:<?=$rowExF->id?>},
success:function(data){
	paginateSignosVitalesN();
$('#cancel-this-nota').html('Eliminado').prop('disabled',true);
},
});
}
})



$('#update-signo-n').on('click', function(event) {
event.preventDefault();

var updated_by = $("#updated_by").val();
var id_sig  = $("#id_sig").val();

 //save examen fisico
 
 //------Signos vitales--------------------------
var peso = $("#pesoex").val();
var kg = $("#kgex").val();
var talla = $("#tallaex").val();
var imc = $("#imcex").val();
var ta = $("#taex").val();
var fr = $("#frex").val();
var fc = $("#fcex").val();
var hg = $("#hgex").val();
var tempo = $("#tempoex").val();
var pulso = $("#pulsoex").val();
var glicemiae = $("#glicemiae").val();
var radio_signo= $("input[name='radio_signoex']:checked").val();
var fcf = $("#fcfe").val();
var satoe = $("#satoee").val();
var hallazgo = $("#hallazgoe").val();
var nombre_nota= $("#searchNombreNotaEd").val();
 $.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/saveUpExamenFisico')?>",
data: {id_sig:<?=$rowExF->id?>,updated_by:<?=$user_id?>,patient_id:<?=$id_patient?>,fcf:fcf,satoe:satoe,hallazgo:hallazgo,
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,who:1,nombre_nota:nombre_nota,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemiae:glicemiae
}, 
success:function(data){
	alert("Cambiado ha sido hecho !");
	//$("#reload-table-signo").load(" #reload-table-signo > *");
	loadSigno();
	$('.show_modif_exam_fis').slideDown();
	$(".save_exam_fis_hide").hide();
$(".disable-all :input").prop("disabled", true);
},

});

});




//--------------------------------------------------------------
$("#pesoex").keyup(function() {
  var peso = $(this).val();
  var talla =$("#tallaex").val();
if(peso==""){
$("#tallaex").prop("disabled", true);
$("#tallaex").val("");
}
else{
$("#tallaex").prop("disabled", false);
};
var ma = peso * 0.45;
$("#kgex").val(ma);

});

//------------------------

$("#tallaex").keyup(function() {
  var talla = $(this).val();
   var kg =$("#kgex").val();
 var talla_result= talla * talla;
//calcul imc
//$('.number').number( myNumber, 2 )
var imc_result = kg / talla_result;
$("#imcex").val(imc_result);
});


$('#imcex').number( true, 2 );
//----------------------------------
$("#top_exam").on('click', function (e) {
e.preventDefault();
})
//---------------------------
$(".select-examsisex").select2({
  tags: true
});	



$(".disable-all :input").prop("disabled", true);
//$(".hide-ant-save").show();

$(".show_modif_exam_fis").on('click', function (e) {
	$('.show_modif_exam_fis').hide();
	$(".save_exam_fis_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
}
)



check_if_glicemia_normale();


var timerGlie = null;
$('#glicemiae').keydown(function(){
       clearTimeout(timerGlie); 
       timerGlie = setTimeout(check_if_glicemia_normale, 1000)
});



function check_if_glicemia_normale() {
	var glicemiae= $('#glicemiae').val();
if (70 >= glicemiae || glicemiae <= 100) {
  $('.glicemiae').hide();
} else{
	$('.glicemiae').slideDown();
}
}



loadSigno();
function loadSigno()
{
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/loadSigno",
data: {id_exam_fis:<?=$rowExF->id?>,historial_id:<?=$id_patient?>},
method:"POST",
success:function(data){
$('#reload-table-signo').html(data);
}
});
}			
</script>