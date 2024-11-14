<?php
if($table=="h_c_alergy"){
	$continue_text="Continua siendo alergico?";

}else{
$continue_text="continua tomando ?";
	
}
?>

<table class="table  table-striped alergy-table">
<?php
foreach($query->result() as $row) {
if($row->is_kept==1){
	$checked = 'checked';
	$line_through="text-decoration:line-through";
}else{
$checked = '';	
$line_through="";
}

if($table=="h_c_alergy"){
	$alergy_type="(<em>$row->alergy_type</em>)";
}else{

$alergy_type="";	
}



?>
<tr id="<?=$row->id?>">
<td class="check-food-effect" style="<?=$line_through?>"><?=$row->alergy?> <?=$alergy_type?></td>
<td>

<label  class="form-label"><?=$continue_text?></label>
<br/>
<div class="form-check">
  <input class="form-check-input" type="checkbox"  name="check-alergy-food" <?=$checked?>>
  <label>  no </label>
</div>
</td>
</tr>
<?php


}

?>
</table>

<input type="hidden" value="<?=$table?>" id="alergy_table"/>
 <script>

	$(".alergy-table  tr input[type=checkbox]").change(function(e){
 e.preventDefault();
 var is_continued, line_through;
if (e.target.checked){
$(this).closest("tr").find(".check-food-effect").css('text-decoration','line-through');
is_continued = 1;
line_through="line-through";
}else{
$(this).closest("tr").find(".check-food-effect").css('text-decoration','');	
is_continued = 0;
line_through="";
}
var ID = $(this).closest("tr").attr('id');

   $.ajax({
            type: 'POST',
            url:"<?php echo base_url(); ?>alergy/stopBeingAlergic",
            data:{id:ID, id_user:$("#id_user").val(), is_continued:is_continued, line_through:line_through, table: $("#alergy_table").val()},
            success: function(data){ 
			 },
			 
			 
         
 });
});
 </script>