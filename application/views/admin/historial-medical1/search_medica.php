<?php 

if($medicaTime==1){$display="display:none";}	else{$display="";}


if(!empty($medicamentos))  
{

?>
<table class="table table-striped table-bordered paginate-s-p">
 <thead>
<tr>
<th>Lista</th><th>Seleccione</th>


</tr>
 </thead>
 <tbody>
<?php

foreach($medicamentos as $row)
{
?>
<tr>
<td>
<?=$row->name;?>
</td>
<td>
<input type='checkbox' name="new-med-pat"  value="<?=$row->name?>"  />
</td>

</tr>
<?php
}
?>
</tbody>
 <tr style="<?=$display?>">
 <td></td>
 <td><button class="btn btn-sm btn-primary" id="save-checked"  type="button">Guadar</button></td>
  </tr>
</table>

<?php
} else {
?>
<br/>
<span  style="<?=$display?>">No lo encuentro <button class="btn btn-sm btn-default" id="guardar-n-medica-s"  type="button">Agregar</button></span>
<?php

} 


?>

<script>
$('#guardar-n-medica-s').click(function() {
var newMedicament="<?=$medica?>";
var id_pat  = "<?=$hist_id?>";
var user_id  = "<?=$user_id?>";
var part="gnl";
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/newMedicament')?>',
data: {newMedicament:newMedicament,id_pat:id_pat,part:part,user_id:user_id},
success:function(data) {
	$("#selectmedic").val("");
	$("#search-patient-medica").slideUp();
	loadPatientMedicine();
  },

});	

 })
//***********************************************************************************************
 $('.paginate-s-p').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );


//=======================================================================================

$('#save-checked').click(function() {
	var id_pat  = "<?=$hist_id?>";
	var part  = "<?=$part?>";
	var user_id  = "<?=$user_id?>";
	var medPat = [];
	$.each($("input[name='new-med-pat']:checked"), function(){            
	medPat.push($(this).val());
	;
	});
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/saveNewMed')?>',
		data: {medPat:medPat,id_pat:id_pat,part:part,user_id:user_id},
		success:function(data) {
		$(".selectmedic").val("");
		loadPatientMedicine();
		getPatientMedica();
		
		 },

		});
 })
/*$('.s-med-s').change(function() {
	var id_pat  = "<?=$hist_id?>";
	var part  = "<?=$part?>";
	var user_id  = "<?=$user_id?>";
	var medCheckded= $(this).val();
   if ($(this).is(':checked')) {
     var medicine= $(this).val();

	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/saveNewMed')?>',
		data: {medicine:medicine,id_pat:id_pat,part:part,user_id:user_id},
		success:function(data) {
		loadPatientMedicine();
		 },

		});
		
} else {
var medicine= medCheckded;	
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteEmptyMed')?>',
data: {medicine:medicine,id_pat:id_pat,part:part,user_id:user_id},
success:function(data) {
	loadPatientMedicine();
  },

});	
}
 })*/
 
 
 

</script>