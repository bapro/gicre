
 <table class="table table-striped " style="font-size:14px;width:100%" id="laboratorios-data-list">
             <thead>
               <tr>
                 <th scope="col">Fecha</th>
                 <th scope="col">Laboratorio</th>
				 <th scope="col">Eliminar</th>
                </tr>
             </thead>
                      <tbody>
    <?php
 
	foreach($query->result() as $row)
	 
	 {
		 $fecha = date("d-m-Y H:i:s", strtotime($row->insert_time));			 
		 $lab=$this->clinical_history->select('name')->where('id',$row->laboratory)
            ->get('laboratories')->row('name');
		 ?>
       <tr >
		<td><?=$fecha;?></td>
		<td><?=$lab;?></td>
		<td>
		<?php if($row->operator==$user_id) {?>
       <button title="Eliminar" type="button" class="btn btn-danger btn-sm delete-ord-med-lab_" id="<?=$row->id_lab; ?>" ><i class="bi bi-x-square btn btn-danger btn-sm"></i></button>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>
           </table>
		   
		   <script>
		    $('.medical-orden-total-labs').html('<?=$num_rows?>');
			

			$('.delete-ord-med-lab_').on('click',  function(event){ 
			event.preventDefault();
			if (confirm("Lo quiere eliminar ?"))
			{ 
			var el = this;
			var del_id = $(this).attr('id');

			$.ajax({
			type:'POST',
			url:'<?=base_url('h_c_indication_lab/delete_lab_by_id')?>',
			data: {id : del_id, table:"orden_medcia_lab"},
			success:function(response) {
			$(el).closest('tr').css('background','tomato');
			$(el).closest('tr').fadeOut(800, function(){ 
			$(this).remove();
			});

			}
			});
			}
			})
			
			
		
		   </script>
	
		