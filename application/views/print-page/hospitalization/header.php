<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
 <style>
 .hr{border-bottom:1px solid #D3D3D3}
.one {
  margin: 10px 20px;
    padding: 20px;
    width: 180px;
    float: right;
}
.trbgc{background:rgb(229, 228, 226);color:white}
 table { border-collapse: collapse; witdh:100%;} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 8px; text-align:left;font-size:12px}
	p{font-size:10px}
	
	.footer {
 position: fixed;
    bottom: 120px;
    width: 100%;
	color:red;
	text-align:right;
	font-size:11px

}
 </style>
</head>
<body>
<?php 
$this->load->view('getPatientAge');
function dateDiffInDays($date1, $date2) {
    
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);
  
    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}

?>
 <div class='hr'>
 <table  id='header-table' >
<tr>
<td>
<img style="width:100px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  />
</td>
<td>
<h2  align="center"> <?=$centro_name?></h2>
<p><strong>TEL:</strong> <?=$primer_tel?> </p>
 <p><strong>RNC: </strong><?=$rnc_centro?></p>
<p ><strong>UBICACIÓN:</strong> <?=$calle?>, <?=$barrio?>, <?=$centro_prov?>, <?=$centro_muni?> </p>
</td>

</tr>
</table>
</div>
<h3 style="color:red;text-align:center">HOSPITALIZACIÓN</h3>
<?php if($print_title !="ADMISION HOSPITALARIA"){?>
 <div class='hr'>
<table  align="left" style="width:100%" class='r-b' >
<tr>
		
		<td style="text-transform:uppercase;"><strong><?=$pacient_name?></strong></td>

		<td style="text-align:center">
		<table class="r-b" style="width:100%;border-collapse: collapse; border-spacing: 0;">
		<tr>
		<td>
		<?=$logoseg?>
		</td>
		<td style="text-align:center">
		<?php
		if($pacient_afiliado !=""){echo "$pacient_afiliado ";}
		if($pacient_plan !=""){echo "$pacient_plan";}
		?>
		</td>
		<?php
		if($nss) {?>
		<td style="text-align:center;text-transform:lowercase"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></td><td></td>
		<?php } ?>
		</tr>

		</table>
		</td>
		
	</tr>



<tr class="trbgc">
        <td><strong>#HCE</strong></td>
		<td><strong>Cédula</strong></td>
		<td><strong>Nacionalidad</strong></td>
		<td><strong>Edad</strong></td>
		<td style='width"70px'><strong>Teléfonos</strong></td>
		<td></td>
	</tr>

	<tr>
	<td> <?=$hce?></td>
		<td> <?=$pacient_cedula?></td>
		<td><?=$pacient_nacionalidad?></td>
		<td><?=getPatientAge($date_nacer)?></td>
		<td><?=$pacient_tel?></td>
		<td style="text-transform: lowercase;"></td>
	</tr>
</table>
</div>

<br/>
 <div class='hr'>
  <strong><?=$print_title?></strong>
  <br/>
<table  align="left" style="width:100%" class='r-b' >
<tr class="trbgc">
<td><strong>Sala</strong></td>
<td><strong>Fecha de ingreso</strong></td>
<td><?php if($print_title =="CONCLUSIÓN DE EGRESO"){echo "<strong>Fecha de egreso</strong>";}?></td>
<td><?php if($print_title =="CONCLUSIÓN DE EGRESO"){echo "<strong>Tiempo en cama</strong>";}?></td>
<td><?php if($orden_time !==""){echo "<strong>Fecha de la orden medica</strong>";}?></td>
<td><strong>Causa</strong></td>
</tr>
<tr>
<td><?=$mapa_de_cama['sala']?></td>
<td><?= date("d-m-Y H:i:s", strtotime($sala['timeinserted']))?></td>
<td><?php if($print_title =="CONCLUSIÓN DE EGRESO"){echo date("d-m-Y H:i:s", strtotime($sala['fecha_alta']));}?></td>
<td>
<?php if($print_title =="CONCLUSIÓN DE EGRESO"){
	
$dateDiff = dateDiffInDays(date("d-m-Y H:i:s", strtotime($sala['timeinserted'])), date("d-m-Y H:i:s", strtotime($sala['fecha_alta'])));
  if($dateDiff==0){
	  echo "1 día";
  }else{
	printf($dateDiff . " día(s) ");
  }

	}
	
	?>
	</td>
<td><?= $orden_time?></td>
<td><?=$sala['causa']?></td>
</tr>
</table>
</div>

<?php } ?>
 
