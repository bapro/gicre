<div class="d-flex flex-row bd-highlight mb-2" style="position:absolute;z-index:9000">
<div class="p-2 bd-highlight">

<ul class="list-group list-lab-by-name-result">
<?php
if($query->result() !=NULL) {
foreach($query->result() as $row) {

?>
  <li class="list-group-item d-flex justify-content-between align-items-center data-li">
  <div class="p-2"><?php echo $row->name; ?></div>
  <div><input type='checkbox'  class="check-lab-name-by-his-id" id="print_<?=$row->id?>" value="<?=$row->id?>"  /></div>
  </li>
<?php }
 $ifLabFound = 1;
} else{ 
$ifLabFound = 0;
    ?>
 <li class="list-group-item d-flex justify-content-between align-items-center data-li">
  <div class="p-2"><?=$keyword?></div>
  <div><input type='checkbox'  class="check-lab-name-by-his-id"  value="0"   /></div>
  </li>

<?php }  ?>
</ul>
</div>


</div>

   <div class="p-2 bd-highlight show-print-lab-by-name " style="display:none"> 
   <ul class="nav navbar-nav  " style="position:absolute">
<li class="dropdown list-data-available "><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print"></i> <span class="caret"></span>&nbsp;</span>
    <ul class="dropdown-menu">
    <li>
      <a class="dropdown-item">FORMATO VERTICAL</a> 
    </li>
       <li class="data-li">
      <a class="dropdown-item"  href="<?php echo base_url("printings/print_indicaciones/$this->ID_PATIENT/vert/1/printing/h_c_indications_labs/$this->ID_CENTRO ")?>" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="<?php echo base_url("printings/print_indicaciones/$this->ID_PATIENT/vert/0/printing/h_c_indications_labs/$this->ID_CENTRO ")?>" target="_blank">sin la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="<?php echo base_url("printings/print_indicaciones/$this->ID_PATIENT/horiz/1/printing/h_c_indications_labs/$this->ID_CENTRO ")?>" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="<?php echo base_url("printings/print_indicaciones/$this->ID_PATIENT/horiz/0/printing/h_c_indications_labs/$this->ID_CENTRO ")?>" target="_blank">sin la foto</a>
       </li>
    </ul>
    </li>
    </ul> 
    </div>
  
<script>

$('.check-lab-name-by-his-id').on('change', function(event){ 
	if($("#"+"<?=$center_to_take_into_consideration?>").val()==""){
	alert("Elige un centro médico");
	$(this).prop( "checked", false );
}else{
	$("#searchLabByName").val("");
	$('.changed-input').val("");
var labCheckded= $(this).val();
    var countCheckedCheckboxes = $('.list-lab-by-name-result input[type="checkbox"]').filter(':checked').length;
	var div_result = "<?=$div_result?>";
	var display, table ;
	if(div_result=='suggestion-lab-list'){
		display="patient-labs-content";
		table="h_c_indications_labs";
		if(countCheckedCheckboxes > 0){
    $(".show-print-lab-by-name").show();	
    }else{
        $(".show-print-lab-by-name").hide();	
    }
	}else{
		display="load-ordenmedica-labs";
		table="orden_medcia_lab";
	} 

   if ($(this).is(':checked')) {
     var lab= $(this).val();
 
	$.ajax({
		type:'POST',
		url:'<?=base_url('h_c_indication_lab/save_indication_lab')?>',
		data: {lab:lab,table:table,id_sala:$("#ordenMedInsertedId").val(),id_patient:$('#id_patient_hist').val(), id_centro:$('#id_centro_to_save').val(), keyword:"<?=$keyword?>"},
		success:function(data) {
		
		allLaboratorios(display,$("#ordenMedInsertedId").val(),$('#id_patient_hist').val(), $('#id_centro_to_save').val());
		
      },

	});
} else {
    
	 var lab=labCheckded;
     
	$.ajax({
		type:'POST',
		url:'<?=base_url('h_c_indication_lab/remove_this_selected_lab')?>',
		data: {lab:lab,table:table,id_sala:$("#ordenMedInsertedId").val()},
		success:function(data) {
			 
			allLaboratorios(display,$("#ordenMedInsertedId").val(),$('#id_patient_hist').val(), $('#ordenMedCentroMedId').val());
	  },

	});
	
}
}

 })








</script>



