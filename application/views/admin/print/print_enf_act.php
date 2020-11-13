<br/>

<?php

foreach($print_enf_act as $row)
$img=$this->db->select('image')->where('id_enfermedad',$row->id_enf)->get('saveEnfImage')->row('image');
?>

<table style="font-size:13px;" class="r-b" >

<tr >
<td style="text-align:right"><strong>Motivo de consulta </strong></td>
<td><?=nl2br($row->enf_motivo);?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Signopsis </strong></td>
<td><?=nl2br($row->signopsis);?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Laboratorios (Resultados relevantes) </strong></td>
<td><?=nl2br($row->laboratorios);?></td>
</tr>

<tr >
<td style="text-align:right"><strong>Estudios (Resultados relevantes) </strong></td>
<td><?=nl2br($row->estudios);?></td>
</tr>
</table>
<?php if($img !=""){?>
<hr/>
<strong style="font-size:13px;">Estudio/Imagen </strong><br/>
<table class='cont'>
<tr class='me-ctn'>
<?php

$sql ="SELECT image FROM  saveEnfImage WHERE id_enfermedad=$row->id_enf";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){

?>
<td class="single-item"><img  id='zoomimg' style="width:20%;height:20%" src="<?= base_url();?>/assets/update/<?php echo $rf->image; ?>"  /></td>

<?php
}
?>
</tr>
</table>

<?php }?>

<br/>
<div class="footer-firma">
<table class='r-b' align="center" >
<tr>
<td style="text-align:center">

<?php 
$firma_doc="$row->user_id-1.png";

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
</tr>
</table>
</div>
</html>
