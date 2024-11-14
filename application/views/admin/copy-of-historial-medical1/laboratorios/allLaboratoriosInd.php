<?php 
$sql ="SELECT *  FROM laboratories WHERE name LIKE '$str%' LIMIT 10";
$query = $this->db->query($sql);
if($query->result() !=NULL){
?>
<div class="col-md-9 table-responsive lab-ref">

<table class="table table-striped table-bordered examplelabtab is_print1" >
 <thead>
<tr style="background:#38a7bb;color:white">
<th style="color:white;">Laboratorios </th>
<th style="color:white">
<!--<ul class="nav navbar-nav">
<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown"  ><i style="font-size:24px;color:white" class="fa">&#xf02f;</i><span style="cursor:pointer" class="caret"></span></span>
<ul class="dropdown-menu">
 <li><a data-toggle="modal" data-target="#print_lab_foto1"  href="<?php echo base_url("printings/print_if_foto/$id_historial/$areaid/$user_id/lab")?>"  style="cursor:pointer;color:black" class="btn-sm print-me1" >Con Formato Vertical</a></li>
<li><a target="_blank" href="<?php echo base_url("printings/print_laboratorios_horiz/$id_historial/$areaid/$user_id")?>" style="cursor:pointer;color:black" class="btn-sm print-me1" >Con Formato Horizontal</a></li>
</ul>
</li>
</ul>-->
<ul class="nav navbar-nav show-imp-lab-tab" style='display:none' >
<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
		<ul class="dropdown-menu">
		<li>
		<a>FORMATO VERTICAL</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$id_historial/vert/1/printing2/h_c_indications_labs")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$id_historial/vert/0/printing2/h_c_indications_labs")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		<li>
		<a>FORMATO HORIZONTAL</a>
	    <a  class="imprimirRecetasForPat horiz" id='1' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$id_historial/horiz/1/printing2/h_c_indications_labs")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat horiz" id='0' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$id_historial/horiz/0/printing2/h_c_indications_labs")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		</ul>
		</li>
</ul>
</th>
</tr>
 </thead>
 <tbody>
<?php 
foreach($query->result() as $row)
{
$cpt="";

	if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>	
<tr bgcolor="<?=$colorBg ;?>">
<td  style="width:2px" ><?=$row->name?></td>
<td><input type='checkbox' name='laborat' class="check-lab" value="<?=$row->id?>" id="print_<?=$row->id?>" /></td>
</tr>
<?php 
}
?>
</tbody>
</table>
<?php 
} else{
	echo "<em class='alert alert-warning'>no hay laboratorio: <strong>$str</strong></em>";
}
?>
</div>

<script>

if(<?=$hist?>==4){
$('.check-lab').prop('disabled',true);	
}
else{
$('.check-lab').prop('disabled',false);	
}


$('#print_lab_foto1').on('hidden.bs.modal', function () {
	allLaboratoriosInd();
	})

 var $checkb = $('.is_print1 td input[type="checkbox"]');
        
    $checkb.change(function(){
        var countCheckedCheckboxes = $checkb.filter(':checked').length;
        // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        if(countCheckedCheckboxes==12){
			$('.is_print1 td input[type="checkbox"]:not(:checked)').prop("disabled",true);
		}else{
		$('.is_print1 td input[type="checkbox"]:not(:checked)').prop("disabled",false);	
		}
		
		if(countCheckedCheckboxes >0){
		$(".show-imp-lab-tab").show();	
		}else{
			$(".show-imp-lab-tab").hide();	
		}
		
    });

$('.print-me1').click(function(){
	//allLaboratoriosInd();
    if(!$('.is_print1 input[type="checkbox"]').is(':checked')){
		
      alert("Por favor marque al menos uno.");
      return false;
    }
});



var checkboxes = $("input[name='laborat']");
   // submitButt = $('#print-first');

checkboxes.click(function() {
	if(checkboxes.is(":checked")){
		$('#print-first').show();
	} else {
		$('#print-first').hide();
		}
   // submitButt.css("display", "block", !checkboxes.is(":checked"));
});


$('.check-lab').change(function() {
	var labCheckded= $(this).val();
	var operatorl = <?=$operator?>;
    var historial_id_l =<?=$id_historial?>;
	var emergency_id=<?=$emergency_id?>;
	var user_id ="<?=$user_id?>";
   if ($(this).is(':checked')) {
     var lab= $(this).val();
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/SaveFormIndicacionesLab')?>',
		data: {lab:lab,historial_id_l:historial_id_l,operatorl:operatorl,user_id:user_id,emergency_id:emergency_id},
		success:function(data) {
		/* $('html,body').animate({
        scrollTop: $(".is_print").offset().top},
        'slow');*/
		allLaboratorios();
		
      },

	});
} else {
	 var lab=labCheckded;
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/DeleteHistLab2')?>',
		data: {lab:lab,historial_id_l:historial_id_l,operatorl:operatorl,user_id:user_id},
		success:function(data) {
			allLaboratorios();
	  },

	});
	
} 
 })
 

</script>