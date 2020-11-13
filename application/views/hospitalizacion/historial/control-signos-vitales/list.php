<?php if($query->result() !=NULL){ ?>
<table  class="table table-striped sticky-header3" style="width:100%"  >
<thead>
    <tr style="background:#428bca;">
	   <th style="color:white"><strong>Hora Realizada</strong></th>
	   <th style="color:white">Sat</th>
	    <th style="color:white">TA</th> 
		<th style="color:white">Fc</th> 
		  <th style="color:white">FR</th>
       <th style="color:white">Glicemia</th>
	   <th style="color:white">Pulso.</th>
		<th style="color:white">Temp.</th>
		<th style="color:white">Diuresis/Dep</th>
		<th style="color:white"></th>
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($query->result() as $row)

	 {
		$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
        $fecha = date("d-m-Y H:i", strtotime($row->csv_hora_realiazada));
		
		 ?>
       <tr >
		<td><?=$fecha;?></td>
		<td><?=$row->csv_sat;?></td>
		<td><?=$row->csv_ta1?>/<?=$row->csv_ta2?></td>
		<td><?=$row->csv_fc?></td>
		<td><?=$row->csv_fr;?></td>
		<td><?=$row->csv_glicemia;?></td>
		<td><?=$row->csv_pulso;?></td>
		<td><?=$row->csv_temperatura;?></td>
		<td>
		<?=$row->csv_diuresis;?>/<?=$row->csv_dep;?> 
		</td>
		<td>
		<a title="Eliminar" style="cursor:pointer" class="delete-control-signo-vitale" id="<?=$row->id; ?>" ><i class="fa fa-trash" style="color:red"></i></a>
       </td>
	   </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
 <?php
	 }else{
		echo "<em>No hay resgistros...</em>"; 
	 }
	 ?>
<script>
$(".delete-control-signo-vitale").click(function(){
if (confirm("Lo quieres borrar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('hospitalizacion/deleteControSigVital')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
 
}
});
}
});
</script>