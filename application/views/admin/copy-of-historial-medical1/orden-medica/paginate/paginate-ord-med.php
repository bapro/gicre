<?php
	 $sql = "select * from  ord_med_med_gen where id_sala=$idsala";
	$data5= $this->db->query($sql);
if($data5->result() !=NULL){
?>
<table  class="table table-striped" cellspacing="0" >
	<thead>
     <tr style="background:#428bca;">
	   <th style="width:1px;color:white"><strong>Fecha</strong></th>
        <th style="width:5px;color:white">Medidas Generales</th>
		 <th style="width:5px;color:white">Descripcion</th>
		  <th style="width:1px;color:white"><strong>Intervalo De Realizacion</strong></th>
       <th style="width:1px;color:white">Operador</th>
		 <th style="width:1px;color:white">Editar</th>
		<th style="width:1px;color:white">Borrar</th>
     </tr>
    </thead>
    <tbody>
    <?php 
	 $cpt="";
	
	foreach($data5->result() as $row)
	 
	 {
		 $op2=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
		
	   
       $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));	 
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
		<?=$row->medidas_gen;?>
		</td>
		<td><?=$row->descripcion_mg;?></td>
		<td><?=$row->intervalo_de_real;?></td>
		<td><?=$op2;?></td>
		<td>
		<?php if($row->id_user==$user_id  || $perfil=="Admin") {?>
		<a data-toggle="modal" data-target="#edit_medida_gnl" href="<?php echo base_url("admin_medico/edit_medida_gnl/$row->idem/$user_id")?>" style="cursor:pointer" title="Editar" class="btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		 <td>
		<?php if($row->id_user==$user_id  || $perfil=="Admin") {?>
		<a  style="cursor:pointer" class="delete_edit_medida_gnl" id="<?=$row->idem; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>

      </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
 <?php
	 }
else{
       echo "<span style='color:red'>no hay</span>";
     }
	 ?>
	 <script>
	 
$(".delete_edit_medida_gnl").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deleteMedGnrl')?>',
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