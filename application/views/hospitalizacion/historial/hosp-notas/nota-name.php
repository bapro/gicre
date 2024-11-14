<style>
#nombre-list li {cursor:pointer;border-bottom:1px solid #428bca;}
#nombre-list{list-style-type: none;background:#C3C9FF}

li.nombre-li:hover{
	color:#FF0084;
	cursor: pointer;
}

</style>
<?php
if(!empty($query)) {
?>
<ul id="nombre-list">
<?php
foreach($query->result() as $row) {
?>
<li class='nombre-li' onClick="selectNotaName('<?php echo $row->nombre; ?>');"><?php echo $row->nombre; ?></li>
<?php } ?>
</ul>
<?php }  ?>