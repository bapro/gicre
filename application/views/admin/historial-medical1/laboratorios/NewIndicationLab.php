  <?php
  
  if($num_count_lab==0) {} else {?>
 <!--<a target="_blank" href="<?php echo base_url("printings/print_laboratorios/$historial_id")?>" style="cursor:pointer" title="Imprimir" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>-->
 <?php
  }
  ?>
<!--<button class="btn-sm btn-primary refresh-labb" type="button"><i class="fa fa-refresh" aria-hidden="true"></i></button>-->
<p class="h4 his_med_title">Indicaciones previas <i style="color:green;"><?=$num_count_lab?> datos</i></p>
<!--<span style="color:green;" id="update_lab"><i><?=$num_count_lab?> datos</i></span>-->
<table  class="table table-striped table-bordered is_print" style="width:100%" cellspacing="0">
<thead>
    <tr style="background:#428bca;">
	<th style='display:none'></th>
	   <th style="width:1px;color:white"><strong>Fecha</strong></th>
        <th style="width:5px;color:white">Laboratorio</th>
		 <th style="width:5px;color:white">Medico</th>
		 <th style="width:5px;">
		 <ul class="nav navbar-nav">
		<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown"  ><i style="font-size:24px;color:white" class="fa">&#xf02f;</i><span style="cursor:pointer" class="caret"></span></span>
		<ul class="dropdown-menu">
		<li><a data-toggle="modal"  data-target="#print_lab_foto"  href="<?php echo base_url("printings/print_if_foto/$historial_id/$area/$user_id/lab")?>"  style="cursor:pointer;color:black" class="btn-sm print-me" >Con Formato Vertical</a></li>
		<!--<li><a target="_blank" href="<?php echo base_url("printings/print_laboratorios_horiz/$historial_id/$area/$user_id")?>" style="cursor:pointer;color:black" class="btn-sm print-me" >Con Formato Horizontal</a></li>-->
		<li><a data-toggle="modal"  data-target="#print_lab_foto_horiz"  href="<?php echo base_url("printings/print_if_foto_oriz/$historial_id/$area/$user_id/lab")?>"  style="cursor:pointer;color:black" class="btn-sm print-me" >Con Formato Horizontal</a></li>
		
		</ul>
		</li>
		</ul>
		</th> 
		 <th style="width:5px;color:white">Elim.</th> 
	 </tr>
    </thead>
    <tbody>
    <?php
    $cpt="";
	foreach($IndicacionesLab as $row)
	 
	 {
	$op3=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');	 
	$lab=$this->db->select('name')->where('id',$row->laboratory)
  ->get('laboratories')->row('name');
  $insert_time = date("d-m-Y H:i:s", strtotime($row->insert_time));
  if ( $cpt==0 ) {
	 	$cpt=1;
		$colorBg = "#E0E5E6";
		} 
		else {
		$cpt=0;
		$colorBg = "#E0E5E6";
		}
		if($row->printing==1){$checked="checked";}else{$checked="";}
	 ?>
        <tr bgcolor="<?=$colorBg ;?>" >
		<td style='display:none'><?=$row->id_lab;?></td>
		<td><?=$insert_time;?></td>
		<td><?=$lab;?></td>
		<td><?=$op3;?></td>
		<td>
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
		<input type='checkbox'  class="check-lab-print" name="checklabprint" value="<?=$row->id_lab?>" />
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		
		
		
		<td>
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
		<a title="Eliminar laboratorio <?=$row->laboratory;?>" class="deletelab" id="<?=$row->id_lab; ?>"  style="color:red;cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		
		 </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
<span id="lab_id"></span>


<div class="modal fade" id="print_lab_foto"  role="dialog" >
<div class="modal-dialog modal-xs" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="print_lab_foto_horiz"  role="dialog" >
<div class="modal-dialog modal-xs" >
<div class="modal-content" >

</div>
</div>
</div>




<script>

	$('#print_lab_foto').on('hidden.bs.modal', function () {
	allLaboratorios();
	})
	$('#print_lab_foto_horiz').on('hidden.bs.modal', function () {
	allLaboratorios();
	})

//$(".refresh-labb").click(function(){allLaboratorios();})
//-----------------------------------------------------------------------
$('.check-lab-print').change(function() {
   if ($(this).is(':checked')) {
     var labid= $(this).val();
	 var print= 1;
	 } 
	  
	  else {
	var labid= $(this).not(":checked").val();
	var print= 0;
 }
	  
	 	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/check_lab')?>',
		data: {labid:labid, print:print},
		success:function(data) {
      }
		});
     
 })


//-------------------------------------------------------------------------------------
$('.print-me').click(function(){
	//allLaboratorios();
    if(!$('.is_print input[type="checkbox"]').is(':checked')){
		
      alert("Por favor marque al menos uno.");
      return false;
    }
});
 
//----------------------------------------------------------------------------------
$(".deletelab").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteHistLab')?>',
data: {id : del_id},
success:function(response) {
$("#update_count").load(location.href + " #update_count>*", "");
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
allLaboratorios();

}
});
}
})



  $('.is_print').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
	
	
		   var $checkboxes = $('.is_print td input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        if(countCheckedCheckboxes==12){
			$('.is_print td input[type="checkbox"]:not(:checked)').prop("disabled",true);
		}else{
		$('.is_print td input[type="checkbox"]:not(:checked)').prop("disabled",false);	
		}
    });

</script>