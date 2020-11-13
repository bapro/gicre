 <ol>
<?php

foreach($tutor as $tut)
{

?>
<li><a target="_blank" href="<?php echo site_url("admin_medico/patient/".$tut->id_tutor); ?>"><?=$tut->relacion?> : <?=$tut->name_tutor?></a></li>
<?php
}
?>
</ol>