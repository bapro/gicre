<br/>
<div class='hr'>

I- MEDICAMENTOS
<table  style="width:100%" cellspacing="0" >

	<thead>
   <tr class="trbgc">
	   <td style="width:4px"><strong>Fecha</strong></td>
        <td style="width:3px"><strong>Medicamento</strong></td>
		 <td style="width:5px"><strong>Presentación</strong></td>
		 <td style="width:1px"><strong>Frecuencia</strong></td>
		  <td style="width:1px"><strong>Vía</strong></td>
       <td style="width:1px"><strong>Nota</strong></td>
     </tr>
    </thead>
    <tbody>
    <?php
    if($recetas->result() !=NULL){
	foreach($recetas->result() as $row)
	 
	 {
	 $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));			 
		
		 ?>
       <tr>
		<td><?=$fecha;?></td>
		<td><?=$row->cantidad;?> <?=$row->medica;?><br/><i><u><?=$row->dosis;?></u></i></td>
		<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?><br/><?=$row->oyo;?></td>
		<td><?=$row->nota;?></td>
      </tr>
		
	 <?php
	 }
	}
	 ?>
    </tbody>    
</table>
</div>


<br/>
 <div class='hr'>
II- ESTUDIOS

<table  style="width:100%" cellspacing="0" >
	<thead>
    <tr class="trbgc">
	   <td ><strong>Fecha</strong></td>
        <td ><strong>Estudio</strong></td>
		 <td><strong>Parte del cuerpo</strong></td>
		  <td><strong>Lateralidad</strong></td>
        <td><strong>Nota</strong></td>
     </tr>
    </thead>
    <tbody>
    <?php 
	 if($estudios->result() !=NULL){
	foreach($estudios->result() as $row)
	 
	 {
		
		 $estudio=$this->db->select('sub_groupo')->where('id_c_taf',$row->estudio)->get('centros_tarifarios_test')->row('sub_groupo');
		
	   	$cuerpo=$this->db->select('name')->where('id',$row->cuerpo)
       ->get('type_body_parts')->row('name');
	   
	   $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));	 
		  
	 ?>
        <tr  >
		<td><?=$fecha;?></td>
		<td>
		<?=$estudio;?> 
		</td>
		<td><?=$row->cuerpo;?></td>
		<td><?=$row->lateralidad;?></td>
		<td><?=$row->observacion;?></td>
      </tr>
		
	 <?php
	 }
	 }
	 ?>
    </tbody>    
</table>
</div>
<br/>
 <div class='hr'>
III- LABORATORIOS
<table   style="width:100%">
<thead>
    <tr class="trbgc">
	   <td style="width:1px"><strong>Fecha</strong></td>
        <td style="width:5px"><strong>Laboratorio</strong></td>
</tr>
    </thead>
    <tbody>
    <?php
    if($lab->result() !=NULL){
	foreach($lab->result() as $row)
	 
	 {
	
    $lab=$this->db->select('sub_groupo')->where('id_c_taf',$row->laboratory)
  ->get('centros_tarifarios_test')->row('sub_groupo');
	
	
  $insert_time = date("d-m-Y H:i:s", strtotime($row->insert_time));
 ?>
        <tr  >
		<td><?=$insert_time;?></td>
		<td><?=$row->laboratory;?></td>
	 </tr>
		
	 <?php
	 }
	}
	 ?>
    </tbody>    
</table>
</div>

<br/>
 <div class='hr'>
 IV- MEDIDAS GENERALES
 <table style="width:100%">
	<thead>
      <tr class="trbgc">
	   <td style="width:1px"><strong>Fecha</strong></td>
        <td style="width:5px"><strong>Medidas Generales</strong></td>
		 <td style="width:5px"><strong>Descripción</strong></td>
		  <td style="width:1px"><strong>Intervalo de Realización</strong></td>
     </tr>
    </thead>
    <tbody>
    <?php 
	 $cpt="";
	 if($med_med_gen->result() !=NULL){
	foreach($med_med_gen->result() as $row)
	 
	 {
		 $op2=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
		
	   
       $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));	 
		  
	 ?>
        <tr  >
		<td><?=$fecha;?></td>
		<td>
		<?=$row->medidas_gen;?>
		</td>
		<td><?=$row->descripcion_mg;?></td>
		<td><?=$row->intervalo_de_real;?></td>
	

      </tr>
		
	 <?php
	 }
	 }
	 ?>
    </tbody>    
</table>
</div>


</body>
</html>