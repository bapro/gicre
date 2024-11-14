<br/>

<table class="table table-striped" id="paginate-eva" style="background:white" cellspacing="0">
<thead>
<tr style="background:#428bca;">
<th style="font-size:10px;color:white">Nota</th>
<th style="font-size:10px;color:white">Doctor(a)</th>
<th style="font-size:10px;color:white">Fecha</th>
<th style="width:10px;color:white"> </th>
<th style="font-size:10px;color:white"></th>
</tr>
</thead>
<tbody>
<?php foreach($nota->result() as $row)
{
$op=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
$fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));		 
?>
<tr>
<td style="font-size:12px"><?=$row->nota;?></td>
<td style="font-size:12px"><?=$op;?></td>
<td style="font-size:12px"><?=$fecha;?></td>
<td>
<?php if($row->id_user==$id_user  || $perfil=="Admin") {?>
<a  target="_blank"  href="<?php echo base_url("printings/print_if_foto_em/$row->id/$id_patient/$id_user/$area/ev/$enviado_a")?>" style="cursor:pointer;color:black" class="btn-sm" ><i class="fa fa-print" style="font-size:20px;color:blue"></i></a>      
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td> 
<td>
<?php if($row->id_user==$id_user  || $perfil=="Admin") {?>
<a title="Eliminar" style="cursor:pointer" class="delete-evaluacion-nota" id="<?=$row->id; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td>
</tr>

<?php
}
?>
</tbody>

</table>

<script>

$(".delete-evaluacion-nota").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/deleteEvaNota')?>',
data: {id : del_id},
success:function(response) {
//update_lab.text($('#myTable tbody tr').length)),
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
 newEvaNota();
 
}
});
}
})

    $('#paginate-eva').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );

	
</script>