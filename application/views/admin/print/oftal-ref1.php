<?php
foreach($show_oft as $row)
?>
<style>
.minis{text-transform:lowercase}
td{font-size:13px}

table, tr, td {
    border: none;
}
</style>

<br/>
<p style="text-align:right;top:0;position:absolute;font-size:9px"><i><?=date('d-m-Y H:i A')?><br/><span style="color:red;font-size:11px">Fecha de impresión</span></i></p>

<table  style="width:100%">
<tr>
<td colspan='6' ><strong>REFRACCION</strong></td>
</tr>
<tr>
<td></td><td><strong>Espera</strong></td><td><strong>Cilindro</strong></td><td><strong>Eje</strong></td>
<td><strong>Add</strong></td><td><strong>Vision</strong></td>
</tr>
<tr>
<td><strong>OD</strong></td>
<td>
  <?php
if($row->od_espera_r==1){$checked="+";}else{$checked="";}


?> <?=$checked?>


<?php
if($row->od_espera_r==0){$checked="-";}else{$checked="";}


?> <?=$checked?>
<?=$row->od_espera?>
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
<td>
<?=$row->vision_od?>

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
<td>
<?=$row->vision_os?>
</td>
</table>

<table class='r-b' style='border-top:1px solid #DCDCDC;width:100%' >
<tr>
<td style="text-align:right;font-size:11px"><strong><i>Dr</strong> <?=$updated_by?></i></td>
<td style="text-align:right;font-size:11px"> <?=$doc_ingo?></i></td>
<td style="color:red;font-size:11px"><i> <?=$date_modif;?></i> </td>
</tr>
<!--<tr>
<td style="color:red;font-size:8px"><i> <?=date("d-m-Y H:i");?></i> </td><td></td>
</tr>-->
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