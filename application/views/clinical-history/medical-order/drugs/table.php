<table class="table table-striped" style="font-size:14px" >
             <thead>
               <tr>
                 <th scope="col">Fecha</th>
                 <th scope="col">Medicamento</th>
                 <th scope="col"></th>
                  <th scope="col">Nota</th>
				<th scope="col">Editar</th>
				<th scope="col">Eliminar</th>
               </tr>
             </thead>
             <tbody>
    <?php
 
	foreach($ordenMedReRows->result() as $row)
	 
	 {
		$op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
        $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));			 
		
		 ?>
       <tr >
		<td><?=$fecha;?></td>
		<td><?=$row->medica;?></td>
       <td title='Presentation: <?=$row->presentacion?>&#013 Frecuencia: <?=$row->frecuencia?> &#013 Via: <?=$row->via?>'  ><i class="fa fa-eye"></i></td>
       <td><?=$row->nota;?></td>
       <td>
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
      <button type="button" class="btn btn-primary btn-sm orden-med-update-drug"  id="<?=$row->id_i_m; ?>"><i class="bi bi-pencil-square"></i></a>
    <?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td>
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
       <button title="Eliminar recetas <?=$row->medica;?>" type="button" class="btn btn-danger btn-sm delete-ord-med-drug1" id="<?=$row->id_i_m; ?>" ><i class="bi bi-x-square"></i></button>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>

      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>  
           </table>
		   
		     <script>
		    $('.medical-orden-total-drugs').html('<?=$num_rows?>');

			$(document).on('click', '.delete-ord-med-drug1', function(event){ 
			event.stopImmediatePropagation();
			if (confirm("Lo quiere eliminar ?"))
			{ 
			var el = this;
			var del_id = $(this).attr('id');

			$.ajax({
			type:'POST',
			url:'<?=base_url('h_c_orden_medica_drug/deleteDrug')?>',
			data: {id : del_id},
			success:function(response) {
			$(el).closest('tr').css('background','tomato');
			$(el).closest('tr').fadeOut(800, function(){ 
			$(this).remove();
			});
			//indication_med_down();

			}
			});
			}
			}) 
		
		   </script>