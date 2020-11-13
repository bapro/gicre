<div class="modal-content" >
<div class="modal-header" id="background_">
<h3 class="modal-title" align="center" >Desea realizar factura a este paciente ?</h3>
</div>


<div class="col-sm-6 notme">
<?php if($type=="privado") {
	$hide_me='';
	
	?>

<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-4"> Medico :</label>
<div class="col-sm-7">
<?=$doctor?>
<input id="medico" type="hidden" value="<?=$id_doc?>"  />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"> Exequatur :</label>
<div class="col-sm-3">
<?=$exequatur?>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"> Codigo Prestador :</label>
<div class="col-sm-3">
<?=$cod?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4"> Especialidad :</label>
<div class="col-sm-7">
<?=$title_area?>
</div>
</div>


<input id="servicio" type="hidden" value="<?=$area?>"/>



</form>
<?php } else {
	
	$hide_me='style="display:none"';
	?>
<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-4"> Centro Medico :</label>
<div class="col-sm-8">
<?=$centro?>
<input id="centro_medico" value="<?=$id_cm?>" type="hidden" />
<br/>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"> Codigo Prestador :</label>
<div class="col-sm-3">
<?=$cod?>
</div>
</div>
</form>
<?php } ?>
</div>
<!--
<div class="col-sm-6">
<form  class="form-horizontal"> 
<div class="form-group" <?=$hide_me?>>
<label class="control-label col-sm-3"> Centro Medico :</label>
<div class="col-sm-9">
<?=$centro?>
<input id="centro_medico" value="<?=$id_cm?>" type="hidden" />
<br/>
</div>
</div>

<h3 class="h3" align="center">DATOS DEL PRESTADOR</h3> 
<br/>
<div class="col-sm-6 notme">
<label class="control-label col-sm-3"> CIE10 :</label>
<div class="col-sm-9">


<?php 
$i=1;
foreach($show_diagno_pat as $cie)
{
?><?=$i;$i++?> ) <?php echo "" . $cie->code . " $cie->description <br/>";	
}	
?>



</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Procedimiento :</label>
<div class="col-sm-9">

<?=$procedimiento;?>

</div>
</div>
</form> 
</div>-->
</div>


