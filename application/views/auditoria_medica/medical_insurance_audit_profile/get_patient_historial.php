<?php
$hasta1 = date("d-m-Y", strtotime($hasta));
$desde1 = date("d-m-Y", strtotime($desde));
?>
<style>
.alert-danger{padding:2px}
#exponent{vertical-align:super;font-size;1%}
</style>
<hr id="hr_ad"/>
<h4>HISTORIAL CLINICA</h4>
<?php
 $paciente=$this->db->select('nombre')->where('id_p_a',$id_patient)
->get('patients_appointments')->row('nombre');
echo"<h5 style='text-transform:uppercase'>$paciente (PROCEDIMIENTO : $procedimiento)</h5>";

?>
<div class="col-md-12" style="background:#EBE9E9;">

<div class="col-md-5" style="border-right:1px solid #38a7bb">
<ol>
<?php 
foreach($get_patient_historial as $row)
{
	$when = date("d-m-Y", strtotime($row->updated_time))
?>
<li>
<a style="cursor:pointer;text-transform:uppercase" class="click-show-enf-act" ><?=$when;?> - Dr. <?=$row->updated_by;?></a>
<span class="show-enf-act" style="display:none">
<ul><li><strong>CAUSA DE ATENCION</strong><br/><?=$row->enf_motivo;?></li></ul>
<ul><li><strong>ENFERDAD ACTUAL</strong><br/> <?=$row->signopsis;?></li></ul><br/>
</span>
</li>
<?php 
}
?>
</ol>

<h6><a style="cursor:pointer" class="click-show-diag" >DIAGNOSTICO CIE-10</h6>
<ul style="display:none" class="show-diag">
<?php foreach($show_diagno_pat as $cie10)
{
?>

<li><?=$cie10->code?> <?=$cie10->description?></li>

<?php
}
?>

</ul>
</div>
<div class="col-md-7" >
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


<?php foreach($thump as $transf) ?>
<table  class="table table-striped table-bordered" width="100%;" cellspacing="0" id="hide-all-validation">

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
<table style="display:none" class="table table-striped table-bordered show-table" width="100%;" cellspacing="0">
<tr style="background:rgb(219,219,219);">
<th style="width:3px"># Reclamacion</th>
<th style="width:20px;" class="glosado">Monto Glosado</th>
<th style="width:430px;" class="glosado">Causa</th> 
</tr>

<tr>
<td class="val1"><?=$transf->numauto?></td>
<td   class="val2">RD$ <?=number_format("$transf->totpagseg",2)?></td>
<td>
<form   method="post">
<textarea  id="causa" style="border-color:white" placeholder="Escribir la razon" class="form-control text-validation-no"></textarea>
<br/><button   class="btn btn-primary btn-sm save_info" type="submit" >Guardar</button>
</form>

</td>
</tr>
<?php

?>
</table>
<td style="width:10px;" id="show-generate-report1">
<!------------------------------------------GENERATE FINAL REPORT---------------------------------------------->
<form style="display:none" method="get" class="generate-report-from" target="_blank" action="<?php echo base_url("admin_medico/medical_insurance_audit_profile_print_view")?>" >
<input type="hidden"  name ="desde" value = "<?=$desde?>"/>
<input type="hidden" name ="hasta" value = "<?=$hasta?>"/>
<input type="hidden" name ="medico" value = "<?=$medico?>"/>
<input type="hidden" name ="id_patient" value = "<?=$id_patient?>"/>
<input type="hidden" name ="id_seguro" value = "<?=$id_seguro?>"/>
<button class="btn btn-primary btn-sm" type="submit" class="generate-report">Generar Reporte</button>
</form>

</td>
<div id="result"></div>
</div>
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
//$('a').on('click','.click-show-enf-act',function(e){	
$('.click-show-enf-act').click(function() {	
$(this).next('span.show-enf-act').slideToggle("slow");

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
var numauto = "<?=$transf->numauto?>";
var totpagseg = "<?=$transf->totpagseg?>";
var causa = $("#causa").val();
var medico = "<?=$medico?>";
var id_seguro = "<?=$id_seguro?>";
var idfacc = "<?=$transf->idfacc?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/save_medical_insurance_audit_profile')?>",
data: {id_patient:id_patient,desde:desde,hasta:hasta,numauto:numauto,totpagseg:totpagseg,causa:causa,medico:medico,idfacc:idfacc,id_seguro:id_seguro},
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
var numauto = "<?=$transf->numauto?>";
var totpagseg = "<?=$transf->totpagseg?>";
var medico = "<?=$medico?>";
var idfacc = "<?=$transf->idfacc?>";
var id_seguro = "<?=$id_seguro?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/save_medical_insurance_audit_profile')?>",
data: {id_patient:id_patient,desde:desde,hasta:hasta,numauto:numauto,totpagseg:totpagseg,causa:causa,medico:medico,idfacc:idfacc,id_seguro:id_seguro},
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
$(".save_info").prop("disabled", true);
$(".generate-report-from").show();
}  
});
}
});
</script>