<?php if($querykardex->result() !=NULL){ ?>
<br/>
<em><?=$nb_kardex?> registro(s)</em>
<button type="button" class="btn btn-sm btn-default" id='imprimir-kardex' title='Imprimir'> <i class="fa fa-print" aria-hidden="true"></i></button>
<br/><br/>
<table  class="table table-striped" style="width:100%"  id='new-kardex-table'>

	<thead>
    <tr style="background:#428bca;">
	   <th style="color:white"><strong>Medicamento</strong></th>
	   <th style="color:white">Dosis</th>
	    <th style="color:white">Via</th> 
		<th style="color:white">Operator</th> 
		<th style="color:white">Fecha</th> 
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($querykardex->result() as $row)
     {
	$op=$this->db->select('name')->where('id_user',$row->kardex_user)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->kardex_fecha));
	$med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
	 ?>
       <tr >
	     <td><?=$med;?></td>
		<td><?=$row->dosis;?></td>
		<td><?=$row->via?></td>
		<td><?=$op?></td>
		<td><?=$fecha?></td>
       </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>

 <?php
	 }
	 ?>
	 
