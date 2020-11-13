<?php
	foreach($result as $row) {
?>
<option></option>
<option value="<?php echo $row->id_tarif; ?>"><?php echo $row->procedimiento; ?></option>
<?php
	}
	?>