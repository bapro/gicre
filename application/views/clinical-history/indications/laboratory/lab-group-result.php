
<div class="d-flex flex-row bd-highlight mb-2" style="position:absolute;z-index:9000">
<?php

if($query->result() !=NULL) {
    ?>

<div class="p-2 bd-highlight notHideMe">

<ul class="list-group">
<?php
foreach($query->result() as $row) {

?>
  <li class="list-group-item d-flex justify-content-between align-items-center ">
  <?php echo $row->lab_name; ?> 
  <input type='checkbox' name='check-lab-grp' class="check-lab-grp" id="print_<?=$row->lab_id?>" value="<?=$row->lab_id?>" checked />
  </li>
  <?php }  ?>
</ul>
</div>


   <div class="p-2 bd-highlight"  > 

<button type="button" class="btn btn-outline-primary btn-md float-end" id="save-groupo-lab">Indicar</button>

    </div>
  




<?php }  ?>

</div>
<script>

$('#save-groupo-lab').on('click', function(event) {
event.preventDefault();
if($("#id_centro_to_save").val()==""){
	alert("Elige un centro médico");
}else{
if ($(".check-lab-grp").is(':checked')) {
	var checked = [];
            $.each($("input[name='check-lab-grp']:checked"), function(){
                checked.push($(this).val());
            });
$('#save-groupo-lab').prop('disabled',true);
$.ajax({
type: "POST",
url: "<?=base_url('h_c_indication_lab/save_indication_lab_by_group')?>",
data: {lab:checked, id_centro:$('#id_centro_to_save').val()},
success:function(data){
$('#show-btn-print-lab-group').show();
$('#save-groupo-lab').prop('disabled',false);
 //allLaboratorios("patient-labs-content",$("#ordenMedInsertedId").val(),data, $('#id_centro_to_save').val());
 $("#laboratoriosAgrupados").val("");
$("#suggestion-grup-lab-list-selected").hide();
  allLaboratorios(data, $('#id_centro_to_save').val());
},


});		
}else{
alert('Elige al menos uno');	
}
}
});

</script>



