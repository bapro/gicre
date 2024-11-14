<?php 
if($devo->result() !=NULL){

?>
<span id='nb_kardex_return' style='display:none'><?=$nb_kardex_return?></span> 
<button type="button" class="btn btn-sm btn-default" id='imprimir-kardex' title='Imprimir' style="float:right"> <i class="fa fa-print" aria-hidden="true"></i></button>
<br/><br/>
<table  class="table table-striped kardex-orden-medica" style="width:100%"  >
<thead>
<tr style="background:#428bca;">
<th style="color:white"># kardex</th>
<th style="color:white">Medicamento</th>
<th style="color:white">Dosis</th>
<th style="color:white">Via</th> 
<th style="color:white">Usuario</th>
<th style="color:white">Devo.</th> 
<!--<th style="color:white">Resta</th>--> 
<th style="color:white">Fecha</th> 
</tr>
</thead>
<tbody>
<?php

foreach($devo->result() as $row)

{
$med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
$fecha = date("d-m-Y H:i:s", strtotime($row->date_time));
?>
<tr >
<td><?=$row->id_i_m;?></td>
<td><?=$med;?></td>
<td><?=$row->dosis;?></td>
<td><?=$row->via?></td>
<td><?=$op;?></td>
<!--<td><?=$row->cant;?></td>-->
<td><?=$row->dev?></td>
<!--<td><?=$row->resta?></td>-->
<td><?=$fecha?></td>
</tr>

<?php
}
?>
</tbody>
</table>
 <?php
	 }else{
		echo "<em>No hay devolucion...</em>";
	
	 }

	 ?>
	 
	 
	 <script>
	 $('#count_kar_dev').text($('#nb_kardex_return').text());
	 </script>