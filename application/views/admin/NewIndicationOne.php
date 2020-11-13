  <a target="_blank" href="<?php echo base_url('admin/print_recetas/'.$historial_id)?>"> Imprimir</a> <i><?=$count_singular?> recetas</i>
 <br/>
<div  style="overflow-x:auto;">
 <table class="table table-striped table-bordered flash-add-one" style="background:white" cellspacing="0">
    <thead>
    <tr style="background:#428bca;">
	 <th style="font-size:10px;color:white">Fecha</th>
        <th style="width:5px;font-size:10px;color:white">Medicamento</th>
		 <th style="width:5px;font-size:10px;color:white">Presentacion</th>
		 <th style="width:1px;font-size:10px;color:white">Frecuencia</th>
		  <th style="width:1px;font-size:10px;color:white"><strong>Via</strong></th>
        <th style="width:5px;font-size:10px;color:white">Cantidad (dias)</th>
		 <th style="width:1px;font-size:10px;color:white">Operador</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($singularid as $row)
	 
	 {
	 ?>
        <tr>
		<td style="font-size:12px"><?=$row->insert_date;?></td>
		<td style="font-size:12px"><?=$row->medica;?></td>
		<td style="font-size:12px"><?=$row->presentacion;?></td>
		<td style="font-size:12px"><?=$row->frecuencia;?></td>
		<td style="font-size:12px"><?=$row->via;?></td>
		<td style="font-size:12px"><?=$row->cantidad;?></td>
		<td style="font-size:12px"><?=$row->operator;?></td>
           
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>
  <tfoot>
    <tr style="background:#428bca;">
	 <th style="font-size:10px;color:white">Fecha</th>
        <th style="width:5px;font-size:10px;color:white">Medicamento</th>
		 <th style="width:5px;font-size:10px;color:white">Presentacion</th>
		 <th style="width:1px;font-size:10px;color:white">Frecuencia</th>
		  <th style="width:1px;font-size:10px;color:white"><strong>Via</strong></th>
        <th style="width:5px;font-size:10px;color:white">Cantidad (dias)</th>
		 <th style="width:1px;font-size:10px;color:white">Operador</th>
     </tr>
    </tfoot>    
</table>
</div>
