<div id="hide_examsis_by_id">
<?php 

 foreach($show_examsis_by_id as $rows) 

$user_c30=$this->db->select('name')->where('id_user',$rows->inserted_by)->get('users')->row('name');
$user_c31=$this->db->select('name')->where('id_user',$rows->updated_by)->get('users')->row('name');

 $updated_time = date("d-m-Y H:i:s", strtotime($rows->updated_time)); 
 $inserted_time = date("d-m-Y H:i:s", strtotime($rows->inserted_time)); 
?>
<style>
label{text-transform:lowercase}

.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width11 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title"  >Examen Sistema # <span class="round"><?=$rows->id_exs?></span> </h3><br/>
<h5 class="modal-title"  >Creado por :<?=$user_c30?> | fecha :<?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$user_c31?> | fecha :<?=$updated_time?></span> </h5>
 <?php if($rows->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="show_modif_exam_sis btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="save_exam_sis_hide" class="save_exam_sis_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$rows->id_exs/0/0/sis")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
</div>
<input type="hidden" id="id_exs" value="<?=$rows->id_exs?>">
<input type="hidden" id="updated_by" value="<?=$user?>">
<div class="modal-body disable-all" style="max-height: calc(100vh - 210px); overflow-y: auto;">

<table  class="table" style='width:100%' cellspacing="0" id="dis_exas">
<!--row 1-->
<tr>
<td class="ida" >

<label class="control-label" >Sistema neurológico</label>
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
<textarea rows="11" class="form-control" id="neurologicos"  ><?=$rows->neurologico?></textarea>

</td>
</tr>
<tr>
<td class="ida" >

<label class="control-label" >Sistema cardiovascular</label>

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
<textarea rows="11" class="form-control" id="cardiovas"  ><?=$rows->cardiova?></textarea>

</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >

<label class="control-label" >Sistema urogenital</label>
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
<textarea rows="11" class="form-control" id="urogenitals"  ><?=$rows->urogenital?></textarea>

</td>
</tr>
<tr>
<td class="ida" >

<label class="control-label" >Sistema músculo esquelético</label>
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
<textarea rows="11" class="form-control" id="musculoess"  ><?=$rows->musculoes?></textarea>

</td>
</tr>
<tr>
<td class="ida" >

<label class="control-label" >Sistema nervioso</label>

<textarea rows="11" class="form-control" id="nerviosos"  ><?=$rows->nervioso?></textarea>

</td>
</tr>
<tr>
<td class="ida" >

<label class="control-label" >Sistema linfatico</label>

<textarea rows="11" class="form-control" id="linfaticos"  ><?=$rows->linfatico?></textarea>

</td>
</tr>

<tr>

<td class="ida" >

<label class="control-label" >Sistema respiratorio</label>

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
<textarea rows="11" class="form-control" id="respiratorios"  ><?=$rows->respiratorio?></textarea>

</td>
</tr>
<tr>
<td class="ida" >

<label class="control-label" >Sistema genitourinario</label>

<textarea rows="11" class="form-control" id="genitourinarios"  ><?=$rows->genitourinario?></textarea>

</td>
</tr>
<tr>

<td class="ida" >

<label class="control-label" >Sistema digestivo</label>

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
<textarea rows="11" class="form-control" id="digestivos"><?=$rows->digestivo?></textarea>

</td>
</tr>
<tr>
<td class="ida" >

<label class="control-label">Sistema endocrino</label>

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
<textarea rows="11" class="form-control" id="endocrinos"  ><?=$rows->endocrino?></textarea>

</td>
</tr>
<tr>

<td class="ida" >

<label class="control-label" >Relativo a</label>

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
<textarea rows="11" class="form-control" id="otros_ex_siss" ><?=$rows->otros_ex_sis?></textarea>

</td>
</tr>
<tr>
<td class="ida" >

<label class="control-label" >Columna dorsal</label>

<textarea rows="11" class="form-control" id="dorsaless"  ><?=$rows->dorsales?></textarea>

</td>
</tr>

</table>

</div>

