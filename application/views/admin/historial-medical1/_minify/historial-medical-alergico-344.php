<br/>
<h4  class="h4 his_med_title">Historia alergista</h4>
<input type="hidden" id="hist_id" value="<?=$id_historial?>" > 

<?php if ($count_alergia > 0)
{

$i = 1;
 foreach($alergia as $row)
{
$user_c32=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c33=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
?>
<div class="pagination">

<a title="Creado por :<?=$user_c32?> (<?=$inserted_time?>) &#013 Modificado por <?=$user_c33?> (<?=$updated_time?>) " data-toggle="modal" data-target="#ver_alergia" href="<?php echo base_url("admin_medico/show_ant_alergia/$row->id/$user_id")?>">
<?php echo $i; $i++;  ?>
</a></div>
<?php
}

}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>

<hr class="prenatal-separator"/>
 <div  style="overflow-x:auto;">

<table  class="table"  cellspacing="0" style="width:80%;">
<!--row 1-->
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Antecedentes Familiares</label>
<div class="col-md-9">

<textarea class="form-control" id="ant_fam"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Antecedentes Prenatales</label>
<div class="col-md-9">

<textarea class="form-control" id="ant_prenatales"  ></textarea>
</div>

</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Factores De Ambiente</label>
<div class="col-md-9">

<textarea class="form-control" id="factories_ambiente"  ></textarea>
</div>

</div>
</td>
</tr>


</table>
</div>


<div class="modal fade" id="ver_alergia"  role="dialog" tabindex="-1"  >
<div class="modal-dialog " style="width: 85%;margin: auto;" >
<div class="modal-content" >

</div>
</div>
</div>