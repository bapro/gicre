
<?php

if($query_cnsling->result() !=NULL){
foreach ($query_cnsling->result() as $row)
$aoc = $row->aoc;	
$diu = $row->diu;	
$implante = $row->implante;	
$anti_radio = $row->anti_radio;	
$siu = $row->siu;	

$condones = $row->condones;	

$anti_emergencia = $row->anti_emergencia;	

$aqv = $row->aqv;	

$inyectable1 = $row->inyectable1;	

$inyectable3 = $row->inyectable3;	


$solo_pro = $row->solo_pro;	


$vio_basada = $row->vio_basada;	


$pre_prueba_vih = $row->pre_prueba_vih;	


$prost_prueba_vih_mas = $row->prost_prueba_vih_mas;	


$prost_prueba_vih_menos = $row->prost_prueba_vih_menos;	


$con_ad_arv = $row->con_ad_arv;	


$ap_ps_vih = $row->ap_ps_vih;	


$infertilidad = $row->infertilidad;	


$cancer_mama = $row->cancer_mama;	

$prueba_pre_post = $row->prueba_pre_post;	


$reduce_riesgo = $row->reduce_riesgo;	


$post_aborto = $row->post_aborto;	

$ref_anti=$row->ref_anti;
$zika = $row->zika;	


$pre_post_prueba_its = $row->pre_post_prueba_its;	


$sexualidad = $row->sexualidad;	


$pre_natal = $row->pre_natal;	


$reduce_riesgo_its = $row->reduce_riesgo_its;	


$ref_gineco = $row->ref_gineco;	


$ref_obs = $row->ref_obs;	


$ref_uro = $row->ref_uro;	


$ref_infet = $row->ref_infet;	


$ref_pedia = $row->ref_pedia;	


$ref_pws = $row->ref_pws;	


$ref_otro_serv = $row->ref_otro_serv;	


$ref_apoyo_emo = $row->ref_apoyo_emo;	


$ref_endo = $row->ref_endo;	


$ref_servicio = $row->ref_servicio;	


$ref_serv_legal = $row->ref_serv_legal;	


$ref_onco = $row->ref_onco;	


$ref_obs_mat = $row->ref_obs_mat;
	
$contraception_otro= $row->contraception_otro;
$deseo_uso= $row->deseo_uso;
$deseo_cambio1= $row->deseo_cambio1;
$deseo_cambio2= $row->deseo_cambio2;
$motivo_uso= $row->motivo_uso;
$deseo_retiro= $row->deseo_retiro;
$aclara_dudas= $row->aclara_dudas;
$aclara_dudas_esp= $row->aclara_dudas_esp;
$momento_uso= $row->momento_uso;
$otro_conselling= $row->otro_conselling;
$tipo_servicio= $row->tipo_servicio;
$entrega_materiel= $row->entrega_materiel;
$ref_otro1= $row->ref_otro1;
$ref_otro2= $row->ref_otro2;
$comment_counselling= $row->comment_counselling;
$created_by=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$updated_by=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$id=$row->id;
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
$info="<div class='alert alert-info' style='font-size:15px'>Creado por $created_by, $inserted_time - Cambiado por $updated_by, $update_time  </div>";
} else{
$anti_radio = 0;	
$aoc = 0;
$diu = 0;	
$implante = 0;	

$siu = 0;	

$condones = 0;	

$anti_emergencia = 0;	

$aqv = 0;	

$inyectable1 = 0;	

$inyectable3 = 0;	


$solo_pro = 0;	


$vio_basada = 0;	


$pre_prueba_vih = 0;	


$prost_prueba_vih_mas = 0;	


$prost_prueba_vih_menos = 0;	


$con_ad_arv = 0;	


$ap_ps_vih = 0;	
$ref_anti="";

$infertilidad = 0;	


$cancer_mama = 0;	

$prueba_pre_post = 0;	


$reduce_riesgo = 0;	


$post_aborto = 0;	


$zika = 0;	


$pre_post_prueba_its = 0;	


$sexualidad = 0;	


$pre_natal =0;	


$reduce_riesgo_its = 0;	


$ref_gineco =0;	


$ref_obs = 0;	


$ref_uro = 0;	


$ref_infet = 0;	


$ref_pedia = 0;	


$ref_pws = 0;	


$ref_otro_serv = 0;	


$ref_apoyo_emo = 0;	


$ref_endo =0;	


$ref_servicio = 0;	


$ref_serv_legal = 0;	


$ref_onco =0;
$ref_obs_mat=0;		

$contraception_otro= "";
$deseo_uso= "";
$deseo_cambio1= "";
$deseo_cambio2= "";
$motivo_uso= "";
$deseo_retiro= "";
$aclara_dudas= "";
$aclara_dudas_esp="";
$momento_uso= "";
$otro_conselling= "";
$tipo_servicio= "";
$entrega_materiel= "";
$ref_otro1= "";
$ref_otro2= "";
$comment_counselling= "";
$id="";
$info="";
}


?>
 <div style="position: fixed;left:16vw;z-index:500;top:78px">
<span id="counseling-btns" style="display:none">
		<button  type="button" class="btn btn-default btn-lg reload-consejeria" >Nuevo</button>
		<button type="button" class="btn btn-success btn-lg" style="border:1px solid;display:none" id="saveEditCounseling" ><i class="fa fa-save"></i></button>
		<button type="button" class="btn btn-warning btn-lg" style="border:1px solid" id="showEditCounseling"><i class="fa fa-pencil"></i></button>
        
		</span>
		
 </div>
<div id="disabled-all-counseling" >
<div id="update-counseling-info"></div>
<input id="id_counseling" type="hidden" value ="<?=$id?>" />
<input id="Counseling_user_id" type="hidden" value ="<?=$user_id?>" />
<div class="col-md-12"  >
<?=$info?>

<hr class="prenatal-separator"/>
  <strong>ANTICONCEPCION</strong>
<table class="table">
<tr>
<td style="text-align:left">

  <label style="position:absolute">
  <u>Historial de uso de un método anticonceptivo</u><br/>
¿Ha utilizado alguna vez un método anticonceptivo moderno?
 </label>
 <br/> <br/><br/>
 <div class="radio-inline">

 <?php
 
   if ($anti_radio ==0){
	$selected="checked";
	}
	else
	{
	$selected="";
	}
 ?>
      <input class="form-check-input" type="radio"  name="anti_radio" value='0' class="anti_radio" <?=$selected?>>
      <label class="form-check-label">no</label>
    </div>
    <div class="radio-inline">
	<?php
	
   if($anti_radio == 1){
	$selected="checked";
	}else
	{
	$selected="";
	}
 ?>
      <input class="form-check-input" type="radio"  name="anti_radio" value='1' class="anti_radio" <?=$selected?>>
      <label class="form-check-label">si</label>
    </div>
</td>
</tr>
<tr>
<td style="text-align:left;display:none" class="is_used_anti">
<div class="checkbox ">
<?php
   if ($aoc ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="anticonception-radio-button" name="aoc" <?=$selected?>>AOC</label>
</div>
<div class="checkbox ">
<?php
   if ($diu ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="diu" class="anticonception-radio-button" <?=$selected?>>DIU</label>
</div>
<div class="checkbox ">
<?php
   if ($implante ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="implante" class="anticonception-radio-button" <?=$selected?>>Implante</label>
</div>
<div class="checkbox ">
<?php
   if ($siu ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="siu" class="anticonception-radio-button" <?=$selected?>>SIU</label>
</div>
<div class="checkbox ">
<?php
   if ($condones ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="condones" class="anticonception-radio-button" <?=$selected?>>Condones</label>
</div>
</td>
<td style="text-align:left;width:620px;display:none" class="is_used_anti">
<div class="checkbox ">
<?php
   if ($anti_emergencia ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="anti_emergencia" class="anticonception-radio-button" <?=$selected?>>Anticoncepción de emergencia</label>
</div>
<div class="checkbox ">
<?php
   if ($aqv ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="aqv" class="anticonception-radio-button" <?=$selected?>>AQV</label>
</div>
<div class="checkbox ">
<?php
   if ($inyectable1 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="inyectable1" class="anticonception-radio-button" <?=$selected?>>Inyectable (1 mes)</label>
</div>
<div class="checkbox ">
<?php
   if ($inyectable3 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="inyectable3" class="anticonception-radio-button" <?=$selected?>>Inyectable (3 meses)</label>
</div>
<div class="checkbox ">
<?php
   if ($solo_pro ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="solo_pro" class="anticonception-radio-button" <?=$selected?>>Solo progestanos (AOP)</label>
</div>
<div class="checkbox ">
  <label>Otro <input id="contraception_otro" value="<?=$contraception_otro?>" class="form-control"/></label>
</div>
</td>
</tr>
</table>
    </div>


<div class="col-md-12"  >
<strong>SERVICIO SOLITARIO</strong>
<table  class='table' style='width:100%' >
<tr>
<td style="text-align:left">

<div class="form-group row">
<div class="checkbox ">
<label>Deseo uso de un método anticonoceptivo</label>
</div>
<em><label class="col-sm-3 col-form-label">Método Seleccionar</label></em>

<div class="col-sm-8 " >
<select class="select2<?=$action_id?> form-control" id="deseo_uso">
<option value="">Ningún</option>
 <?php 
  $methods = array("Condón Masculino", "Condón Femenino", "Pildoras Anticonceptivas", "Anillo Hormona",
  "DIU", "Inyección Anticonceptivas", "Ligadura de Trompas", "Implante", "Marcha atrás", "Calculadora de dias fertiles", "Ducha Vaginal", "Parche Anticonceptivo", "Diafragma");
 foreach($methods as $method)
{
	
if($row->deseo_uso==$method){
		        $selected="selected";
		} else {
		       $selected="";
	    }	
	
	
	?>
<option <?=$selected?> ><?=$method?></option>
 <?php 
}
?>
</select>
</div>
</div>

</td>

<td style="text-align:left">

<div class="form-group row">
<div class="checkbox ">
<label>Deseo de retiro de método</label>
</div>
<em><label class="col-sm-4 col-form-label">Cual es método usa actualmente </label></em>
<div class="col-sm-8">

<?php

$sql_sel1 ="SELECT deseo_retiro  FROM  h_c_counsellig GROUP BY deseo_retiro ORDER BY deseo_retiro DESC";
$query_sql_sel1=$this->db->query($sql_sel1);
?>
<select class="select2<?=$action_id?> form-control" id="deseo_retiro">
<option value="">Ningún</option>
 <?php 
 foreach($query_sql_sel1->result() as $row_sel1)
{
	
if($deseo_retiro==$row_sel1->deseo_retiro){
		        $selected="selected";
		} else {
		       $selected="";
	    }	

	?>
<option <?=$selected?> ><?=$row_sel1->deseo_retiro?></option>
 <?php 
}
?>
</select>

</div>
</div>

</td>
</tr>
<tr>
<td style="text-align:left">

<div class="form-group row">
<div class="checkbox ">
<label>Deseo cambio de uso de método</label>
</div>
<em><label class="col-sm-4 col-form-label">Cual método usa actualmente </label></em>
<div class="col-sm-8">

<?php

$sql_sel1 ="SELECT deseo_cambio1  FROM  h_c_counsellig GROUP BY deseo_cambio1 ORDER BY deseo_cambio1 DESC";
$query_sql_sel1=$this->db->query($sql_sel1);
?>
<select class="select2<?=$action_id?> form-control" id="deseo_cambio1">
<option value="">Ningún</option>
 <?php 
 foreach($query_sql_sel1->result() as $row_sel1)
{
	
if($deseo_cambio1==$row_sel1->deseo_cambio1){
		        $selected="selected";
		} else {
		       $selected="";
	    }	
	
	
	?>
<option <?=$selected?> ><?=$row_sel1->deseo_cambio1?></option>
 <?php 
}
?>
</select>

</div>
</div>


<div class="form-group row">
<em><label class="col-sm-4 col-form-label">método al que desea cambiar </label></em>
<div class="col-sm-8">
<?php
$sql_sel1 ="SELECT deseo_cambio2  FROM  h_c_counsellig GROUP BY deseo_cambio2 ORDER BY deseo_cambio2 DESC";
$query_sql_sel1=$this->db->query($sql_sel1);
?>
<select class="select2<?=$action_id?> form-control" id="deseo_cambio2">
<option value="">Ningún</option>
 <?php 
 foreach($query_sql_sel1->result() as $row_sel1)
{
	
if($deseo_cambio2==$row_sel1->deseo_cambio2){
		        $selected="selected";
		} else {
		       $selected="";
	    }	
		?>
<option <?=$selected?> ><?=$row_sel1->deseo_cambio2?></option>
 <?php 
}
?>
</select>
</div>
</div>

</td>

<td style="text-align:left">

<div class="form-group row">
<div class="checkbox ">
<label>Aclara dudas sobre uso de método</label>
</div>
<em><label class="col-sm-4 col-form-label">Otros </label></em>
<div class="col-sm-8">

<input class="form-control" id="aclara_dudas" value="<?=$aclara_dudas?>">




</div>
</div>

<div class="form-group row">
<em><label class="col-sm-4 col-form-label">Especificar</label></em>
<div class="col-sm-8">

<input class="form-control" id="aclara_dudas_esp" value="<?=$aclara_dudas_esp?>">




</div>
</div>

</td>
</tr>
<tr>
<td>
<div class="form-group row">
<em><label class="col-sm-4 col-form-label">Motivo uso de método </label></em>
<div class="col-sm-8">
<?php
$sql_sel1 ="SELECT motivo_uso  FROM  h_c_counsellig GROUP BY motivo_uso ORDER BY motivo_uso DESC";
$query_sql_sel1=$this->db->query($sql_sel1);
?>
<select class="select2<?=$action_id?> form-control" id="motivo_uso">
<option value="">Ningún</option>
 <?php 
 foreach($query_sql_sel1->result() as $row_sel1)
{
	
if($motivo_uso==$row_sel1->motivo_uso){
		        $selected="selected";
		} else {
		       $selected="";
	    }	
		?>
<option <?=$selected?> ><?=$row_sel1->motivo_uso?></option>
 <?php 
}
?>
</select>
</div>
</div>
</td>

<td>
<div class="form-group row">
<em><label class="col-sm-4 col-form-label">Momento de uso del método </label></em>
<div class="col-sm-8">
<?php
$sql_sel1 ="SELECT momento_uso  FROM  h_c_counsellig GROUP BY momento_uso ORDER BY momento_uso DESC";
$query_sql_sel1=$this->db->query($sql_sel1);
?>
<select class="select2<?=$action_id?> form-control" id="momento_uso">
<option value="">Ningún</option>
 <?php 
 foreach($query_sql_sel1->result() as $row_sel1)
{
	
if($momento_uso==$row_sel1->momento_uso){
		        $selected="selected";
		} else {
		       $selected="";
	    }	
		?>
<option <?=$selected?> ><?=$row_sel1->momento_uso?></option>
 <?php 
}
?>
</select>
</div>
</div>
</td>
</tr>
</table>
</div>

<div class="col-md-12"  >
  <strong>CONSEJERIA SSR</strong>

<table  class='table' style='width:100%' >
<tr>
<td style="text-align:left">
<div class="checkbox ">
<?php
   if ($vio_basada ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="vio_basada" <?=$selected?>>Violencia basada en genero y violencia intrafamilar</label>
</div>
<div class="checkbox ">
<?php
   if ($pre_prueba_vih ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="pre_prueba_vih" <?=$selected?>>Pre-prueba VIH</label>
</div>
<div class="checkbox ">
<?php
   if ($prost_prueba_vih_mas ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="prost_prueba_vih_mas" <?=$selected?>>Post-prueba VIH (casos positivos)</label>
</div>
<div class="checkbox ">
<?php
   if ($prost_prueba_vih_menos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="prost_prueba_vih_menos" <?=$selected?>>Post-prueba VIH (casos negativos)</label>
</div>
<div class="checkbox ">
<?php
   if ($con_ad_arv ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="con_ad_arv" <?=$selected?>>Consejeria Adherencia ARV</label>
</div>
<div class="checkbox ">
<?php
   if ($ap_ps_vih ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="ap_ps_vih" <?=$selected?>>Apoyo psicosocial VIH</label>
</div>
<div class="checkbox ">
<?php
   if ($infertilidad ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="infertilidad" <?=$selected?>>Infetilidad</label>
</div>
<div class="checkbox ">
<?php
   if ($cancer_mama ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="cancer_mama" <?=$selected?>>Cancer de mama</label>
</div>
</td>



<td style="text-align:left">
<div class="checkbox ">
<?php
   if ($prueba_pre_post ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="prueba_pre_post" <?=$selected?>>Prueba de pre y post detección de cáncer de cuello uterino</label>
</div>
<div class="checkbox ">
<?php
   if ($reduce_riesgo ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="reduce_riesgo" <?=$selected?>>Reduccion de riesgos y danos para aborito inseguro</label>
</div>
<div class="checkbox ">
<?php
   if ($post_aborto ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="post_aborto" <?=$selected?>>Post aborto</label>
</div>
<div class="checkbox ">
<?php
   if ($zika ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="zika" <?=$selected?>>Zika</label>
</div>
<div class="checkbox ">
<?php
   if ($pre_post_prueba_its ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="pre_post_prueba_its" <?=$selected?>>Pre y Post-prueba ITS</label>
</div>
<div class="checkbox ">
<?php
   if ($sexualidad ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="sexualidad" <?=$selected?>>Sexualidad</label>
</div>
<div class="checkbox ">
<?php
   if ($pre_natal ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="pre_natal"  <?=$selected?>>Pre natal</label>
</div>
<div class="checkbox ">
<?php
   if ($reduce_riesgo_its ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="reduce_riesgo_its" <?=$selected?>>Reduccion de riesgo ITS</label>
</div>
<div class="checkbox ">
  <label>Otro <textarea id="otro_conselling" rows="6" class="form-control"><?=$otro_conselling?></textarea></label>
</div>
</td>
</tr>
</table>
</div>
<div class="col-md-12"  >
<strong>SERVICIO ENTREGADO</strong>
<table class="table">
<tr>
<td style="text-align:left">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Tipo de servicio </label>
<div class="col-sm-8">

<?php
$sql_sel1 ="SELECT tipo_servicio  FROM  h_c_counsellig GROUP BY tipo_servicio ORDER BY tipo_servicio DESC";
$query_sql_sel1=$this->db->query($sql_sel1);
?>
<select class="select2<?=$action_id?> form-control" id="tipo_servicio">
 <?php 
 foreach($query_sql_sel1->result() as $row_sel1)
{
	
if($tipo_servicio==$row_sel1->tipo_servicio){
		        $selected="selected";
		} else {
		       $selected="";
	    }	
		?>
<option <?=$selected?> ><?=$row_sel1->tipo_servicio?></option>
 <?php 
}
?>
</select>

</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Entrega Material Educativo </label>
<div class="col-sm-10">
<?php
$sql_sel1 ="SELECT description  FROM  h_c_counsellig_mateterials GROUP BY description ORDER BY description DESC";
$query_sql_sel1=$this->db->query($sql_sel1);
?>
<select class="select2<?=$action_id?> form-control" id="entrega_materiel">
<option></option>
 <?php 
 foreach($query_sql_sel1->result() as $row_sel1)
{
?>
<option><?=$row_sel1->description?></option>
 <?php 
}
?>
</select>

<div id="material_delivery"></div>
</div>
</div>
<div>
</div>
</td>
</tr>
</table>
 </div>
 
 
 <div class="col-md-12"  >
<strong>REFERENCIA </strong>
<table class="table">
<tr>
<td style="text-align:left">
<div class="checkbox ">
<label>Interna</label>
</div>
</td>
<td>
<div class="form-group row">
<label class="col-sm-3 col-form-label">Anticoncepción </label>
<div class="col-sm-4">

<?php
$sql_sel1 ="SELECT ref_anti  FROM  h_c_counsellig GROUP BY ref_anti ORDER BY ref_anti DESC";
$query_sql_sel1=$this->db->query($sql_sel1);
?>
<select class="select2<?=$action_id?> form-control" id="ref_anti">
 <?php 
 foreach($query_sql_sel1->result() as $row_sel1)
{
	
if($ref_anti==$row_sel1->ref_anti){
		        $selected="selected";
		} else {
		       $selected="";
	    }	
		?>
<option <?=$selected?> ><?=$row_sel1->ref_anti?></option>
 <?php 
}
?>
</select>

</div>
</div>
</td>
</tr>
<tr>
<td style="text-align:left">
<div style="margin-left:30px">
<div class="checkbox ">
<?php
   if ($ref_gineco ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_gineco" <?=$selected?>>Ginecología</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_obs ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_obs" <?=$selected?>>Obstetrica</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_uro ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_uro" <?=$selected?>>Urología</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_infet ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_infet" <?=$selected?>>Infetilidad</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_pedia ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_pedia" <?=$selected?>>Pediatría</label>
</div>
</div>
</td>
<td style="text-align:left">
<div class="checkbox ">
<?php
   if ($ref_pws ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_pws" <?=$selected?>>PWS</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_otro_serv ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_otro_serv" <?=$selected?>>Otros servicios de salud sexual y reproductiva</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_apoyo_emo ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_apoyo_emo" <?=$selected?>>Apoyo emocional</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_endo ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_endo" <?=$selected?>>Endocrinología</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_servicio ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_servicio" <?=$selected?>>Servicos de otras especialnameades medicas</label>
</div>
<div class="checkbox ">
  <label>Otro <textarea id="ref_otro1" rows='6' class="form-control"><?=$ref_otro1?></textarea></label>
</div>
</td>
</tr>

</table>


<table class="table">
<tr>
<td style="text-align:left">
<div class="checkbox ">
   <label>Externa</label> 
</div>
</td>
<td>

</td>
</tr>
<tr>
<td style="text-align:left">
<div style="margin-left:30px;position:absolute">
<div class="checkbox ">
<?php
   if ($ref_serv_legal ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_serv_legal" <?=$selected?>>Servicios legales</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_onco ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_onco" <?=$selected?>>Oncología</label>
</div>
<div class="checkbox ">
<?php
   if ($ref_obs_mat ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" class="" name="ref_obs_mat" <?=$selected?>>Obstetricia maternidad</label>
</div>
</div>
</td>
<td style="text-align:left;">

<div class="checkbox ">

  <label>Otro (especificar)  <textarea  class="form-control" rows='6' id="ref_otro2" ><?=$ref_otro2?></textarea></label>
</div>
</td>
</tr>

</table>

<strong>COMENTARIO </strong>
<table class="table">
<tr>
<td style="text-align:left">
 <textarea  class="form-control" rows='6' id="comment_counselling" ><?=$comment_counselling?></textarea>

</td>
</td>
</tr>
</table>

 </div>
 </div>
 
  <script>
  $(document).ready(function() {
  

  	$('#entrega_materiel').on('change', function(e) {
   material_delivery($(this).val());
   $(this).val("");
	});
	
  material_delivery("");
  
   function material_delivery(value) {
$("#material_delivery").show().html('<span style="font-size:18px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
 	$.ajax({
	url: "<?php echo site_url('counseling_content/material_delivery');?>",
	type: 'post',
	data:{user_id:<?=$user_id?>, idpatient:<?=$idpatient?>, value:value},
	success: function (data) {
	$("#material_delivery").html(data);
	
	},
	});
	}


  if(<?=$action_id?>==1){
	  $('#counseling-btns').show();
	  $( "#disabled-all-counseling input" ).prop( "disabled", true );
	   $( "#disabled-all-counseling select" ).prop( "disabled", true );
	   $( "#disabled-all-counseling textarea" ).prop( "disabled", true );
  }else{
	$('#counseling-btns').hide();  
  }
  
   
  	$('#showEditCounseling').on('click', function(e) {
	e.preventDefault();
	$(this).hide();
	$('#saveEditCounseling').slideDown();  
		  $( "#disabled-all-counseling input" ).prop( "disabled", false );
	   $( "#disabled-all-counseling select" ).prop( "disabled", false );
	   $( "#disabled-all-counseling textarea" ).prop( "disabled", false );
	});

  
  
  	$('.reload-consejeria').on('click', function(e) {
	e.preventDefault();
paginateCounseling();
	loadounselingContent();	
	$('#counseling-btns').hide();  
	});
	
	
 $("#load-consejeria").hide();
 $('#counseling-content').css("opacity","");
$(".select2<?=$action_id?>").select2({
  tags: true
});
if(<?=$anti_radio?> ==1){
$('.is_used_anti').show();
}

	$('input:radio[name="anti_radio"]').change(function(){
    if($(this).is(":checked")){
        if($(this).val()==0){
			$('.anticonception-radio-button').prop('disabled', true);
			$('.anticonception-radio-button').prop('checked', false);
			$('#contraception_otro').val('');
			$('#contraception_otro').prop('disabled', true);
			$('.is_used_anti').hide();
		}else{
			$('.anticonception-radio-button').prop('disabled', false);
			$('#contraception_otro').prop('disabled', false);
			$('.is_used_anti').show();
		}
    }
});
	
	$('#contraception_otro').on('keyup', function() {
		
		if($(this).val() !=""){
			$('#contraception_otro_checkbox').prop('checked', true);
		}else{
			$('#contraception_otro_checkbox').prop('checked', false);
		}
		});
		
		
});


 </script>