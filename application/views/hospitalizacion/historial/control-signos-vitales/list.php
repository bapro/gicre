<?php if($query->result() !=NULL){ ?>
<table  class="table table-striped sticky-header3" style="width:100%"  >
<thead>
    <tr style="background:#428bca;">
	   <th style="color:white"><strong>Hora / Operador</strong></th>
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
        $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
		
		 ?>
       <tr >
		<td>
		<?=$fecha;?>
		<div class="pagination" style='font-size:13px'>
		<span class="glyphicon glyphicon-plus"></span>
		<div class="box-tooltip" style="display: none;position:absolute;">
		<?php
		$upd=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
		$fechaup = date("d-m-Y H:i:s", strtotime($row->updated_time));

		?>
		<div  class='raya'>
		<strong>creado por</strong> <?=$op;?>
		<strong>cambiado por</strong> <?=$upd?>
		</div>
		<div  class='raya'>
		<strong>Fecha de cambio</strong> <?=$fechaup?>
		</div>
		</div>
		</div>
		</td>
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
		<a title="Eliminar" style="cursor:pointer" class="edit-control-signo-vitale" id="<?=$row->id; ?>" ><i class="fa fa-pencil" ></i></a>
		<br/><br/>
		<a  style="cursor:pointer" class="delete-control-signo-vitale" id="<?=$row->id; ?>" ><i class="fa fa-trash" style="color:red"></i></a>
		
		
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
url:'<?=base_url('control_signos_vitales/deleteControSigVital')?>',
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


$(".edit-control-signo-vitale").click(function(){

var del_id = $(this).attr('id');
//$("#contSigVitalForm").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
   $('#contSigVitalForm').css("opacity",".3");
$.ajax({
type:'POST',
url:'<?=base_url('control_signos_vitales/contSigVitalForm')?>',
data: {id : del_id,id_patient:<?=$id_patient?>,id_user:<?=$user_id?>},
success:function(data) {
$("#contSigVitalForm").html(data);
 $('#contSigVitalForm').css("opacity","");
}
})
});


$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });

</script>