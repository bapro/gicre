<div style='overflow-x:auto;'>
<table  class="table table-striped" style="width:100%"  >

	<thead>
    <tr style="background:#428bca;">
	   <th style="width:4px;color:white"><strong>Fecha</strong></th>
        <th style="width:3px;color:white">Medica.</th>
       <th style="width:1px;color:white">Ver</th>
		<th style="width:1px;color:white">Bor.</th>
     </tr>
    </thead>
    <tbody>
    <?php
    $cpt="";
	foreach($IndicacionesPrevias->result() as $row)
	 
	 {
		$op=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
        $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
       $med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');		
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
		<td><?=$med;?></td>
       <td title='Presentation: <?=$row->presentacion?>&#013 Frecuencia: <?=$row->frecuencia?> &#013 Via: <?=$row->via?> &#013 Nota: <?=$row->nota?>'  ><i class="fa fa-eye"></i></td>
		<!--<td>
		<?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>
      <a data-toggle="modal" data-target="#edit_recetas_or_med" href="<?php echo base_url("admin_medico/edit_recetas_or_med/$row->id/$user_id")?>" style="cursor:pointer" title="Editar" class="btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>
 <?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>-->
		<td>
		<?php if($row->inserted_by==$user_id || $perfil=="Admin") {?>
       <a title="Eliminar recetas <?=$row->medica;?>" style="cursor:pointer" class="delete-recetasnw" id="<?=$row->id; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>

      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>
<!----------------------------------------------------->

<div class="modal fade" id="edit_recetas_or_med"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
$('#edit_recetas_or_med').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$(".delete-recetasnw").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deleteRecetasOM')?>',
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
