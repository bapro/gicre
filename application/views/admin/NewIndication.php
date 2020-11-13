 <span  style="color:green;"><i>Total recetas <?=$num_count?></i></span>
 <div  style="overflow-x:auto;">
 <table id="flash-add-one" class="table table-striped table-bordered" style="background:white" cellspacing="0">
    <thead>
    <tr>
	   <th style="width:1px"><strong>Fecha |</strong></th>
        <th style="width:5px">Medicamento</th>
		 <th style="width:5px">Presentacion</th>
		<th style="width:1px">Frecuencia</th>
		  <th style="width:1px"><strong>Via</strong></th>
        <th style="width:5px">Cantidad (dias)</th>
		 <th style="width:1px">Operador</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesPrevias as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_date;?></td>
		<td><?=$row->medica;?></td>
		<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?></td>
		<td><?=$row->cantidad;?></td>
		<td><?=$row->operator;?></td>
           
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>