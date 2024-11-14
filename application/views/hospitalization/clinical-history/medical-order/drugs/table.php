<table class="table table-striped" style="font-size:14px" >
             <thead>
				
               <tr>
			   <th scope="col">#</th>
                 <th scope="col">Fecha</th>
                 <th scope="col">Medicamento</th>
				  <th scope="col">Cantidad</th>
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
		if(is_numeric($row->medica)){		
		$medica=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name'); 
		 }else{
			$medica=$row->medica; 
		 }
		 ?>
       <tr >
	   <td><?=$row->id;?></td>
		<td><?=$fecha;?></td>
		<td><?=$medica;?></td>
		<td  class="hide-cancel-td-drug"><?=$row->cantidad;?></td>
       <td class="hide-cancel-td-drug" title='Presentation: <?=$row->presentacion?>&#013 Frecuencia: <?=$row->frecuencia?> &#013 Via: <?=$row->via?>'  ><i class="fa fa-eye"></i></td>
       <td class="hide-cancel-td-drug"><?=$row->nota;?></td>
       <td  class="hide-cancel-td-drug">
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
      <button type="button" class="btn btn-primary btn-sm orden-med-update-drug"  id="<?=$row->id; ?>"><i class="bi bi-pencil-square btn btn-primary btn-sm"></i></a>
    <?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td  class="hide-cancel-td-drug">
		<?php if($row->kardex==0) {?>
       <button title="Eliminar recetas <?=$row->medica;?>" type="button" class="btn btn-danger btn-sm delete-ord-med-drug" id="<?=$row->id; ?>" ><i class="bi bi-x-square btn btn-danger btn-sm"></i></button>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
 <td colspan='6' >
 <div style="display:none" class='show-text-area-reason-cancel-drug'>
<div class='form-floating mb-3'>
<textarea class='form-control cl-ord-med-study reasonToCancelTableDrug'  placeholder='Escribir porque quiere cancelar este registro' style='width: 100%'></textarea>
<label>Porque lo quiere cancelar?</label>
</div>
<button class='btn btn-sm btn-danger float-end m-1 anular-cancel-drug'>Anular</button>
<button class='btn btn-sm btn-success float-end m-1 save-cancel-drug' id='<?=$row->id; ?>'>Guardar</button>

</div>


	
	</td>
      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>  
           </table>
		   
		     <script>
		    $('.medical-orden-total-drugs').html('<?=$num_rows?>');

		
		
		   </script>