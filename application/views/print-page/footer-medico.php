<?php
$sello_doc=$this->db->select('sello')->where('doc',$id_doctor)->where('dist',0)->get('doctor_sello')->row('sello');
if($sello_doc) {
$sellodoc='<img  style="width:160px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  />';
}else{
$sellodoc='';	
}
?>

<table class="r-b" style="border:none">
<tr>
<td style="text-align:center">
<br>
<?php

$firma_doc="$id_doctor-1.png";
$signature="assets/update/$firma_doc";
if(file_exists($signature)) {
    ?><img src="<?=base_url()?>/assets/update/<?=$firma_doc?>"style="width:300px;margin:-20px">
	<?php
}

?><br><br>

<div style="font-size:11px;border-top:1px solid #dcdcdc">
<strong>Firma autorizada y sello del medico</strong></div>
</td>
<td><?=$sellodoc?></td>
</tr>

</table>