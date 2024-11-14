<br/>
<h4  class="h4 his_med_title">Estudio Dermatologico <span color='blue'><i><?=$count_derma?> registros</i></span></h4>

<?php if ($count_derma > 0)
{


 foreach($dermatologo as $row)
{
$user_c32=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c33=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
?>
<div class="pagination">

<a title="Creado por :<?=$user_c32?> (<?=$inserted_time?>) &#013 Modificado por <?=$user_c33?> (<?=$updated_time?>) " data-toggle="modal" data-target="#ver_derma" href="<?php echo base_url("admin_medico/show_derma_by_id/$row->id_derma/$user_id")?>">
#<?=$row->id_derma;?>
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
<label class="control-label col-md-3" >Tipografía</label>
<div class="col-md-9">
<select class="form-control select2" id="derma_tipo" style="width:100%">
<option value="">Ningúno</option>
<?php 

foreach($derma_tipo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" id="derma_tipo_text"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Morfología</label>
<div class="col-md-9">
<select class="form-control select2" style="width:100%" id="derma_morfologia" >
<option value="">Ningúno</option>
<option>aspecto mono o polimoris</option>
  <option>numero</option>
    <option>tamaño</option>
	<option>forma</option>
    <option>modo de agrupacíon</option>
   <option>color</option>
    <option>borde</option>
	<option>aspecto</option>
    <option>huellas</option>
  </optgroup>
</select>
<textarea class="form-control" id="derma_morfologia_text"  ></textarea>
</div>

</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Resto de la piel y anexos</label>
<div class="col-md-9">
<select class="form-control select2" style="width:100%" id="derma_resto" >
<option value="">Ningúno</option>
<option>Pelo</option>
<option>Cejas</option>
<option>Pestañas</option>
<option>Uñas</option>
<option>Mucosas</option>
<option>Ganglios</option>
</select>
<textarea class="form-control" id="derma_resto_text"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Interrogatorio</label>
<div class="col-md-9">
<select class="form-control select2" id="derma_intero" style="width: 100%">
<option value="">Ningúno</option>
<?php 

foreach($derma_interog as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<textarea class="form-control" id="derma_intero_text"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Otros Datos</label>
<div class="col-md-9">
<select class="form-control select2" id="derma_otros_datos" style="width: 100%">
<option value="">Ningúno</option>
<option>Comprobación por el primer consultante de enfermedades</option>
<option>Resultados de laboratorio y circunstancias importantes</option>
</select>

<textarea class="form-control" id="derma_otros_datos_text"  ></textarea>
</div>

</div>
</td>

</tr>


<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Diagnostico Dermatologico Inicial</label>
<div class="col-md-9">

<select class="form-control select2" id="derma_diagno_der_ini" style="width: 100%">
<option value="">Ningúno</option>

</select>
</div>

</div>
</td>

</tr>

</table>
</div>


<div class="modal fade" id="ver_derma"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-inc-width10" >
<div class="modal-content" >

</div>
</div>
</div>