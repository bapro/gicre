<form method="post" target="_blank"  action="<?php echo site_url('internal_drugstore/save_farma_interna');?>" >
<input type="hidden" name="id_patient" value="<?=$id_patient?>" />
<input type="hidden" name="id_user" value="<?=$id_user?>" />
<table  class="table table-striped" style="width:100%"  id='petition-dispatch'>

	<thead>
    <tr style="background:#428bca;">
	<th style="color:white"><strong>#</strong></th>
	   <th style="color:white"><strong>Medicamento</strong></th>
	   <th style="color:white"><strong>Cantidad</strong></th>
	   <th style="color:white">Dosis</th>
	    <th style="color:white">Via</th> 
		<th style="color:white">Usuario</th> 
		<th style="color:white">Fecha</th> 
		<th style="color:white">Tipo</th> 
		<th style="color:white">Action <button type="subimt" id="print-all" class="btn btn-primary btn-lg " > <i  class="fa" >&#xf02f;</i></button></th> 
     </tr>
    </thead>
	<?php
	if(!$id_patient){
		
	?>
    <tbody>
   
    </tbody>
	<?php } else { ?>
    <tbody>
    <?php

	 foreach($query4->result() as $row)
     {
	$dispatched_id=$this->db->select('id_med')->where('id_med',$row->id_i_m)->where('is_printed',1)->get('dispatched_drug')->row('id_med');
	if($dispatched_id){
		$disabled_select= "disabled";
	}else{
	$disabled_select= "";			
	}
	
	

	
	
	$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->date_time));
	$med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
	if($row->new_cant){
	$cant=$row->new_cant;	
	}else{
	$cant=$row->cantidad;	
	}
	 ?>
	<tr id="<?=$row->id_i_m; ?>" >
	<td><?=$row->id_i_m;?></td>
	<td><?=$med;?></td>
    <td>
	<?=$cant;?>
	</td>
     <td><?=$row->dosis;?></td>
	<td><?=$row->via?></td>
	<td>
	<span class='show-past-user'><?=$op?></span>
	<span class='show-current-user' style='display:none'><?=$userName?></span>
	<input class='drug-id' name="drug-id-<?=$row->id_i_m;?>" type='hidden' value="<?=$row->drug_id?>" />
	<input class='centro-id' name="centro-id-<?=$row->id_i_m;?>" type='hidden' value="<?=$row->centro?>" />
	<input class='hosp-id' name="hosp-id-<?=$row->id_i_m;?>" type='hidden' value="<?=$row->id_hosp?>" />
	
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Medicamentos</td>
		<td>
		<input type="checkbox"  class="copy-one" title='seleccionar para devolver' checked <?=$disabled_select?>/> 
		<input type="checkbox"  class="imprimir-one"  name="imprimir-one[]"  value="<?=$row->id_i_m;?>" title='seleccionar par imprimir' />
		 </td>
       </tr>

	 <?php
	 }
	
	 foreach($query5->result() as $row)
     {
	$dispatched_id=$this->db->select('id_med')->where('id_med',$row->id)->where('is_printed',1)->get('dispatched_drug')->row('id_med');
	if($dispatched_id){
		$disabled_select= "disabled";

	}else{
	$disabled_select= "";
			
	}
	
	

	
	$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->date_time));
	$med=$this->db->select('name')->where('id',$row->insumo)->get('emergency_medicaments')->row('name');
	 ?>
	<tr id="<?=$row->id; ?>" >
	<td><?=$row->id;?></td>
	<td><?=$med;?></td>
    <td>
	<?=$row->cantidad;?>
	</td>
     <td>---</td>
	<td>---</td>
	<td>
	<span class='show-past-user'><?=$op?></span>
	<span class='show-current-user' style='display:none'><?=$userName?></span>
	<input class='drug-id' name="drug-id-<?=$row->id;?>" type='hidden' value="<?=$row->drug_id?>" />
	<input class='centro-id' name="centro-id-<?=$row->id;?>" type='hidden' value="<?=$row->centro?>" />
	<input class='hosp-id' name="hosp-id-<?=$row->id;?>" type='hidden' value="<?=$row->idemp?>" />
	
	
	
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Insumos</td>
		<td>
		<input type="checkbox" checked class="copy-one" title='seleccionar para devolver' <?=$disabled_select?> /> 
		<input type="checkbox"  class="imprimir-one" name="imprimir-one[]" title='seleccionar par imprimir' value="<?=$row->id;?>" />
		 </td>
       </tr>

	 <?php
	 }
	 ?>
    </tbody>
	<?php } ?>
</table>
</form>

<script>




  let btn = document.getElementById("print-all");
btn.addEventListener('click', event => {
	  let espontanea= [];
 $(".imprimir-one:checked").each(function(){
   $(this).closest('tr').find('.copy-one').prop('disabled', true);
 });

	
});


	$('#petitions-list').on('click','.copy-one',function(e){
	if($(this).is(':checked',true)) {
	$(this).closest('tr').fadeOut(800, function(){ 
	$(this).remove();
	});
	$(this).closest('tr').find('.show-print').show();
	$(this).closest('tr').find('.show-current-date').show();
	 $(this).closest('tr').find('.show-past-date').hide();
	  $(this).closest('tr').find('.show-past-user').hide();
	  $(this).closest('tr').find('.show-current-user').show();
	  $(this).closest('tr').find('.imprimir-one').show();
	  var id = $(this).closest("tr").attr('id');
	   var drug_id=$(this).closest('tr').find('.drug-id').val();
	  dispatchMed(id, 1, drug_id);
	  $(this).closest('tr').clone().appendTo('#petition-dispatch>tbody');
	}

	})
	
	
	
		$('#petition-dispatch').on('click','.copy-one',function(e){
		 e.preventDefault();
		 $(this).closest('tr').find('.show-print').hide();
		 $(this).closest('tr').find('.imprimir-one').hide();
		 $(this).closest('tr').find('.show-current-date').hide();
		  $(this).closest('tr').find('.show-past-date').show();
		   $(this).closest('tr').find('.show-past-user').show();
		   $(this).closest('tr').find('.show-current-user').hide();
        $(this).closest('tr').fadeOut(800, function(){ 
		$(this).remove();
		});
	   var drug_id=$(this).closest('tr').find('.drug-id').val();
		var id = $(this).closest("tr").attr('id');
		dispatchMed(id, 0, drug_id);
		$(this).closest('tr').clone().appendTo('#petitions-list>tbody');
		})
		
		
		
	function dispatchMed(id, action, drug_id){
		
	$.ajax({
	url:"<?php echo base_url(); ?>internal_drugstore/dispatchMedFarma",
	data: {id_med: id, id_user:<?=$id_user?>,id_pat:<?=$id_patient?>, action: action, drug_id:drug_id},
	method:"POST",
	success:function(data){
	},
	 
	});

	}

		
	
	

	
	
</script>