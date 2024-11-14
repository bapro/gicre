<div id="sfsdfs5555"></div>
<table class="table table-striped" style="font-size:14px" >
             <thead>
			 <tr>

				<td colspan='7'>
				<div id="show-text-area-reason-cancel-est"></div>

				</td>
				</tr>
               <tr>
			   <th scope="col">#</th>
                 <th scope="col">Fecha</th>
                 <th scope="col">Estudio</th>
                 <th scope="col">Parte del cuerpo</th>
                  <th scope="col">Lateral</th>
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
		if(is_numeric($row->estudio)){		
		$estudio=$this->db->select('sub_groupo')->where('id_c_taf',$row->estudio)->get('centros_tarifarios_test')->row('sub_groupo'); 
		 }else{
			$estudio=$row->estudio; 
		 }
		 ?>
       <tr >
	   <td><?=$row->id;;?></td>
		<td><?=$fecha;?></td>
		<td><?=$estudio;?></td>
       <td class="hide-cancel-td-study"><?=$row->cuerpo;?></td>
       <td class="hide-cancel-td-study"><?=$row->lateralidad;?></td>
       <td class="hide-cancel-td-study"><?=$row->observacion;?></td>
       <td class="hide-cancel-td-study">
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
      <button type="button" class="btn btn-primary btn-sm orden-med-update-study"  id="<?=$row->id; ?>"><i class="bi bi-pencil-square btn btn-primary btn-sm"></i></a>
    <?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td class="hide-cancel-td-study">
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
       <button title="Eliminar" type="button" class="btn btn-danger btn-sm delete-ord-med-study" id="<?=$row->id; ?>" ><i class="bi bi-x-square btn btn-danger btn-sm"></i></button>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
 <td colspan='7' >
 <div style="display:none" class='show-text-area-reason-cancel-study'>
<div class='form-floating mb-3'>
<textarea class='form-control cl-ord-med-study reasonToCancelTableStudy'  placeholder='Escribir porque quiere cancelar este registro' style='width: 100%'></textarea>
<label>Porque lo quiere cancelar?</label>
</div>
<button class='btn btn-sm btn-danger float-end m-1 anular-cancel-study'>Anular</button>
<button class='btn btn-sm btn-success float-end m-1 save-cancel-study' id='<?=$row->id; ?>'>Guardar</button>

</div>
</td>
      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>  
           </table>
		   
		    <script>
		    $('.medical-orden-total-studies').html('<?=$num_rows?>');
		
		
		   </script>