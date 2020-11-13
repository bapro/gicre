<?php
	foreach($branches as $row) {
?>
<option value="<?php echo $row->id; ?>"><?php echo $row->branch_name; ?> </option>
<?php
	}