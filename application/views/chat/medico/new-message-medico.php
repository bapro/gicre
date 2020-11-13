<?php
if($result==0){
$show_mes="style='display:none'";	
} else {
$show_mes="";	
}
if($perfil=="Admin"){$controller="admin";$text="";}else{$controller="medico";$text="Tiene nuevo mensage";}
?>
<a <?=$show_mes?> style="font-size:9px;color:red" href="<?php echo base_url("$controller/chatBox")?>"><?=$text?><img style="width:20px;background:red" src="<?= base_url();?>assets/img/cloche-image-animee-0004.gif" >
</a>

