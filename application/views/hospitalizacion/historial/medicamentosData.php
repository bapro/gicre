<?php
if($sql->result() !=NULL) 
{?>
	<table class="table paginate-medica is_print_rect" id='medica-table' cellspacing="0">
<thead>
<tr style="background:#428bca;" class="tr-header">
<!--<th><i class="fa fa-print" style="font-size:20px;color:white"></i></th>-->
<th style="font-size:10px;color:white"></th>
<th style="font-size:10px;color:white">Usuario</th>
<th style="font-size:10px;color:white">Fecha</th>
<th style="font-size:10px;color:white">Medicamento</th>
<th style="font-size:10px;color:white">Cant.</th>
<th style="font-size:10px;color:white">Via</th>
<th style="font-size:10px;color:white">Cada</th>
<th style="font-size:10px;color:white">Nota</th>

</tr>
</thead>
<tbody>
<?php foreach($sql->result() as $row)
{
$fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$op=$this->db->select('name')->where('id_user',$row->user)->get('users')->row('name');	
$name=$this->db->select('nombre')->where('id',$row->name)->get('emergency_almanacen_gnrl')->row('nombre');
	 
?>
<tr>
<!--<td> <input type='checkbox'  class="check-recet-print"  value="<?=$row->id?>"/></td> -->
<td>

<a data-toggle="modal" data-target="#edit_med" id="<?=$row->id; ?>"  href="<?php echo base_url("admin_medico/edit_recetas/$row->id")?>" style="cursor:pointer" title="Editar" class="btn-sm edit_med" ><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;

<a title="Eliminar" style="cursor:pointer" class="delete-med" id="<?=$row->id; ?>" ><i class="fa fa-remove" style="color:red"></i></a>

</td>
<td style="font-size:12px"><?=$op;?></td>
<td style="font-size:12px"><?=$fecha;?></td>
<td style="font-size:12px"><?=$name;?>(<?=$row->tipo?>)</td>
<td style="font-size:12px"><?=$row->cantidad?></td>
<td style="font-size:12px"><?=$row->via?></td>
<td style="font-size:12px"><?=$row->cada;?></td>
<td style="font-size:12px"><?=$row->nota;?></td>
</tr>
<?php
}
?>

</tbody>
<tr style="<?=$display?>">
<td>
<button id="go-down" type="button" class="btn btn-primary btn-xs"><i class="fa fa-save"></i> Guardar</button><br/>
</td>
</tr>
</table>
<div id="go-down-data"></div>
<?php
}else{
echo "<center style='color:red'>$empty</center>";

}

?>

<script>


$('#go-down').on('click', function () {
var num = "<?=$num?>";	
var op = <?=$opid?>;
$("#go-down-data").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
$.ajax({
type:'POST',
url:'<?=base_url('emergency/medicamentosData')?>',
data: {num:num,op:op,where:0,id_patient:<?=$id_patient?>},
success:function(data) {
$("#go-down-data").html(data); 
$("#ngmed").hide(); 
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#go-down-data").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});	

});




$(".delete-med").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('emergency/DeleteMedicamento')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
//newMedicamento();
 
}
});
}
})


$(".edit_med").click(function(){
 var el = this;
var del_id = $(this).attr('id');
var num = "<?=$num?>";	
var op = <?=$opid?>;
$(".medicamento-form").fadeIn().html('<img   src="<?= base_url();?>assets/img/loading.gif" />');
$.ajax({
type:'POST',
url:'<?=base_url('emergency/editMedicamento')?>',
data: {id : del_id,id_user:<?=$id_user?>,num:num,op:op,id_patient:<?=$id_patient?>},
success:function(data){
$(".medicamento-form").html(data); 

$(el).next('a').hide();
	
},
});

})
</script>