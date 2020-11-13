<?php  
foreach($municipio_dropdown as $row) {
?>
<option value="" hidden></option>
<option value="<?php echo $row->id_town; ?>"><?php echo $row->title_town; ?></option>
<?php
}

?>