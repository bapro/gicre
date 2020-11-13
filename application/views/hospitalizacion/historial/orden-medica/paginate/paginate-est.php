<?php
 $sql = "select * from  hosp_orden_medica_estudios where id_sala=$idsala order by id_i_e desc";
	$data2= $this->db->query($sql);
if($data2->result() !=NULL){
?>
<table  class="table table-striped" cellspacing="0">
<thead>
<tr style="background:#428bca;">
<th style="width:1px;color:white"><strong>Fecha</strong></th>
<th style="width:5px;color:white">Estudio</th>
<th style="width:1px;color:white">Mas</th>
<th style="width:1px;color:white">Operador</th>
<th style="width:1px;color:white">Edit</th>
<th style="width:1px;color:white">Borrar</th>
</tr>
</thead>
    <tbody>
    <?php
	 $cpt="";
	foreach($data2->result() as $row)

	 {
		 $op2=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
		 $estudio=$row->estudio;

     $est=$this->db->select('sub_groupo')->where('id_c_taf',$row->estudio)->get('centros_tarifarios')->row('sub_groupo');
     if($est){
       $estudio=$est;
       }else{
           $estudio=$row->estudio;
       }


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
		<?=$estudio;?>
		</td>
		<td title='Parte del cuerpo: <?=$row->cuerpo?>&#013 Lateralidad: <?=$row->lateralidad?> &#013 Observaciones: <?=$row->observacion?>'  ><i class="fa fa-plus"></i></td>

		<td><?=$op2;?></td>

	    <td>
		<?php if($row->operator==$user_id || $perfil=="Admin") {?>
      <a data-toggle="modal" data-target="#edit_estudios_or_med2" href="<?php echo base_url("hospitalizacion/edit_estudios_or_med/$row->id_i_e/$user_id")?>" style="cursor:pointer" title="Editar" class="btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>
       <?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		<td>
		<?php if($row->operator==$user_id  || $perfil=="Admin") {?>
		<a title="Eliminar estudio <?=$row->estudio;?>" style="cursor:pointer" class="deleteEstOrdMed" id="<?=$row->id_i_e; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
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
	 $(".deleteEstOrdMed").click(function(){
if (confirm("Sure to delete ?"))
{
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('hospitalizacion/deleteEstudiosOM')?>',
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
