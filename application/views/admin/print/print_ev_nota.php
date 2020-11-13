<style>
#footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>
<body  style='font-size:10px'>
<br/>
<?php
foreach ($query->result() as $row)

?>
<p style="font-size:10px;text-transform:lowercase"><?=nl2br($row->nota)?></p>


<div id='footer'>
<table class='r-b' style='border-top:1px solid #DCDCDC;width:100%' >
<tr>
<td style="text-align:right;font-size:8px"><strong><i>Dr</strong> <?=$doctor?></i></td>
<td style="text-align:right;font-size:8px"><i><?=$area?></i></strong></td>
<td style="text-align:right;font-size:8px"><strong><i>Ex.</strong> <?=$exequatur?></i></td>
<td style="color:red;font-size:8px"><i> <?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></i> </td>
</tr>
</table>

<table class='r-b' style='width:80%'  >
<tr>
<td style="text-align:center">
<br/>
<?php 
$firma_doc="$row->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<br/><br/>
<div style="font-size:11px;border-top:1px solid #DCDCDC"><strong>Firma autorizada y sello del medico</strong></div>
</td>
</tr>
</table>
</div>