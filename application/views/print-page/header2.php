<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px;border-color:white}

  td { border:none;padding: 1em; border-bottom:1px solid #E6E6E6;}

  .td-head { border-right: none; border-left: none;border-color:white}


</style>

<?php
$centro_name=$centroInfo['name'];
$rnc=$centroInfo['rnc'];
$centro_logo=$centroInfo['logo'];
$primer_tel=$centroInfo['primer_tel'];
$segundo_tel=$centroInfo['segundo_tel'];
$barrio=$centroInfo['barrio'];
$calle=$centroInfo['calle'];
?>

<table style="width:100%">
<tr>
<td><img style="width:80px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  /></td>
<td >
<h3><?=$centro_name?></h3>
<strong>Tel :</strong> <?=$primer_tel?> <?=$segundo_tel?> <strong>RNC : </strong><?=$rnc?> <strong>Ubicación :</strong> <?=$calle?>, <?=$barrio?>, <?=$centro_prov?>, <?=$centro_muni?> 
</td>

</tr>
</table>

<p style='text-align:center'><strong><?=$title?></strong></p>
<table  align="left" style="width:100%" class='r-b' >
<tr>
	<td>
	<?php
	
	echo $photo;
	?>
	
	</td>
		<td style="text-transform:uppercase;"><strong><?=$paciente['nombre']?>  </strong></td>

		<td style="text-align:center">
		<table class="r-b" style="width:100%;border-collapse: collapse; border-spacing: 0;">
		<tr>
		<td>
		<?=$logoseg?>
		</td>
		<td style="text-align:center">
		<?php
		$afiliado=$paciente['afiliado'];
		if($paciente['afiliado'] !=""){echo "$afiliado ";}
		if($paciente['plan'] !=""){echo "$plan";}
		?>
		</td>
		<?php if($centroInfo['type'] !='privado' && $nss) {?>
		<td style="text-align:center;text-transform:lowercase"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></td><td></td>
		<?php } ?>
		</tr>

		</table>
		</td>
		
	</tr>



<tr style="background:rgb(192,192,192);color:white">

		<td><strong>Cedula</td>
		<td><strong>Nacionalidad</strong></td>
		<td><strong>Edad</strong></td>
		<td style='width"70px'><strong>Telefonos</strong></td>
		<td></td>
	</tr>

	<tr>
		<td style="" > <?=$paciente['cedula']?></td>
		<td style=""><?=$paciente['nacionalidad']?></td>
		<td style=""><?=getPatientAge($paciente['date_nacer'])?></td>
		<td style=""><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
		<td style=""></td>
	</tr>
</table>



<?php
function getPatientAge($birthday) {

$age = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age = ($years < 2) ? '1 año' : "$years años";
} else {
$age = '';
if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age);
}

?>