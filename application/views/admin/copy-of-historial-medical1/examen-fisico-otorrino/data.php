<?php 
$sql ="SELECT * FROM h_c_examen_fis_otorrino where idot=$idot ";
$show_exam_ot_by_id = $this->db->query($sql);
 foreach($show_exam_ot_by_id->result() as $rows)
  
$user_c34=$this->db->select('name')->where('id_user',$rows->inserted_by)->get('users')->row('name');
$user_c35=$this->db->select('name')->where('id_user',$rows->updated_by)->get('users')->row('name');
	
 $updated_time = date("d-m-Y H:i:s", strtotime($rows->updated_time)); 
 $inserted_time = date("d-m-Y H:i:s", strtotime($rows->inserted_time)); 
?>
<style>
label{text-transform:lowercase}

.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width10 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title"  >Examen Fisico Otorrino # <?=$idot?></h3>
<h5 class="modal-title"  >Creado por :<?=$user_c34?> | fecha :<?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$user_c35?> | fecha :<?=$updated_time?></span> </h5>
 <?php if($rows->user_id==$user_id || $perfil=="Admin") {?>
<button type="button" class="show_modif_ot btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="save_ot_hide" class="save_ot_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank" href="<?php echo base_url("printings/print_if_foto_/$idot/0/0/examfisoto")?>" style="cursor:pointer" title="Imprimir" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

</div>

<div class="modal-body disable-all" style="max-height: calc(120vh - 210px); overflow-y: auto;">
<div id="resultexd"></div>
<table  class="table"  cellspacing="0" >
<!--row 1-->
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Oido Izquerdo</label>
<div class="col-md-9">
<textarea class="form-control" id="oido1t"  ><?=$rows->oido1?></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Oido Derecho</label>
<div class="col-md-9">
<textarea class="form-control" id="oido2t"  ><?=$rows->oido2?></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Nariz</label>
<div class="col-md-9">
<textarea class="form-control" id="narizt"  ><?=$rows->nariz?></textarea>
</div>

</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Boca</label>
<div class="col-md-9">
<textarea class="form-control" id="bocat"  ><?=$rows->boca?></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Cuello</label>
<div class="col-md-9">
<select class="form-control select2ot" id="otorrino-cuello1t" style="width:100%">
<option><?=$rows->otorrino_cuello1?></option>

</select>
<textarea class="form-control" id="otorrino-cuello2t"  ><?=$rows->otorrino_cuello2?></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-2" >Observaciones</label>
<div class="col-md-9">
<textarea class="form-control" id="observaciones-ott"  ><?=$rows->observaciones_ot?></textarea>
</div>

</div>
</td>
</tr>
</table>

<?php 
if($ExamFisById !=NULL){
foreach($ExamFisById as $rowExF)
$optionsig=0;
?>
<div class="col-md-12" >
<div id='reload-table-signo'></div>
</div>
<div class="col-md-12" >
<div id='reload-table-signo'></div>
</div>
<div class="col-md-12" style="overflow-x:auto;"  >

<table class="table"  cellspacing="0" >
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td class="ida" ><br/><br/>
<label  class="col-sm-2 control-label">Peso</label>
<div class="input-group">
	<input class="form-control"  id="pesoex" value="<?=$rowExF->peso?>" type="text" >
   <span class="input-group-addon">(lb)</span>
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
if($rowExF->radio =="SANO"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='SANO' $selected /> SANO";
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
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group" title="Temperatura">
<input class="form-control " id="tempoex" value="<?=$rowExF->tempo?>" type="text" >
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<?php
if($rowExF->radio =="AGUDAMENTE ENFERMA"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='AGUDAMENTE ENFERMA' $selected /> AGUDAMENTE ENFERMA";
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
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="pulsoex" type="text" value="<?=$rowExF->pulso?>" >
                            <span class="input-group-addon">Pm</span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<?php
if($rowExF->radio =="CRONICAMENTE ENFERMA"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='CRONICAMENTE ENFERMA' $selected /> CRONICAMENTE ENFERMA";
?></td>
</tr>

<tr>

<td style="width:12px">
<label  class="col-sm-2 control-label">Glicemia</label>
<div class="col-sm-7 col-sm-offset-1">
<input class="form-control" id="glicemiaex" value="<?=$rowExF->glicemia?>"  type="text">

<i class="fa fa-warning glicemiae" style='color:red;display:none'>Glicemia anormal !</i>
</div>	   
 </td>

<td style="width:1px" >
</td>
</tr>



</table>

</div>
<?php
}else{
	$optionsig=1;
?>

<table class="table"  cellspacing="0" >
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td class="ida" ><br/><br/>
<label  class="col-sm-2 control-label">Peso</label>
<div class="input-group">
	<input class="form-control"  id="pesoex" type="text" >
   <span class="input-group-addon">(lb)</span>
   <input class="form-control" id="kgex" type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>

</td>
<td title="Tension Arterial" style=""><br/><br/>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (mm)</span>

<input class="form-control"  id="taex" type="text"> 
</div>
</div>

<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (hg)</span>

<input class="form-control " id="hgex"  type="text">
</div>
</div>
</td>
<td style="width:1px" >
<br/>
<br/>
<input type='radio' id='radio_signoex' name='radio_signoex' value='SANO'  /> SANO
 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;">

<label  class="col-sm-2 control-label">Talla</label>
<div class="col-sm-8">
<div class="input-group">
<input class="form-control" title="talla en metro" id="tallaex"  type="text"  type="text">
   <span class="input-group-addon">m</span>
</div>
</div>


</td>
<td style="width:5px;">
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-3" title="Frecuencia respiratoria">
<div class="input-group">
<input class="form-control" id="frex"  type="text" >

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group" title="Temperatura">
<input class="form-control " id="tempoex" type="text" >
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<input type='radio' id='radio_signoex' name='radio_signoex' value='AGUDAMENTE ENFERMA'  /> AGUDAMENTE ENFERMA</td>
</tr>



<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-7">
	<div class="input-group">
		<input class="form-control formatnum" id="imcex" type="text" >
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label">Fc</label>
                    <div class="col-sm-3">
                        <div class="input-group" title="Frecuencia cardiaca">
                            <input class="form-control" id="fcex"  type="text" >
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Pulso</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="pulsoex" type="text" >
                            <span class="input-group-addon">Pm</span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<input type='radio' id='radio_signoex' name='radio_signoex' value='CRONICAMENTE ENFERMA' /> CRONICAMENTE ENFERMA</td>
</tr>

<tr>

<td style="width:12px">
<label  class="col-sm-2 control-label">Glicemia</label>
<div class="col-sm-7 col-sm-offset-1">
<input class="form-control" id="glicemiaex"   type="text">

<i class="fa fa-warning glicemiae" style='color:red;display:none'>Glicemia anormal !</i>
</div>	   
 </td>

<td style="width:1px" >
</td>
</tr>



</table>


</div>
<?php	
	
}
?>
<script>

loadSigno();
function loadSigno()
{
var historial_id  = "<?=$historial_id?>";	
var id_exam_fis  = "<?=$id_exam_fis?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/loadSigno",
data: {id_exam_fis:id_exam_fis,historial_id:historial_id},
method:"POST",
success:function(data){
$('#reload-table-signo').html(data);
}
});
}			



check_if_glicemia_normale();


var timerGlie = null;
$('#glicemiaex').keydown(function(){
       clearTimeout(timerGlie); 
       timerGlie = setTimeout(check_if_glicemia_normale, 1000)
});



function check_if_glicemia_normale() {
	var glicemiae= $('#glicemiaex').val();
if (70 >= glicemiae || glicemiae <= 100) {
  $('.glicemiae').hide();
} else{
	$('.glicemiae').slideDown();
}
}





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


$(".select2ot").select2({
  tags: true
});



$(".disable-all :input").prop("disabled", true);
$(".show_modif_ot").on('click', function (e) {
	$('.show_modif_ot').hide();
	$(".save_ot_hide").prop("disabled", false);
	$(".save_ot_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	})
	
	
	
$('#save_ot_hide').on('click', function(event) {
event.preventDefault();
$(".save_ot_hide").prop("disabled", true);
var oido1 = $("#oido1t").val();
var oido2 = $("#oido2t").val();
var nariz = $("#narizt").val();
var boca = $("#bocat").val();
var otorrino_cuello1 = $("#otorrino-cuello1t").val();
var otorrino_cuello2 = $("#otorrino-cuello2t").val();
var observaciones_ot = $("#observaciones-ott").val();


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
var glicemiae = $("#glicemiaex").val();
var radio_signo= $("input[name='radio_signoex']:checked").val();



 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveUpExamOt')?>",
data: {
oido1:oido1,oido2:oido2,nariz:nariz,boca:boca,otorrino_cuello1:otorrino_cuello1,otorrino_cuello2:otorrino_cuello2,
observaciones_ot:observaciones_ot,updated_by:<?=$user_id?>,idot:<?=$idot?>,id_pat:<?=$historial_id?>,
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,optionsig:<?=$optionsig?>,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemiae:glicemiae,id_signo:<?=$id_exam_fis?>
},

cache: true,
  
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_ot').slideDown();
	$(".save_ot_hide").hide();
$(".disable-all :input").prop("disabled", true);
loadSigno();
} ,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#resultexd').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },   
});
return false;
});	
	
</script>