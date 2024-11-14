<em style="color:green;"><?=$num_count_lab?> datos</em>
<table  class="table table-striped table-bordered is_print" id='tab-lab-print' style="width:100%" cellspacing="0">
<thead>
    <tr style="background:#428bca;">
	<th style='display:none'></th>
	   <th style="width:1px;color:white"><strong>Fecha</strong></th>
        <th style="width:5px;color:white">Laboratorio</th>
		 <th style="width:5px;color:white">Medico</th>
		 <th style="width:5px;">
		<!-- <ul class="nav navbar-nav">
		<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown"  ><i style="font-size:24px;color:white" class="fa">&#xf02f;</i><span style="cursor:pointer" class="caret"></span></span>
		<ul class="dropdown-menu">
		<li><a data-toggle="modal"  data-target="#print_lab_foto"  href="<?php echo base_url("printings/print_if_foto/$historial_id/$area/$user_id/lab")?>"  style="cursor:pointer;color:black" class="btn-sm print-me" >Con Formato Vertical</a></li>
		<li><a data-toggle="modal"  data-target="#print_lab_foto_horiz"  href="<?php echo base_url("printings/print_if_foto_oriz/$historial_id/$area/$user_id/lab")?>"  style="cursor:pointer;color:black" class="btn-sm print-me" >Con Formato Horizontal</a></li>
		
		</ul>
		</li>
		</ul>-->
		
		<ul class="nav navbar-nav show-btn-print-all-lab" style='display:none'>
		<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
		<ul class="dropdown-menu">
		<li>
		<a>FORMATO VERTICAL</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/vert/1/singular_id/h_c_indications_labs")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/vert/0/singular_id/h_c_indications_labs")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		<li>
		<a>FORMATO HORIZONTAL</a>
	    <a  class="imprimirRecetasForPat horiz" id='1' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/horiz/1/singular_id/h_c_indications_labs")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat horiz" id='0' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/horiz/0/singular_id/h_c_indications_labs")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
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
		<?php if($row->operator==$user_id || $perfil=="Admin") {
			?>
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

<script>

$('.imprimirRecetasForPat').on('click', function () {
$('.check-lab-print').prop('checked', false); 
});





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
		data: {labid:labid, print:print,id_pat:<?=$historial_id?>,user_id:<?=$user_id?>},
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
	   "pageLength": 20,
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
		
		if(countCheckedCheckboxes >0){
		$(".show-btn-print-all-lab").show();	
		}else{
			$(".show-btn-print-all-lab").hide();	
		}
		
		
    });





</script>