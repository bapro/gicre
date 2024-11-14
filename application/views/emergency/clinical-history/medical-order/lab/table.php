
 <table class="table table-striped " style="font-size:14px;width:100%" id="laboratorios-data-list">
             <thead>
				<tr>

				<td colspan='3'>
				<div id="show-text-area-reason-cancel-lab"></div>

				</td>
				</tr>
             <th scope="col">#</th>
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
		 ?>
       <tr >
	   <td><?=$row->id;?></td>
		<td class="hide-cancel-td-lab"><?=$fecha;?></td>
		<td><?=$row->laboratory;?></td>
		<td class="hide-cancel-td-lab">
		<?php if($row->operator==$user_id || $this->session->userdata('user_id')=="Admin") {?>
       <button title="Eliminar" type="button" class="btn btn-danger btn-sm delete-ord-med-lab" id="<?=$row->id; ?>" ><i class="bi bi-x-square btn btn-danger btn-sm"></i></button>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		
		 <td colspan='3' >
 <div style="display:none" class='show-text-area-reason-cancel-lab'>
<div class='form-floating mb-3'>
<textarea class='form-control cl-ord-med-lab reasonToCancelTableLab'  placeholder='Escribir porque quiere cancelar este registro' style='width: 100%'></textarea>
<label>Porque lo quiere cancelar?</label>
</div>
<button class='btn btn-sm btn-danger float-end m-1 anular-cancel-lab'>Anular</button>
<button class='btn btn-sm btn-success float-end m-1 save-cancel-lab' id='<?=$row->id; ?>'>Guardar</button>

</div>


	
	</td>
      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>
           </table>
		   
		   <script>
		    $('.medical-orden-total-labs').html('<?=$num_rows?>');
		
		   </script>
	
		