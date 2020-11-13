<?php
foreach($show_oft as $row)
?>
<style>
.minis{text-align:left}
td{font-size:12px}
</style>
<table  style="width:100%;">
<tr>
<td colspan="4"><strong>AGUDESA VISUAL</strong></td>
</tr>
<tr>
<td></td><td><strong>Sin Correccion</strong></td><td><strong>Con Correccion</strong></td><td><strong>Correccion Actual</strong></td>
</tr>
<tr>
<td><strong>OD</strong></td>
<td>
<?=$row->od_sin_con?>
</td>
<td>
<?=$row->od_con_cor?>
</td>
<td>


<?php
if($row->od_mas_o_meno=="mas"){$checked="+";}else{$checked="";}

?> <?=$checked?> 


<?php
if($row->od_mas_o_meno=="menos"){$checked="-";}else{$checked="";}

?> <?=$checked?>
  
<?=$row->od_cor_act?>

</td>
</tr>
<tr>
<td><strong>OS</strong></td>
<td>
<?=$row->os_sin_con?>
</td>
<td>
<?=$row->os_con_cor?>
</td>
</td>
<td>



<?php
if($row->os_mas_o_meno=="mas"){$checked="+";}else{$checked="";}

?> <?=$checked?>


<?php
if($row->os_mas_o_meno=="menos"){$checked="-";}else{$checked="";}

?> <?=$checked?>

<?=$row->os_cor_act?>

</td>
</tr>
</table>
<br/>
<br/>
<br/>
<table>
<tr>
<td colspan="2"><strong>RETINOSCOPIA</strong></td>
</tr>
<tr>
<td>
<table>
<tr >
<td style="border-right:2px solid ">
<?php
if($row->masomenos1==1){$checked="+";}else{$checked="";}

?> <?=$checked?>


<?php
if($row->masomenos1==0){$checked="-";}else{$checked="";}


?> <?=$checked?>


<?=$row->retine1?>

</td>
<td style="border-left:2px">

 <?php
if($row->masomenos2==1){$checked="+";}else{$checked="";}


?> <?=$checked?>


<?php
if($row->masomenos2==0){$checked="-";}else{$checked="";}


?> <?=$checked?>
 
<?=$row->retine2?>
</td>
</tr>
<tr>
<td style="border-top:2px solid ;border-right:2px solid ">
 <?php
if($row->masomenos3==1){$checked="+";}else{$checked="";}

?> <?=$checked?>


<?php
if($row->masomenos3==0){$checked="-";}else{$checked="";}

?> <?=$checked?>
 
<?=$row->retine3?>
</td>
<td style="border-top:2px solid ;border-left:2px solid;">

  <?php
if($row->masomenos4==1){$checked="+";}else{$checked="";}


if($row->masomenos4==0){$checked="-";}else{$checked="";}

?>  <?=$checked?>
 
<?=$row->retine4?>
</td>
</tr>
</table>
</td>
<td>
<table>
<tr >
<td style="border-right:2px solid ">
<?php
if($row->masomenos5==1){$checked="+";}else{$checked="";}

?> <?=$checked?>


<?php
if($row->masomenos5==0){$checked="-";}else{$checked="";}


?> <?=$checked?>


<?=$row->retine5?>

</td>
<td style="border-left:2px">

 <?php
if($row->masomenos6==1){$checked="+";}else{$checked="";}


?> <?=$checked?>


<?php
if($row->masomenos6==0){$checked="-";}else{$checked="";}


?> <?=$checked?>
 
<?=$row->retine6?>
</td>
</tr>
<tr>
<td style="border-top:2px solid ;border-right:2px solid ">
 <?php
if($row->masomenos7==1){$checked="+";}else{$checked="";}

?> <?=$checked?>


<?php
if($row->masomenos7==0){$checked="-";}else{$checked="";}

?> <?=$checked?>
 
<?=$row->retine7?>
</td>
<td style="border-top:2px solid ;border-left:2px solid;">

  <?php
if($row->masomenos8==1){$checked="+";}else{$checked="";}


if($row->masomenos8==0){$checked="-";}else{$checked="";}

?>  <?=$checked?>
 
<?=$row->retine8?>
</td>
</tr>
</table>
</td>
</tr>
</table>
<br/>
<table class="table" style="width:60%;">
<tr>
<td colspan='2' ><strong>BALANCE MUSCULAR</strong></td>
</tr>
<tr>
<td><strong>PPM</strong></td><td><?=$row->ppm?></td>
</tr>
<tr>
<td><strong>Converg</strong></td><td><?=$row->converg?></td>
</tr>
<tr>
<td><strong>Duc. y Vers.</strong></td><td><?=$row->ducvers?></td>
</tr>
<tr>
<td><strong>Cover test.</strong></td><td><?=$row->convertest?></td>
</tr>

</table>

<br/>

<table style="width:100%;">

<tr>
<td>
<table class='r-b' style="width:100%;font-size:18px">
<tr>
<td colspan='3' style='border-bottom:1px solid'><strong>COMPARA HENDIDURA</strong></td>
</tr>
<tr>
<td><strong>Conjuntiva</strong></td>
<td class="minis"><?=$row->conj1?></td>
<td class="minis"><?=$row->conj2?></td>
</tr>
<tr>
<td><strong>Cornea</strong></td>
<td class="minis"><?=$row->cornea1?></td>
<td class="minis"><?=$row->cornea2?></td>
</tr>
<tr>
<td><strong>Pupila</strong></td>
<td class="minis"><?=$row->pup1?></td>
<td class="minis"><?=$row->pup2?></td>
</tr>
<tr>
<td class="minis"><strong>Cristalino</strong></td>
<td class="minis"><?=$row->crist1?></td>
<td class="minis"><?=$row->crist2?></td>
</tr>
<tr>
<td><strong>Vitreo</strong></td>
<td class="minis"><?=$row->vitreo1?></td>
<td class="minis"><?=$row->vitreo2?></td>
</tr>
<tr>


<td colspan='2'><strong>Nota</strong><br/><?=$row->nota?></td>

</tr>
</table>
</td>
<td style="width:30%">
<img  style="width:30%"  src="<?= base_url();?>/assets/img/oftal/<?php echo $row->ojo; ?>"  />
</td>
</tr>
</table>


<br/>
<table style="width:100%;">
<tr>
<td colspan='3'><strong>FONDOSCOPIA</strong></td>
</tr>
<tr>
<td class="minis"><?=$row->fondos1?></td>
<td class="minis"><?=$row->fondos2?></td>
<td  style="width:70%;" >
<img  style="width:30%" src="<?= base_url();?>/assets/img/oftal/<?php echo $row->fondo; ?>"  />
</td>
</tr>
</table>
<?php
$firma_doc="$docid-1.png";

$signature = "assets/update/$firma_doc";

$sello_doc=$this->db->select('sello')->where('doc',$docid)->get('doctor_sello')->row('sello');
if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}

?>
<div class="footer-firma">

<table class='r-b'   >
<tr>
<td style="text-align:center">

<?php 

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<br/><br/>
<div style="font-size:11px;border-top:1px solid #DCDCDC"><strong>Firma autorizada y sello del medico</strong></div>
</td>
<?=$sello?>
</tr>
</table>
</div>