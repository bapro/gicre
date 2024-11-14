<style>
textarea.zz {

  pointer-events: none;

}
table.table-fixed td{
    border: rgb(177,177,177) solid 1px !important;
}


table.table-fixed th{
    border: rgb(177,177,177) solid 1px !important;
}
</style>

<?php
$name=($this->session->userdata['admin_name']);
 foreach($showSelectContP1 as $row)


?>



<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<h3 class="modal-title text-center"  >Editar Control Prenal  # 6</h3>
</div>
<input type="hidden" id="id_c1" value="<?=$row->id_c1?>">
<input type="hidden" id="updated_by" value="<?=$name?>">


<div class="modal-body disable-all" style="max-height: calc(100vh - 210px); overflow-y: auto;">

<table  class="table table-bordered table-fixed" id="flashcontprn" style="background:#E6E6FA;">

<tr>
<th>Fecha de la consulta</th>
<th>Semana de amenorrea</th>
<th>Peso (lb)</th>
<th>Tension Arterial Max.Min. (mm Hg)</th>
<th>Alt. Ulterina/Present Pubis.FondoCef/Pelv.Tr</th>
<th>F.C.F.(lat./min./Mov.Fetal)</th>
<th>Edema / Varices</th>
<th>Otros</th>
<th>Evolucion</th>

</tr>

<?php
 foreach($showSelectContP1 as $row)
{
	setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y - %I:%M%p", strtotime($row->inserted_time)));	
	
?>

<tr>
<td><input type="text"  size="10" id="fechacpp" class="form-control control-prenatal-fecha" value="<?=$row->fecha?>"/></td>
<td><input type="text"  size="10" id="semanacpp" class="form-control" value="<?=$row->semana?>"/></td>
<td><input type="text"  size="10" id="pesocpp" class="form-control" value="<?=$row->peso?>"/></td>
<td>
<div class="input-group sepa" >
<input id="tension1cpp"  class="form-control reduce-height" type="text" value="<?=$row->tension?>"  /> 
<span class="input-group-addon reduce-height" >-</span>
 <input id="tension11cpp" type="text" class="form-control reduce-height"  value="<?=$row->tension11?>" />
 </div>
 </td>
<td>
<div class="input-group" > 
<input id="alt1cpp"  class="form-control reduce-height" type="text"  value="<?=$row->alt?>" /> 
<span class="input-group-addon reduce-height" >-</span> 
<input id="alt11cpp" type="text" class="form-control reduce-height"  value="<?=$row->alt11?>" />
<span  class="input-group-addon reduce-height" >-</span>
<input id="alt111cpp" type="text" class="form-control reduce-height"  value="<?=$row->alt111?>" />
</div>
</td>

<td>
<div class="input-group" >
<input id="fetal1cpp"  class="form-control reduce-height" type="text" value="<?=$row->fetal?>"  /> 
<span class="input-group-addon reduce-height" >-</span> 
<input id="fetal11cpp" type="text" class="form-control reduce-height"   value="<?=$row->fetal11?>"/>
</div>
</td>


<td>
<div class="input-group" >
<input id="edema1cpp"  class="form-control reduce-height" type="text"  value="<?=$row->edema?>" /> 
<span class="input-group-addon reduce-height" >-</span> 
<input id="edema11cpp" type="text" class="form-control reduce-height"  value="<?=$row->edema11?>"/>
</div>
</td>

<td><textarea id="otroscpp" style="width:150px" class="form-control" cols="20"><?=$row->otros ?></textarea></td>
<td><textarea id="evolucioncpp" style="width:150px" class="form-control" cols="20"><?=$row->evolucion ?></textarea></td>
</tr>

<?php
}

?>
</table>

<div style="float:right">
<button id="save_exam_sis_hide" class="btn-sm btn-success" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>
 </div>
 
 
