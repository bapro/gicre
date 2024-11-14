<style> 

@media (min-width: 768px) {
  .modal-inc-width3 {
    width: 95%;
    margin: auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}


</style>

<?php
foreach($cirujano_vascular->result() as $row)

$doneBy=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$updatedBy=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
 ?>
 
 
 <div class="modal-header "  id="background_">
<button  type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i style="font-size:48px;color:red" class="fa fa-times-circle" ></i></button>
<div class='row'>
<div class='col-xs-9'>
<div id='resultdd'></div>
<input type='hidden' value='<?=$row->id?>' id='id_cirujano_vas' />
<input type='hidden' value='<?=$row->diagrama_cirugia_vascular?>' id='show-current-diagrama' />
<input type='hidden' value='<?=$user?>' id='updated_by' />
<h3 class="modal-title"  >Cirujano Vascular (<em># <?=$row->id?></em>)</h3>
<span style='color:green'><?=$centro_name?></span><br/>
<span>Creado por <?=$doneBy?>, <?=$inserted_time?></span>,
 <span style="color:red"> Cambiado por <?=$updatedBy?>, <?=$updated_time?></span> 
</div>
<div class='col-xs-3'>
<?php if($row->inserted_by==$user || $perfil=="Admin") {?>
<button type="button" id='updateCirujanoVas' class="show_modif_enf_act btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="save_enf_act_hide" class="save_enf_act_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 <a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id/0/0/cirujana_vas")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
</div>
</div>
</div>
<div class="modal-body"  style="max-height: calc(110vh - 180px); overflow-y: auto;">
<label >SIGNOS Y SINTOMAS</label>
<div style="">
<table  class='table'>
<tr>
<td>
<div class="checkbox ">
<?php
   if ($row->cir_vas_dol ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_dol">DOLOR</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_edema ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_edema" >EDEMA</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_pesadez ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_pesadez" >PESADEZ</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_cansancio ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_cansancio" >CANSANCIO</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_quemazo ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_quemazo" >QUEMAZO</label>
</div>
</td>
<td>
<div class="checkbox ">
<?php
   if ($row->cir_vas_calambred ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_calambred" >CALAMBRES</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_purito ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_purito" >PRURITO</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_hiper ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_hiper" >HIPERCROMIA</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_ulceras ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_ulceras" >ULCERAS</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_pares ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_pares" >PARESTESIAS</label>
</div>
</td>
<td>
<div class="checkbox ">
<?php
   if ($row->cir_vas_claud ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_claud" >CLAUDICACION</label>
</div>
<div class="checkbox ">
<?php
   if ($row->cir_vas_necrosis ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" <?=$selected?> name="_cir_vas_necrosis" >NECROSIS</label>
</div>

  <div class="form-group row">
       <div class="col-sm-12">
	   <br/>
    <label >OTROS </label>

      <input type="text" class="form-control" id="_cir_vas_otros" value='<?=$row->cir_vas_otros?>' >
	   </div>

  </div>
</td>
</tr>
</table>
</div>
   <label>ANTECEDENTES PERSONALES</label>

<table  class='table'>
<tr>
<td>
<label  class="col-form-label">HISTORIA <font style='color:red;font-size:26px'>*</font></label>
<textarea  id="_cir_vas_historial" rows='5'  class="form-control"><?=$row->cir_vas_historial?></textarea>
</td>
</tr>
<tr>
 <td>

    <label  class="col-form-label">Cirugías</label>
   
   <textarea  class="form-control" rows='5' id='_cir_vas_cirugias' ><?=$row->cir_vas_cirugias?></textarea>
   
  </tr>
  <tr>
   <td>

    <label  class="col-form-label">Alergías</label>
   
   <textarea  class="form-control" rows='5' id='_cir_vas_alergias' ><?=$row->cir_vas_alergias?>'</textarea>
   
   </td>
  </tr>
  <tr>
   <td>
   
    <label  class="col-form-label">Enfermedades Sistémicas</label>
    
   <textarea class="form-control" rows='5' id='_cir_vas_enf_sis'  ><?=$row->cir_vas_enf_sis?>'</textarea>
   
   </td>
  </tr>
  <tr>
   <td>

    <label  class="col-form-label">Hábitos</label>
   
 <textarea  class="form-control" rows='5' id='_cir_vas_habitos' ><?=$row->cir_vas_habitos?>' </textarea>
  
 
 </td>

 </tr>
 <tr>
 <td>
 
    <legend>EXAMEN FISICO DIRIGIDO</legend>
   

 <textarea  id="_cir_vas_exam_fis_dir" rows='5'  class="form-control"><?=$row->cir_vas_exam_fis_dir?></textarea>
   
 </td>
 </tr>
 </table>


<div style="overflow-x:auto;">
<table style='border-right:1px solid'>
<tr>
<td >
<div id='saveDiagrama' class='style-diagrama'></div>
<button type='button' id='resetme2' style='position:absolute;margin-top:-83px;margin-left:20px'>Limpiar</button>
<input id='diagrama_saveDiagrama' type='hidden' >
</td>
</tr>

</table>
</div>




</div>




