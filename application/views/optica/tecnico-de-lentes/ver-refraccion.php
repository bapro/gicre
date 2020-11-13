<style>
 td,th,label,input{font-size:13px}
 select,input,textarea{pointer-events: none}
input.form-control{width:90px}
#input.form-control{width:120px}
 </style>

<?php 

foreach($query->result() as $row)
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted));
 $doc=$this->db->select('name')->where('id_user',$row->id_user)
 ->get('users')->row('name');
 $paciente=$this->db->select('nombre')->where('id_p_a',$row->id_hist)->get('patients_appointments')->row('nombre'); 
 ?>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">REFRACCION - <?=$paciente?></h3>

</div>
<div class="modal-body" id="refraccion-selector">

  <h5 style="color:#FF0084">creado por <?=$doc?>, <?=$inserted_time?></h5>
<table class="table" style="width:90%;">
<tr>
<th></th><th>Esfera</th><th>Cilindro</th><th>Eje</th><th>Add</th>
</tr>
<tr>
<th>OD</th>
<td>
<table>
<tr>
<td>

 <?php
if($row->od_espera_r==1){$checked1="+";}else{$checked1="";}


if($row->od_espera_r==0){$checked2="-";}else{$checked2="";}


?>

<input class="form-control"  value="<?=$checked1?> <?=$checked2?> <?=$row->od_espera?>"/>

</td>

</tr>
</table>

</td>
<td>

<table>
<tr>
<td>

 <?php
if($row->od_cilindro_r==1){$checked1="+";}else{$checked1="";}


if($row->od_cilindro_r==0){$checked2="-";}else{$checked2="";}
?>
 

<input class="form-control"  value="<?=$checked1?> <?=$checked2?> <?=$row->od_cilindro?>">
</div>
</td>

</tr>
</table>

</td>
<td>

  <input class="form-control"  value="<?=$row->eje_od?>"> 

</td>
<td>

<input class="form-control"  value="<?=$row->add_od?>"> 

</td>

</tr>
<tr>
<th>OS</th>
<td>

<table>
<tr>
<td>

 <?php
if($row->os_espera_r==1){$checked1="+";}else{$checked1="";}

if($row->os_espera_r==0){$checked2="-";}else{$checked2="";}



?>

<input class="form-control"  value="<?=$checked1?> <?=$checked2?> <?=$row->espera_os?>">

</td>
</tr>
</table>


</td>
<td>

<table>
<tr>
<td>
  <?php
if($row->os_cilindro_r==1){$checked1="+";}else{$checked1="";}


if($row->os_cilindro_r==0){$checked2="-";}else{$checked2="";}

?>

<input class="form-control"  value="<?=$checked1?> <?=$checked2?> <?=$row->cilindro_os?>">

</td>

</tr>
</table>


</td>
<td>

<input class="form-control"  value="<?=$row->eje_os?>">

</td>

<td>
<input class="form-control"  value="<?=$row->add_os?>">

</td>


</tr>


</table>

<div class="row">
  <div class="col-sm-6 col-md-offset-1"> 
  <input type="text" class="form-control" id='input' value="DP <?=$row->d_prf?> Mm" > 
  <div class="checkbox">
   <?php
   if ($row->vision_sencilla ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="vision-sencilla2" <?=$selected?> >Visión Sencilla</label>
</div>
<div class="checkbox">
  <?php
   if ($row->flat_top ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="flat-top2" <?=$selected?> >Flat Top</label>
</div>
<div class="checkbox ">
 <?php
   if ($row->invisibles ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="invisibles2" <?=$selected?> >Invisibles</label>
</div>
<div class="checkbox ">
 <?php
   if ($row->progresivos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="progresivos2" <?=$selected?> >Progresivos</label>
</div>
 </div>
 
 <div class="col-sm-5"> 
<input type="text" class="form-control" id='input' value="Altura <?=$row->altura_mm?> Mm" >
   <div class="checkbox">
   <?php
   if ($row->antirreflejos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="antirreflejos2" <?=$selected?> >Antirreflejos</label>
</div>
<div class="checkbox">
 <?php
   if ($row->policarbonatos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="policarbonatos2" <?=$selected?> >Policarbonatos</label>
</div>
<div class="checkbox ">
 <?php
   if ($row->transitions ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="transitions2" <?=$selected?> >Transitions</label>
</div>

<div class="checkbox ">
 <?php
   if ($row->foto_croma==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="foto_croma2" <?=$selected?>>Fotocromatico</label>
</div>
 </div>
  <div class="col-md-9 col-md-offset-1"> 
  <?php if($row->ref_observaciones){?>
  <br/><br/>
 <label>Observación</label> <textarea  id="" rows='9' name='ref-observaciones2' class="form-control"><?=$row->ref_observaciones?></textarea>
 <br/>
  <?php }?>
    <form method="post" action="<?php echo site_url("tecLente/save_refraccion_entrega");?>" >
	<input type="hidden" name="id-refraccion" value="<?=$id?>" >
	<input type="hidden" name="id-user" value="<?=$id_user?>" >
<label> Fecha y hora de entrega</label>
<div class="input-group form_datetime2" >
<input type="text" class="form-control" style='border:1px solid #38a7bb' name="fecha-entrega" id="fecha-entrega"  />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
<br/>
<button type='submit' class="btn btn-lg btn-primary" name='nuevo-refraccion' id='btn-ref' value='1' >OK</button>
 </div>
   </form>
 </div>
</div>
<script>
$("select").prop("", true);

$("textarea").prop("", true);

$('.form_datetime2').datetimepicker({
      format: 'DD-MM-YYYY HH:mm:ss',
	   minDate:new Date(),
	 
	  });
	  
	  $('input[type="checkbox"]').on('click', function(ev){
    ev.preventDefault();
})

 $("#btn-ref").on('click', function(){
   if($('#fecha-entrega').val() == ""){
 alert("Fecha y hora de entrega es obligatorio !");
	return false;
}
 });
  
</script>