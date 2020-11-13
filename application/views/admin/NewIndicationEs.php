<table  class="table table-striped table-bordered" style="background:white" cellspacing="0">
     <span style="color:green;"><i><?=$num_count_es?> datos</i></span>
	<thead>
    <tr>
	   <th style="width:1px"><strong>Fecha</strong></th>
        <th style="width:5px">Estudio</th>
		 <th style="width:5px">Parte del cuerpo</th>
		  <th style="width:1px"><strong>Lateralidad</strong></th>
        <th style="width:5px">Observaciones</th>
		 <th style="width:1px">Operador</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesPreviasEstudios as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_date;?></td>
		<td><?=$row->estudio;?></td>
		<td><?=$row->cuerpo;?></td>
		<td><?=$row->lateralidad;?></td>
		<td><?=$row->observacion;?></td>
		<td><?=$row->operator;?></td>
           
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>