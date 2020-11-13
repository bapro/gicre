<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px} 
    tr { border-top: solid 1px gray border-bottom: solid 1px gray; } 
    td { border-right: none; border-left: none;padding: 1em; }
</style>
</head>

<?php 
foreach ($cirugia_toracico->result() as $rowp)
?>
<p style="color:red;text-align:right;font-size:10px"><i>fecha de impresión <?=date("d-m-Y H:i");?></i> </p>
<table class='r-b'  >
<tr>
<td  style="text-align:right"><strong> HORA INICIO:</strong></td><td>  <?=$rowp->hora_inicio;?></td>
<td style="text-align:right"><strong> HORA FINALIZACION:</strong></td><td> <?=$rowp->hora_final;?></td>
</tr>
</table>
<hr/>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong> DIAGNOSTICO PRE-FBC:</strong> </td><td> <?=$rowp->diag_pre_fbc;?> </td>
</tr>
</table>
<hr/>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong> S/V:</strong></td><td>  <?=$rowp->svta;?></td>

<td style="text-align:right"><strong> mmhg.:</strong></td><td>  <?=$rowp->mmhg;?></td>

<td style="text-align:right"><strong> l/min.:</strong></td><td>  <?=$rowp->minfr;?></td>

<td style="text-align:right"><strong> Res/min.:</strong></td><td>  <?=$rowp->resmin;?></td>

</tr>
</table>

<table class='r-b'  >
<tr>
<td style="text-align:right"><strong>TA:</strong></td><td>  <?=$rowp->tacir;?></td>

<td style="text-align:right"><strong>FC:</strong></td><td>  <?=$rowp->fccir;?></td>

<td style="text-align:right"><strong>FR:</strong></td><td>  <?=$rowp->frcir;?></td>

<td style="text-align:right"><strong>SATO2:</strong></td><td>  <?=$rowp->sato2;?></td>

</tr>

</table>
<hr/>
<table class='r-b'  >

<tr>
<td style="text-align:right"><strong> FOSAS NASALES:</strong></td><td>  <?=$rowp->fosas_nasales;?></td>

<td style="text-align:right"><strong> CUERDAS BOCALES:</strong></td><td>  <?=$rowp->cuerdad_bocales;?></td>

</tr>

<tr>
<td style="text-align:right"><strong> TRAQUEA:</strong></td><td>  <?=$rowp->traqua_text;?></td>

<td style="text-align:right"><strong> CARINA:</strong></td><td>  <?=$rowp->carina_text;?></td>

</tr>

</table>
<hr/>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong> BRONQUIO PRINCIPAL DERECHO:</strong></td><td>  <?=$rowp->bronquio_principal;?></td>

<td style="text-align:right"><strong> LSD, LM, LID:</strong></td><td>  <?=$rowp->lsd_lm;?></td>
</tr>
<tr>
<td style="text-align:right"><strong> BRONQUIO PRINCIPAL IZQUIERDO:</strong></td><td>  <?=$rowp->bronquio_prince_iz;?></td>

<td style="text-align:right"><strong> LSI, LII:</strong></td><td>  <?=$rowp->lsi_lii;?></td>

</tr>

</table>
<hr/>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong> CEPILLADO BRONQUIAL:</strong> </td>
<td> <?php
    if ($rowp->cepillado_bronquial ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
	?>
	<input type="checkbox"  <?=$selected?>> 
	</td>
<td style="text-align:right"><strong> LAVADO BRONCOALVEOLAR:</strong> </td>
<td> <?php
    if ($rowp->lavado_bronco ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
	?>
	<input type="checkbox" <?=$selected?>> 
	</td>
	
<td style="text-align:right"><strong> BRONCOASPIRADO:</strong> </td>
<td> <?php
    if ($rowp->broncoas ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
	?>
	<input type="checkbox" <?=$selected?>> 
	</td>
</tr>
<tr>
<td style="text-align:right"><strong> BIOPSIA BRONQUIAL:</strong> </td>
<td> <?php
    if ($rowp->biopsia_bronq ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
	?>
	<input type="checkbox" <?=$selected?>> 
	</td>	
	<td style="text-align:right"><strong> BIOPSIA TRASBRONQUIAL:</strong> </td>
<td> <?php
    if ($rowp->biopsia_tras ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
	?>
	<input type="checkbox" <?=$selected?>> 
	</td>
	
	
		<td style="text-align:right"><strong> PUNCION TRASBRONQUIAL:</strong> </td>
<td> <?php
    if ($rowp->puncion_tras ==0){
	$selected="";
	}
	else
	{
	$selected="checked='checked'";
	}
	?>
	<input type="checkbox" <?=$selected?>>
	</td>
	<td></td><td></td>
</tr>
</table>
<hr/>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong> COMPLICACIONES:</strong></td><td>  <?=$rowp->complic_text;?></td>
</tr>

<tr>
<td style="text-align:right"><strong>  DIAGNOSTICO POST-FBC:</strong></td><td>  <?=$rowp->diag_post_fbc;?></td>

</tr>
</table>
<hr/>
<?php
 $doc=$this->db->select('name,exequatur')->where('id_user',$rowp->user)
 ->get('users')->row_array(); 
 
     $sello_doc=$this->db->select('sello')->where('doc',$rowp->user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}
?>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong><i>Dr</strong> <?=$doc['name']?></i></td>

<td style="text-align:right"><strong><i>Exequatur</strong> <?=$doc['exequatur']?></i></td>
<td style="text-align:right;color:red"><?=date("d-m-Y H:i:s", strtotime($rowp->inserted_time));?></i></td>
</tr>

</table>

<br/><br/><br/>

<table class='r-b' align="center" >
<tr>
<td style="text-align:center">
<?php 
$firma_doc="$rowp->user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<hr />
<span style="font-size:11px" title="sdfsdf"><strong>Firma autorizada y sello del medico</strong></span> 
</td>
<?=$sello?>
</tr>
</table>




</html>