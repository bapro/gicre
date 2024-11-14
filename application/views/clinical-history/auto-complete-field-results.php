
<?php

if($query->result() !=NULL) {	
?>
<ul id="list-data-available" class="list-data-available  list-group list-group-flush" style="position:absolute;z-index:1000">
<?php
foreach($query->result() as $row) {

?>
<li class='data-li list-group-item text-mute' onClick="selectThisValue('<?php echo $row->$field_name_in_table; ?>');"><?php echo $row->$field_name_in_table; ?></li>
<?php
}
 ?>
</ul>
<?php }  ?>
<script>
var input_name = "<?=$input_name?>";
var div_result = "<?=$div_result?>";
function selectThisValue(selected) {
$("#"+div_result).hide();
$("#"+input_name).val(selected);
if(selected=='LICENCIA MEDICA'){
$("#show-days-amount-rest").show();
}else{
$("#show-days-amount-rest").hide();	
}
}

</script>

