<table class="table table-striped" style="font-size:14px" >
             <thead>
			 <tr>

				<td colspan='6'>
				<div id="show-text-area-reason-cancel-medgen"></div>

				</td>
				</tr>
               <tr>
			   <th scope="col">#</th>
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
	   <td><?=$row->id;?></td>
		<td><?=$fecha;?></td>
		<td><?=$row->medidas_gen;?></td>
       <td class="hide-cancel-td-medg"><?=$row->intervalo_de_real;?></td>
       <td class="hide-cancel-td-medg"><?=$row->descripcion_mg;?></td>
       <td class="hide-cancel-td-medg">
		<?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>
      <button type="button" class="btn btn-primary btn-sm orden-med-update-mg"  id="<?=$row->id; ?>"><i class="bi bi-pencil-square btn btn-primary btn-sm"></i></a>
    <?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td class="hide-cancel-td-medg">
		<?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>
       <button title="Eliminar" type="button" class="btn btn-danger btn-sm delete-ord-med-mg" id="<?=$row->id; ?>" ><i class="bi bi-x-square btn btn-danger btn-sm"></i></button>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
 <td colspan='5' >
 <div style="display:none" class='show-text-area-reason-cancel-medg'>
<div class='form-floating mb-3'>
<textarea class='form-control cl-ord-med-medg reasonToCancelTableMedg'  placeholder='Escribir porque quiere cancelar este registro' style='width: 100%'></textarea>
<label>Porque lo quiere cancelar?</label>
</div>
<button class='btn btn-sm btn-danger float-end m-1 anular-cancel-medg'>Anular</button>
<button class='btn btn-sm btn-success float-end m-1 save-cancel-medg' id='<?=$row->id; ?>'>Guardar</button>

</div>
</td>
      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>  
           </table>
		   
		   
		      <script>
		    $('.medical-orden-total-mg').html('<?=$num_rows?>');
		
		   </script>