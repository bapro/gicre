<table  class="table table-striped" cellspacing="0">
	<thead>
     <tr style="background:#428bca;">
	   <th style="width:1px;color:white"><strong>Fecha</strong></th>
        <th style="width:5px;color:white">Estudio</th>
		 <th style="width:5px;color:white">Parte del cuerpo</th>
		  <th style="width:1px;color:white"><strong>Lateralidad</strong></th>
        <th style="width:5px;color:white">Observaciones</th>
		 <th style="width:1px;color:white">Operador</th>
		<th style="width:1px;color:white">Borrar</th>
     </tr>
    </thead>
    <tbody>
    <?php 
	 $cpt="";
	
	foreach($IndicacionesPreviasEstudios->result() as $row)
	 
	 {
		 $op2=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
		 $estudio=$this->db->select('name')->where('id',$row->estudio)
       ->get('type_studies')->row('name');
	   
	   	$cuerpo=$this->db->select('name')->where('id',$row->cuerpo)
       ->get('type_body_parts')->row('name');
	   
	   
	   
	   
       $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));	 
		  if ( $cpt==0 ) {
		$cpt=1;
		$colorBg = "#E0E5E6";
		} 
		else {
		$cpt=0;
		$colorBg = "#E0E5E6";
		}
	 ?>
        <tr bgcolor="<?=$colorBg ;?>" >
		<td><?=$fecha;?></td>
		<td>
		<?=$row->estudio;?>
		</td>
		<td><?=$row->cuerpo;?></td>
		<td><?=$row->lateralidad;?></td>
		<td><?=$row->observacion;?></td>
		<td><?=$op2;?></td>
	
		 <td>
		<?php if($row->operator==$user_id  || $perfil=="Admin") {?>
		<a title="Eliminar estudio <?=$row->estudio;?>" style="cursor:pointer" class="delete-estudio" id="<?=$row->id_i_e; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>

      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
<div class="modal fade" id="edit_estudios"  role="dialog" data-backdrop="static" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>



<script>


$(".delete-estudio").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deleteEstudiosOM')?>',
data: {id : del_id},
success:function(response) {
//update_lab.text($('#myTable tbody tr').length)),
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

 
}
});
}
})



</script>