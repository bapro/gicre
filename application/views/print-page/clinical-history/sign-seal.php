<?php

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}?>

<table style="border:none;width:100%"> 
<tr>
<td style="border:none;">

</td>
<td  style="border:none"> </td>
<td  style="border:none"></td>

<td style="border:none">
<?php 
$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
</td>
<?=$sello?>
</tr>
</table> 