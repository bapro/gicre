<style>
th,td{text-align:left}
</style>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>

</button>
<?php if (empty($RelatedCentro))
{
echo"<div class='alert alert-warning'> No hay Centros medicos relacionados con <span style='font-weight:bold'>$seguro_name</span> . </div>";
?>
<a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/new_centro_medico');?>"><i class="fa fa-plus" aria-hidden="true"></i>Nuevo Centro medico</a>
<?php
}
else{	
?>
<h4 class="modal-title">Otros entros medicos relacionados con <span style="color:green"><?=$seguro_name?></span>  </h4>

</div>
<div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>

<tr style="background:#38a7bb;color:white">
<th class="col-xs-3">Nombre</th>
<th class="col-xs-3" >Telefonos</th>
<th class="col-xs-2" >Correo Electronico</th>
<th class="col-xs-1" >Ver</th>
</tr>
</thead>
<tbody>
<?php foreach($RelatedCentro as $all_m_c)
$cpt="";
{
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>

<tr bgcolor="<?=$colorBg ;?>">

<td><?=$all_m_c->name;?></td>
<td><?=$all_m_c->primer_tel;?> / <?=$all_m_c->segundo_tel;?></td>
<td><?=$all_m_c->email;?></td>
<td style="text-align:left">
<a href="<?php echo base_url("admin/centro_medico/$all_m_c->id_m_c")?>" class="st"><i class="fa fa-eye" aria-hidden="true" title="Editar" ></i></a>
</td>
</tr>
<?php
}
?>
</tbody>    
</table>
</div>
<?php
}
?>




