<style>
#nombre-list li {cursor:pointer;color:green}
#nombre-list{list-style-type: none;}

li.nombre-li:hover{
	background:#d3d3d3;
	cursor: pointer;
}

</style>
<?php
if(!empty($query->result() !=NULL)) {
?>
<ul id="nombre-list">
<?php
foreach($query->result() as $row) {
	if($row->cedula){
	$num="<strong>cedula</strong> :$row->cedula";	
	}else{
	$num="<em style='color:red'>no tiene cedula.</em> <strong> NEC</strong>  :$row->id_p_a";	
	}
?>
<li class='nombre-li' onClick="selectThisPatient('<?php echo $row->id_p_a; ?>');"><?php echo $row->nombre; ?> (<?php echo $num; ?>) </li>
<?php } 
   ?>
</ul>
<?php
}
else{
	echo "<em style='color:red'>no hay resultado</em>";
}