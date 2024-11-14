<?php
$cpt="";
$noedit="yes";
foreach($results as $row)
{
$u22=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$updated_timed = date("d-m-Y H:i:s", strtotime($row->updated_date));

?>
<tr class="get-factura-id" id="<?=$row->id_tarif?>">
<td style='display:none'>
<?=$row->id_tarif?>
</td>
<td>
<span class="editSpan codigo-n"><?=$row->codigo?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm codigo" name="codigo"  type="text"   value="<?=$row->codigo?>"  />
</td>
<td>
<span class="editSpan simon-n"><?=$row->simon?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm simon"  type="text" name="simon"  value="<?=$row->simon?>"  />
</td>
<td >
<span class="editSpan procedimiento-n"><?=$row->procedimiento?></span>
  <textarea style="display: none;width:100%" class="editInput  form-control input-sm procedimiento"  type="text"  name="procedimiento" rows='5'><?=$row->procedimiento?></textarea>
</td>
<td>
<span class="editSpan monto-n" ><?=number_format($row->monto, 2, '.', ',')?></span>
 <input style="display: none;width:170px" class="editInput  form-control input-sm monto"  type="text" name="monto"  value="<?=$row->monto?>"  />
</td>
<td>
<div class="btn-group btn-group-sm">

<button type="button" title="Ultimo cambio hecho &#10; por <?=$u22?> &#10; fecha  <?=$updated_timed?>" class="btn btn-sm btn-outline-primary editBtn " style="float: none;" ><i class="fa fa-pencil"></i></button>
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-outline-success saveBtn" style="float: none; display: none;"><span class="bi bi-save"></span></button>
<a class="st delete-tarifarios btn btn-sm btn-outline-danger" id="<?=$row->id_tarif; ?>"   title="Eliminar"><i class="fa fa-trash" ></i></a>

</td>


</tr>
<?php
}
?>