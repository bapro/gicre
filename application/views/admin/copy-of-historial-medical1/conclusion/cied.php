<?php if(!empty($val1))  
{ 

?>
<div class="col-md-6" >
<table class="table table-striped table-bordered is_cie10_chk" id="<?=$tab?>">
 <thead>
 <tr>
 <th colspan="2" style="background:#FCA1A1">Marque el diagnóstico que corresponde a la busqueda</th>
 </tr>
<tr>
<th>Lista</th><th style="background:#FCA1A1">Marque</th>
</tr>
 </thead>
 <tbody>
<?php
foreach($val1 as $row){
$id_ce10=$this->db->select('id_ce10')->where('id_ce10',$row->idd)->where('id_doc',$user_id)->where('origine',$origine)->get('hc_save_cied_doc')->row('id_ce10');
if($id_ce10==$row->idd){
$checked='checked';	
}else{
$checked='';		
}
?>
<tr>
<td>
<?=$row->description;?>
</td>
<td style="background:#FCA1A1">
<input type='checkbox' name='cied' class="checked-cie10"  value="<?=$row->idd?>" <?=$checked?> />
</td>

</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div class="col-md-4" >

<div id="count-selected-cie10"></div>
</div>
<script>
$('.otros-diagnos').hide();
$('#otros_diagnos').val('');
</script>
<?php
} else {

echo "<span style='color:red'>No hemos encontrado <strong>$value1</strong> en el CE10.</span>";

?>
<script>
$('.on_input_cied').val('');
$('.otros-diagnos').slideDown();
var newCied="<?=$value1?>";
$("#otros_diagnos").val($("#otros_diagnos").val()+newCied+"\n ");
$("#otros_diagnos1").val($("#otros_diagnos1").val()+newCied+"\n ");
</script>
<?php
} 
?>


<script>

	   var $checkboxes = $('.is_cie10_chk td input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        if(countCheckedCheckboxes>0){
			$('.otros-diagnos').slideDown();
		}else{
		$('.otros-diagnos').hide();
		}
    });


$('.checked-cie10').change(function() {
	//var labCheckded= $(this).val();
if ($(this).is(':checked')) {
 var span = '<br/>'+"<input style='width:50px' class='inserted-cied " + this.value + "'  value='" + this.value + "' readonly>"+'<br/>';
    $("#show-selected-cie10").append(span);
     var cie10= $(this).val();
	var deleteCied= 1;
	 }

	else {
	 $("." + this.value).remove();
	 var cie10= $(this).val();
	var deleteCied= 0;
	}
	
    var user_id=<?=$user_id?>;
	var centro_medico=<?=$centro_medico?>;
	var id_pat=<?=$id_pat?>;
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/savePatientCied')?>',
		data: {cie10:cie10,user_id:user_id,centro_medico:centro_medico,id_pat:id_pat,deleteCied:deleteCied,origine:<?=$origine?>},
		success:function(data) {
			coun_selected_cie10();
          },

		});
     
 })


function coun_selected_cie10(){
	$.ajax({
		type:'GET',
		url:'<?=base_url('admin_medico/coun_selected_cie10')?>',
		data: {user_id:<?=$user_id?>,id_pat:<?=$id_pat?>},
		success:function(data) {
			$("#count-selected-cie10").html(data);
      },

		});
}


</script>