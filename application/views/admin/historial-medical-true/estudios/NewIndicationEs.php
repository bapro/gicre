  <?php 
  if($num_count_es==0) {} else {?>
  <!--<a target="_blank" href="<?php echo base_url("printings/print_estudios/$historial_id/$area")?>" style="cursor:pointer" title="Imprimir" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>-->
 <?php
  }
  ?>
  <br/>
<table  class="table table-striped table-bordered paginate-es" cellspacing="0">
     <span style="color:green;"><i><?=$num_count_es?> datos</i></span>
	<thead>
     <tr style="background:#428bca;">
	 	<th style='display:none'></th>
	   <th style="width:1px;color:white"><strong>Fecha</strong></th>
        <th style="width:5px;color:white">Estudio</th>
		 <th style="width:5px;color:white">Parte del cuerpo</th>
		  <th style="width:1px;color:white"><strong>Lateralidad</strong></th>
        <th style="width:5px;color:white">Observaciones</th>
		 <th style="width:1px;color:white">Operador</th>
		 <th style="width:1px;color:white">Edit.</th>
		   <th style="width:10px;color:white">&#128438;</th>
		   <th style="width:1px;color:white">Borrar</th>
     </tr>
    </thead>
    <tbody>
    <?php 
	 $cpt="";
	
	foreach($IndicacionesPreviasEstudios as $row)
	 
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
		<td style='display:none'><?=$row->id_i_e;?></td>
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
		<a data-toggle="modal" data-target="#edit_estudios" href="<?php echo base_url("admin_medico/edit_estudios/$row->id_i_e/$user_id")?>" style="cursor:pointer" title="Editar" class="btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
		</td>
		 <td>
		<?php if($row->operator==$user_id  || $perfil=="Admin") {?>
		
		<ul class="nav navbar-nav">
		<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown"  ><span style="cursor:pointer" class="caret"></span></span>
		<ul class="dropdown-menu">
		<li><a data-toggle="modal"  data-target="#print_estudio_foto"  href="<?php echo base_url("printings/print_if_foto/$historial_id/$row->id_i_e/$area/$user_id")?>" style="cursor:pointer;color:black" class="btn-sm" >Con Formato Vertical</a></li>
		<!--<li><a target="_blank" href="<?php echo base_url("printings/print_estudios_horiz/$historial_id/$row->id_i_e/$area/$user_id")?>" style="cursor:pointer;color:black" class="btn-sm" >Con Formato Horizontal</a></li>-->
		<li><a data-toggle="modal"  data-target="#print_estudio_foto_oriz"  href="<?php echo base_url("printings/print_es_if_foto_oriz/$historial_id/$row->id_i_e/$area/$user_id")?>" style="cursor:pointer;color:black" class="btn-sm" >Con Formato Horizontal</a></li>
		</ul>
		</li>
		</ul>
		</td>  
       
		<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
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
<div class="modal fade" id="edit_estudios"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>


<div class="modal fade" id="print_estudio_foto"  role="dialog" >
<div class="modal-dialog modal-xs" >
<div class="modal-content" >

</div>
</div>
</div>


<div class="modal fade" id="print_estudio_foto_oriz"  role="dialog" >
<div class="modal-dialog modal-xs" >
<div class="modal-content" >

</div>
</div>
</div>

<script>

$('#print_estudio_foto').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');

});




$('#print_estudio_foto_oriz').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');

});


$('#edit_estudios').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
 allEstudios();
});



$(".delete-estudio").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteEsudios')?>',
data: {id : del_id},
success:function(response) {
//update_lab.text($('#myTable tbody tr').length)),
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
allEstudios();
 
}
});
}
})


 $('.paginate-es').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );

</script>