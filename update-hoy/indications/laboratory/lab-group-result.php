
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
<br/><br/>
 <ul class="nav navbar-nav " id="show-btn-print-lab-group" style="display:none">
<li class="dropdown list-data-available "><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print"></i> <span class="caret"></span>&nbsp;</span>
    <ul class="dropdown-menu">
    <li>
      <a class="dropdown-item">FORMATO VERTICAL</a> 
    </li>
       <li class="data-li">
      <a class="dropdown-item"  href="<?php echo base_url("printings/print_indicaciones/$id_patient/vert/1/printing/h_c_indications_labs/$id_centro")?>" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="<?php echo base_url("printings/print_indicaciones/$id_patient/vert/0/printing/h_c_indications_labs/$id_centro")?>" target="_blank">sin la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="<?php echo base_url("printings/print_indicaciones/$id_patient/horiz/1/printing/h_c_indications_labs/$id_centro")?>" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="<?php echo base_url("printings/print_indicaciones/$id_patient/horiz/0/printing/h_c_indications_labs/$id_centro")?>" target="_blank">sin la foto</a>
       </li>
    </ul>
    </li>
    </ul> 
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
 allLaboratorios("patient-labs-content",$("#ordenMedInsertedId").val(),data, $('#id_centro_to_save').val());
},


});		
}else{
alert('Elige al menos uno');	
}
}
});

</script>



