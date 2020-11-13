<?php
$desde1 = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($desde)));
$hasta1 = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y", strtotime($hasta)));
?>
<hr id="hr_ad"/>
<div style="overflow-x:auto;">
<?php
 $paciente=$this->db->select('nombre')->where('id_p_a',$id_patient)
->get('patients_appointments')->row('nombre');
echo"<h3>Historial clinica de : $paciente</h3>";

//get docid to display report
 $docid=$this->db->select('doctor')->where('id_patient',$id_patient)
->get('rendez_vous')->row('doctor');
?>

<table  class="table table-striped table-bordered" width="100%;" cellspacing="0">

<tr style="background:rgb(219,219,219);">
<th class="col-xs-2">CAUSA DE ATENCION </th>
<th class="col-xs-2">HISTORIA DE LA ENFERDAD ACTUAL </th>
<th class="col-xs-2">DIAGNOSTICO CIE-10</th>
<th class="col-xs-2">PROCEDIMIENTO</th>
<th >MEDICAMENTOS</th>
<th class="col-xs-2">LABORATORIOS</th>
<th class="col-xs-2">ESTUDIOS</th>
</tr> 
<?php 
foreach($get_patient_historial as $row)
{
?>
<tr>
<td><?=$row->enf_motivo;?></td>
<td><?=$row->signopsis;?></td>
<td>
<?php foreach($show_diagno_pat as $cie10)
{
$idd=$this->db->select('code, description')
 ->get('cie_desc')->row_array();

?>
<?=$idd['code']?> <?=$idd['description']?>
<?php
}

?>

</td>
<td>
<?php foreach($show_diagno_pro_pat as $cie9)
{
$id=$this->db->select('name')->where('id',$cie9->procedimiento)
 ->get('type_diagnostic_procedures')->row_array();

?>
<?=$id['name']?>
<?php
}

?>
</td>
<td>
<a id="<?=$id_patient?>" class="get-this-one2 round" style="cursor:pointer" ><?=$num_count?></a>
<br/><br/><i style="font-size:27px;margin-left:14px;color:green;display:none" class="fa fa-long-arrow-down arrow1" aria-hidden="true"></i>
</td>
<td>
<a id="<?=$id_patient?>" class="get-this-one3 round" style="cursor:pointer"><?=$num_count_lab?></a>
<br/><br/><i style="font-size:27px;margin-left:14px;color:green;display:none" class="fa fa-long-arrow-down arrow2" aria-hidden="true"></i>

</td>
<td>
<a id="<?=$id_patient?>" class="get-this-one4 round" style="cursor:pointer"><?=$num_count_es?></a>
<br/><br/><i style="font-size:27px;margin-left:14px;color:green;display:none" class="fa fa-long-arrow-down arrow3" aria-hidden="true"></i>

</td>
</tr>
<?php 

}
?>
</tbody>  
 
</table>


<!--
<div style="display:none;border-color:green;height:auto;text-align:center;background:#e4f0d5;color:green;font-weight:bold"  class="form-control text-validation-yes">


<?php

echo "<p>Desde : $desde1, Hasta :$hasta1 </p>";
$condition = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "'";
$this->db->select("SUM(totpagseg) as tot");
$this->db->where($condition);
$this->db->from('factura2');
$r0=$this->db->get()->row()->tot;
$r0f=number_format($r0,2);
echo "<p>Total Monto Autorizado :<span style='color:blue'>RD$ $r0f</span></p>";

?>
</div>-->
<textarea style="display:none;border-color:red" placeholder="Escribir la razon" class="form-control text-validation-no"></textarea>


<div class="show-medicamento" style="display:none">
 <hr class="title-highline-top"/>
<table class="table table-striped table-bordered "  style="font-size:12px"  cellspacing="0">

    <tr style="background:rgb(219,219,219);">
	   <th><strong>Fecha</strong></th>
        <th>Medicamento</th>
		 <th>Presentacion</th>
		 <th>Frecuencia</th>
		  <th><strong>Via</strong></th>
        <th>Cantidad (dias)</th>
		
     </tr>

    <?php foreach($IndicacionesPrevias as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_date;?></td>
		<td><?=$row->medica;?></td>
		<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?></td>
		<td><?=$row->cantidad;?></td>
	
           
        </tr>
		
	 <?php
	 }
	 ?>
     
</table>
</div>
<div class="show-laboratorio" style="display:none">
 <hr class="title-highline-top"/>
<table class="table table-striped table-bordered"  style="font-size:12px;"  cellspacing="0">
<tr style="background:rgb(219,219,219);">
<th>Fecha</th>
<th>Laboratorio</th>


</tr>

    <?php foreach($IndicacionesLab as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_time;?></td>
		<td><?=$row->laboratory;?></td>
		 </tr>
		
	 <?php
	 }
	 ?>
     
</table>
</div>




<div class="show-estudio" style="display:none">
 <hr class="title-highline-top"/>
<table class="table table-striped table-bordered"  style="font-size:12px;"  cellspacing="0">
<tr style="background:rgb(219,219,219);">
<th>Fecha</th>
<th>Estudio</th>
<th>Parte del cuerpo</th>
<th>Lateralidad</th>
<th>Observaciones</th>

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
<table  class="table table-striped table-bordered" width="100%;" cellspacing="0">
<?php foreach($thump as $transf) ?>
<tr>
<th style="width:430px"><span style="float:right;">Validacion</span></th>
<td style="width:10px">
<form  method="get" id="send" action="<?php echo base_url("admin/generate_report_p_ars")?>" target='_blank'>
<input type="hidden" name="id_patient" value="<?=$id_patient?>"/>
<input type="hidden" name="desde" value="<?=$desde?>"/>
<input type="hidden" name="numauto" value="<?=$transf->numauto?>"/>
<input type="hidden" name="totpagseg" value="<?=$transf->totpagseg?>"/>
<input type="hidden" name="hasta" value="<?=$hasta?>"/>
<input type="hidden" name="medico" value="<?=$docid?>"/>
<input type="hidden" name="causa" value=""/>
<button type="submit" class="fa fa-thumbs-up" style="float:right;font-size:30px;color:green;cursor:pointer;border:none;background:none"></button>
</form>


</td>
<td style="width:10px">
<i class="fa fa-thumbs-down validate-no" style="float:right;font-size:30px;color:gray;cursor:pointer"></i>
</td>
</tr>
</table> 
<table style="display:none" class="table table-striped table-bordered show-table" width="100%;" cellspacing="0">
<tr style="background:rgb(219,219,219);">
<th style="width:3px"># Reclamacion</th>
<th style="width:20px;" class="glosado">Monto Glosado</th>
<th style="width:430px;" class="glosado">Causa</th> 
</tr>
<?php foreach($thump as $mt)
{
?>
<tr>
<td><?=$mt->numauto?></td>
<td><?=$mt->totpagseg?></td>
<td>
<form  method="get" id="send" action="<?php echo base_url("admin/generate_report_p_ars")?>" target='_blank'>
<input type="hidden" name="id_patient" value="<?=$id_patient?>"/>
<input type="hidden" name="desde" value="<?=$desde?>"/>
<input type="hidden" name="numauto" value="<?=$transf->numauto?>"/>
<input type="hidden" name="totpagseg" value="<?=$transf->totpagseg?>"/>
<input type="hidden" name="hasta" value="<?=$hasta?>"/>
<input type="hidden" name="medico" value="<?=$docid?>"/>
<textarea name="causa" style="border-color:white" placeholder="Escribir la razon" class="form-control text-validation-no"></textarea>
<br/><button class="btn btn-primary btn-sm" type="submit" class="generate-report">Generar Reporte</button>
</form>

</td>
</tr>
<?php
}
?>
</table>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
</div>
<script>
$('.get-this-one2').click(function() {
$('.arrow1').slideDown("slow");
$('.arrow2').hide();
$('.arrow3').hide();
$('.show-laboratorio').hide();
$('.show-estudio').hide();
$('.show-medicamento').slideDown("slow");
 $('html, body').animate({scrollTop: '+=150px'}, 800);
});
//======================================================
$('.get-this-one3').click(function() {
$('.arrow1').hide();
$('.arrow3').hide();
$('.show-medicamento').hide();
$('.show-estudio').hide();
$('.arrow2').slideDown("slow");
$('.show-laboratorio').slideDown("slow");
 $('html, body').animate({scrollTop: '+=150px'}, 800);
});


//======================================================
$('.get-this-one4').click(function() {
$('.arrow1').hide();
$('.arrow2').hide();
$('.show-medicamento').hide();
$('.show-laboratorio').hide();
$('.arrow3').slideDown("slow");
$('.show-estudio').slideDown("slow");
 $('html, body').animate({scrollTop: '+=150px'}, 800);
});

//========================================================

$('.validate-no').click(function() {
$(this).css("color","red");
$('.show-table').slideDown("slow");
$('html, body').animate({scrollTop: '+=150px'}, 800);
});


</script>