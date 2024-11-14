<br/>
<?php
$sql ="SELECT * FROM h_c_examen_fis_otorrino where historial_id=$historial_id ORDER BY 	idot ASC";
$atendido = $this->db->query($sql);
$i=1;
?>
<h4  class="h4 his_med_title">Examen Fisico Otorrino<span color='blue'><i><?=$atendido->num_rows()?> registros</i></span></h4>

<?php 
if($atendido->num_rows() > 0){

 foreach($atendido->result() as $row)
{
$user_c32t=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c33t=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
?>
<div class="pagination">

<a title="Creado por :<?=$user_c32t?> (<?=$inserted_time?>) &#013 Modificado por <?=$user_c33t?> (<?=$updated_time?>) " data-toggle="modal" data-target="#ver_ex_ot" href="<?php echo base_url("admin_medico/show_exam_ot_by_id/$row->idot/$historial_id/$user_id")?>">
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

<table  class="table"  cellspacing="0" style="width:100%;">
<!--row 1-->
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Oido1</label>
<div class="col-md-9">
<textarea class="form-control" id="oido1"  ></textarea>
</div>

</div>
</td>

<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Oido2</label>
<div class="col-md-9">
<textarea class="form-control" id="oido2"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Nariz</label>
<div class="col-md-9">
<textarea class="form-control" id="nariz"  ></textarea>
</div>

</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Boca</label>
<div class="col-md-9">
<textarea class="form-control" id="boca"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Cuello</label>
<div class="col-md-9">
<select class="form-control select2ot" id="otorrino-cuello1" style="width:100%">
<option value="">Ningúno</option>

</select>
<textarea class="form-control" id="otorrino-cuello2"  ></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Observaciones</label>
<div class="col-md-9">
<textarea class="form-control" id="observaciones-ot"  ></textarea>
</div>

</div>
</td>
</tr>



</table>


</div>


<div class="modal fade" id="ver_ex_ot"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-inc-width10" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
$(".select2ot").select2({
 tags: true
});
</script>