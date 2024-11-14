<div style='overflow-x:auto;'>
<table  class="table table-striped" style="width:100%"  id='petitions-list'>

	<thead>
    <tr style="background:#428bca;">
	<th style="color:white"><strong># KARDEX</strong></th>
	   <th style="color:white"><strong>Medicamento</strong></th>
	   <th style="color:white"><strong>Cantidad</strong></th>
	   <th style="color:white">Dosis</th>
	    <th style="color:white">Via</th> 
		<th style="color:white">Usuario</th> 
		<th style="color:white">Fecha</th> 
		<th style="color:white">Tipo</th> 
		<th style="color:white">Despachar</th> 
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($query2->result() as $row)
     {
	$op=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->updated_time));
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
	<span class='drug-id' style='display:none'><?=$row->drug_id?></span>
	<span class='centro-id' style='display:none'><?=$row->centro?></span>
	<span class='hosp-id' style='display:none'><?=$row->id_hosp?></span>
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Medicamentos</td>
		<td>
		<input type="checkbox"  class="copy-one" title='seleccionar para elimiar' /> 
		<input type="checkbox"  class="imprimir-one" style="display:none" title='seleccionar par imprimir' /> 
		 </td>
       </tr>

	 <?php
	 }
	
	 foreach($query3->result() as $row)
     {
	$op=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->updated_time));
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
	<span class='drug-id' style='display:none'><?=$row->drug_id?></span>
	<span class='centro-id' style='display:none'><?=$row->centro?></span>
	<span class='hosp-id' style='display:none'><?=$row->idemp?></span>
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Insumos</td>
		<td>
		<input type="checkbox"  class="copy-one" title='seleccionar para elimiar' /> 
		<input type="checkbox"  class="imprimir-one" style="display:none" title='seleccionar par imprimir'  /> 
		 </td>
       </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>

<hr/>

<?php
$this->session->set_userdata('is_patient_dispatched',$is_patient_dispatched);
?>
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
		<th style="color:white">Action <a target="_blank" title="Seleccionar antes de imprimir" id="link-print" href="<?php echo base_url("printings_hospitalizacion/farma_interna/$id_patient/$id_user")?>" ><i  class="fa" style="color:white" >&#xf02f;</i></a></th> 
     </tr>
    </thead>
	<?php
	if(!$is_patient_dispatched){
		
	?>
    <tbody>
   
    </tbody>
	<?php } else { ?>
    <tbody>
    <?php

	 foreach($query4->result() as $row)
     {
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
	<span class='drug-id' style='display:none'><?=$row->drug_id?></span>
		<span class='centro-id' style='display:none'><?=$row->centro?></span>
	<span class='hosp-id' style='display:none'><?=$row->id_hosp?></span>
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Medicamentos</td>
		<td>
		<input type="checkbox"  class="copy-one" title='seleccionar para devolver' checked /> 
		<input type="checkbox"  class="imprimir-one"  title='seleccionar par imprimir' />
		 </td>
       </tr>

	 <?php
	 }
	
	 foreach($query5->result() as $row)
     {
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
	<span class='drug-id' style='display:none'><?=$row->drug_id?></span>
		<span class='centro-id' style='display:none'><?=$row->centro?></span>
	<span class='hosp-id' style='display:none'><?=$row->idemp?></span>
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Insumos</td>
		<td>
		<input type="checkbox" checked class="copy-one" title='seleccionar para devolver' /> 
		<input type="checkbox"  class="imprimir-one"  title='seleccionar par imprimir'  />
		 </td>
       </tr>

	 <?php
	 }
	 ?>
    </tbody>
	<?php } ?>
</table>
</div>
<script>
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
	   var drug_id=$(this).closest('tr').find('.drug-id').text();
	   var centro=$(this).closest('tr').find('.centro-id').text();
	    var id_hosp=$(this).closest('tr').find('.hosp-id').text();
	    dispatchMed(id, 1, drug_id, centro, id_hosp);
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
	   var drug_id=$(this).closest('tr').find('.drug-id').text();
		var id = $(this).closest("tr").attr('id');
	     var centro=$(this).closest('tr').find('.centro-id').text();
	    var id_hosp=$(this).closest('tr').find('.hosp-id').text();
		dispatchMed(id, 0, drug_id, centro, id_hosp);
		$(this).closest('tr').clone().appendTo('#petitions-list>tbody');
		})
		
		
		
	function dispatchMed(id, action, drug_id, centro, id_hosp){
		
	$.ajax({
	url:"<?php echo base_url(); ?>hosp_kardex/dispatchMedFarma",
	data: {id_med: id, id_user:<?=$id_user?>,id_pat:<?=$id_patient?>, action: action, drug_id:drug_id, centro:centro, id_hosp:id_hosp},
	method:"POST",
	success:function(data){
	},
	 
	});

	}

		
		$('#petition-dispatch').on('click','.imprimir-one',function(e){	
		var id = $(this).closest("tr").attr('id');
	if ($(this).is(':checked')) {

	var print= 1;
	} 

	else {
	
	var print= 0;
	}
    
	$.ajax({
	type:'POST',
	url:'<?=base_url('hosp_kardex/checkReceptionPetitionPrint')?>',
	data: {id:id, print:print,id_pat:<?=$id_patient?>,id_user:<?=$id_user?>},
	success:function(data) {

	}
	});


	})
		
		


 /*var $checkb = $('#petition-dispatch td .imprimir-one');
        
    $checkb.change(function(){
        var countCheckedCheckboxes = $checkb.filter(':checked').length;
		alert(countCheckedCheckboxes);
		if(countCheckedCheckboxes >0){
		$(".link-print").show();	
		}else{
			$(".link-print").hide();	
		}
		
    });*/	
	

	
	
</script>