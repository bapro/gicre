<table id="direction" class="table table-striped table-bordered"  cellspacing="0" >
<thead>
<tr style="background:#38a7bb;color:white">
<th class="tablerelaciones"><strong>#</strong></th>
<th class="tablerelaciones"><strong>Direcciones</strong></th>
<th class="tablerelaciones"><strong>Municipio</strong></th>
<th class="tablerelaciones"><strong>Section</strong></th>
<th class="tablerelaciones" style="width:1px"><strong>Acciones</strong></th>
</tr>

</thead>		
<?php foreach($PROVINCIA_DIRECION as $row)

{

?>
<tbody>
<tr>
<td class="ida" style="width:2px" ><?=$row->id_prov;?></td>
<td class="especialidad" style="font-size:15px;width:5px"><?=$row->street;?></td>
<td class="especialidad" style="font-size:15px;width:5px"><?=$row->title_town;?></td>
<td class="especialidad" style="font-size:15px;width:5px"><?=$row->section;?></td>
<td style="width:3px">
<a href="<?php echo base_url()?>admin/Diary/<?=$row->id_prov?>" title="Ver"  ><i class="fa fa-eye" aria-hidden="true" ></i></a>

<a title="Eliminar"  id="delete_product" data-id="<?php echo $row->id_prov; ?>" href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>	

</td>

</tr> 
	   
<?php
}

?>

</tbody>
</table>