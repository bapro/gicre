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
		<input type="checkbox"  class="copy-one" title='seleccionar para elimiar' /> 
		<input type="checkbox"  class="imprimir-one"  name="imprimir-one[]" style="display:none" value="<?=$row->id_i_m;?>" title='seleccionar par imprimir' />
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
	<input class='drug-id' name="drug-id-<?=$row->id; ?>" type='hidden' value="<?=$row->drug_id?>" />
	<input class='centro-id' name="centro-id-<?=$row->id;?>" type='hidden' value="<?=$row->centro?>" />
	<input class='hosp-id' name="hosp-id-<?=$row->id;?>" type='hidden' value="<?=$row->idemp?>" />
	
	
	
	</td>
	<td>
	<span class='show-past-date'><?=$fecha?></span>
	<span class='show-current-date' style='display:none'><?=date("d-m-Y H:i:s")?></span>
	</td>
	<td>Insumos</td>
		<td>
		<input type="checkbox"  class="copy-one" title='seleccionar para elimiar' /> 
		<input type="checkbox"  class="imprimir-one"  name="imprimir-one[]" style="display:none" value="<?=$row->id;?>" title='seleccionar par imprimir' />
		 </td>
       </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>