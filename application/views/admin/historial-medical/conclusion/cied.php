<?php if(!empty($val1))  
{ 

?>
<div id="test"></div>
<table class="table table-striped table-bordered" id="<?=$tab?>">
 <thead>
 <tr>
 <th colspan="2" style="background:#FCA1A1">Marque el diagnóstica que corresponde a la busqueda.</th>
 </tr>
<tr>
<th>Lista</th><th style="background:#FCA1A1">Marque</th>
</tr>
 </thead>
 <tbody>
<?php
foreach($val1 as $row){
?>
<tr>
<td>
<?=$row->description;?>
</td>
<td style="background:#FCA1A1">
<input type='checkbox' name='cied' class="checked-cie10"  value="<?=$row->idd?>"  />
</td>

</tr>
<?php
}
?>
</tbody>
</table>

<?php
} else {

echo "<span style='color:red'>No habemos encuentrado <strong>$value1</strong>.</span>";
echo "<script>$('.on_input_cied').val('');</script>";
} 


?>

<script>
$(document).ready(function() {

    $('#<?=$tab?>').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
} );


//=======================================================================================
/*$('.checked-cie10').change(function() {
   if ($(this).is(':checked')) {
     var cie10= $(this).val();
	var deleteCied= 1;
	 }

	else {
	 var cie10= $(this).val();
	var deleteCied= 0;
	}
	
    var user_id="<?=$user_id?>";
	var centro_medico="<?=$centro_medico?>";
	var id_pat="<?=$id_pat?>";
	var id_cdia="<?=$id_cdia?>";
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/savePatientCied')?>',
		data: {cie10:cie10,user_id:user_id,centro_medico:centro_medico,id_pat:id_pat,deleteCied:deleteCied,id_cdia:id_cdia},
		success:function(data) {
			$("#test").html(data); 
      },

		});
     
 })*/
</script>