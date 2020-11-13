<?php
$hasta1 = date("d-m-Y", strtotime($hasta));
$desde1 = date("d-m-Y", strtotime($desde));
?>
<style>
.alert-danger{padding:2px}
#exponent{vertical-align:super;font-size;1%}
.hide-fist-generate{display:none}
</style>
<hr id="hr_ad"/>
<h4>HISTORIAL CLINICA (<?=$centro_medico?>)</h4>
<?php
 $paciente=$this->db->select('nombre')->where('id_p_a',$id_patient)
->get('patients_appointments')->row('nombre');
echo"<h5 style='text-transform:uppercase'>$paciente (PROCEDIMIENTO : $procedimiento)</h5>";

?>
<div class="col-md-12" style="background:#EBE9E9;border:1px solid #38a7bb">

<ul>
<?php 
$i=1;
foreach($get_patient_historial as $row)
{
$when = date("d-m-Y", strtotime($row->updated_time));
$diagno=$this->db->select('diagno_def,con_id_link')->where('p_id',$id_patient)->where('user_id',$medico)->where('centro_medico',$centro)->get('h_c_diagno_def_link')->row_array();
$cie10=$this->db->select('code,description')->where('idd',$diagno['diagno_def'])->get('cied')->row_array();
$cby= $this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$otros_diag= $this->db->select('otros_diagnos')->where('historial_id',$id_patient)->get('h_c_conclusion_diagno')->row('otros_diagnos');

?>

<p class="click-show-enf-act"><?php echo $i; $i++;  ?> - <a style="cursor:pointer;text-transform:uppercase"  ><?=$when;?> - Dr. <?=$cby;?></a></p>
<div class="show-enf-act" style="display:none">
<li><strong>CAUSA DE ATENCION</strong> <?=$row->enf_motivo;?></li>
<li><strong>ENFERDAD ACTUAL</strong> <?=$row->signopsis;?></li>
<?php if($diagno['diagno_def'] !=""){?>
<li><strong>DIAGNOSTICO CIE-10</strong> <?=$cie10['code'];?>  <?=$cie10['description'];?></li>
<?php }  if ($otros_diag !=""){ ?>
<li><strong>OTRO DIAGNOSTICO</strong> <?=$otros_diag;?></li>
<?php } ?>
<br/>
</div>

<?php 
}
?>
</ul>
</div>

<div class="col-md-12" style="background:#EBE9E9;border:1px solid #38a7bb">
<div class="row">
<div class="col-md-3 form-group">
    
<h6>MEDICAMENTOS <a id="<?=$id_patient?>" class="get-this-one2 round-billing" style="cursor:pointer" >(<?=$num_count?>)</a></h6>
<i  class="fa fa-long-arrow-down arrow1 billing-arrow" style="font-size:14px;display:none" aria-hidden="true"></i>
	  
    </div>
    <div class="col-md-3 form-group">
 <h6>LABORATORIOS <a id="<?=$id_patient?>" class="get-this-one3 round-billing" style="cursor:pointer" >(<?=$num_count_lab?>)</a></h6>
<i  class="fa fa-long-arrow-down arrow2 billing-arrow" style="font-size:14px;display:none" aria-hidden="true"></i>
    </div>
	    <div class="col-md-3 form-group">
     
    <h6>ESTUDIOS <a id="<?=$id_patient?>" class="get-this-one4 round-billing" style="cursor:pointer" >(<?=$num_count_es?>)</a></h6>
<i class="fa fa-long-arrow-down arrow3 billing-arrow" style="font-size:14px;display:none" aria-hidden="true"></i>

    </div>

</div>
<div class="show-medicamento" style="display:none; overflow-x:auto">
 <hr id="hr_ad"/>
<table class="table table-striped table-bordered " id="medicamento"  cellspacing="0">

    <tr style="background:#38a7bb;color:white">
	 <th class="table-center-all">MEDICAMENTOS</th>
		 <!--<th>Presentacion</th>
		 <th>Frecuencia</th>
		  <th><strong>Via</strong></th>
        <th>Cantidad (dias)</th>-->
		
     </tr>

    <?php foreach($patient_med_audit as $row)
	 
	 {
		$insert_date = date("d-m-Y H:i:s", strtotime($row->insert_date));
	 ?>
        <tr class="this-tr-med table-center-all">
		
		<td class="this-td-med table-center-all">
		<?=$row->medica;?>
			<a id="<?=$row->medica?>"  class="get-med-name round-billing" title="Desplegar" style="cursor:pointer">(<?=$row->Total;?>)</a>
		<div  class="push-down-med table-center-all" style="display:none" ></div>
		</td>
		<!--<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?></td>
		<td><?=$row->cantidad;?></td>-->
	
           
        </tr>
		
	 <?php
	 }
	 ?>
     
</table>
</div>
<div class="show-laboratorio" style="display:none; overflow-x:auto">
 <hr id="hr_ad"/>
<table class="table table-striped table-bordered"  style="font-size:15px;text-aling :center;font-size:12px;"  cellspacing="0">
<tr style="background:#38a7bb;color:white">
<!--<th class="table-center-all" style="width:370px;text-aling :center">Fecha</th>-->
<th class="table-center-all" style="text-aling :center">LABORATORIOS</th>


</tr>

<?php foreach($patient_lab_audit as $row)

{
$lab=$this->db->select('name')->where('id',$row->laboratory)
->get('laboratories')->row('name');
$insert_date = date("d-m-Y H:i:s", strtotime($row->insert_time));
?>
<tr>

<td class="table-center-all" style="text-aling :center"><?=$lab;?> 

<a id="<?=$row->laboratory?>"  class="get-lab-name round-billing" title="Desplegar" style="cursor:pointer"><?=$row->Total;?></a>
<div  class="push-down-lab" style="display:none"></div>
</td>
<?php } ?>
</tr>

</table>
</div>

<div class="show-estudio" style="display:none; overflow-x:auto">
 <hr id="hr_ad"/>
<table class="table table-striped table-bordered"  style="font-size:13px;"  cellspacing="0">
<tr style="background:#38a7bb;color:white">
<th>FECHA</th>
<th>ESTUDIO</th>
<th>PARTE DEL CUERPO</th>
<th>LATERALIDAD</th>
<th>OBSERVACIONES</th>

</tr>

    <?php foreach($IndicacionesPreviasEstudios as $row)
	  {
	 ?>
        <tr>
		<td><?=$row->insert_date;?></td>
		<td><?=$row->estudio;?></td>
		<td><?=$row->cuerpo;?></td>
		<td><?=$row->lateralidad;?></td>
		<td><?=$row->observacion;?></td>
		 </tr>
		
	 <?php
	 }
	 ?>
     
</table>

</div>
</div>


<table  class="table" width="100%;" style="border:1px solid #38a7bb" cellspacing="0" >

<tr>
<th style="width:430px"><span style="float:right;">Validacion</span></th>

<td style="width:10px" id="hide-validation-up">

<!--------------------------------------- WHEN THUMP UP------------------------------------------------------>
<button type="submit"  class="fa fa-thumbs-up validation" style="float:right;color:green;cursor:pointer;border:none;background:none"></button>
<!--<span id="exponent">(fac. # 4565)</span>-->
</td>
<td style="width:10px" >
<i class="fa fa-thumbs-down validate-no" style="float:right;color:gray;cursor:pointer"></i>
</td>
</tr>
</table> 
<!---------------------------------------FORM WHEN THUMP DOWN------------------------------------------------------>
<table style="display:none" class="table show-table" width="100%;" cellspacing="0">
<tr style="background:rgb(219,219,219);">
<th style="width:3px"># Reclamacion</th>
<th style="width:20px;" class="glosado">Monto Glosado</th>
<th style="width:430px;" class="glosado">Causa</th> 
</tr>

<tr>
<td class="val1"><?=$numauto?></td>
<td   class="val2">RD$ <?=number_format("$totalpaseg",2)?></td>
<td>
<form   method="post">
<textarea  id="causa" style="border-color:white" placeholder="Escribir la razon" class="form-control text-validation-no"></textarea>
<br/><button   class="btn btn-primary btn-sm save_info" type="submit" >Guardar</button>
</form>

</td>
</tr>

</table>
<table class="table" width="100%;">
<tr>
<td style="width:60px" colspan="2"></td>
<td>
<form style="display:none" method="get" class="generate-report-from" target="_blank" action="<?php echo base_url("admin_medico/medical_insurance_audit_profile_print_view")?>" >
<input type="hidden"  name ="desde" value = "<?=$desde?>"/>
<input type="hidden" name ="hasta" value = "<?=$hasta?>"/>
<input type="hidden" name ="medico" value = "<?=$medico?>"/>
<input type="hidden" name ="id_patient" value = "<?=$id_patient?>"/>
<input type="hidden" name ="id_seguro" value = "<?=$id_seguro?>"/>
<button class="btn btn-primary btn-sm" type="submit" class="generate-report">Generar Reporte</button>
</form>
</td>
</tr>
</table>
<div id="result"></div>

<script>
$('.get-this-one2').click(function() {
//$('.arrow1').slideDown("slow");
$('.arrow1').slideToggle("slow");
$('.arrow2').hide();
$('.arrow3').hide();
$('.show-laboratorio').hide();
$('.show-estudio').hide();
//$('.show-medicamento').slideDown("slow");
$('.show-medicamento').slideToggle("slow");
 $('html, body').animate({scrollTop: '+=150px'}, 800);
});

//======================================================
$('.get-this-one3').click(function() {
$('.arrow1').hide();
$('.arrow3').hide();
$('.show-medicamento').hide();
$('.show-estudio').hide();
//$('.arrow2').slideDown("slow");
$('.arrow2').slideToggle("slow");
//$('.show-laboratorio').slideDown("slow");
$('.show-laboratorio').slideToggle("slow");
 $('html, body').animate({scrollTop: '+=150px'}, 800);
});


//======================================================
$('.get-this-one4').click(function() {
$('.arrow1').hide();
$('.arrow2').hide();
$('.show-medicamento').hide();
$('.show-laboratorio').hide();
//$('.arrow3').slideDown("slow");
$('.arrow3').slideToggle("slow");
//$('.show-estudio').slideDown("slow");
$('.show-estudio').slideToggle("slow");
 $('html, body').animate({scrollTop: '+=150px'}, 800);
});

//========================================================

$('.validate-no').click(function() {
$(this).css("color","red");
$('.show-table').slideDown("slow");
$("#hide-validation-up").hide();
$('html, body').animate({scrollTop: '+=150px'}, 800);
});

//=====================================================================================================================
$(document).ready(function() {
$('p.click-show-enf-act').click(function() {	
$(this).next('div.show-enf-act').slideToggle("slow");

});	
$('.click-show-diag').click(function() {	
$('span.show-diag').slideToggle("slow");

});	
	
$('.get-lab-name').click(function() {
var lab_id = $(this).attr('id');
var id_patient ="<?=$id_patient?>";
var el = $(this).closest('td').find('.push-down-lab');
$.get( "<?php echo base_url();?>admin_medico/get_lab_name?id_patient="+id_patient+"&lab_id="+lab_id, function( data ){
//$("#push-down-lab").html(data).slideToggle("slow");
el.html(data).slideToggle("slow"); 
}); 
 
});


$('.get-med-name').click(function() {
var med_name = $(this).attr('id');
var id_patient ="<?=$id_patient?>";
var el = $(this).closest('td').find('.push-down-med');
//el.fadeIn().html('<span class="load"> <img  width="70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "GET",
url: "<?=base_url('admin_medico/get_med_name')?>",
data: {med_name:med_name,id_patient:id_patient},
cache: true,
success:function(data){ 
el.html(data).slideToggle("slow");
}  
});
});  
});




function patient_factura_data()
{
var dess = $("#desde").val();
var hass = $("#hasta").val();
var medico = "<?=$medico?>";  
var id_seguro = "<?=$id_seguro?>";

$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/patient_factura_data')?>",
data: {dess:dess,hass:hass,medico:medico,id_seguro:id_seguro},
cache: true,
success:function(data){ 
$("#patient-factura-data").html(data);
}  
});

}


$(".validation").click(function(){
var id_patient = "<?=$id_patient?>";
var desde = "<?=$desde?>";
var hasta = "<?=$hasta?>";
var numauto = "<?=$numauto?>";
var totpagseg = "<?=$totalpaseg?>";
var causa = $("#causa").val();
var medico = "<?=$medico?>";
var id_seguro = "<?=$id_seguro?>";
var idfac = "<?=$idfac?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/save_medical_insurance_audit_profile')?>",
data: {id_patient:id_patient,desde:desde,hasta:hasta,numauto:numauto,totpagseg:totpagseg,causa:causa,medico:medico,idfac:idfac,id_seguro:id_seguro},
cache: true,

 error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#result').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
success:function(data){ 
alert("Hecho !");
patient_factura_data();
$(".validation").hide();
$(".validate-no").hide();
$(".generate-report-from").show();

}  
});

})



//===============save ==============================
$('.save_info').on('click', function(event){
event.preventDefault();
var causa = $("#causa").val();
if(causa==""){
$("#causa").css("border-color","red");
} else{
$("#causa").css("border-color","white");
var id_patient = "<?=$id_patient?>";
var desde = "<?=$desde?>";
var hasta = "<?=$hasta?>";
var numauto = "<?=$numauto?>";
var totpagseg = "<?=$totalpaseg?>";
var medico = "<?=$medico?>";
var idfac = "<?=$idfac?>";
var id_seguro = "<?=$id_seguro?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/save_medical_insurance_audit_profile')?>",
data: {id_patient:id_patient,desde:desde,hasta:hasta,numauto:numauto,totpagseg:totpagseg,causa:causa,medico:medico,idfac:idfac,id_seguro:id_seguro},
cache: true,
 error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#result').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
success:function(data){ 
alert("Hecho !");
patient_factura_data();
$("#causa").val("");
$(".validation").hide();
$(".validate-no").hide();
$(".save_info").hide();
$(".generate-report-from").show();
}  
});
}
});
</script>