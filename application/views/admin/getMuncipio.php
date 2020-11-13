<?php
	foreach($municipio as $row) {
?>
 <option value="" hidden></option>
	<option value="<?php echo $row->id_town; ?>"><?php echo $row->title_town; ?></option>
<?php
	}