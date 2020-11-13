<?php
if($showinsumoedit=='none'){
 if($querydata->result() !=NULL)
{?>
<table class="table table-striped"  id='tab-sum' >
<thead>
<tr style="background:#428bca;"  >
<th style=";color:white">Insumo</th>
<th style="color:white">Cantidad</th>
<th style="color:white">Fecha</th>
<th style="color:white">usuario</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($querydata->result() as $row)
{
$time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$user=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
?>
<tr>
<td><?=$row->name?></td>
<td><?=$row->cantidad?></td>
<td><?=$time?></td>
<td><?=$user?></td>
<td>
<?php if($row->id_user==$user_id  || $perfil=="Admin") {?>
<a title="Eliminar" style="cursor:pointer" class="delete-insumo" id="<?=$row->id; ?>" ><i class="fa fa-trash" style="color:red"></i></a>
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td>
</tr>
<?php } ?>

</tbody>
</table>

<?php }else{
echo "<em>no hay insumos...</em> ";
}
}else{
foreach($querydatasave->result() as $rowds){
	
$sqlrs = "SELECT * from emergency_peticion 
INNER JOIN emergency_medicaments ON emergency_medicaments.id=emergency_peticion.insumo

WHERE link=$rowds->id";
$queryresult= $this->db->query($sqlrs);
echo "<span style='color:red'>Orden: $rowds->id</span>";
?>
<table class="table table-striped"  id='tab-sum' >
<thead>
<tr style="background:#428bca;"  >
<th style=";color:white">Insumo</th>
<th style="color:white">Cantidad</th>
<th style="color:white">Fecha</th>
<th style="color:white">usuario</th>
<th></th>
</tr>
</thead>
<tbody>
<?php
foreach($queryresult->result() as $rowrs){
$time = date("d-m-Y H:i:s", strtotime($rowrs->inserted_time));
$user=$this->db->select('name')->where('id_user',$rowrs->id_user)->get('users')->row('name');
?>
<tr>
<td><?=$rowrs->name?></td>
<td><?=$rowrs->cantidad?></td>
<td><?=$time?></td>
<td><?=$user?></td>
<td>
<?php if($rowrs->id_user==$user_id  || $perfil=="Admin") {?>
<a  title="Editar" data-toggle="modal" data-target="#editInsumo1" href="<?php echo base_url("emergency/editInsumo/$rowrs->id/$user_id/$rowrs->centro")?>"  ><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a title="Eliminar" style="cursor:pointer" class="delete-insumo" id="<?=$rowrs->id; ?>" ><i class="fa fa-trash" style="color:red"></i></a>
<?php } else {echo "<i style='color:red' class='fa fa-ban'></i>";}?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php	
}

}
?>


<div class="modal fade" id="editInsumo1"  role="dialog" tabindex="-1"  >
<div class="modal-dialog" >
<div class="modal-content" >

</div>
</div>
</div>

<script>

$('#editInsumo1').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
loadInsumoSaved();
});


/* $('#tab-sum').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );*/
	
	
$(".delete-insumo").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/deleteInsumo')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
loadInsumo();
 
}
});
}
});


</script>