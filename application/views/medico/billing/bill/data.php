<style>
td{text-align:center}
</style>
<span class="alert alert-info" style="float:right">Bloqueada : <?=$blocked?> , Unbloqueada: <?=$un_blocked?> </span>
<table id="example" class="table table-striped table-bordered" width="100%;" cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th class="col-xs-2" >Foto</th>
<th class="col-xs-2" >Paciente</th>
<th>Medicos</th>
<th >Servicio</th>
<th class="col-xs-3" >Centro Medico</th>
<th class="col-xs-2" >Seguro Medico</th>
<th class="col-xs-2" >Acciones</th>
</tr>
</thead>
<tbody>
<?php
$this->padron_database = $this->load->database('padron',TRUE);

 foreach($billings as $row)

{
 $paciente=$this->db->select('nombre,photo,ced1, ced2, ced3')->where('id_p_a',$row->paciente)
 ->get('patients_appointments')->row_array();
 
$seguron=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$doc=$this->db->select('id_user,name')->where('id_user',$row->medico)->get('users')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');

$centro=$this->db->select('name,type')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row_array();
$type=$centro['type'];
?>
<tr>
<td>
<?php
if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="70" height="70" class="img-thumbnail"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($paciente['photo']==""){
	
}
else{
	?>
<img width="70" height="70" class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $paciente['photo']; ?>"  />
<?php

}
?>

</td>
<td style="text-transform:uppercase"><?=$paciente['nombre'];?></td>
<td style="text-transform:uppercase"><?=$doc['name'];?></td>
<td><?=$area;?></td>
<td><?=$centro['name'];?></td>
<td><?=$seguron;?></td>
<td>
<a href="<?php echo base_url("medico/bill/$row->idfacc/$type")?>" class="btn btn-primary btn-xs" ><i class="fa fa-eye" aria-hidden="true" title="View factura"></i></a>
<!--<a title="Eliminar" class="bloquear btn btn-primary btn-xs" id="<?=$row->idfacc; ?>"  >Bloquear</a>-->

</td>
</tr>
<?php
}
?>
</tbody>    
</table>

<script>
function bills()
{

$.ajax({
url:"<?php echo base_url(); ?>medico/bills_data",

method:"POST",
success:function(data){
$('.bills').html(data);
}
});
}
//--------------------------------------------------------------------






$(".bloquear").click(function(){
if (confirm("Estás seguro de bloquear ?"))
{ 
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/block_factura')?>',
data: {id : del_id},
success:function(data) {
bills();
},

})
}
})



$(document).ready(function() {

    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
} );
</script>