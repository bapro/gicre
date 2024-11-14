<table  class="table table-striped table-bordered  is_print_rect" style="width:100%" cellspacing="0" id='paginate-rec-<?=$pag_rec?>'>

	<thead>
    <tr style="background:#428bca;">
	   <th style="width:4px;color:white"><strong>Fecha</strong></th>
        <th style="width:3px;color:white">Medica.</th>
		 <th style="width:5px;color:white">Present.</th>
		 <th style="width:1px;color:white">Frec.</th>
		  <th style="width:1px;color:white"><strong>Via</strong></th>
        <th style="width:5px;color:white">Cant.(dias)</th>
		 <th style="width:1px;color:white">Oper.</th>
		  <td  style="width:1px;">
		<ul class="nav navbar-nav">
		<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
		<ul class="dropdown-menu">
		<li><a data-toggle="modal"  data-target="#print_rec_foto"  href="<?php echo base_url("printings/print_if_foto/$historial_id/$user_id/0/rec")?>"  style="cursor:pointer;color:black" class="btn-sm print-me-rect" title='Imprimir Con Formato Vertical'>Imprimir Con Formato Vertical</a></li>
		<!--<li><a target="_blank" href="<?php echo base_url("printings/print_recetas_horizontal/$historial_id/$user_id")?>" style="cursor:pointer;color:black" class="btn-sm print-me-rect" >Imprimir Con Formato Horizontal</a></li>-->
		
		<li><a data-toggle="modal"  data-target="#print_if_foto_oriz"  href="<?php echo base_url("printings/print_if_foto_oriz/$historial_id/$user_id/0/rec")?>"  style="cursor:pointer;color:black" class="btn-sm print-me-rect" title='Imprimir Con Formato Horizontal' >Imprimir Con Formato Horizontal</a></li>
		</ul>
		</li>
		</ul>
		</td> 
		 <th style="width:1px;color:white">Edit.</th>
		 <th style="width:1px;color:white">Bor.</th>
     </tr>
    </thead>
    <tbody>
    <?php
    $cpt="";
	foreach($IndicacionesPrevias as $row)
	 
	 {
		$op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
$fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));			 
		if ( $cpt==0 ) {
		$cpt=1;
		$colorBg = "#E0E5E6";
		} 
		else {
		$cpt=0;
		$colorBg = "#E0E5E6";
		}
		if($row->printing==1){$checked="checked";}else{$checked="";}
			 ?>
       <tr bgcolor="<?=$colorBg ;?>" >
		<td><?=$fecha;?></td>
		<td><?=$row->medica;?><br/><i><u><?=$row->dosis;?></u></i></td>
		<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?><br/><?=$row->oyo;?></td>
		<td>
		<?php
		if($row->cantidad==0){echo "uso continuo";}else{echo $row->cantidad;}
		?>
		</td>
		<td><?=$op;?></td>
		<td>
		<?php if($row->operator==$user_id  || $perfil=="Admin") {?>
		<input type='checkbox'  class="check-recet-print"  value="<?=$row->id_i_m?>" <?=$checked?>/>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td>
		<?php if($row->operator==$user_id  || $perfil=="Admin") {?>
		<a data-toggle="modal" data-target="#edit_recetas" href="<?php echo base_url("admin_medico/edit_recetas/$row->id_i_m/$user_id")?>" style="cursor:pointer" title="Editar" class="btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		 <!--<td><a target="_blank" href="<?php echo base_url("printings/recetas1/$historial_id/$row->id_i_m/$area")?>" style="cursor:pointer" title="Imprimir todo" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a></td>-->  
        
		<td>
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
       <a title="Eliminar recetas <?=$row->medica;?>" style="cursor:pointer" class="delete-recetas" id="<?=$row->id_i_m; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>