
<?php

if($query->result() !=NULL) {	
?>
<ul id="list-data-available" class="list-data-available  list-group list-group-flush" style="position:absolute;z-index:1000">
<?php
foreach($query->result() as $row) {

?>
<li class='data-li list-group-item text-mute select-this-select' id="<?php echo $row->id; ?>" onClick="selectThisValue('<?php echo $row->name; ?>');"><?php echo $row->name; ?></li>
<?php
}
 ?>
</ul>
<?php }  ?>
<script>
var input_name = "<?=$input_name?>";
var div_result = "<?=$div_result?>";
var input_name_id= "<?=$input_name_id?>";
function selectThisValue(selected) {
$("#"+div_result).hide();
$("#"+input_name).val(selected);
if(selected=='LICENCIA MEDICA'){
$("#show-days-amount-rest").show();
}else{
$("#show-days-amount-rest").hide();	
}
}



$(document).on('click', '.select-this-select', function(){ 
    var id = $(this).attr('id');
    var name = $(this).text();
 $("#"+div_result).hide();
$("#"+input_name).val(name);
$("#"+input_name_id).val(id);
}) 






</script>

