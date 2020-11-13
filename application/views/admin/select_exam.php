<div id="show_all"></div>

<div class="col-xs-5"  >

<?php if ($count_exam > 0)
{
	
	?>
<select class="form-control" id="on_select_show" >
<option value="">SeleccionarSelect_exam <?=$count_exam?> datos</option>
<?php 

 foreach($examen as $row)
{ 
?>
<option value='<?=$row->id_ex;?>'>Medico : <?=$row->inserted_by; ?> <br/><br/> Fecha : <?=$row->inserted_time; ?></option>

<?php
}
?>

</select>
<?php
}

?>

</div>
<div class="col-xs-2" style="display:none" id="reset1">
<button type="button">Reiniciar</button>
</div>
<script>
//navegador
$("#on_select_show").on('change', function (e) {
e.preventDefault();
var historial_id='<?=$historial_id?>';
var on_select_show=$("#on_select_show").val();
$.ajax({
url: '<?php echo site_url('admin/show_exam');?>',
type: 'post',
data:{on_select_show:on_select_show,historial_id:historial_id},
success: function (data) {
	$("#show_all").html(data);
	$("#show_form_on_select").show();
	 $("#hide_form_on_select").hide();
	  $("#hide_all").hide();
	 
	 $("#reset1").show();
	 
}

});
});