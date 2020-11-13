<style>
.round:hover{background:rgb(219,219,219);color:green;border:1px solid gray}
</style>

<?php
 if(!empty($results ))  
{ 

?>

<div style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" width="100%;" cellspacing="0">

<tr >
<th class="col-xs-1"><strong>#</strong></th>
<th class="col-xs-3">Nombre</th>
<th class="col-xs-1">Logo</th>
<th class="col-xs-1" >Primer Telefono</th>
<th class="col-xs-1" >Segundo Telefono</th>
<th class="col-xs-2" >Correo Electronico</th>
</tr>
<?php foreach($results as $all_m_c)
?>
<tr>
<td><?=$all_m_c->id_m_c;?></td>
<td style="text-transform:uppercase"><a id="<?=$all_m_c->id_m_c;?>" class="godown"  href="#"><?=$all_m_c->name;?></a></td>
<td><img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $all_m_c->logo; ?>"  /></td>
<td><?=$all_m_c->primer_tel;?></td>
<td><?=$all_m_c->segundo_tel;?></td>
<td><?=$all_m_c->email;?></td>
</tr>

</tbody>    
</table>

</div>
<?php
}
else {
echo '<i style="font-size:16px;color:#B69200;margin-left:20%">Centro Medico no encontrado</i> '; 
}
?>
<div  class="loadf"></div>
<div id="go_down_centro"></div>


<script>
$('.godown').click(function() {
$(".loadf").fadeIn().html('<span  class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var godown = $('#godown').attr('id');
var id = $(this).attr('id');
$.ajax({
type: "POST",
url: "<?=base_url('admin/go_down_centro')?>",
data: {id:id},
cache: true,
success:function(data){
$(".loadf").hide();	
$("#go_down_centro").html(data);

}  
});

return false;
});
</script>