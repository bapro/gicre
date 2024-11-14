<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
    tr { border-top: solid 1px #E6E6E6 border-bottom: solid 1px #E6E6E6; }
    td { border-right: none; border-left: none;border-color:#E6E6E6;}
    div.footer-firma {
      position: absolute;
      width: 80%;
      bottom: 80px;
    }
	
	.center-img {
   width:70%;
   height:70px;
   object-fit:cover;
   object-position:50% 50%;
  }
 #absolute-element-footer2 {
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>
</head>
 <?php
if ($logo_tipo) {
$doc_log_tipo= '<div style="text-align:center"><img class="center-img" src="'.base_url().'/assets/update/'.$logo_tipo.'"  /> </div>';

} else {
$doc_log_tipo=  "<br/><br/><br/>";
}

echo '"'.base_url().'assets/update/'.$logo_tipo.'" ' . $centroInfo['name'];

if (file_exists('<img class="center-img" src="'.base_url().'/assets/update/'.$logo_tipo.'"  />') ){
	echo $doc_log_tipo;
  }





?>
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
