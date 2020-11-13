<?php if(!empty($medicamentos))  
{ 

?>
<table class="table table-striped table-bordered paginate-s-pe">
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
<input type='checkbox' class="s-med-s-p"  value="<?=$row->name?>"  />
</td>

</tr>
<?php
}
?>
</tbody>
</table>

<?php
} else {
?>
<br/>
No lo encuentro <button class="btn btn-sm btn-default" id="guardar-n-medica-s-pee"  type="button">Guadar</button>
<?php

} 


?>

<script>
$('#guardar-n-medica-s-pee').click(function() {
var newMedicament="<?=$medica?>";
var id_pat  = "<?=$hist_id?>";
var user_id  = "<?=$user_id?>";
var part="pedia";
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/newMedicament')?>',
data: {newMedicament:newMedicament,id_pat:id_pat,part:part,user_id:user_id},
success:function(data) {
	$(".selectpedia").val("");
	$("#search-patient-medica-pedia").slideUp();
	loadPatientMedicinePed();
  },

});	

 })
//***********************************************************************************************
 $('.paginate-s-pe').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );


//=======================================================================================
$('.s-med-s-p').change(function() {
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
		loadPatientMedicinePed();
		 },

		});
		
} else {
var medicine= medCheckded;	
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteEmptyMedPed')?>',
data: {medicine:medicine,id_pat:id_pat,part:part,user_id:user_id},
success:function(data) {
	loadPatientMedicinePed();
  },

});	
}
 })
 

</script>