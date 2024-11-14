
  <span style="color:green;"  ><i>Total recetas <?=$tot?></i></span>
 
<table  class="table table-striped table-bordered  is_print_rect saved-rows-recetas" style="width:100%" cellspacing="0" id='paginate-rec-<?=$pag_rec?>'>

	<thead>
    <tr style="background:#428bca;">
	   <th  style='display:none'></th>
	   <th style="width:4px;color:white"><strong>Fecha</strong></th>
        <th style="width:3px;color:white">Medica.</th>
		 <th style="width:5px;color:white">Present.</th>
		 <th style="width:1px;color:white">Frec.</th>
		  <th style="width:1px;color:white"><strong>Via</strong></th>
        <th style="width:5px;color:white">Cant.(dias)</th>
		 <th style="width:1px;color:white">Oper.</th>
		  <td  style="width:1px;">
		<!--<ul class="nav navbar-nav">
		<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
		<ul class="dropdown-menu">
		<li><a data-toggle="modal"  data-target="#print_rec_foto"  href="<?php echo base_url("printings/print_if_foto/$historial_id/$user_id/0/rec")?>"  style="cursor:pointer;color:black" class="btn-sm print-me-rect" title='Imprimir Con Formato Vertical'>Imprimir Con Formato Vertical</a></li>
		<li><a data-toggle="modal"  data-target="#print_if_foto_oriz"  href="<?php echo base_url("printings/print_if_foto_oriz/$historial_id/$user_id/0/rec")?>"  style="cursor:pointer;color:black" class="btn-sm print-me-rect" title='Imprimir Con Formato Horizontal' >Imprimir Con Formato Horizontal</a></li>
		</ul>
		</li>
		</ul>-->
		
		<ul class="nav navbar-nav show-btn-print-all" style='display:none'>
		<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
		<ul class="dropdown-menu">
		<li>
		<a>FORMATO VERTICAL</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/vert/1/singular_id/h_c_indicaciones_medicales/$centro_medico")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/vert/0/singular_id/h_c_indicaciones_medicales/$centro_medico")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		<li>
		<a>FORMATO HORIZONTAL</a>
	    <a  class="imprimirRecetasForPat horiz" id='1' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/horiz/1/singular_id/h_c_indicaciones_medicales/$centro_medico")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat horiz" id='0' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$historial_id/horiz/0/singular_id/h_c_indicaciones_medicales/$centro_medico")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		</ul>
		</li>
		</ul>
		</td> 
		 <th style="width:1px;color:white">Edit.</th>
		 <th style="width:1px;color:white">Bor.</th>
     </tr>
    </thead>
    <tbody>
    <?php
    $cpt="";
	foreach($IndicacionesPrevias as $row)
	 
	 {
		$op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
$fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));			 
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
	   	<td style='display:none'><?=$row->id_i_m;?></td>
		<td><?=$fecha;?></td>
		<td><?=$row->medica;?><br/><i><u><?=$row->dosis;?></u></i></td>
		<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?><br/><?=$row->oyo;?></td>
		<td>
		<?php
		if($row->cantidad==0){echo "uso continuo";}else{echo $row->cantidad;}
		?>
		</td>
		<td><?=$op;?></td>
		<td>
		<?php if($row->operator==$user_id  || $perfil=="Admin") {?>
		<input type='checkbox'  class="check-recet-print"  value="<?=$row->id_i_m?>" />
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td>
		<?php if($row->operator==$user_id  || $perfil=="Admin") {?>
		<a data-toggle="modal" data-target="#edit_recetas" href="<?php echo base_url("saveHistorial/edit_recetas/$row->id_i_m/$user_id")?>" style="cursor:pointer" title="Editar" class="btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td>
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
       <a title="Eliminar recetas <?=$row->medica;?>" style="cursor:pointer" class="delete-recetas" id="<?=$row->id_i_m; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>

<div class="modal fade" id="edit_recetas"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="print_rec_foto"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="print_if_foto_oriz"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>


<script>

console.log($("#selected_centro_rec").val());

$('.check-recet-print').change(function() {
   if ($(this).is(':checked')) {
     var id= $(this).val();
	 var print= 1;
	 } 
	 
	  else {
	var id= $(this).not(":checked").val();
	var print= 0;
 }
	 	$.ajax({
		type:'POST',
		url:'<?=base_url('saveHistorial/check_recetas')?>',
		data: {id:id, print:print,id_pat:<?=$historial_id?>},
		success:function(data) {
			
      }
		});
     
 })


$('.imprimirRecetasForPat').on('click', function () {
$('.check-recet-print').prop('checked', false); 
});

	$('#print_if_foto_oriz').on('hidden.bs.modal', function () {
	allRecetas($("#selected_centro_rec").val());
	})	
	
	
$('#edit_recetas').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
allRecetas($("#selected_centro_rec").val());
});


$(".delete-recetas").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('saveHistorial/DeleteRecetas')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
allRecetas($("#selected_centro_rec").val());
 
}
});
}
})



$(document).ready(function() {


$('#paginate-rec-<?=$pag_rec?>').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
	
	
   var $checkboxes = $('.is_print_rect td input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        if(countCheckedCheckboxes==6){
			$('.is_print_rect td input[type="checkbox"]:not(:checked)').prop("disabled",true);
		}else{
		$('.is_print_rect td input[type="checkbox"]:not(:checked)').prop("disabled",false);	
		}
		
		if(countCheckedCheckboxes >0){
		$(".show-btn-print-all").show();	
		}else{
			$(".show-btn-print-all").hide();	
		}
    });
	
	
	
	


		
	
});
</script>
