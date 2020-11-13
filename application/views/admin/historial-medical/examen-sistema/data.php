<div id="hide_examsis_by_id">
<?php 

 foreach($show_examsis_by_id as $rows)
{  
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
 $updated_time = date("d-m-Y H:i:s", strtotime($rows->updated_time)); 
 $inserted_time = date("d-m-Y H:i:s", strtotime($rows->inserted_time)); 
?>

<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<div class="col-md-12 col-md-offset-2" >
<h3 class="modal-title"  >Examen Sistema # <span class="round"><?=$rows->id_exs?></span> </h3><br/>
<h5 class="modal-title"  >Creado por :<?=$rows->inserted_by?> | fecha :<?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$rows->updated_by?> | fecha :<?=$updated_time?></span> </h5>
 <?php if($rows->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="show_modif_exam_sis btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="save_exam_sis_hide" class="save_exam_sis_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank" href="<?php echo base_url('printings/print_exam_sis/'.$rows->id_exs)?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
 </div>
</div>
<input type="hidden" id="id_exs" value="<?=$rows->id_exs?>">
<input type="hidden" id="updated_by" value="<?=$user?>">
<div class="modal-body disable-all" style="max-height: calc(100vh - 210px); overflow-y: auto;">

<table  class="table"  cellspacing="0" id="dis_exas">
<!--row 1-->
<tr>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema neurológico</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sisneuros" style="width:100%">
<option hidden><?=$rows->sisneuro?></option>
<?php 
$sql ="SELECT name FROM historial_dropdown where  name !='$rows->sisneuro' and location=1";
$query = $this->db->query($sql);

foreach($query->result() as $rx)
{
		echo "<option value=".$rx->name.">".$rx->name."</option>";

}

?>
</select>
<textarea class="form-control" id="neurologicos"  ><?=$rows->neurologico?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema cardiovascular</label>
<div class="col-md-7">
<select class="form-control select-examsis" style="width:100%" id="siscardios" >
<option><?=$rows->siscardio?></option>
<?php 

$sql ="SELECT name FROM historial_dropdown where  name !='$rows->siscardio' and location=2";
$query = $this->db->query($sql);

foreach($query->result() as $rx)
{
		echo "<option value=".$rx->name.">".$rx->name."</option>";

}
?>
</select>
<textarea class="form-control" id="cardiovas"  ><?=$rows->cardiova?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>
</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema urogenital</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_uros" style="width: 100%">
<option><?=$rows->sist_uro?></option>
<?php 

$sql ="SELECT name FROM historial_dropdown where  name !='$rows->sist_uro' and location=3";
$query = $this->db->query($sql);

foreach($query->result() as $rx)
{
		echo "<option value=".$rx->name.">".$rx->name."</option>";

}
?>

</select>
<textarea class="form-control" id="urogenitals"  ><?=$rows->urogenital?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema músculo esquelético</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sis_mu_es" style="width: 100%">
<option><?=$rows->sis_mu_e?></option>
<?php 

$sql ="SELECT name FROM historial_dropdown where  name !='$rows->sis_mu_e' and location=4";
$query = $this->db->query($sql);

foreach($query->result() as $rx)
{
		echo "<option value=".$rx->name.">".$rx->name."</option>";

}
?>

</select>
<textarea class="form-control" id="musculoess"  ><?=$rows->musculoes?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>
</div>
</td>
</tr>
<tr>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema nervioso</label>
<div class="col-md-7">
<textarea class="form-control" id="nerviosos"  ><?=$rows->nervioso?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_nerv"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema linfatico</label>
<div class="col-md-7">
<textarea class="form-control" id="linfaticos"  ><?=$rows->linfatico?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_linf"> 
</div>
</div>
</td>
</tr>

<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema respiratorio</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_resps" style="width:100%">

<option><?=$rows->sist_resp?></option>
<?php 

$sql ="SELECT name FROM historial_dropdown where  name !='$rows->sist_resp' and location=7";
$query = $this->db->query($sql);

foreach($query->result() as $rx)
{
		echo "<option value=".$rx->name.">".$rx->name."</option>";

}
?>
</select>
<textarea class="form-control" id="respiratorios"  ><?=$rows->respiratorio?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_resp"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema genitourinario</label>
<div class="col-md-7">
<textarea class="form-control" id="genitourinarios"  ><?=$rows->genitourinario?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_genit"> 
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Sistema digestivo</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_digess" style="width:100%">
<option><?=$rows->sist_diges?></option>
<?php 

$sql ="SELECT name FROM historial_dropdown where  name !='$rows->sist_diges' and location=19";
$query = $this->db->query($sql);

foreach($query->result() as $rx)
{
		echo "<option value=".$rx->name.">".$rx->name."</option>";

}
?>
</select>
<textarea class="form-control" id="digestivos"><?=$rows->digestivo?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_dig"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3">Sistema endocrino</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_endos" style="width:100%">
<option><?=$rows->sist_endo?></option>
<?php 

$sql ="SELECT name FROM historial_dropdown where  name !='$rows->sist_endo' and location=21";
$query = $this->db->query($sql);

foreach($query->result() as $rx)
{
		echo "<option value=".$rx->name.">".$rx->name."</option>";

}
?>
</select>

</select>
<textarea class="form-control" id="endocrinos"  ><?=$rows->endocrino?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_endo"> 
</div>
</div>
</td>
</tr>
<tr>

<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Relativo a</label>
<div class="col-md-7">
<select class="form-control select-examsis" id="sist_relas" style="width:100%">
<option><?=$rows->sist_rela?></option>
<?php 

$sql ="SELECT name FROM historial_dropdown where  name !='$rows->sist_rela' and location=22";
$query = $this->db->query($sql);

foreach($query->result() as $rx)
{
		echo "<option value=".$rx->name.">".$rx->name."</option>";

}
?>

</select>
<textarea class="form-control" id="otros_ex_siss" ><?=$rows->otros_ex_sis?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_otros"> 
</div>
</div>
</td>
<td class="ida" style="font-weight:bold">

<div class="form-group">
<label class="control-label col-md-3" >Columna dorsal</label>
<div class="col-md-7">
<textarea class="form-control" id="dorsaless"  ><?=$rows->dorsales?></textarea>
</div>
<div class="col-md-2" title="Ningúno">
<input type="checkbox" class="check_dor"> 
</div>
</div>
</td>
</tr>
<tr>
</table>

<?php
}
?>
</div>

<script>

 
	</script>