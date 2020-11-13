<?php  if(!empty($doc)) {
	foreach($doc as $row) {
?>
<option value="" hidden></option>
<option value="<?php echo $row->id_user; ?>"><?php echo $row->name; ?></option>
<?php
	}
}
else{
echo "<option value=''>No hay doctor por esta categoria </option>";
}