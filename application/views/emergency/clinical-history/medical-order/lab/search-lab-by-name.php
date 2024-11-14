<div class="d-flex flex-row bd-highlight mb-2" style="position:absolute;z-index:9000">
<?php

if($query->result() !=NULL) {
    ?>

<div class="p-2 bd-highlight">

<ul class="list-group list-lab-by-name-result">
<?php
foreach($query->result() as $row) {

?>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  <div class="p-2"><?php echo $row->name; ?></div>
  <div><input type='checkbox'  class="check-lab-name-by-his-id" id="print_<?=$row->id?>" value="<?=$row->id?>"  /></div>
  </li>
  <?php }  ?>
</ul>
</div>






<?php }  ?>

</div>
<script>


$('.check-lab-name-by-his-id').change(function() {

	var labCheckded= $(this).val();
    var countCheckedCheckboxes = $('.list-lab-by-name-result input[type="checkbox"]').filter(':checked').length;
	var display="load-ordenmedica-labs";
	var table='hosp_orden_medcia_lab_hosp' ;

		
   if ($(this).is(':checked')) {
     var lab= $(this).val();
     
	$.ajax({
		type:'POST',
		url:'<?=base_url('Hosp_orden_medica_lab/save_indication_lab')?>',
		data: {lab:lab,table:table},
		success:function(data) {
		
		allLaboratorios();
		
      },
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#load-ordenmedica-labs').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
	});
} else {
    
	 var lab=labCheckded;
     
	$.ajax({
		type:'POST',
		url:'<?=base_url('Hosp_orden_medica_lab/remove_this_selected_lab')?>',
		data: {lab:lab,table:table},
		success:function(data) {
			 
			allLaboratorios();
	  },

	});
	
}


 })








</script>



