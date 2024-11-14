 <option value="" hidden>Selectione el municipio</option>
<?php
	foreach($municipio as $row) {
?>

	<option value="<?php echo $row->id_town; ?>"><?php echo $row->title_town; ?></option>
<?php
	}