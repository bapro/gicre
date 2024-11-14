<?php
foreach($show_oft as $row)
?>
<style>
.minis{text-transform:lowercase}
td{font-size:10px}

table, tr, td {
    border: none;
}

table {
  border-collapse: collapse;
  border-spacing:0px;
}

td,img { 
padding:2px; 
border-width:0px; 
margin:2px; 
}


</style>

<!--<p style="text-align:right;top:0;position:absolute;font-size:9px"><i><?=date('d-m-Y H:i A')?><br/><span style="color:red;font-size:11px">Fecha de impresión</span></i></p>-->
<table  style="width:100%" cellspacing="0" cellpadding="0">
<tr>
<td></td><td><strong>Esfera</strong></td><td><strong>Cilindro</strong></td><td><strong>Eje</strong></td>
<td><strong>Add</strong></td>
</tr>
<tr>
<td><strong>OD</strong></td>
<td>
  <?php
if($row->od_espera_r==1){$checked="+";}else{$checked="";}

echo $checked;
if($row->od_espera_r==0){$checked="-";}else{$checked="";}

echo $checked;
echo $row->od_espera;
?>
</td>


<td>
  <?php
if($row->od_cilindro_r==1){$checked="+";}else{$checked="";}


?> <?=$checked?>


<?php
if($row->od_cilindro_r==0){$checked="-";}else{$checked="";}


?> <?=$checked?>

<?=$row->od_cilindro?>
</td>
<td>

<?=$row->eje_od?>
</td>

<td>

<?=$row->add_od?>
</td>

</tr>
<tr>
<td><strong>OS</strong></td>
<td>
  <?php
if($row->os_espera_r==1){$checked="+";}else{$checked="";}


?> <?=$checked?>


<?php
if($row->os_espera_r==0){$checked="-";}else{$checked="";}


?> <?=$checked?>
<?=$row->espera_os?>
</td>

<td>
  <?php
if($row->os_cilindro_r==1){$checked="+";}else{$checked="";}


?> <?=$checked?>


<?php
if($row->os_cilindro_r==0){$checked="-";}else{$checked="";}


?> <?=$checked?>
<?=$row->cilindro_os?>
</td>
</td>
<td>

<?=$row->eje_os?>
</td>


<td>

<?=$row->add_os?>
</td>

</tr>
</table>
<table  style="width:100%;border:none" cellspacing="0" cellpadding="0" >
  <tr> 
  <td>
  <table style="width:100%" cellspacing="0" cellpadding="0" >
  <tr>
  <td>
  
  DP <?=$row->d_prf?> Mm
    <br/>
   <?php
   if ($row->vision_sencilla ==0){
	$selected="";
	$color='';
	}
	else
	{
	$selected="checked='checked'";
	$color="style='color:red'";
	}
 ?>
<input type="checkbox"  <?=$selected?>> <span <?=$color?>>Visión Sencilla</span>
  <br/>
  <?php
   if ($row->flat_top ==0){
	$selected="";
	$color='';
	}
	else
	{
	$selected="checked='checked'";
	$color="style='color:red'";
	}
 ?>
<input type="checkbox"  <?=$selected?>> <span <?=$color?>>Flat Top</span>

  <br/>
 <?php
   if ($row->invisibles ==0){
	$selected="";
	$color='';
	}
	else
	{
	$selected="checked='checked'";
	$color="style='color:red'";
	}
 ?>
<input type="checkbox" <?=$selected?>> <span <?=$color?>>Invisibles</span>
 <br/>
 <?php
   if ($row->progresivos ==0){
	$selected="";
	$color='';
	}
	else
	{
	$selected="checked='checked'";
	$color="style='color:red'";
	}
 ?>
<input type="checkbox"  <?=$selected?>> <span <?=$color?>>Progresivos</span>
</td>

  <td>
   Altura <?=$row->altura_mm?> Mm
    <?php
   if ($row->antirreflejos ==0){
	$selected="";
	$color='';
	}
	else
	{
	$selected="checked='checked'";
	$color="style='color:red'";
	}
 ?>
 
  <br/><input type="checkbox" <?=$selected?>> <span <?=$color?>>Antirreflejos</span>

    <?php
   if ($row->policarbonatos ==0){
	$selected="";
	$color='';
	}
	else
	{
	$selected="checked='checked'";
	$color="style='color:red'";
	}
 ?>
 <br/>
 <input type="checkbox" <?=$selected?>> <span <?=$color?>>Policarbonatos</span>

   <?php
   if ($row->transitions ==0){
	$selected="";
	$color='';
	}
	else
	{
	$selected="checked='checked'";
	$color="style='color:red'";
	}
 ?>
 <br/>
 <input type="checkbox"  <?=$selected?> > <span <?=$color?>>Transitions</span>
 
 
   <?php
   if ($row->foto_croma ==0){
	$selected="";
	$color='';
	}
	else
	{
	$selected="checked='checked'";
	$color="style='color:red'";
	}
 ?>
  <br/>
 <input type="checkbox"  <?=$selected?> > <span <?=$color?>>Fotocromatico</span>
 
</td>
 </tr>
 </table>
 </td>
 <tr> 
  <td>
  <?php if($row->ref_observaciones){ 
 echo" OBSERVACIONES: ";
 echo nl2br($row->ref_observaciones);
  }
  
  $doneDate=date("d-m-Y H:i:s",
strtotime($row->inserted_time));
 ?>

 </td>
   
 </tr>
 </table>
 <div id="absolute-element-footer2">
<table class='r-b' style='border-top:1px solid #DCDCDC;width:100%' >
<tr>
<td style="text-align:right;font-size:11px"><?="Dr $author, Exeq. $exequatur, $area<br/> <span style='color:red'>$doneDate</span>"?> </td>
</tr>
<!--<tr>
<td style="color:red;font-size:8px"><i> <?=date("d-m-Y H:i");?></i> </td><td></td>
</tr>-->
</table>

<?php
$firma_doc="$row->inserted_by-1.png";

$signature = "assets/update/$firma_doc";

$sello_doc=$this->db->select('sello')->where('doc',$row->inserted_by)->get('doctor_sello')->row('sello');
if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}

?>
<br/>

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
