<table class="table table-striped" style="font-size:14px" >
             <thead>
               <tr>
                 <th scope="col">Fecha</th>
                 <th scope="col">Medidas Generales</th>
                 <th scope="col">Intervalo de realización</th>
                  <th scope="col">Descripción</th>
				<th scope="col">Editar</th>
				<th scope="col">Eliminar</th>
               </tr>
             </thead>
             <tbody>
    <?php
 
	foreach($ordenMedReRows->result() as $row)
	 
	 {
		$op=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
        $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));			 
		
		 ?>
       <tr >
		<td><?=$fecha;?></td>
		<td><?=$row->medidas_gen;?></td>
       <td><?=$row->intervalo_de_real;?></td>
       <td><?=$row->descripcion_mg;?></td>
       <td>
		<?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>
      <button type="button" class="btn btn-primary btn-sm orden-med-update-mg"  id="<?=$row->idem; ?>"><i class="bi bi-pencil-square"></i></a>
    <?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td>
		<?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>
       <button title="Eliminar" type="button" class="btn btn-danger btn-sm delete-ord-med-mg1" id="<?=$row->idem; ?>" ><i class="bi bi-x-square"></i></button>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>

      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>  
           </table>
		   
		   
		      <script>
		    $('.medical-orden-total-mg').html('<?=$num_rows?>');
			$(document).on('click', '.delete-ord-med-mg1', function(event){ 
			event.stopImmediatePropagation();
			if (confirm("Lo quiere eliminar ?"))
			{ 
			var el = this;
			var del_id = $(this).attr('id');

			$.ajax({
			type:'POST',
			url:'<?=base_url('h_c_orden_medica_medidas_generales/deleteMedidaGen')?>',
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